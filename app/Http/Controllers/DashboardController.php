<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Reservation;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $chambresCount = Chambre::count();
        $typesCount = Type::count();
        $clientsCount = User::count() -1 ;
        $reservationsCount = Reservation::count();

        return view('Home', compact('chambresCount', 'typesCount', 'clientsCount', 'reservationsCount'));
    }
}
