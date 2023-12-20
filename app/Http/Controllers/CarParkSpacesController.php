<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpaceRequest;
use App\Http\Resources\SpaceCollection;
use App\Models\CarPark;

class CarParkSpacesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(SpaceRequest $request, CarPark $carPark)
    {
        $spaces = $carPark->spaces();

        if ($request->has('from') || $request->has('to')) {
            $spaces->unreserved($request->date('from'), $request->date('to'));
        }

        return new SpaceCollection($spaces->paginate());
    }
}
