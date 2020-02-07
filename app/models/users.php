<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public $primaryKey="id";
    protected $table = 'users';
    protected $guarded = [];
    public $timestamps = false;   
} 
