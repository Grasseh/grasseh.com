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
            private $attendees;

            //Initializes our list
            public function __construct()
            {
                $this->attendees = [];
            }

            //Adds an attendee in our list
            public function addAttendee($name, $email)
            {
                $this->attendees[] = ["name" => $name, "email" => $email]; 
            }

            //Sends an email to all of our attendees
            public function sendEmail($email)
            {
              //The implementation of this function does not matter for this example
            }
        }
    ?>
```

We currently want to write a unit test for the addAttendee function. 
The point of this test is to verify that the attendee has currently been added to the list.
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

```

    <?php
        use PHPUnit\Framework\TestCase;

        class AttendeeListTest extends TestCase
        {
            //Tests Instance of the class
            public function testInstantiation(){
                $list = new AttendeeList();
                $this->assertInstanceOf(AttendeeList::class, $list);
            }

            //Tests Sending Email
            public function testSendEmail(){
                //This implementation is not important
            }

            //Tests Adding an attendee to our list
            public function testAddAttendee(){
                //We need to write code here
            }
        }
    ?>

```

Our goal is to write a clean testAddAttendee function.
We'll start by instanciating it and calling it.

    $list = new AttendeeList();
    $list->addAttendee('Grase', 'somebody@google.com');

We should expect to currently have a single array in our list.
We will add a second one, to make sure it adds both correctly.

    $list->addAttendee('Jael', 'myname@is.me');

We now need to get data from the list.

    $reflectionList = new \ReflectionClass($list);
    
What's a ReflectionClass? 
It's an abstraction of the object we passed to it.
It contains a lot of useful information about the class structure.
We can obtain the class name, the methods, the properties and a lot more by using its public methods.

Our goal is currently to see if we have a correct list of attendees. 
Let's take a look at the property.

    $reflectionAttendees = $reflectionList->getProperty('attendees');

We now have a ReflectionProperty object. 
It serves the same purpose as the ReflectionClass, but contains informations about the property itself.
We'll run into an issue fairly quickly though. This property is private.
We still won't be able to access it.
Let's change that.

    $reflectionAttendees->setAccessible(true);
  
Everything is set! Let's now test if our array fits our needs.

```
    $expected = [["name" => "Grase", "email" => "somebody@google.com"], ["name" => "Jael", "email" => "myname@is.me"]];
    $this->assertEquals($expected, $reflectionAttendees->getValue($list);

```

We used getValue to obtain the private property's value from our object.
Let's mesh all this together into the class.


```
    <?php
    class AttendeeListTest extends TestCase
    {
        //Tests Instance of the class
        public function testInstantiation(){
            $list = new AttendeeList();
            $this->assertInstanceOf(AttendeeList::class, $list);
        }

        //Tests Sending Email
        public function testSendEmail(){
            //This implementation is not important
        }

        //Tests Adding an attendee to our list
        public function testAddAttendee(){
            $list = new AttendeeList();
            $list->addAttendee('Grase', 'somebody@google.com');
            $list->addAttendee('Jael', 'myname@is.me');
            $reflectionList = new \ReflectionClass($list);
            $reflectionAttendees = $reflectionList->getProperty('attendees');
            $reflectionAttendees->setAccessible(true);
            $expected = [["name" => "Grase", "email" => "somebody@google.com"], ["name" => "Jael", "email" => "myname@is.me"]];
            $this->assertEquals($expected, $reflectionAttendees->getValue($list));
        }
    }
    ?>
```

And if we run this test in PHPUnit, we get :

```
PHPUnit 5.5.0 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 16 ms, Memory: 4.00MB

OK (3 tests, 2 assertions)
```

If you want to dive further in Reflection Objects, look up [ReflectionClass on PHP's site](http://php.net/manual/en/class.reflectionclass.php)
