<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table ='payment';
    protected $primaryKey = 'PaymentID';

    protected $fillable = [
        'PaymentID',
        'EmployeeID',
        'SalaryID',
        'Time',
        'Status',
        'PaymentMethod',
    ];


        public function user()
    {
        return $this->belongsTo(User::class,'EmployeeID','EmployeeID');
 
    }

             public function salary()
            {
                return $this->hasOne(Salary::class,'EmployeeID','EmployeeID');
            }
}
