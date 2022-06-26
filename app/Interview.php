<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    public $table ="interviews";

    protected $fillable = ['date', 'time', 'confirmation', 'platform', 'application_id'];
}
