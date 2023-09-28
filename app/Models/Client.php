<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StallTypes;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'Age',
        'Address',
        'clients_number',
        'gender',
    ];
    public function stalltype()
    {
        return $this->belongsTo(StallTypes::class, 'stalltype_id');
    }
    
    public function stallNumber()
    {
        return $this->belongsTo(StallNumber::class, 'stall_number_id');
    }
    
    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
    
   
}
