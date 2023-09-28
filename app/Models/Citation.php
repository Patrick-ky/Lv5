<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citation extends Model
{
    protected $fillable = [
        'client_id',
        'stalltype_id',
        'violation_id',
        'stall_number_id',
        'start_date',
    ];

    // Define relationships with other models if necessary
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function stallType()
    {
        return $this->belongsTo(StallType::class, 'stalltype_id');
    }

    public function violation()
    {
        return $this->belongsTo(Violation::class);
    }

    public function stallNumber()
    {
        return $this->belongsTo(StallNumber::class, 'stall_number_id');
    }
}
