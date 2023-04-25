<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marker;

class MarkerController extends Controller
{

    function getAllMarkers(Request $request) {
        $excludeAlreadyClipped = $request->get('excludeAlreadyClipped', true);
        if($excludeAlreadyClipped) {
             $markers = []; // TODO
        } else {
            $markers = Marker::all();
        }
        return view('marker.search', ['markers' => $markers]);
    }

    function getMarker($markerId) {
        return view('marker.single', ['markers' => Marker::where('id', $markerId)->get()]);
    }

    function getMarkersByGame(int $gameId, Request $request) {
        $markers = (new Marker())->getMarkersByGameId($gameId, $request->get('excludeAlreadyClipped', true));
        return view('marker.search', ['markers' => $markers]);
    }

}
