<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'file_name',
        'is_data_correct',
        'is_data_entered',
        'passport_expiry_date',
        'visa_expiry_date',
        'user_id',
        'is_passport',
        'is_visa',
        'is_photo',
        'is_no_file_uploaded',
        'issue',
        'verify_count',
        're_entry',
        'verifier_id',
        'verifier1_id',
        'verifier2_id',
        'verifier1',
        'verifier2',
        'is_issue',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_data_correct' => 'boolean',
        'is_data_entered' => 'boolean',
        'passport_expiry_date' => 'date',
        'visa_expiry_date' => 'date',
        'is_passport' => 'boolean',
        'is_visa' => 'boolean',
        'is_photo' => 'boolean',
        'is_no_file_uploaded' => 'boolean',
        're_entry' => 'boolean',
        'is_issue' => 'boolean',
    ];
}
