<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->hasOne('App\Category');
    }

    public function manufacturer()
    {
        return $this->hasOne('App\Category');
    }
}
