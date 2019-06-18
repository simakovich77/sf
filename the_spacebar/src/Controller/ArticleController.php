<?php
/**
 * Created by PhpStorm.
 * User: Ivan_Simakovich1
 * Date: 6/3/2019
 * Time: 5:37 PM
 */
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
  /**
   * @Route("/")
   */
  public function homepage(){
    return new Response('OMG! First page already!');
  }

  /**
   * @Route("/news/{slug}")
   */
  public function show($slug)
  {
    $comments = [
      'First generation: 1937 – 1946',
      'Second generation: 1947 – 1962',
      'Third generation: 1963 - present',
    ];
    return $this->render('article/show.html.twig', [
      'title' => ucwords(str_replace('-', ' ', $slug)),
      'comments' => $comments,
    ]);
  }
}