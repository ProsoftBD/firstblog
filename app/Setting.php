<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'favicon', 'site_name', 'site_about', 'contact_number', 'contact_email', 'address', 'available_time', 'street_address'
    ];
}
