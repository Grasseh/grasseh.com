# Using Vim Macros
------------

###### Friday August 17th, 2018

### Introduction

I've been using Vim for around 3 years.
There are a lot of things about the editor I enjoy, but one of the most fulfilling experiences is creating a macro on the fly and seeing it work.
Macros can be used in a lot of contexts during edition, and are a godsend for long repetitive tasks.

### Demonstration

I'll try to keep this blog post fairly short, but descriptive.
I'll provide one example, and describe every motion in a way that non vim-users or beginners can follow the steps.

Let's say I have the following CSV Data:

```
Id,Name,Age,Salary,Address
1,Steve,24,123456$,123 X Road
2,ThatRandomDude,12,10$,456 Y Street
3,IPlayRandomGames,70,999999$,789 Z Avenue
...
100,ThatMomentWhenTheFileIsLong,1,1$,000 A Valley
```

Assume that the `...` replaces 96 lines of similar data, formatted correctly.
If I had a task of changing the $ sign into € and removing the Address Field, I wouldn't want to go through all lines and do it manually.
I could write a quick programming script, but that'd take way more effort than going through a quick vim macro.

All I'd have to do would be to manually edit the first line
and then, I'd move to the first line, record a macro on it and repeat it on the 99 lines below.
Here's the quick operations I'd have to do, starting from the top left corner:

```
4f,Dj0qmf$r<Ctrl+K>=elDj0q99@m
```

Running these commands would leave me with (I've ran these with the following changes for testing: removing the ... and replacing the 99 by 3):

```
Id,Name,Age,Salary
1,Steve,24,123456€
2,ThatRandomDude,12,10€
3,IPlayRandomGames,70,999999€
...
100,ThatMomentWhenTheFileIsLong,1,1€
```

That probably seems like a bunch of gibberish, but I'll slowly go through all of what this macro does.
Writing this, with my amount of experience, took me less than 2 minutes, even when I had stuff wrong (like forgetting the fact that I had a ... in my file)

First off, `4f,` moves the cursor to the fourth comma.
This can be read as "four times(`4̀`), move to the next found(`f`) comma(`,`).
Afterwards, I delete the rest of the line, as it's the address stuff I don't need, with `D` and move my cursor to the beginning of the next line.
`j` moves me down to the next line and `0` places my character on the first column of that line.

It's then time to record the macro.
The first `q` initiates the macro recording and the second one decides the register.
A macro register is pretty much a one character long name.
I've used the `m` register, but there is no importance to me for the register name in this scenario.
If I wanted to use another register, say `p`, I would have done `qp` to start the recording.

Afterwards, most of the operation are line-manipulations.
`f$` (f)inds the next `$` symbol on the line.
`r` starts a character replacement with the following character.
Since € is a special character (not on my keyboard), I need to invoke it through its Vim code.
`<Ctrl+K>` loads the special character mode and `=e` is the Euro code.
This ends up with (`r`) replacing the current character with (`<Ctrl+K>=e`) an Euro sign (€).

Finally, I can move to the next character and delete the rest of the line as we don't want the address.
This can be done by moving the cursor to the right (`l`) and deleting the rest of the line (`D`).
I then want to move to the beginning of the next line to do it again.
I can use `j0` to do that again.

As the macro's complete, a single `q` press will stop the macro recording.
All that's left to do is to run the macro on the next 99 lines.
Invoking the macro is done with `@` followed by the register (we used `m`).
I want to do this for the next 99 lines, though, so the invocation will need to be as follows : `99@m`.

### Conclusion

That's a lot of complicated commands, but vim macros can easily adapt to your level.
If you are a Vim beginner and only use `hjkl` to move and Insert mode, you can still use macros.
Of course, they may not be as short and "simple", but they can still save time.

Vim can seem alien the first two weeks of use, but it quickly becomes fun, and macros increase that feeling.
As soon as I got to a productivity level on Vim that was close to my previous level on Sublime (it took me 2-3 weeks), I found that using vim is so much fun, as it's a small puzzle in itself;
it becomes a puzzle about editing as efficiently (least amount of keystrokes) as possible.
