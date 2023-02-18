<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model {
    use HasFactory;
    
    protected $table = 'nominees';

    protected $fillable = [
        'user_id',
        'candidate_id',
        'order',
    ];

    

    public function jury() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function candidat() {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}
