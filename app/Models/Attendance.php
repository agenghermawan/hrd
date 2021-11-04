<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances';

      protected $fillable = [
        'AttendanceID',
        'EmployeeID',
        'Departement',
        'WorkType',
        'Notes',
        'Check_In',
        'Check_Out',
        'CheckIn_Address',
        'CheckOut_Address',
        'Latitude',
        'Longitude',
        'Address',
    ];

        public function user()
    {
        return $this->belongsTo(User::class,'EmployeeID','EmployeeID');
 
    }
}
