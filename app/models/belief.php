<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class belief extends Model
{
	public $primaryKey="id";
    protected $table = 'belief';
    protected $guarded = [];
    public $timestamps = false;    //    
}
