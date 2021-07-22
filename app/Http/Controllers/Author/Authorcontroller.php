<?php

namespace App\Http\Controllers\Author;
use App\Http\Controllers\Controller;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    use ApiResponser;

    /**
     * the service to consume author service
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Return a Author's list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Create an instance of Author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){
      
    }


    /**
     * Return an specific Author
     * @return Illuminate\Http\Response
     */
    public function show($author){
       
    }

    /**
     * Update an especific author data
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author){
       
    }

    /**
     * Delete an specific author data
     * @return Illuminate\Http\Response
     */
    public function delete($author){
       
    }
}
