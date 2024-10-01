<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'educations'; // Specify the table name if different from the model name

    protected $fillable = [
        'admin_id',
        'Level',
        'college',
        'Location',
        'GPA',
       
    ];

    /**
     * Get the admin that owns the education record.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
