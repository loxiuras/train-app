# train-app
Train application

#### Structure
A list of all the models this application uses:

##### User
...

##### Station
...

##### Train
...

##### Carriage
...

#### Instructions
To start the application follow these steps:<br>
1. To start the server run ``$ php artisan server``
2. Migrate the database via ``$ php artisan migrate:fresh``
3. Seed some default data to the database via ``$ php artisan db:seed``

#### Packages
<b>IDE-helper</b><br>
The IDE-helper package (and actions helper) is installed to give you more functionality in your IDE. 
To create/update the IDE-helper run the following command: ``$ composer ide-helper``

<b>Laravel Pint</b><br>
Laravel come default with the Pint linter. Pint checks your code and helps you program in .... way. 
To run the pint linter your can run the following commands: ``$ composer pint`` (auto fixes the issues) or ``$ composer pint-test`` (shows the issues but doesn't fix them).
