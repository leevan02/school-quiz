<?php

namespace App\Models;

use App\Models\Course;
use App\Models\CourseSchedule;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table='users';
    protected $fillable = [
        'name',
        'email',
        'Role_as',
        'course_id',
        'courseSchedule_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function courseSchedule()
    {
        return $this->hasMany(CourseSchedule::class);
    }
}
