<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancelReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CancelReservationRequest $request, Reservation $reservation)
    {
        $reservation->delete();
        
        return response()->json(status: 204);
    }
}
