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
        return new SpaceCollection($carPark->spaces()->paginate());
    }
}
