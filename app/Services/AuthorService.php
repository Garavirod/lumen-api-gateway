<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class AuthorService
{
    use ConsumeExternalService;

    /**
     * the base uri to be used to consume the authors' service
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }

    /**
     * Get full list author from Author service
     * @return string
     */
    public function obtainAuthors()
    {
        return $this->perfomRequest('GET','users/list');
    }


    /**
     * Create an author from Author service
     * @return string
     */
    public function crerateAuthor($data)
    {
        return $this->perfomRequest('POST','users/register', $data);
    }

    /**
     * Get an author from Author service
     * @return string
     */
    public function obtainAuthor($author)
    {
        return $this->perfomRequest('GET',"users/authors/{$author}");
    }

    /**
     * Edit an author from Author service
     * @return string
     */
    public function updateAuthor($data, $author)
    {
        return $this->perfomRequest('PUT',"users/authors/{$author}", $data);
    }

    /**
     * Edit an author from Author service
     * @return string
     */
    public function destroyAuthor($author)
    {
        return $this->perfomRequest('DELETE',"users/authors/{$author}");
    }
}