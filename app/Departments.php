<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
      protected $table = 'departments';

      public function products(){
      	return $this->hasMany(Products::class);
      }
      public function categories(){
      	return $this->belongsTo(Categories::class);
      }
  }
