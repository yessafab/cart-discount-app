# Cart Discount App

The app was developed and tested using PHP 7.2 and the only dependency is Phpunit 7.1

* Clone this repo to your machine
```
git clone https://github.com/yessafab/cart-discount-app.git
```
* Get to the app folder
```
cd cart-discount-app
```
* Run Composer to install dependencies
```
composer install
```
* Run tests
```
phpunit Test
```

If you want to test the app interactively from the command line go to the file `src/CartCommandController.php` and edit the array variable `$cartProductsMock` with the products you want to test then from your console run the controller
```youtrack
php src/CartCommandController.php
```
to simulate a digital cart. 
All Products and Discounts examples provided in the assignment are hard-coded in `fixtures/products.json` and `fixtures/discounts.json` to simulate a database. Is is possible to add or remove Products and Discounts to change the Cart behavior or to simply have a wider range of product.

I developed this app following DDD principles, it's definitely overkill for the size of the app but I got exited at the idea of implementing DDD from scratch!

---

# The Challenge
The Nile wants to offer a wide variety of discounts to our customers.

Your task is to develop a system to allow for discounts to be applied
to a customers cart. The system should be flexible, allowing
for the creation of new discount types easily.

Given these products:

SKU           | Name                         | Price
--------------|------------------------------|----------
9325336130810 | Game of Thrones: Season 1    | $39.49
9325336028278 | The Fresh Prince of Bel-Air  | $19.99
9780201835953 | The Mythical Man-Month       | $31.87
9781430219484 | Coders at Work               | $28.72
9780132071482 | Artificial Intelligence      | $119.92
--------------|------------------------------|----------

Initially we would like to offer our customers these discounts:

* Buy 10 or more copies of The Mythical Man-Month, and receive them at the discounted price of $21.99
* We would like to offer a 3 for the price of 2 deal on Coders at Work. (Buy 3 get 1 free);
* Customers who purchase Game of Thrones: Season 1, will get The Fresh Prince of Bel-Air free.


Examples:

Products in cart: 9780201835953 x 10, 9325336028278
Expected total: $239.89

Products in cart: 9781430219484 x 3, 9780132071482
Expected total: $177.36

Products in cart: 9325336130810, 9325336028278, 9780201835953
Expected total: $71.36

