<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'title',
        'company',
        'location',
        'type',
        'salary',
        'posted',
        'description',
        'requirements',
        'benefits',
        'status',
    ];

    protected $casts = [
        'requirements' => 'array',
        'benefits' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
