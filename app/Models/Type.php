<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    
    use HasFactory;



    protected $fillable = [
        'titre',
        'photo',
    ];




    // relations 

    public function chambres()
    {
        return $this->hasMany(Chambre::class);
    }

}
