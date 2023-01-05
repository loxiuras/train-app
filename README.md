# train-app
Train application

#### Structure
A list of all the models this application uses.
<br>Run ``$ php artisan display:model-structure`` to preview some model data of the models below.
<br><small><i>Note: Missing models will be added soon.</i></small>

##### User
...

##### Station
...

##### Train
...

##### Carriage
...

##### Train track
A 'Train track' is a track between stations. 
The seeder defines a start and end station and adds some 'sub' stations in between to create a longer track.
When a starting station has a different country then the end station, the sub stations are divided in halves.
The first half is in the starting (station) country and other half in the end (station) country.
<br><small><i>Note: the seeder does not take into account trajectories that pass through multiple countries. E.g. a trip from the Netherlands to Poland will not have stations in Germany.</i></small>

##### Train track station
A 'Train track station' is a station located in a 'Train track'. Most Train tracks have multiple stations. The Stations are ordered by the 'order' key.

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
