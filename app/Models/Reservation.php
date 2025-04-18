<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    use HasFactory;


    protected $fillable = [
       'date_arrivee',
        'date_departe',
        'chambre_id',
        'user_id',
    ];




    // relations 

    public function chambre()
    {
        return $this->belongsTo(Chambre::class);
    }
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
