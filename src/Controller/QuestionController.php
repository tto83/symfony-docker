<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
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
        $answers = [
          'Have you tried to turn it off an on again?',
          'It works for me',
          "I think it's better now"
        ];

        return $this->render('question/show.html.twig', [
            'question'=>ucwords(str_replace('-',' ',$slug)),
            'answers'=>$answers

        ]);
    }
}
