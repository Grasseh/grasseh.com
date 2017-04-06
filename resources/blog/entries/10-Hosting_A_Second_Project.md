# Hosting a second project

------------

###### Thursday April 6th 2017

### Preface

In a [previous blog post](http://www.grasseh.com/blog/07-Eliciting_EsporTS_Requirements), I've presented the requirements for a project I've been building. 
This project is for the ÉTS student club EsporTS.
I've been prototyping it this semester and we've completed our database-less (which means no saving) dynamic prototype last week.

This article will talk about how I went around setting up the hosting on my Ubuntu server using Apache2. 
If you want to take a look at the prototype, it can currently be found at http://esports.grasseh.com

### Two Projects

The first point of concern was that since this isn't a personal project,
I needed to make sure it wasn't part of my website.
This way, whenever I'm done with my degree, someone else can pick it up easily.

It was obvious I'd be doing the current hosting, though.
I've thus decided to have a PHP environment to host the JavaScript prototype, 
since my server's in PHP at the moment.

### Setting up the repo on the server

I've followed my standard procedure to set up the production repository.
I connected to my server through SSH, and created a new directory in both my home folder and my html folder 

```
mkdir ~/scouter.git
mkdir /var/www/html/scouter
```

I then went ahead and initialized the repository and created my post-receive hook.

```
cd ~/scouter.git
vim hooks/post-receive
```

I put the following content in the file to make sur it transfers the provided commits to the web server folder (as well as running Composer for my PHP Dependencies):

```
#!/bin/bash
echo "Initializing transfer"
GIT_WORK_TREE=/var/www/html/scouter/ git checkout -f
echo "Transfer complete"

cd /var/www/html/scouter/  
composer install --no-dev
```

Finally, I activated the hook with ```chmod +x hooks/post-receive```. 

### Setting up the subdomain

My first plan was to go with figuring out how to get Apache to redirect to a different project from the url. 
I wanted to just have the project at www.grasseh.com/scouter .
I looked around and most documentation was about putting rules in an .htaccess file.
I'm aware of how those files work, but I felt that it wasn't a clean solution to my problem.
I didn't want Apache to load to a project to then get told to get redirected to a different project not even in the same directory.
There was no way that'd be portable anywhere.

I've then stumbled on a nice answer on StackOverflow which talked about subdomains and VirtualHosts. 
It wasn't as complete as I wanted, so I needed a small bit of extra documentation from the Apache website, but it lead be straight to the answer.
I already have a CNAME alias setup for my domain on my DNS provider for *.grasseh.com . 
Which means all requests go to the same server and Apache handles all requests from the port 80.

All I had to do was to modify my Apache Config ```sudo vim /etc/apache2/sites-available/000-default.conf``` which looked like this:

```
<VirtualHost *:80>
    ServerAdmin steve@grasseh.com
    DocumentRoot /var/www/html/site/public
</VirtualHost>
```

to this:

```
<VirtualHost *:80>
    ServerAdmin steve@grasseh.com
    ServerName www.grasseh.com
    DocumentRoot /var/www/html/site/public
</VirtualHost>
<VirtualHost *:80>
    ServerAdmin steve@grasseh.com
    ServerName esports.grasseh.com
    DocumentRoot /var/www/html/scouter/public
</VirtualHost>
```

Then, all that was left to do was restart apache with the new config.

```
sudo a2dissite 000-default
sudo a2ensite 000-default
sudo apache2 restart
```

And voila, esports.grasseh.com was set up!

### Final note

One thing I would have done if I had to redo this was create a second site file, instead of having both in the same file. 
I'm not 100% certain it'd work (98%), but it definitely would look cleaner than having both in the same file.
It would also allow me to disable one project without disabling the other.
