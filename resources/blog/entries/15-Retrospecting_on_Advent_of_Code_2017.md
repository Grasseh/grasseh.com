# Retrospecting on Advent of Code 2017

------------

###### Monday January 15th, 2018

### Introduction

As a frame of reference, I'll be discussing my adventure through Advent of Code 2017, without explaining the event.
If you need more information, I have two blog posts on the subject, which can be found [here](/blog/06-Using_Advent_of_Code_as_an_opportunity) and [there](/blog/14-Preparing_for_Advent_of_Code_2017).

This post will include keypoints I've learned through the project as well as random thoughts on the subject.

### Do It Everyday

I'm placing this at the top of the post as I believe it is the biggest takeaway I've gotten from AoC 2017.
It feels CRITICAL to treat Advent of Code as a daily task that cannot be delayed to a future day if you plan on completing it.

Although it may be anecdotal, I believe that the event should be treated the same way as forming any other habit.
Let up one day and it gets 1000 times harder to get back on track.

I've noticed it happen in 2015, when I got hardstuck on the Day 19's puzzle. I had a hard time keeping up afterwards and just gave up on day 21.
The same thing occurred in 2016, as I decided to take a quick day off after messing with some code on Day 6. I never came back to it.
I've made sure to do every single problem daily this year, and never lost track of it.
I've also enrolled a friend this year, but the same thing occurred for him.
He got stuck behind in the early days, and the mountain of days ahead demotivated him, rendering him unable to keep up.
I believe he got around 12 stars, the same amount I got in 2016.

### Do some early preparation

I won't go deep into the implementation of this year's preparation.
I've detailed most of it in my previous blog post (which was linked in the introduction).

However, I'll say that having this preparation was a great help throughout the event.
Not having to copy-paste input reading code for every day makes the code more concise, and easier to read.
It also saves a lot of time if you want to test the different examples provided by the problems.
This allows to write easy unit tests, which are easy to follow up on, easier to debug and save misunderstandings problems.

### Some days are harder than others

Sometimes, some problems are easy.
Sometimes, they're really challenging.
To be honest, I found the first day's challenge to be a small stepup from last year's.
It still was easy, but required to understand chained list principles, compared to 2015 which only required to be able to recursively loop through a string.

The first real challenge of 2017 was Day 3.
The first problem was a Manhattan Distance on a spiral.
I spent around 30 to 60 minutes on a whiteboard chalking up some mathematical patterns to be able to solve it with a quick mathematical expression.
I wrote around 20 unit tests to make sure my patterns were right as well.
The second problem, though, threw all those equations through the window, and created the spiral with the sum of adjacent numbers.
It then became easier to just scrap mathematical expressions and build it, as it would quickly grow and thus need few iterations.

The second challenge was Day 7.
It was moderate programming-wise, but the real difficulty consisted of understanding the actual problem and enacting on it.
There was additional data added that was not needed for the first part.
The second part needed recursion, which could be challenging for beginners.

Day 10b caused me a few problems, as I had a small mistake that got caught by my unit tests, but I wasn't able to figure out why.
At least, I didn't expect to be able to parse the real input (which is a great reason to write multiple tests).
I had to run around for a while to find a small operator bug, if I remember right.

Day 18 was also really challenging, as a small typo caused an infinite loop.
Having two generators communicating was a really fun puzzle concept.
The challenge was cleverly designed to easily run in an infinite loop if a mistake happened, which made it really hard to debug.

Finally, Day 23 was a lot of fun.
Trying to understand the assembly code was hard, but really rewarding.
At that point, the puzzle levels were already harder, but this was the hardest of them all.

### Think ahead

One thing I've done through this AoC was reading the puzzles when I woke up.
I then moved away from my computer to do other stuff(breakfast, commute on week days).
Finally, I returned to the problem with a clearer idea of how to proceed with a solution.
Jumping straight in the code wouldn't have allowed me to have a clearer view of the problem and probably would have needed more actual coding time.

Note : Totally unviable if you want to make the leaderboard.

### Enjoy yourself

The most important part of this challenge, though, is to have fun.
If problem-solving is not enjoyable, there's not a big point in doing it, other than to hone skills you may find boring.
There is a lot to learn about algorithms through the challenge, but the setting and the enjoyment of learning is something than is hard to match for me.

Huge thanks to Eric Wastl for making this event a third year in a row.
If anybody wants to try their hands at the challenges, you can find them on the official [AoC](http://www.adventofcode.com) website.
My personal solutions can also be found on [Github](https://www.github.com/grasseh/adventofcode-2017).
