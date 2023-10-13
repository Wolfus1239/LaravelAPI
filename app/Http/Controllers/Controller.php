<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Exception;
use http\Env\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function check()
    {
        $limit = "10";
        $response = Http::withHeaders([
            'token' => env('API_TOKEN'),
        ])->get('https://distributors.enter.yoga/albums?limit='.$limit.'&offset=0&ascending=false');
        $data = $response->json();
        return $data ;
    }

    public function CheckAlbums()
    {
        $count_albums = count(Album::all());
        $albums = Album::paginate(10);
        return view('albums',  ['albums' => $albums,'count_albums' => $count_albums]);
    }
    public function SaveAlbums()
    {
        $limit = "10";
        $response = Http::withHeaders([
            'token' => env('API_TOKEN'),
        ])->get('https://distributors.enter.yoga/albums?limit='.$limit.'&offset=0&ascending=false');
        $data = $response->json();
        $albums = $data['albums'];
        try {
            foreach ($albums as $albumData) {
                $album = new Album();
                $album->date_updated = $albumData['date_updated'];
                $album->description = $albumData['description'];
                $album->cover = $albumData['cover'];
                $album->total_count = $albumData['total_count'];
                $album->total_size = $albumData['total_size'];
                $album->total_duration = $albumData['total_duration'];
                $album->api_id = $albumData['id'];
                $album->save();
            }
            return response('Жоска работает');
        }catch (Exception $e){
            return response('Жоска не работает');
        }


    }
        public function TrackInAlbum($id)
    {

        $id_track = DB::table('tracks')->where('id_track', '=', $id)->get();
        return view('track',['id_track' => $id_track]);

    }

    public function CheckTrack($id)
    {
        $response = Http::withHeaders([
            'token' => env('API_TOKEN'),
        ])->get('https://distributors.enter.yoga/albums/'.$id.'?limit=10&offset=0&ascending=false');
        return $response;
    }
    public function FoundTrack()
    {
        $id_albums = DB::table('albums')->pluck('api_id');
        return $id_albums;
    }
    public function SaveTrack()
    {
        $id_albums = Album::all();
        foreach ($id_albums as $id_albums2){
            $id_result = $id_albums2->api_id;


        $response = Http::withHeaders([
            'token' => env('API_TOKEN'),
        ])->get('https://distributors.enter.yoga/albums/'.$id_result.'?limit=10&offset=0&ascending=false');
        $data = json_decode($response->body(), true);
        $track_json = $data['tracks'];
        foreach  ($track_json as $save_track){
                $track = new Track();
                $track->artist = $save_track['artist'];
                $track->duration = $save_track['duration'];
                $track->size = $save_track['size'];
                $track->file = $save_track['file'];
                $track->lossless_file = $save_track['lossless_file'];
                $track->playable = $save_track['playable'];
                $track->bpm = $save_track['bpm'];
                $track->tonality = $save_track['tonality'];
                $track->is_explicit = $save_track['is_explicit'];
                $track->md5 = $save_track['md5'];
                $track->genres = $save_track['genres'];
                $track->moods = $save_track['moods'];
                $track->tags = $save_track['tags'];
                $track->countries = $save_track['countries'];
                $track->label_id = $save_track['label_id'];
                $track->position = $save_track['position'];
//                $track->waveform = $save_track['waveform'];
//                $track->save();
            $collection_json = $data['collection'];
            $number = count($track_json);
            for($i = 1; $i <= $number; $i++) {
                $track->description = $collection_json['description'];
                $track->cover = $collection_json['cover'];
                $track->total_count = $collection_json['total_count'];
                $track->total_size = $collection_json['total_size'];
//                $track->total_duration = $collection_json['total_duration'];
                $track->name = $collection_json['name'];
                $track->id_track = $collection_json['id'];
                echo $track;
                $track->save();
            }
          }
        }
    }
}

