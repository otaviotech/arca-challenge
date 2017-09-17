# Arca Solutions Challenge

This is a simple CRUD made with:

| Tecnology 	|
|-----------	|
| PHP       	|
| Laravel   	|
| Javascript  |
| AngularJS 	|
| jQuery    	|
| VanillaJS 	|
| MariaDB     |

It creates a mix of this technologies.
**Remember**: they are not made to be used this way! It goes this way here just to show and give examples of what technologies I can use.

# Instalation

First of all you need to create an .env file with your database(and all environment stuff) settings.

```sh
$ cd arca-challenge
$ cp .env.example .env
```

Next, you need to give the some permissions for some folders:

```sh
$ cd arca-challenge
$ cp chmod 755 -R bootstrap/cache storage
```

That's it, be shure of have composer and npm installed and just:

```sh
$ cd arca-challenge
$ composer install
$ npm install
$ php artisan db:migrate
$ php artisan db:seed
$ php artisan serve
```

# Routes

##### Protection

The admin routes have restrict access.

| Route                        	| Method 	| Restrict ? 	|
|------------------------------	|--------	|------------	|
| /                            	| GET    	| NO         	|
| /business/{id}               	| GET    	| NO         	|
| /admin                       	| GET    	| YES        	|
| /admin/business/edit/{id}    	| GET    	| YES        	|
| /admin/business/update/{id}  	| POST   	| YES        	|
| /admin/business/destroy/{id} 	| DELETE 	| YES        	|

You can use the following credentials to access the restrict area:
    **Username**: admin@businessfinder.com
    **Password**: admin!2345

The routes for registering were disabled.

The data in database were generated with a php library called [Faker](https://github.com/fzaninotto/Faker) and seeded using Laravel's factory tool.

# TODO
[x] Create the application (Up and Running)
[ ] Dockerize this application
