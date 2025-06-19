<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public $timestamps = false;

    protected $table = 'feedback';

    protected $fillable = ['username', 'note', 'date'];
}
