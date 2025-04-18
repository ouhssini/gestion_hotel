<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{

    use HasFactory;


    protected $fillable = [
        'description',
        'superficie',
        'etage',
        'prix',
        'type_id',
    ];






    // relations 
    public function type()
    {
        return $this->belongsTo(Type::class);
    }



    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'chambre_id');
    }


}
