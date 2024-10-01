<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    protected $fillable = [
        'admin_id',
        'Project_name',
        'Project_Description',
        // Add other fields if needed
    ];

    /**
     * Get the admin that owns the project.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
