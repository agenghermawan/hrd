<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = 'asset';

    protected $fillable= [
        'AssetName',
        'SerialNo',
        'Year',
        'condition',
        'Date',
        'Price',
        'Information',
        'PhotoAsset',
    ];

    use HasFactory;

        public function getPhotoAssetAttribute($value)
    {
        return url('storage/'. $value);
    }
}
