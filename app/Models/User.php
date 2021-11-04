<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

         protected $primaryKey = 'EmployeeID';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //  protected $guarded =[

    //  ];
            
        protected $fillable = [
                'EmployeeID',
                'EmployeeType',
                'EmployeeName',
                'EmployeePosition',
                'Department',
                'BirthDate',
                'JoinDate',
                'TIN',
                'email',
                'Phone',
                'Photo',
                'Address',
                'City',
                'Country',
                'Postal_Code',
                'password',
                'AboutMe'
            ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = Hash::make($password);
    // }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPhotoAttribute($value)
    {
        return url('storage/'. $value);
    }

             public function leave()
            {
                return $this->hasOne(Leave::class,'LeaveID','EmployeeID');
            }
            public function attendance()
            {
                return $this->hasOne(Attendance::class,'EmployeeID','EmployeeID');
            }

              public function salary()
            {
                return $this->hasOne(Salary::class,'SalaryID','EmployeeID');
                
            }
                 public function payment()
            {
                return $this->hasOne(Leave::class,'PaymentID','EmployeeID');
            }

             public function project()
            {
                return $this->hasOne(project::class,'id','EmployeeID');
            }


     

}
