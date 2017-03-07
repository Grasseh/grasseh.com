Adding Sessions to Rails API
------------

###### Tuesday March 7th 2017

### Preface

We've started working, last january, on a Ruby on Rails API for our Website. 
We do most of our client work in PHP, but decided we wanted to spice up our experience with a framework we're not used to.
Of course we've ran into many issues on our way.

### The issue

My latest challenge was with using a user session to transfer a token through two different calls.
I went online to look up how to pass a variable to a session token.
On the rails documentation website, it was noted to use the following notation to use session hashes :

```
session[:token] = "yourdata"
do_something_with session[:token]
```

I went ahead and tried something following this method.
Of course, it didn't work out. 
My object had my token on my first call, but on the second call, it didn't.
Trying with a browser, I noticed I did not have a cookie with a session_id.

### Figuring it out

As a programmer, you tend to get used to facing random issues that do not fit with the documentation.
Thus, I went to every programmer's favorite website, StackOverflow. 
As usual, the first Google Search result lead me to somebody having the same problem.
I noticed there were even a few answers and expected it to be a cakewalk.
But as soon as I read the answers, I was amazed by how mindnumbing the answers were...

The top-voted and accepted answer was as follows: 
"Sessions and Cookies are not supported by default in rails-api. 
You can easily solve this by simply adding ```RAILS_API=false``` to your application.rb config file."
I can't understand how a question asking about how to add sessions in rails_api gets answered by saying to remove the api.
It's so dense! 
The reason we're using rails-api in the first place is because it is much more lightweight that the whole Rails framework. 
We want to add a small part of it pack, not all of it! Performance doesn't need to take that much of a hit!

Suggested below was a much more reasonable answer.
It was suggested to add the following lines to the application.rb to add the session only:

```
```

I went ahead and added it to my config, ran through my routes and... nothing.
In disarray, I closed the StackOverflow page and went back to Google.
I found an intersting code snippet with the following lines to be added to appliation.rb:

```

```

Looks familiar?
I made a rookie mistake after following that second StackOverflow solution.
My application.rb file was edited, but I never restarted my puma server, which means it did not have the updated configs.
I did not expect it, because most ruby files in rails can be edited without restarting the server (routes, models and controllers all can be changed directly).

Now, I'd usually give out more code snippets to provide meaningful examples, but this is the first time I've wrote something about problems I've had with business code (that isn't open source).
I hope the few snippets I've provided have been enough to convey my thoughts about this scenario.
