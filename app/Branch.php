<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $table ="branches";

    protected $fillable = ['location','b_address','contact'];
}
