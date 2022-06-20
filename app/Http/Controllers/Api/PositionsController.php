<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionCollection;
use App\Models\Position;

class PositionsController extends Controller
{
    public function index()
    {
        return new PositionCollection(Position::all());
    }
}
