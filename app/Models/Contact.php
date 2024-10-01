<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';

    protected $fillable = [
        'admin_id',
        'email',
        'phone',
        'Linkedn',
        'Twitter',
        'Github',
        // Add other fields if needed
    ];

    /**
     * Get the admin that owns the contact details.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
