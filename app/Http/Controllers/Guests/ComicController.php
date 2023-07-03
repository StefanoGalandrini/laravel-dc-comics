<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller

{

    private $validations = [
        'title'         => 'required|string|max:100',
        'description'   => 'required|string',
        'thumb'         => 'required|url|max:350',
        'price'         => 'required|numeric|max:9999.99',
        'series'        => 'required|string|max:50',
        'sale_date'     => 'required|date|before:today',
        'type'          => 'required|string|max:20',
        'artists'       => 'required|string|max:800',
        'writers'       => 'required|string|max:800',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('id')->paginate(3);
        return view('comics.index', ['comics' => $comics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //data validation
        $request->validate($this->validations);


        $data = $request->all();

        // Generate random 'thumb' starting with base "Lorem Picsum" service
        $data['thumb'] .= mt_rand();

        $newComic = new Comic();

        $newComic->title        = $data['title'];
        $newComic->description  = $data['description'];
        $newComic->thumb        = $data['thumb'];
        $newComic->price        = '$ ' . number_format($data['price'], 2, '.', '');
        $newComic->series       = $data['series'];
        $newComic->sale_date    = $data['sale_date'];
        $newComic->type         = $data['type'];
        $newComic->artists      = explode(',', $data['artists']);
        $newComic->writers      = explode(',', $data['writers']);


        $newComic->save();
        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', ['comic' => $comic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', ['comic' => $comic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {

        // validare i dati
        $request->validate($this->validations);

        $data = $request->all();

        // aggiornare i dati
        $comic->title        = $data['title'];
        $comic->description  = $data['description'];
        $comic->thumb        = $data['thumb'];
        $comic->price        = $data['price'];
        $comic->series       = $data['series'];
        $comic->sale_date    = $data['sale_date'];
        $comic->type         = $data['type'];
        $comic->artists      = explode(',', $data['artists']);
        $comic->writers      = explode(',', $data['writers']);

        $comic->update();


        // redirect
        return to_route('comics.show', ['comic' => $comic->id]);
        //        return view('comics.edit', ['comic' => $comic])

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('delete_success', $comic);
    }


    public function restore($id)
    {
        Comic::withTrashed()->where('id', $id)->restore();
        $comic = Comic::find($id);
        return redirect()->route('comics.index')->with('restore_success', $comic);
    }


    public function trashed()
    {
        $trashedComics = Comic::onlyTrashed()->paginate(3);

        return view('comics.trashed', ['trashedComics' => $trashedComics]);
    }


    public function harddelete($id)
    {
        $comic = Comic::withTrashed()->find($id);
        $comic->forceDelete();

        return redirect()->route('comics.trashed')->with('delete_success', $comic);
    }
}
