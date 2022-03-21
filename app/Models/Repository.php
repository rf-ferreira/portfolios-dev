<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "html_url",
        "name",
        "description",
        "language"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
