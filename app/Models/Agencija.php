<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencija extends Model
{
    use HasFactory;



    protected $fillable = [
        'naziv',	'adresa',	'telefon',	'gmail', 
    ];
    

    public function aranzmani() {
        return $this->hasMany(Aranzman::class);
    }
}
