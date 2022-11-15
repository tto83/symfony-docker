<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(Environment $twigEnvironment)
    {
        return $this->render('question/homepage.html.twig');

//        //example to use Twig service, longer way:
//        $html = $twigEnvironment->render('question/homepage.html.twig');
//        return new Response($html);
    }

    /**
     * @Route("/questions/{slug}", name="app_question_show")
     */
    public function show($slug)
    {
        $answers = [
          'Have you tried to turn it off an on again?',
          'It works for me',
          "I think it's better now"
        ];

        dump($this);

        return $this->render('question/show.html.twig', [
            'question'=>ucwords(str_replace('-',' ',$slug)),
            'answers'=>$answers

        ]);
    }
}
