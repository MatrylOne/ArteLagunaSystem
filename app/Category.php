<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function edition(){
        return $this->belongsTo("App\Edition");
    }

    public function works(){
        return $this->hasMany("App\Work");
    }

    public function awards(){
        return $this->hasMany("App\Award");
    }

    protected $table = 'categories';
}
