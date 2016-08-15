Using ReflectionClass To UnitTest in PHP
------------

###### Monday August 15th

This content assumes using PHPUnit 5.0 and PHP 5.6/7.0(the code has been tested in both versions). 

Let's say we want to have a PHP backend that needs to handle an attendee list for a meeting. 
The following class handles the list and has a function to add an attendee, and an another to send an email to all of them.

```
    <?php
        class AttendeeList
        {
            //Array containing all of attendees
            private $attendees

            //Initializes our list
            public __construct()
            {
                $this->attendees = [];
            }

            //Adds an attendee in our list
            public addAttendee($name, $email)
            {
                $this->attendees[] = ["name" => $name, "email" => $email]; 
            }

            //Sends an email to all of our attendees
            public sendEmail($email)
            {
              //The implementation of this function does not matter for this example
            }
        }
    ?>
```

We currently want to write a unit test for the addAttendee function. 
The point of this test is to verify that the attendee as currently been added to the list.
The issue is, we have no way of easily checking the list, since it is private.
Let's look at the solutions we have:

### Make attendees public

Just making the object public would make the array available to everyone.
This would just break the OO encapsulation principle.
Not wrapping this array could easily break the application.

### Make a "GetAttendees" function

This wouldn't break any OO principle, but it adds extra code that requires maintenance and is only used in a unit test.

### Using a Reflection Class

The whole point of this post. 
This does not require any additional code in out current class. 
Our unit test will be a few lines bulkier, but maintainability won't be an issue.

Let's look at the basic structure of our test class first :


