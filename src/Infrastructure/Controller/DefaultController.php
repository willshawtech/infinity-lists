<?php

namespace Willshaw\InfinityLists\Infrastructure\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    /**
     * @return Response
     */
    public function index() : Response
    {
        return new Response('<h1>Infinity Lists</h1>');
    }
}
