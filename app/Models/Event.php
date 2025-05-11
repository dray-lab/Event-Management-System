<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date', 'package_id', 'customer_id'];

    // Define relationships if needed
    // public function package(){
    //     return $this->belongsTo(Package::class);
    // }
    // public function customer(){
    //     return $this->belongsTo(Customer::class);
    // }
} 