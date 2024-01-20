<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aranzman extends Model
{
    use HasFactory;


    protected $table='aranzman';

    protected $fillable = [
        'cena',	'br_mesta',	'datum','prevoz',	
    ];



    public function turisticka_agencija() {
        return $this->belongsTo(Agencija::class);
    }
    
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
