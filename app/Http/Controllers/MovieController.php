<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Movie::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique',
            'director' => 'required',
            'duration' => 'required|min:1|max:500',
            'releaseDate' => 'required|unique',
                        
        ]);

        // $movie = new Movie;
        // $movie->name = request('name');
        // $movie->director = request('director');
        // $movie->duration = request('duration');
        // $movie->releaseDate = request('releaseDate');
        
        // $movie->save();

        return Movie::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $id)
    {
        return Movie::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $id)
    {   
        $this->validate(request(), [
            'name' => 'required|unique',
            'director' => 'required',
            'duration' => 'required|min:1|max:500',
            'releaseDate' => 'required|unique',
                        
        ]);
        
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return $movie;
    }
}
