<?php

namespace App\Console;

use Illuminate\Database\Eloquent\Model;

class SampleModel extends Model
{
    protected $fillable = ['header'];
    protected $connection = 'sqlite';
}