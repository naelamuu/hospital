<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'name',
        'number',
        'specialist',
        'schedule',
    ];

    public function medical_records()
{
    return $this->hasMany(medical_record::class);
}

}