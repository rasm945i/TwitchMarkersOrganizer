<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clip;
use App\Models\Marker;

class ClipController extends Controller
{
    // Get clip(s) by using a Marker ID
    function getClipsFromMarker($marker_id) {
        $clips = Clip::where('relatedMarkerId', $marker_id);
        $count = $clips->count;
        if($count > 1) {
            return view('clip.multiple', ['clips', $clips]);
        } elseif($count == 1) {
            return view('clip.single', ['clip', $clips]);
        }
        return view('nothing_found', ['searched_for', 'Clips']);
    }

    // Get the clip with the ID provided
    function getClip($clip_id) {
        $clip = Clip::where('id', $clip_id);
        return view('clip.single', ['clip' => $clip]);
    }

    // Search for a clip
    function searchByTitle($partial_title) {
        $clips = Clip::where('title', 'LIKE', '%'. $partial_title .'%');
        return view('clip.multiple', ['clips' => $clips]);
    }

    // Get all clips
    function getAllClips() {
        return view('clip.multiple', ['clips' => Clip::all()]);
    }

}
