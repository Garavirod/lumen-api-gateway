<?php

namespace App\Http\Controllers\Author;
use App\Http\Controllers\Controller;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{

    use ApiResponser;

    /**
     * the service to consume author service
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new author controller instance.
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
       return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Create an instance of Author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){
        return $this->successResponse(
            $this->authorService->crerateAuthor($request->all(), Response::HTTP_CREATED)
        );
      
    }


    /**
     * Return an specific Author
     * @return Illuminate\Http\Response
     */
    public function show($author){
        return $this->successResponse($this->authorService->obtainAuthor($author));       
    }

    /**
     * Update an especific author data
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author){
        $this->authorService->updateAuthor($request->all(), $author);
    }

    /**
     * Delete an specific author data
     * @return Illuminate\Http\Response
     */
    public function delete($author){
        return $this->successResponse($this->authorService->destroyAuthor($author));              
    }
}
