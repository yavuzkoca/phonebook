<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    protected $fillable = ['email', 'name', 'phone'];
}
