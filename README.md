##Online Car Rental System##
**Database Systems Project**

Technologies: MySQL, PHP, HTML and CSS

Design and implement a database for keeping track of information about a car rental company. 

Following tasks were achieved:

The following are the tasks for the third part of the project:

1. Load some initial data (as discussed above) into the database tables. You can either write a loading program, or use SQL/PLUS (insert command), or use SQL/FORMS. Your data should be kept in files so that it can easily be reloaded during debugging. The data format should be designed by you. 

2. Write queries to retrieve and print all the data you entered. Try to print the data so that it is easy to understand (for example, print appropriate headings, such as: Customers, Compact Cars, SUVs, Current Rentals, etc.).

3. Write a query that will prepare a report for weekly earnings by owner, by car type and per car unit that owner owns within that car type.

4. Write the following database update transactions using either PRO*C or JAVA/JDBC or PHP or some other programming language or scripting language.
  
  4.1 The first transaction is to add information about a new CUSTOMER.
  
  4.2 The second transaction is to add all the information about a new CAR.
  
  4.3 The third transaction is to add all the information about a new RENTAL reservation (this must find a free car of the appropriate type for the rental period).
  
  4.4 The fourth transaction is to handle the return of a rented car. This transaction should print the total customer payment due for the rental, and enter it in the database.
  
  4.5 The fifth transaction is to enter or update the rental rates (daily and weekly) for a type of car.

5. Each transaction should have a user friendly interface to enter the information needed by the transaction. This can either be a Web-based interface, a command line interface, or a forms interface.

6. Test your transactions by adding a few new customers, cars, reservations, by changing some rental rates and reservations rates.


**Assumptions for EER Diagram:**
- One customer can rent one car at a time so the cardinality ratio will be 1:1.
- A car is divided into different types of disjoint entities with attribute type.
- A single owner may own multiple cars.
- Each customer pays for their respective rentals .
- The customer might pay an advance or security deposit which is used in calculating final amount.
- Discount is given for membership customers
- Driver charge also added if customer opted for chauffeur.
- Each rental will be divided into two distinct entities Daily and weekly.
- Amount can be derived using the CAR attributes Drate and Wrate.
- Return date is also a derived attribute, which can be derived from Start Date and No of Days/weeks.
- A single owner can own multiple vehicles so we consider this is a 1:n relation towards the car entity from the owner entity.
- A customer can provide feedback which can be referred by the Customer service Department for better service in future.
- A customer has a choice to either hire a chauffeur or choose self-drive option.


**RELATIONAL SCHEMA MAPPING** :
- Relationship between CAR and OWNER is 1:N , so we have created a new Relation OWNS which consists of foreign key attributes to CAR and OWNER relations.
- RENTAL entity has two disjoint subclasses – DAILY and WEEKLY . While mapping we have created two relations DAILY and WEEKLY which have foreign key attributes to RENTAL relation.
- DRIVER class has two super classes CHAUFFEUR and SELF. Customer can select any mode of driving. It has foreign key attribute to DRIVER crelation.
- CAR entity has six disjoint subclasses (Specialization) which has been done on Type attribute. Single Relation Mapping technique has been used here.
- All 1:1 relationships has been mapped using foreign key technique.
Note: The Schema Diagram is present in the folder as Schema_Diagram.pdf


