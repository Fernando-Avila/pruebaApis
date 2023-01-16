<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    use HasFactory;
    protected $table='clients';
    protected $fillable=['name','ci','email','password','gender','age'];
    public function pets(){
        return $this->hasMany(Pet::class);
    }
}
