<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'password',
    ];

    protected $hidden = ['password', 'remember_token'];


    public function about()
    {
        return $this->hasOne(About::class, 'admin_id');
    }

    public function educations()
    {
        return $this->hasMany(Education::class, 'admin_id');
    }


    public function contact()
    {
        return $this->hasOne(Contact::class, 'admin_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'admin_id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'admin_id');
    }
}
