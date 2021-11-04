<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable =[
        'TaskName',
        'Duration',
        'Status',
    ];

        protected $casts = [
        'TaskName' => 'array',
        'Duration' => 'array',  
        'Status' => 'array'
    ];
}
