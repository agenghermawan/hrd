<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $table='projects';

    protected $fillable=[
        'TeamName',
        'ProjectName',
        'ProjectStart',
        'ProjectEnd',
        'DeveloperName',
        'DocumentCreateBy',
        'ProjectManager',
        'Department',
        'Status',
        'DevelopmentProgress',
        'Note'
    ];

        public function user()
    {
        return $this->belongsTo(User::class,'EmployeeID','EmployeeID');
 
    }

}
