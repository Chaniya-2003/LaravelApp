<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Student.php

class Student extends Model
{
     protected $fillable = ['name', 'email', 'phone', 'user_id', 'age', 'address'];
}