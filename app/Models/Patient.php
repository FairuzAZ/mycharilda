<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CaseInsensitiveRestore;

class Patient extends Model
{
    use HasFactory, SoftDeletes, CaseInsensitiveRestore;
    
    protected $table = "patients";
    protected $fillable = [
        'identity_number',
        'medical_record_number',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'phone_number',
        'email',
        'address',
        'blood_type',
        'allergies',
        'current_medicines',
        'medical_history',
    ];
    protected $casts = [
        'birth_date' => 'date',
    ];
}


