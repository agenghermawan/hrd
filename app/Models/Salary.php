<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table ='salary';
    protected $fillable =[
        'NoAccount',
        'Bank',
        'SalaryID',
        'EmployeeID',
        'Tunjangan',
        'GajiPokok',
    ];

    protected $primaryKey = 'SalaryID';


    public function user()
    {
        return $this->belongsTo(User::class,'EmployeeID','EmployeeID');
 
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class,'EmployeeID','EmployeeID');
    }
}
