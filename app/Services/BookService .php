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

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }
}