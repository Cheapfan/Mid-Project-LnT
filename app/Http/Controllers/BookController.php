<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request ->validate([
                'Title' =>['required', 'string', 'between:5,20'],
                'Author' =>['required', ' string', 'between:5,20'],
                'Publisher'=>['required', 'string'],
                'Year'=>['required', 'integer','between:2000,2021'],
                'Page'=>['required', 'integer','min:1'],
        ],[
            'required'=> "the :attribute must be filled",
        ]);
        if ($validated){
            Book::create([
                'Title' => $request->Title, 
                'Author' => $request->Author, 
                'Publisher'=>$request->Publisher, 
                'Year' => $request->Year,
                'Page' => $request->Page,
            ]);
        }
        return back();
        // return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $books = Book::all();
        return view('list',compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id , Request $request, Book $book)
    {
        $book = Book::findOrFail($id);
        return view('update', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $validated = $request ->validate([
            'Title' =>['required', 'string', 'between:5,20'],
            'Author' =>['required', ' string', 'between:5,20'],
            'Publisher'=>['required', 'string'],
            'Year'=>['required', 'integer','between:2000,2021'],
            'Page'=>['required', 'integer','min:1'],
        ],[
            'required'=> "the :attribute must be filled",
        ]);
        if ($validated){
            Book::findOrFail($id)->update([
                'Title' => $request->Title, 
                'Author' => $request->Author, 
                'Publisher'=>$request->Publisher, 
                'Year' => $request->Year,
                'Page' => $request->Page,
            ]);
        }
        
        $books = Book::all();
        return view('list',compact('books'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return back();
    }
}
