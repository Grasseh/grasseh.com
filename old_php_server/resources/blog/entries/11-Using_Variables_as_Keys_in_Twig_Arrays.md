# Using variables as keys in Twig Arrays

------------

###### Friday May 5th 2017

### Preface

At work, we use the [Twig](http://www.sensiolabs.com/twig) templating engine to provide our views in our MVC framework. 
Even our projects using Laravel had the templating engine switched to Twig since we're more familiar with it than Blade. 
We also use a custom-built formwrapper which is provided as open-source on [its Github page](http://www.github.com/anekdotes/formwrapper) 

### The Wrapper

Before moving on with the issue, I want to quickly demonstrate how we use our wrapper, to provide context on the code that will be displayed.
We have a small built-in Twig extension that loads a new instance of it in an object called form.
This leads us to being able to use a variable named form for the calls to form generation.

For example, in a twig template, we may have the following code:
```twig
{% autoescape false %}
    {{form.open('www.grasseh.com/formEndpoint', 'post', [])}}
    {{form.text('Name : ',
        'name', 
        [class : 'form-control', placeholder : 'Enter your name'],
        ''}}
    {{form.close()}}
{% endautoescape %}
```

This would generate the following HTML:
```html
<form action="www.grasseh.com/formEndpoint" method="post">
    <label> Name : </label>
    <input type="text" name="name" class="form-control" placeholder="Enter your name"></input>
</form>
```

### The pain point

If you pay attention to both the open and text methods, you will noticed they have an associative array as a parameter. 
This array serves to pass additionnal attributes to add to the HTML tag, such as classes, placeholder, data values etc...

The issue I had was that all fields in my form needed to have a specific data tag, depending on the logged in user.
Our controller provided us with the variable currentUser, which, as a model, had a method called isAdmin().
The text input would have an attribute data-id if the user wasn't an admin. 
If he was, the input would then have a data-admin attribute.

I went ahead and tried the following :
```twig
{% set data = currentUser.isAdmin() ? "data-admin" : "data-id" %}

{{form.text('Name :', 'name',
    [ class : "form-control",
      data : currentUser.id ],
    currentUser.name}}
```

Of course, this would set the key as "data" and provide the following input : 
```html
<label>Name :</label><input type="text" name="name" class="form-control" data="1">MyName</input>
```

### The solution

Using parentheses allows Twig to parse the content inside and provides it as a key.
This can thus be used to toss a variable into it.

```twig
{% set data = currentUser.isAdmin() ? "data-admin" : "data-id" %}

{{form.text('Name :', 'name',
    [ class : "form-control",
      (data) : currentUser.id ],
    currentUser.name}}
```

It Would provide the following HTML (assuming the user is an admin). 
```html
<label>Name :</label><input type="text" name="name" class="form-control" data-admin="1">MyName</input>
```

I assume that I could also have just passed the conditionnal as the key, as follows (NOTE: This has NOT been tested as of this date) :

```
{{form.text('Name :', 'name',
    [ class : "form-control",
      (currentUser.isAdmin() ? "data-admin" : "data-id") : currentUser.id ],
    currentUser.name}}
```
