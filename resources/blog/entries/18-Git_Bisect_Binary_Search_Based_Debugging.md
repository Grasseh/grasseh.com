# Git Bisect - Binary Search-based Debugging
------------

###### Wednesday March 7th, 2018

### Introduction

I've been using `git bisect` here and there for the past two years and every time I mentioned the command, everyone looked at me like I was some kind of maniac using some black wizard optimization magic.
It is a similar look that I also get when I first tell someone that uses Sublime/Atom/VisualCode/VisualStudio/AnyJetBrainsIDE that I use Vim for all of my text-editing.
The difference is, `git bisect` doesn't require a rocket science certificate.
Of course, this is an hyperbole, as I believe it takes less than a month to become more productive with Vim than with other editors.
But my point is, `git bisect` is a simple tool that comes packaged with Git and is a great command in any software skillset.
It may not always be the best tool (it is overkill for some simple bugs), and has a few caveats (which will be noted at the bottom of this post), but it's a great way to quickly find a bug that may have been in the codebase for a while.

This post will include a small Python example to bring more life to the subject.
For simplicity, the example has a few noticeable flaws (even the context is flawed).
The goal is to display how `git bisect` is used, and how simple it can be used as a tool.
Note that this example uses unit tests to check if the current commit is bugged, but in reality, a manual check can also do the job if the bug has no code coverage.

### Problem Context

For this example, I wrote a small Python script that multiplies two positive integers through an additive loop.
It worked at the beginning, and I created a unit test that passes.
Somehow, a few cleanup commits later, I forgot to run my tests before committing (Oops, I'm lightheaded).
Sadly, the tests do not pass on my code right now.
Here's the code (I did not attempt to hide the code error in any way, but I'll act as if I've got no clue about what I've done) :
```py
import unittest

# Return the product of the positive integers a and b
def multiply(a, b):
    c = 0
    # Add b to its sum a time
    for i in range (1, a):
        c = c + b
    return c

class UnitTest(unittest.TestCase):
    # Test that two positive integers match their multiple
    def test_multiply(self):
        self.assertEqual(6, multiply(2, 3))

```

Meanwhile, my terminal outputs an error while running my tests:
```
19:14 - grasseh@grasseh-LT:~/projects/multiplier  (master)  python3 -m unittest main.py
F
======================================================================
FAIL: test_multiply (main.UnitTest)
----------------------------------------------------------------------
Traceback (most recent call last):
  File "/home/grasseh/projects/multiplier/main.py", line 14, in test_multiply
    self.assertEqual(6, multiply(2, 3))
AssertionError: 6 != 3

----------------------------------------------------------------------
Ran 1 test in 0.000s

FAILED (failures=1)
```

### Figuring out the root commit

