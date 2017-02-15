Migrating my website to Laravel
------------

###### Tuesday February 14th 2017

### Preface

Last year, I noted that I wanted to mess around in Ruby, Laravel and Clojure.
I've actually bought a book about Clojure, Ruby (and we worked on a small Rails API at work).
The only thing I haven't touched was Laravel.

My Website was also built using a small PHP Routing Script, with PHP included in the views.
I despise the nature of that code, but I wanted something up quick.

### On to Laravel

The thing is, I probably would have saved time if I started with Laravel. 
Yes, Even if I never used the framework before.
The complete migration was so quick, and the website code looks way cleaner, that I'm quite amazed I've never touched it before.

The speed was probably due to the fact that I do not currently use any database (these entries are markdown files parsed with a PHP Library).
But I'll explain all I had to do in a few moments.

### Migrating

My previous version of the website was structures as follows : a bunch of resources in folders at the root, a router in the index.php, an htaccess file to point to the router and a folder called projects.
The projects folder contained the different parts of the site and were called by the router. 
They all had their own different routing as well in them (with similar code).

With Laravel, I just had to put different controller namespaces for each project, and put all the routes in the routes folder. 
I removed the PHP from the views and split it in controller and view code.
Since I was not using a database, I have no current models.

I moved every resource to resources and now have an easier time accessing them.

Putting it live was a simple matter of chmoding the storage and vendor folders (for logging and caching) and adding the correct environment variables (And Composer installing, but I was already using composer to parse my Markdown).

### Final notes

As usual, you can find my code on Github. 
I've got a [repository with my website](http://www.github.com/grasseh/grasseh.com).
If you want to see the previous version, just roll back a few commits.
I might go ahead and put a tag for that version, but that would rely on my memory.
If you'd rather prefer finding it by tag and I haven't added one, feel free to shoot me an (email)[mailto:steve@grasseh.com].
