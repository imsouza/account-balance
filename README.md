## Account Balance

Laravel Balance Accounting System 


## Screenshots

![Home](https://i.imgur.com/GxYkGso.png)

![Admin](https://i.imgur.com/BEU4E22.png)


## Install and execute

1) Clone this repository:

````
git clone https://github.com/imsouza/account-balance.git
````

2) Run the following commands below:

````
composer update

cp .env.example .env

php artisan key:generate
````

3) Execute in localhost.

````
php artisan serve
````

4) Migrate tables:

````
php artisan migrate
```` 

5) Populate Database

````
php artisan db:seed
````

## Author

Mateus Almeida


## Contributing

Feel free to make pull requests for code improvements.


## License

This project is licensed under the [MIT](https://github.com/imsouza/account-balance/blob/master/LICENSE) License.