The goal of `git bisect` is to identify which commit introduced the bug.
To do so, we'll need to pinpoint two specific commits.
One where the bug is present and one before the bug existed.
Obviously, the commit I'm actually on has the bug.
If I look at my commit tree (the gl alias I use can be found [in my dotfiles](https://github.com/Grasseh/dotfiles/blob/87aba452fea9bc80fe876fc0ac146d5ada6eefc5/links/.bash_profile#L41)), I can remember that the "Initial Commit" had tests that passed:

```
19:42 - grasseh@grasseh-LT:~/projects/multiplier  (master)  gl
* 3e344f6 - (35 minutes ago) snake_case test function name - Grasseh (HEAD -> master)
* 7356cfb - (38 minutes ago) Add spaces after commas - Grasseh
* 7043076 - (40 minutes ago) Add comments - Grasseh
* 780e730 - (44 minutes ago) Add gitignore - Grasseh
* 1fef030 - (45 minutes ago) Initial commit -- iterable version only - Grasseh
```

Just to make sure, I'll run the tests on the branch in a few minutes.
First off, I'll start using `git bisect`.
I'll need to start the tool with `git bisect start` and then mark my current commit as bugged with `git bisect bad`.
Then, I'll checkout the `1fef030` commit, run the tests to make sure they passed and mark the commit as clean with `git bisect good`.

```
19:53 - grasseh@grasseh-LT:~/projects/multiplier  (master)  git bisect start

19:53 - grasseh@grasseh-LT:~/projects/multiplier  (master|BISECTING)  git bisect bad

19:53 - grasseh@grasseh-LT:~/projects/multiplier  (master|BISECTING)  git checkout 1fef030
Note: checking out '1fef030'.

* Snipped pointless Git notes :) *

HEAD is now at 1fef030... Initial commit -- iterable version only

19:54 - grasseh@grasseh-LT:~/projects/multiplier  ((1fef030...) %|BISECTING)  python3 -m unittest main.py
.
----------------------------------------------------------------------
Ran 1 test in 0.000s

OK

19:54 - grasseh@grasseh-LT:~/projects/multiplier  ((1fef030...) %|BISECTING)  git bisect good
Bisecting: 1 revision left to test after this (roughly 1 step)
[7043076e87b69425e09738120de5739a5616244b] Add comments

19:54 - grasseh@grasseh-LT:~/projects/multiplier  ((7043076...)|BISECTING)
```

If you pay close attention to the end of the example, and compare it to the git tree I gave earlier, you may notice that git automatically checks out the commit at the middle of the tree.
The goal of this is to check a smaller amount of commits, to find the first one where the bug started occurring.
By running our tests until the bisect ends, git will provide us with this root-cause commit.
We'll need to run it around `log2(n)` times, where `n` is the amount of commits in-between our first bad and our first good commit.
This means that if you double the amount of commits, you'll need to test 1 more commit.
This varies by +/- 1 commit, depending on if you have an odd or even number of commits and how superdivisible it is by 2.

To complete the bisect, let's check if the checked out commit had the bug or not and mark it as `git bisect good` or `git bisect bad`

```
19:55 - grasseh@grasseh-LT:~/projects/multiplier  ((7043076...)|BISECTING)  python3 -m unittest main.py
.
----------------------------------------------------------------------
Ran 1 test in 0.000s

OK

20:15 - grasseh@grasseh-LT:~/projects/multiplier  ((7043076...)|BISECTING)  git bisect good
Bisecting: 0 revisions left to test after this (roughly 0 steps)
[7356cfbe906cc45ed97e0c41bb266a3556a8ea24] Add spaces after commas

20:15 - grasseh@grasseh-LT:~/projects/multiplier  ((7356cfb...)|BISECTING)

```

Alright, one more commit to check, it seems.

```
20:15 - grasseh@grasseh-LT:~/projects/multiplier  ((7356cfb...)|BISECTING)  python3 -m unittest main.py
F
======================================================================
FAIL: testMultiply (main.UnitTest)
----------------------------------------------------------------------
Traceback (most recent call last):
  File "/home/grasseh/projects/multiplier/main.py", line 14, in testMultiply
    self.assertEqual(6, multiply(2, 3))
AssertionError: 6 != 3

----------------------------------------------------------------------
Ran 1 test in 0.000s

FAILED (failures=1)

20:16 - grasseh@grasseh-LT:~/projects/multiplier  ((7356cfb...)|BISECTING)  git bisect bad
7356cfbe906cc45ed97e0c41bb266a3556a8ea24 is the first bad commit
commit 7356cfbe906cc45ed97e0c41bb266a3556a8ea24
Author: Grasseh <steve@grasseh.com>
Date:   Tue Mar 6 19:11:20 2018 -0500

    Add spaces after commas

:100644 100644 7e459631ad3ef0a8fc797be709a9ce6128065987 3af533a673b4d3ec8a9f3ae56a1fdddec264ddfe M      main.py

20:16 - grasseh@grasseh-LT:~/projects/multiplier  ((7356cfb...)|BISECTING)
```

Welp, seems like git found our commit for us.
Seems like `7356cfbe906cc45ed97e0c41bb266a3556a8ea24 is the first bad commit`

### Fixing the bug

First off, we're still on the bisect commit and "bisecting".
Let's end this off with a `git bisect reset` to get back to our initial state (which was a checkout on the master branch).
Afterwards, we can check what were the changes done in the problematic commit with `git show <hash>`.

```
20:37 - grasseh@grasseh-LT:~/projects/multiplier  ((7356cfb...)|BISECTING)  git bisect reset
Previous HEAD position was 7356cfb... Add spaces after commas
Switched to branch 'master'

20:38 - grasseh@grasseh-LT:~/projects/multiplier  (master)  git show 7356cfb
commit 7356cfbe906cc45ed97e0c41bb266a3556a8ea24
Author: Grasseh <steve@grasseh.com>
Date:   Tue Mar 6 19:11:20 2018 -0500

    Add spaces after commas

diff --git a/main.py b/main.py
index 7e45963..3af533a 100644
--- a/main.py
+++ b/main.py
@@ -4,11 +4,11 @@ import unittest
 def multiply(a, b):
     c = 0
     # Add b to its sum a time
-    for i in range (0,a):
+    for i in range (1, a):
         c = c + b
     return c

 class UnitTest(unittest.TestCase):
     # Test that two positive integers match their multiple
     def testMultiply(self):
-        self.assertEqual(6, multiply(2,3))
+        self.assertEqual(6, multiply(2, 3))

20:39 - grasseh@grasseh-LT:~/projects/multiplier  (master)
```

As we can see here, somehow, when adding spaces after comma, a 0 was changed for a 1.
We'll just need to change it on master, commit the new bugfix and push it.
Or do whatever our git workflow specifies, by using hotfix branches, as if we just fixed a normal bug.

### Conclusion and Caveats

The great thing about `git bisect` is that it allows to quickly find a root commit, even through a lot of commits.
The logarithmic nature of binary-search allows a bisect of 100 commits to be done in 8-9 tests.
1000 commits can be done in 11-12 tests.
For those not used to binary-searches, testing at the middle of a set just cuts the set in two.
Cutting a set of 1000 down to 500 takes only one step, and getting it down to around 100 (125) take 3.

There are a few instances, though, where `git bisect` may not be the best tool for the job.
It may have been slightly overkill for this use-case, for example, where the code is really small and a basic manual code-check could've figured it out.

In situations where commits do not follow a standardized guideline, it may also prove pointless.
For example, if your project consists of 8-9 commits that are huge (+/- 1000 line changes each), even finding the root commit won't be much help, as there are many possible bugs in the found commit and you won't be easily spot what you're looking for through a diff.

In other situations, running tests may cost a lot, or take a lot of time, due to environment constraints (databases, virtual server connections). In these scenarios, it may feel unrealistic to run the tests back-to-back.

Finally, if the bug is a regression (a bug that was fixed at some point), `git bisect` may provide odd results.
If the bisect is started before the first time the bug was found instead of in between when it was fixed and between the regression's first appearance, it will point to the root of the first appearance, which may be a different cause than the actual regression (even if the symptoms are the same).
