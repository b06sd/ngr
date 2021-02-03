## About NGR

NGR is a web application for the New growth area where physical planning, Lands of the Lagos State can archive their records of people who have dealings with them. This application uses the redis server to load large amount of data into the database.

## Contributing
- Mr Jossy
- Mr Kolade

## Installation
- Clone the repository into the directory where you want the project to reside with this git command
`git clone https://github.com/b06sd/ngr.git`
- cd into the newly cloned project then type 
`composer update`
- Go to the .env file to add your database configurations
- Then after that type the migration command to generate the DB tables
`php artisan migrate`
- Ensure you have a redis server installed in your environment and ensure your client is well stated in the .env file