<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    // protected $table ='';

   public $fillable = ['title','content'];

   public $visible = ['id','title','content'];

   public $timestamps = true;
}   