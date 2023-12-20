<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarParkRequest;
use App\Http\Resources\CarParkCollection;
use App\Models\CarPark;
use Illuminate\Http\Request;

class CarParkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(CarParkRequest $request)
    {
        return new CarParkCollection(CarPark::paginate());
    }
}
