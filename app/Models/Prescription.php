<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'drug',
        'dosage',
        'times',
        'start_date',
        'end_date'
    ];
    public function patient(){
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }
    public function doctor(){
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
}
