<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = DB::table('albums')->get();
        $tracks = DB::table('tracks')->get();
        return view('album.allAlbums', ['albums' => $albums, 'tracks' => $tracks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
        return view('album.createForm', [
            'action' => route('album.store'),
            'method' => 'post',
            'type' => 'Add'
        ]);
        }
        else 
        {
        abort(403, 'Unauthorized access');        
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
        $request->validate([    
        ]);
        $album = Album::create($request->all());
        $album->save();
        return redirect()->route('track.notify');   
        }
        else 
        {
        abort(403, 'Unauthorized access');        
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $tracks = DB::table('tracks')->where('album_id', $album->id)->paginate(10);
        $genre = $album->genre;
        return view('results.voting', [
            'action' => route('vote.store'),
            'method' => 'post',
            'tracks' => $tracks,
            'genre' => $genre,
            'notify' => '0'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
        return view('album.createForm', [
            'action' => route('album.update', $album->id),
            'method' => 'put',
            'model' => $album,
            'type' => 'Edit'
        ]);
        }
        else 
        {
        abort(403, 'Unauthorized access');        
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
        $album->update($request->all());
        $albums = DB::table('albums')->get();
        $tracks = DB::table('tracks')->get();
        return view('album.allAlbums', ['albums' => $albums, 'tracks' => $tracks]); 
        }
        else 
        {
        abort(403, 'Unauthorized access');        
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        if (Auth::user() != null && Auth::user()->admin == 1)  
        {
        $album->delete();
        $albums = DB::table('albums')->get();
        $tracks = DB::table('tracks')->get();
        return view('album.allAlbums', ['albums' => $albums, 'tracks' => $tracks]);         }
        else 
        {
        abort(403, 'Unauthorized access');        
        }  
    }
}
