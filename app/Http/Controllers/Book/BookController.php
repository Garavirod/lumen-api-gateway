<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class BookController extends Controller
{

    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return a Book's list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Create an instance of Book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){
      
    }


    /**
     * Return an specific Book
     * @return Illuminate\Http\Response
     */
    public function show($book){
       
    }

    /**
     * Update an especific Book data
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book){
       
    }

    /**
     * Delete an specific Book data
     * @return Illuminate\Http\Response
     */
    public function delete($book){
       
    }
}
