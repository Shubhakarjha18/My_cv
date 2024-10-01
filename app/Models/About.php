<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'abouts'; // Specify the table name if different from the model name

    protected $fillable = [
        'admin_id',
        'image',
        'about',
        // Add other fields here if needed
    ];

    /**
     * Get the admin that owns the about details.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
