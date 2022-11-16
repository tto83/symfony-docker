<?php

namespace App\Controller;

use App\Service\MarkdownHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function show($slug, MarkdownHelper $markdownHelper)
    {
        dump($this->getParameter('cache_adapter'));
        $answers = [
            'Have you tried to turn it off an on again?',
            'It works for me',
            "I think it's better now",
            "I think it's `purrfect`"
        ];

        $questionText ='I\'ve been turned into a cat, any thoughts on how to turn back? While I\'m **adorable**, I don\'t really care for cat food.';
        $parsedQuestionText = $markdownHelper->parse($questionText);

        return $this->render('question/show.html.twig', [
            'question'=>ucwords(str_replace('-',' ',$slug)),
            'questionText'=>$parsedQuestionText,
            'answers'=>$answers

        ]);
    }
}
