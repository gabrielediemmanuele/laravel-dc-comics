<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* connection to models Comic  */
use App\Models\Comic;

/* Validation system connection  -> find in public function STORE n°43*/
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $comics = Comic::all(); */
        $comics = Comic::paginate(10);
        $title = "Comics";
        return view('comics.index', compact('title', 'comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* inside $data there are form dates */
        $data = $request->all();

        /* Validator settings */
        Validator::make(
            $data,
            [
                'title' => 'required|string|max:100',
                'description' => 'required|text',
                'thumb' => 'required|text',
                'price' => 'required|string|max:50',
                'series' => 'required|string|max:50',
                'sale_date' => 'required|string|max:50',
                'type' => 'required|string|max:30'
            ]
        )->validate();


        /* create a new comic*/
        $comic = new Comic();
        /* fill with form information */
        $comic->fill($data);
        /* save inside database */
        $comic->save();

        /* 
        ! REMEMBER TO CODE IN MODEL FOR FILLABLE CONTENTS  
        */
        return redirect()->route('comics.show', $comic)
            ->with('message_type', 'success')
            ->with('message', 'Comic added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $comic->update($data);
        return redirect()->route('comics.show', $comic)
            ->with('message_type', 'success')
            ->with('message', 'Comic edited successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')
            ->with('message_type', 'danger')
            ->with('message', 'Comic deleted !');
    }
}