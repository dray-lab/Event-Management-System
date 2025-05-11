<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    // Define relationships if needed
    // public function someRelation(){
    //     return $this->belongsTo(SomeModel::class);
    // }
} 