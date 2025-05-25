# ES6 Features I wish to learn
------------

###### Tuesday October 30th, 2018

### Introduction

Yup, it's that time of the year again!
The quarter where I keep talking about Advent of Code, and how I want to proceed for the challenge.
My last article on the subject, which was the retrospection on my 2017 AoC experience can be found [here](/blog/retrospecting-on-advent-of-code-2017).
Here's also a quick link to [Advent of Code](http://www.adventofcode.com).

This article will mostly cover ECMAScript 6 features I know exists, but that I haven't gotten around to using yet.
The initial goal was just to make a quick list of features, so I could remind myself to look them up come the event, but I've decided to make it public in case it may help others.
I'll also be doing the event in Node instead of Python this year, to practice for our Final Project next term.

### Rest Parameters and Spread Operators

[Overview](http://es6-features.org/#SpreadOperator)

The spread operator is a pretty way to pass an iterable object through to a function or array.
The use of `...` may allow for prettier array merges and an easier iteration through function parameters.
This could be us in some functional states where the number of parameters is variable.

### Property Shorthands

[Overview](http://es6-features.org/#PropertyShorthand)

This may only be syntactic sugar, but it's still a fun feature to be aware of.
Using the variable name as the key if there's no defined key will allow for shorter code length without losing much of the understability.

### Object Matching and Array Destructuring

[Overview](http://es6-features.org/#ObjectMatchingShorthandNotation)

I've used Object Matching slightly in the past, but I still feel uncomfortable with the feature's syntax.
It allows to obtain multiple variables out of an object's properties in one line.
The only way I've been able to wrap my head around it so far is to include specific classes from an import,
which leaves me wanting to push the feature further.

### ES6 Flavored Imports

[Overview](http://es6-features.org/#ValueExportImport)

I've been using ES6 for more than a year, and I am still sticking to good old `module.exports` and `require`.
I'll have to keep myself in check this year, and will attempt only use the new syntax, `export` and `import`.

### Generators

[Overview](http://es6-features.org/#GeneratorFunctionIteratorProtocol)

I've played with Clojure back in 2016.
One nice functionality of the functional paradigms is the ability to easily obtain infinite lists and functions.
JavaScript generators simulate some of this functionality through generators, which allow infinite function calls with generated data.
The example shows a Fibonacci generator, and I'm certain I'll find plenty of other uses during the event.

### Conclusion

There's plenty of other cool features in ES6, ES7 and ES8 that I could go up and try, but this was a list of features I wanted to add under my tool-belt before heading in for my bachelor's final project.
I'll be attempting to get all 50 stars this year, as I did in 2017.
