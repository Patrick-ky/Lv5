<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citation extends Model
{
    protected $fillable = [
        'client_id',
        'client_info',
        'violation_id',
        'stall_number_id',
        'start_date',
    ];


    public function clientInfo()
    {
        return $this->belongsTo(ClientInfo::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function violation()
    {
        return $this->belongsTo(Violation::class, 'violation_id');
    }
    

    public function stallNumber()
    {
        return $this->belongsTo(StallNumber::class, 'stall_number_id');
    }
}
