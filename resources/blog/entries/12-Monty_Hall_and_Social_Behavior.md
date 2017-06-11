# Monty Hall and social behavior

------------

###### Sunday June 11th 2017

### Preface

This post assumes the reader's awareness of the basic Monty Hall probability problem. 
If there is a lapse of knowledge on the subject, please refer to [this video](https://www.youtube.com/watch?v=4Lb-6rxZxx0) before reading.

This is more of storytelling followed by a psychology rant than a programming article.
It may include some technical details when it comes to programming and probability, but its main goal is to rub off some steam.

### The situation

I was coming back from an algorithmics class, last Wednesday night, with one of my collegues.
We were taking the subway back home.
All of a sudden, our discussion took a turn to go towards Deal or No Deal.
I was talking about how I figured out a few months back that it doesn't work like Monty Hall and that you have a 50/50 chance if you make it to the end and switch/keep your wallet.

I was astonished to see that he disagreed.
As per usual, I felt compelled to figure out where he had a lack of knowledge that caused this mishap.
The discussion quickly turned around to the Monty Hall show, since it's a simpler problem.
What he told me was as follows : "Even if Monty does not know which door has the car, if you make it to the end, you still have a 2/3 chance of winning by switching doors."

I first tried to tell him that you have to ignore the cases where you open the car, but he saw that as reinforcing his point since he already stated "by making it to the end". 
I'm pretty sure he saw that as me not understanding what he's saying right.

I then took out a pen and a piece of paper out of my bag and drew two different possibility trees.
One with the actual game show and one with the hypothetical problem.
The former had 2 chances to win if you kept your door and 4 if you switched. 
The latter had 3 chances to win if you kept your door and 3 as well if you switched.
I probably did not describe or draw them well enough, though, as he did not seem to understand by drawings.

### The tilter

I want to first note that I'm a loud speaker.
Which means I was, probably, without noticing it, annoying a few people around.
It's a flaw I need to work on.

Back to the situation, I was still trying to explain my trees to my friend when a random stranger approached us.
What she said went as follows : "I'm sorry, since you seem to be really into it, but your friend is right."
I then assumed she misheard the situation, since it's standard to view the Monty Hall problem from the actually game show. 
I attempted to correct her by saying this not the standard Monty Hall problem before she went on to tell me that it does not matter since it produces the same result.

I assume I was red as hell.
I did not say one more word, since she said that as she was leaving the subway at that point. 
My friend looked at me with a smile before I told him I'd checkup with a probability teacher.

A second later, I went back on the idea of sending an email to my teacher from two semesters ago.
I decided it'd be better to write a quick program in Python to prove my point.
Thus, I told my friend I'd send him my code and the result after my bus ride (I need to take a 20-minute bus after the subway to get back home).

When I got in the bus, I was happy to see that it wasn't crowded and that I would be able to whip out my laptop.
I used my cellphone to google some quick syntaxic references since I did not have network on my laptop, and did not feel like turning on tethering.

I completed my code during the ride (I also took pictures of the output to show my friend).
At that point, he told me he searched on StackExchange and noticed people were agreeing with me.
(If you either want to see the code or the StackExchange thread, I'll have them linked at the end of the post).

### The rant

I want to explain what I've despised in this situation.
The lack of critical thinking and the blind faith people have towards media.
I suppose that this situation was created by having both my friend and the stranger watch a video or read a post somewhere about Monty Hall and describing why it's a 33%/66%.
And as most of the videos about the problem explain it, they say it's because the two wrong doors combine into one to make it a two thirds chance.
They mention the fact that the announcer knows the door, but the fact that this knowledge causes this probability change is slightly mentionned and often overlooked.

This causes people watching the video to focus on the two-door fact and not the cause of the probability change.
And here's the problem. They start believing "I saw this in the medias, this must be right.".
Then, they apply what they understood incorrectly to another similar subject where it does not apply, but still keep that "I saw this in the medias" mindset, instead of trying to figure out the real application.


### Footnotes

Here's a list of links I've talked about in this post :

* [Monty Python source code](https://github.com/Grasseh/monty)
* [Stack Exchange mathematical proof](https://math.stackexchange.com/questions/912507)
* [Monty Hall explanation in 5 minutes -- video](https://www.youtube.com/watch?v=4Lb-6rxZxx0)
