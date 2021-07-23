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
     * Get full list author from Author service
     * @return string
     */
    public function crerateAuthor($data)
    {
        return $this->perfomRequest('POST','users/register', $data);
    }
}