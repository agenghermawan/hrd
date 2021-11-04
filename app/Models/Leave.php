<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = 'leave';
    protected $primaryKey = 'LeaveID';
    protected $fillable = [
        'LeaveID',
        'EmployeeID',
        'Date_start',
        'Date_end',
        'Reason',
        'Approval',
        'Leave_Report',
    ];

        public function user()
    {
        return $this->belongsTo(User::class,'EmployeeID','EmployeeID');
 
    }

}

