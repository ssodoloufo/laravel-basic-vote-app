<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model {
    use HasFactory;

    protected $table = 'candidates';

    protected $fillable = [
        'matricule',
        'civility',
        'first_name',
        'last_name',
        'title',
        'department',
        'email',
        'hiring_date',
        'seniority',
        'note',
    ];


    public function nominee() {
        return $this->hasMany(Nominee::class);
    }
}
