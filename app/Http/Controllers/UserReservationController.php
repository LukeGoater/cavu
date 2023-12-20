<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserReservationRequest;
use App\Http\Resources\ReservationCollection;
use App\Models\User;

class UserReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(UserReservationRequest $request, User $user)
    {
        return new ReservationCollection($user->reservations()->paginate());
    }
}
