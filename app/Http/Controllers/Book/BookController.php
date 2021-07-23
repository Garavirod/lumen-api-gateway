<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{

    use ApiResponser;
    /**
     * the service to consume book service
     * @var BookService
     */
    public $bookService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Return a Book's list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
       return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * Create an instance of Book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){
        return $this->successResponse(
            $this->bookService->crerateBook($request->all(), Response::HTTP_CREATED)
        );
      
    }


    /**
     * Return an specific Book
     * @return Illuminate\Http\Response
     */
    public function show($book){
        return $this->successResponse($this->bookService->obtainBook($book));       
    }

    /**
     * Update an especific Book data
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book){
        $this->bookService->updateBook($request->all(), $book);
    }

    /**
     * Delete an specific Book data
     * @return Illuminate\Http\Response
     */
    public function delete($book){
        return $this->successResponse($this->bookService->destroyBook($book));              
    }
}
