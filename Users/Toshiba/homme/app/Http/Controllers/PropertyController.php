<?php

namespace App\Http\Controllers;

use App\Http\Resources\PropertyRessource;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(){
        return PropertyRessource::collection(Property::limit(5)->get()) ;
    }
}
