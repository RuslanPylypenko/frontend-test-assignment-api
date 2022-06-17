<?php


namespace App\Http\Controllers;


use App\Http\Resources\PositionCollection;
use App\Http\Resources\PositionResource;
use App\Models\Position;

class PositionsController extends Controller
{
    public function index()
    {
        return new PositionCollection(Position::all());
    }
}
