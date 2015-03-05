Project 

This coursework is designed to assess your ability to create a server side web 

application. You are required to create the software and present your work.

Scenario – Electronic Business Directory 

The general idea is to create a web application that will function as a business 

directory where business can buy an entry to your business listing. In broad terms 

the web application will have to have:

• A navigable listing of businesses with a premium listing area prominent on 

the home page 

• An interface for new business customers to request a listing (£10 per month)

• An interface for the business customers to request a premium listing (£50 

per week) limited to four slots. 

• You (the directory owner) to authorize a new business request and premium 

listing request.

• A pseudo payment gateway system

General Requirements

The web application should have a professional look with the following 

characteristics:

• Validation of the home page

• Attractive layout, colour and use of images

• Good contrast between background and text

• Clear functionality from the users perspective

The web application should not have large areas of empty space or oversized 

graphics.

The web application may have visual or interactive features underpinned by 

CSS, JavaScript and/or jQuery, however there is no credit for adding features 

gratuitously beyond the four general requirements. Furthermore JavaScript and 

jQuery should not be used to underpin functional requirements such as cookie 

setting as this is an assessment of server side scripting.

Specific Requirements

Please read the scenario, given above, first.

Task A - user side 

• A home page introducing the web site 

• A navigation bar which should be viewable on all pages.

• Navigable options to view refined views of the business listing e.g. by 

category.

• A database driven paginated view of the business listing with links to a 

details page for each business. 

• A prominent area of the home page displaying premium listings

• A facility to submit a business to the list recorded as ‘pending’. The 

submission facility should have an upload image file and work with the 

pseudo payment system.

• A facility to request a premium listing recorded as ‘pending’. The 

submission facility should have an upload image file and work with the 

pseudo payment system.

Task B – site admin 

• Authentication system made up of a login which controls access to admin 

views.

• View of pending pre-authorized business listing submissions and a facility to 

authorize which will result in the business listing joining the directory listing 

on the user side.

• View of pending pre-authorized premium slots and a facility to authorize 

which will result in the premium business being viewable on the user side in 

the prominent premium area.

Task C – pseudo payment gateway

Create a script which simulates a payment gateway which does the following;

• The script should be accessed via - mayar.abertay.ac.uk/~username/

aberpay – not in an include file - in order to simulate it being on another 

site. 

• The payment starts on your site, goes to aberpay and returns to your site.

• The system should: 

o Accept order ID and merchant ID

o Accept pseudo payment details 

o Return true if the card number begins with ‘99’ or false if it doesn’t 

(in order to simulate success or failure) 

• Make sure that you save the payment on your site, and be able to display 

the saved payment for testing (and assessing) purposes.

Programming Requirements

As this is a server side development assessment you should create a dynamic 

database driven web application with an architecture and abstraction (of code and 

content) designed to show your understanding of the subject matter. 

The web application should conform to the following coding requirements:

• Good coding standards such as layout and code comments.

• Abstracted page content for repeating content such as a navigation bar.

• Abstracted code including generalized functions.

• Dynamic as opposed to static content where appropriate.

• Tables in a database in 3NF i.e. optimized for one to many relationships.

• PDO should be used for the database connectivity but some credit will be 

given for mysql /mysqli.

• Include to a tutor page (linked to from the home page) which has a 

summary of the tables used in the database and a link to the admin 

functions with a note of the admin username and password.

• You may make use of code snippets such as if statements or SQL statements 

but should not make use of code blocks such as login systems or any code 

libraries or frameworks. Any code snippets that you do make use of must 

be referenced and you should be able to describe how these work.