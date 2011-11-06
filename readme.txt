Source code for Model View Controller Tutorial in PHP: http://php-html.net/tutorials/model-view-controller-in-php/


Another way to think about MVC
http://nuts-and-bolts-of-cakephp.com/2009/01/06/another-way-to-think-about-mvc/

This is just a simple intro post to the concepts of MVC. It is intended for those who are starting to grasp the basics, but are having a bit of a hard time understanding some of the rules and concepts.

We’ll use this interesting analogy that I thought works quite well to further clarify some things…

So, let’s imagine a bank.

The safe is the Database this is where all the most important goodies are stored, and are nicely protected from the outside world.
Then we have the bankers or in programmatic terms the Models. The bankers are the only ones who have access to the safe (the DB). They are generally fat, old and lazy, which follows quite nicely with one of the rules of MVC: *fat models, skinny controllers*. We’ll see why and how this analogy applies a little later.

Now we’ve got our average bank workers, the gophers, the runners, the Controllers. Controllers or gophers do all the running around, that’s why they have to be fit and skinny. They take the loot or information from the bankers (the Models) and bring it to the bank customers the Views.

The bankers (Models) have been at the job for a while, therefore they make all the important decisions. Which brings us to another rule: *keep as much business logic in the model as possible*. The controllers, our average workers, should not be making such decisions, they ask the banker for details, get the info, and pass it on to the customer (the View). Hence, we continue to follow the rule of *fat models, skinny controllers*. The gophers do not make important decisions, but they cannot be plain dumb (thus a little business logic in the controller is OK). However, as soon as the gopher begins to think too much the banker gets upset and your bank (or you app) goes out of business. So again, always remember to offload as much business logic (or decision making) to the model.

Now, the bankers sure as hell aren’t going to talk to the customers (the View) directly, they are way too important in their cushy chairs for that. Thus another rule is followed: *Models should not talk to Views*. This communication between the banker and the customer (the Model and the View) is always handled by the gopher (the Controller).
(Yes, there are some exception to this rule for super VIP customers, but let’s stick to basics for the time being).

It also happens that a single worker (Controller) has to get information from more than one banker, and that’s perfectly acceptable. However, if the bankers are related (otherwise how else would they land such nice jobs?)… the bankers (Models) will communicate with each other first, and then pass cumulative information to their gopher, who will happily deliver it to the customer (View). So here’s another rule: *Related models provide information to the controller via their association (relation)*.

In our bank it would look something like this:
Worker Andy -> asks banker Bob Buzzkillington -> who asks another banker Jim Buzzdickenson -> who gets the loot from the safe (the DB).

In CakePHP terms it looks very similar:
$andysInfo = $this->Bob->Jim->grabMeSomeLoot();

So what about our customer (the View)? Well, banks do make mistakes and the customer should be smart enough to balance their own account and make some decisions. In MVC terms we get another simple rule: *it’s quite alright for the views to contain some logic, which deals with the view or presentation*. Following our analogy, the customer will make sure not to forget to wear pants while they go to the bank, but they are not going to tell the bankers how to process the transactions.

Well, that about covers most of the basics. I hope this analogy helps somebody rather than confuses them even further…

Let’s just summarize some rules and concepts:

-Fat models, skinny controllers!
-Keep as much business logic in the model as possible.
-If you see your controller getting “fat”, consider offloading some of the logic to the relevant model (or else bad things will start happening!).
-Models should not talk to the views directly (and vice versa).
-Related models provide information to the controller via their association (relation).
-It’s quite alright for the views to contain some logic, which deals with the view or presentation.
-P.S. Any suggestions on clarifications or additions to this little article are welcomed as always.