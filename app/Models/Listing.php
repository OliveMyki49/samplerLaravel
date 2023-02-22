<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title','company', 'tags','location','website','email','description','logo', 'user_id']; //make sure that all data is protected before it is passed to the database

    public function scopeFilter($query, array $filters){
        //dd($filters['tag']); //check value
        
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%'. request('tag'). '%');
        }; //check value

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%'. request('search'). '%')
            ->orWhere('description', 'like', '%'. request('search'). '%')
            ->orWhere('tags', 'like', '%'. request('search'). '%');
        }; //check value
    }

    // Relationship to User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
