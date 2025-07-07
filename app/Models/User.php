<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //code review needed
    public function applications() {
        return $this->hasMany(\App\Models\Application::class);
    }

    public function interviews() {
        return $this->hasMany(\App\Models\Interview::class);
    }

    public function savedJobs() {
        return $this->belongsToMany(\App\Models\Job::class, 'saved_jobs');
    }

    //usage for relationship of user to jobs
    public function jobs()
    {
        return $this->hasMany(\App\Models\Job::class);
    }
}
