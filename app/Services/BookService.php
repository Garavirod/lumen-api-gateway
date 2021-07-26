<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BookService
{
    use ConsumeExternalService;

    /**
     * the base uri to be used to consume the books' service
     * @var string
     */
    public $baseUri;

    /**
     * the  secret to be used to consume the books' service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

     /**
     * Get full list author from Author service
     * @return string
     */
    public function obtainBooks()
    {
        return $this->perfomRequest('GET','books/list');
    }


    /**
     * Create an author from Author service
     * @return string
     */
    public function crerateBook($data)
    {
        return $this->perfomRequest('POST','books/register', $data);
    }

    /**
     * Get an author from Author service
     * @return string
     */
    public function obtainBook($book)
    {
        return $this->perfomRequest('GET',"books/books/{$book}");
    }

    /**
     * Edit an author from Author service
     * @return string
     */
    public function updateBook($data, $book)
    {
        return $this->perfomRequest('PUT',"books/books/{$book}", $data);
    }

    /**
     * Edit an author from Author service
     * @return string
     */
    public function destroyBook($book)
    {
        return $this->perfomRequest('DELETE',"books/books/{$book}");
    }
}