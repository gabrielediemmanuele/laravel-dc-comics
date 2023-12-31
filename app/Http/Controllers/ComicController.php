<?php

namespace App\Http\Controllers;

/* Validation system connection  -> find in public function STORE n°43*/
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
/* connection to models Comic  */
use App\Models\Comic;

class ComicController extends Controller
{
    /* INDEX  */
    public function index()
    {
        /* $comics = Comic::all(); */
        $comics = Comic::paginate(10);
        $title = "Comics";
        return view('comics.index', compact('title', 'comics'));
    }

    /* create */
    public function create()
    {
        return view('comics.create');
    }

    /* store  */
    public function store(Request $request)
    {
        /* inside $data there are form dates */
        /*  $data = $request->all(); */

        /* validation call */
        $data = $this->validation($request->all());

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

    /*  show  */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /* edit  */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /* update  */
    public function update(Request $request, Comic $comic)
    {
        /* $data = $request->all(); */

        /* validation call */
        $data = $this->validation($request->all());
        /* $this->validation($data); */

        $comic->update($data);

        return redirect()->route('comics.show', $comic)
            ->with('message_type', 'success')
            ->with('message', 'Comic edited successfully !');
    }

    /* destroy  */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')
            ->with('message_type', 'danger')
            ->with('message', 'Comic deleted !');
    }

    /* validate function */
    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|string|max:100',
                'description' => 'required',
                'thumb' => 'required',
                'price' => 'required|string|max:50',
                'series' => 'required|string|max:50',
                'sale_date' => 'required|string|max:30',
                'type' => 'required|string|max:30',
            ],
            [
                'title.required' => 'The title is binding!',
                'title.string' => 'Title need to be a string!',
                'title.max' => 'The title must have max 100 characters!',

                'description.required' => 'The description is binding!',


                'thumb.required' => 'The thumb is binding!',

                'price.required' => 'The price is binding!',
                'price.string' => 'Price need to be a string!',
                'price.max' => 'The price must have max 50 characters!',

                'series.required' => 'The series is binding!',
                'series.string' => 'Series need to be a string!',
                'series.max' => 'The series must have max 50 characters!',

                'sale_date.required' => 'The Sale Date is binding!',
                'sale_date.string' => 'Sale Date need to be a string!',
                'sale_date.max' => 'The sale date must have max 50 characters!',

                'type.required' => 'The type is binding!',
                'type.string' => 'Type need to be a string!',
                'type.max' => 'The type must have max 30 characters!',
            ]
        )->validate();

        return $validator;
    }
}