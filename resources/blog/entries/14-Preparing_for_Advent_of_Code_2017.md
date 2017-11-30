# Preparing for Advent of Code 2017

------------

###### Thursday November 30th, 2017

## Introduction

I won't be reinstating what Advent of Code is and why any programmer should attempt it.
If you are interested, I have written a [blog post on the subject](/blog/06-Using_Advent_of_Code_as_an_opportunity) last year.

This post will be subject to the preparations I've done for this year's advent of code.
I'll be using python once again, as I previously did in 2015.
The only small difference is that I've moved to Python 3 instead of Python 2.7

## Project organisation

I've grown a lot in the past two years.
I've thus decided to organize my problems differently than two years ago.
First off, my inputs would still be in an input folder.
Then, I'd have solvers in a different folder, instead of at root.
Finally, I'd have a main script at the root to pick which solver to run.
This setup leaves me with the following folder schema :

```
/main.py
| -- inputs
|    | -- day1a.txt
|    | -- day1b.txt
| -- solvers
|    | -- day1a.py
|    | -- day1b.py
```

## Main script and imports

I've then wrote the main.py script to solve projects.
Its goal is to be a small CLI where you write the day and it returns the solution

I've thus started to write the basic flow for the CLI

```
print("Welcome to Grasseh's 2017 Advent of Code")
print("Enter your problem number")
problem_no = input(">")
```

Then, using python 3's directly included importlib, I can load both the input, a solver modle

```
text_file = open("inputs/day{}.txt".format(problem_no))
content = text_file.read()
solver = importlib.import_module("solvers.day{}".format(problem_no))
```

Since I'm handling IOs with user input strings, there's definitely a chance for a wrong input string.
I'd normally do a file-check and end the program if it doesn't exist, but since this is a side project, I'll just use a quick try-catch instead.

```
try:
    text_file = open("inputs/day{}.txt".format(problem_no))
    content = text_file.read()
    solver = importlib.import_module("solvers.day{}".format(problem_no))
except IOError:
    print("Problem file not found(input or solver)")
    sys.exit(0)
```

Finally, I need to display the solution and wrap things up in a clean function to call (otherwise, I'll have `pylint3` screaming at me).
This leaves me with the following `main.py` file :

```
# pylint: disable=missing-docstring
import importlib
import sys
def main():
    print("Welcome to Grasseh's 2017 Advent of Code")
    print("Enter your problem number")
    problem_no = input(">")
    try:
        text_file = open("inputs/day{}.txt".format(problem_no))
        content = text_file.read()
        solver = importlib.import_module("solvers.day{}".format(problem_no))
    except IOError:
        print("Problem file not found(input or solver)")
        sys.exit(0)
    solution = solver.solve(content)
    print("The solution to problem {} is : {}".format(problem_no, solution))

main()
```

## Testing the CLI

I did not want to end up with bugs to solve while writing the day1 solver.
I've thus made a fake day0 problem which consists of summing all numbers on all lines of an input.
This needed an input to go with first.
Content of `inputs/day00a.txt` :

```
1
2
3
4
5
6
```

Finally, using functional maps, this can easily be solved through a one-liner.
Sum could be used directly if these were numbers, but they come out as strings.
The `filter` function is not mandatory and could just be replaced by fn_input, but being safe is nice.
Content of `solvers/day00a.py` :

```
def solve(fn_input):
    return sum(map(int, filter(str.isdigit, fn_input)))
```

By running it in by terminal, I can check if this works.

```
10:22 - grasseh@grassehLT:~/advent-2017  (master)  python3 main.py
Welcome to Grasseh's 2017 Advent of Code
Enter your problem number
>00a
The solution to problem 00a is : 21
```

## Testing the test

One thing I've learned from the past two years of doing Advent of Code is that having unit tests is a godsend for avoiding mistakes.
Testing using the provided input is annoying if you need to commonly change your input file (i.e. 2015)
Using Unit tests allow easy testing to check the function follows the provided example.

Luckily, python makes unit testing really easy through the included `unittest` library.
This is what the `solvers/day00a.py` file looks like, with tests added (+pylinted)

```
# pylint: disable=missing-docstring
import unittest

def solve(fn_input):
    return sum(map(int, filter(str.isdigit, fn_input)))

class UnitTest(unittest.TestCase):
    def test(self):
        self.assertEqual(solve(["1", "2"]), 3)

    def test2(self):
        self.assertEqual(solve(["1", "2", "3"]), 6)
```

And running tests in the terminal confirms the tests pass.

```
10:22 - grasseh@grassehLT:~/advent-2017  (master)  python3 -m unittest discover -s solvers -p '*.py'
..
----------------------------------------------------------------------
Ran 2 tests in 0.000s

OK

```

## Post-note

Advent of code can be found at http://adventofcode.com/2017 .
You can find the repository I'll be using for this on my [GitHub](http://www.github.com/grasseh/adventofcode-2017).
