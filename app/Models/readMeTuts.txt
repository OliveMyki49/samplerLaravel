create a model
>   php artisan make:model Listing
"Listing" is the model name

check relationship of models run
>   php artisan tinker

check the first relationship
>   App\Models\Listing::first()
here we check the model Listing with its first relationship

find an specific relation
>   App\Models\Listing::find(3)
this will find a data with an id of 3 in the database

find an specific information of the owner of the data
>   App\Models\Listing::find(3)->User
