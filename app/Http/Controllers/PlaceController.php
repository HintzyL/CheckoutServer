<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function getPlaces() {
        $places = Place::all();
        $places_tab = [];

        foreach ($places as $place) {
            $temp = [];

            $temp["id"] = $place->id;
            $temp["name"] = $place->name;
            $temp["type"] = $place->type;
            $temp["address"] = $place->address;
            $temp["phone"] = $place->phone;
            $temp["longitude"] = $place->longitude;
            $temp["latitude"] = $place->latitude;
            $temp["picture_path"] = $place->picture_path;

            $places_tab[] = $temp;
        }

        return json_encode($places_tab);
    }
}
