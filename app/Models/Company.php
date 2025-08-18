<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.  This is important for security.
     * Only list the fields you want to be able to set via web requests.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'companyName',
        'companyDescription',
        'companyLocation',
        'companyWebsite',
        'companyLogo',
        'companySize',
        'companyIndustry',
    ];

    /**
     * The attributes that should be cast.  Useful for dates, etc.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime', // Example: If you had an email verification timestamp
    ];
}
