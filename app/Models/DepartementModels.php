<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartementModels extends Model
{
    use HasFactory;

    protected $table = 'department';

    protected $fillable = [
        'Department_Name',
        'Department_Head',
        'Total_Employee',
        'Created_Department',
        'Status'
    ];
}
