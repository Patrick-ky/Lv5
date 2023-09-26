<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

class ClientRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'stalltype_id',
        'description',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function stallType()
    {
        return $this->belongsTo(StallType::class, 'stalltype_id');
    }
}

