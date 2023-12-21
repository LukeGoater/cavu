<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpaceReservationRequest;
use App\Models\Space;
use Exception;
use Illuminate\Support\Facades\Auth;

class SpaceReservationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SpaceReservationRequest $request, Space $space)
    {
        if (!$space->isAvailable($request->date('from'), $request->date('to'))) {
            throw new Exception('This space is unavailable for these dates');
        }

        $reservation = $space->reservations()->create([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'from' => $request->date('from'),
            'to' => $request->date('to'),
        ]);
    }
}
