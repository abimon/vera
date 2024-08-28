<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mealplan extends Model
{
    use HasFactory;
    protected $fillable = [
        'doc_id',
        'disease',
        'mealtype',
        'plan',
        'duration',
    ];
    public function doc(){
        return $this->belongsTo(User::class, 'doc_id', 'id');
    }
}
