<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreVideoRequest;
use App\Jobs\ConvertVideoForStreaming;
use App\Video;

class VideoController extends Controller {

    public function index() {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return view('videolist')->with('videos', $videos);
    }

    public function viewsinglevideo($videoID) {
        $videos = Video::where('id', $videoID)->get();
        return view('videos')->with('videos', $videos);
    }

    public function uploader() {
        return view('uploader');
    }

    public function store(StoreVideoRequest $request) {
        $path = Str::random(16) . '.' . $request->video->getClientOriginalExtension();
        $request->video->storeAs('public', $path);

        $video = Video::create([
                    'disk' => 'public',
                    'original_name' => $request->video->getClientOriginalName(),
                    'path' => $path,
                    'title' => $request->title,
        ]);

        ConvertVideoForStreaming::dispatch($video);
        return response()->json(['id' => $video->id,], 201);
    }

}
