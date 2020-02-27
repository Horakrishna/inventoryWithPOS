<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=['name', 'phone', 'email', 'company_name','company_type', 'tin_number', 'address'];
}
