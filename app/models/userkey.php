<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class userkey extends Model
{
	public $primaryKey="id";
    protected $table = 'userkey';
    protected $guarded = [];
    public $timestamps = false;    //
}
