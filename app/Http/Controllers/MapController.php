<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Cornford\Googlmapper\Facades\MapperFacade;
// use Illuminate\Support\Facades\Route;
// use Mapper;

class MapController extends Controller
{
    public function googlemap(){

        return view('_particles.map');      

    }
}
