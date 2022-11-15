<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('What a wizardly awesome controller!');
    }

    /**
     * @Route("/questions/{slug}")
     */
    public function show($slug)
    {
        return new Response(
            sprintf(
                'Feature to show a question "%s" ', ucwords(str_replace('-',' ',$slug))
            )
        );
    }
}
