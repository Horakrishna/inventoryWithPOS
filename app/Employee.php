<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Employee extends Model
{
    protected $fillable=[ 'emp_name', 'phone', 'email', 'designation', 'nid', 'emp_image', 'present_address', 'permanent_address',];
}
