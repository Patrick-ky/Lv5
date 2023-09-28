<?php

namespace App\Models;

use App\Models\Client;
use App\Models\StallNumber;
use App\Models\StallTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInfo extends Model
{
    use HasFactory;

    protected $table = 'client_info';

    protected $fillable = [
        'client_id',
        'stalltype_id',
        'stall_number_id',
        'violation_id',
        'start_date',
        'due_date'
    ];
    

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function stallType()
    {
        return $this->belongsTo(StallTypes::class, 'stalltype_id');
    }

    public function stallNumber()
    {
        return $this->belongsTo(StallNumber::class, 'stall_number_id');
    }

    public function violations()
    {
        return $this->hasMany(Violation::class, 'violation_id');
    }
}

