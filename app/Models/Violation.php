<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'violation_name',
        'penalty_value',
        'client_id',
        'stall_number_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id'); // Replace 'client_id' with your actual foreign key name
    }

    public function stallNumber()
    {
        return $this->belongsTo(StallNumber::class, 'stall_number_id');
    }

    


}
