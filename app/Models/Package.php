<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    // Define relationships if needed
    // public function events(){
    //     return $this->hasMany(Event::class);
    // }
} 