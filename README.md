# Automation of Nasarawa state civil service commission

# To clone the project open your comand prompt, type below

git clone https://github.com/abuiman/nascsc.git

# make sure composer is installed globally on your computer if so then type below to install all the dependencies

composer install

# copy the environment viriable

.copy.env .env

# Generate key for the application

php artisan key:generate

# make the storage file public for picture storage

php artisan storage:link

# Create a database with nascsc run migration

php artisan migrate

# Start the server and copy and pest the address to your browser

php artisan serve