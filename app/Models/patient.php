<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'gender',
        'date_of_birth',
        'age',
        'number',
        'address',

    ];

    public function medical_records()
    {
        return $this->hasMany(medical_record::class);
    }
    
}
