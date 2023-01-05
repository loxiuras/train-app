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
The IDE-helper package and actions helper are installed to give you more functionality in your IDE. 
To create/update the IDE-helper run the following command: ``$ composer ide-helper``
<br><small><i>Note: most IDEs highlight 'Multiple class definitions'. Because the IDE-helper generates a duplicate class you might need turn the inspection off to prevent IDE errors.</i></small>

<b>Laravel Pint</b><br>
Laravel comes default with the Pint linter. Pint checks your code and helps you program in a structured way. 
To run the pint linter your can run the following commands: ``$ composer pint`` (auto fixes the issues) or ``$ composer pint-test`` (shows the issues but doesn't fix them).
