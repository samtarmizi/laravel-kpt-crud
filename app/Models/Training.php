<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'attachment'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
