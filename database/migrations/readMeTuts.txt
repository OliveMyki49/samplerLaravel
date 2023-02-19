to create a table you can use this commands
>   php artisan make:migration create_listing_table
wherein  create_listing_table is the name of the created migration php file

to run migration
>   php artisan migrate

create sample data for user using db Seeder
>   php artisan db:seed

refesh migration remove dummy user if it is commented again
>   php artisan migrate:refresh

refesh migration remove dummy user and run seeder
>   php artisan migrate:refresh --seed
