<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
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
        $request->validate(
            [
                'title'         => 'required|string|max:100',
                'description'   => 'required|string',
                'thumb'         => 'required|url|max:350',
                'price'         => 'required|string|max:10',
                'series'        => 'required|string|max:50',
                'sale_date'     => 'required|date|before:today',
                'type'          => 'required|string|max:20',
                'artists'       => 'required|string|max:800',
                'writers'       => 'required|string|max:800',
            ]
        );

        $data = ($request->all());

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
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', ['comic' => $comic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
