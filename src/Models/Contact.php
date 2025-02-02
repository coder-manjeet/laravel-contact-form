<?php

namespace CoderManjeet\LaravelContactForm\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message'];
}
