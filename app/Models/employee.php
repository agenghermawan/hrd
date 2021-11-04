<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'EmployeeID',
        'EmployeeType',
        'EmployeeName',
        'EmployeePosition',
        'Departement',
        'BirthDate',
        'JoinDate',
        'ReportTo',
        'email',
        'Phone',
        'Photo',
        'Address',
        'City',
        'Country',
        'Postal_Code',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];



    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = Hash::make($password);
    // }

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }

}
