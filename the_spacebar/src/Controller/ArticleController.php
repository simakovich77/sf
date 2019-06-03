<?php
/**
 * Created by PhpStorm.
 * User: Ivan_Simakovich1
 * Date: 6/3/2019
 * Time: 5:37 PM
 */
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController
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
    return new Response(sprintf(
      'Future page to show the article: %s',
      $slug
      ));
  }
}