<?php
/**
 * Created by PhpStorm.
 * User: Ivan_Simakovich1
 * Date: 6/3/2019
 * Time: 5:37 PM
 */
namespace App\Controller;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleController extends AbstractController
{
  /**
   * @Route("/", name="app_homepage")
   */
  public function homepage(){
    return $this->render('article/homepage.html.twig');
  }

  /**
   * @Route("/news/{slug}", name="article_show")
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
      'slug' => $slug,
      'comments' => $comments,
    ]);
  }
  /**
   * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
   */
  public function toggleArticleHeart($slug, LoggerInterface $logger)
  {
    //TODO - actually heart/unheart the article

      $logger->info('Article is being hearted');

      return new JsonResponse(['hearts' => rand(5, 100)]);
  }
}