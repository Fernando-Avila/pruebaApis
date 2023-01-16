<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $table='pets';
    protected $fillable=['client_id','name','race','type','age'];

    public function client(){
        return $this->hasOne(Client::class);
    }
}
