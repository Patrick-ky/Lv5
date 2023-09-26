<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'stalltype_id',
        'description',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function stallType()
    {
        return $this->belongsTo(StallType::class, 'stalltype_id');
    }
}
