<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2018-12-17
 * Time: 21:41
 */

namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleAdminController extends AbstractController
{
    /**
     * @Route("/admin/article/new")
     */
    public function new(EntityManagerInterface $entityManager)
    {
        $article = new Article();
        $article->setTitle('Blah blah')
            ->setSlug('blah-blah' . rand(100,200))
            ->setContent('blah blah')
            ->setPublishedAt(new \DateTime(sprintf('-%d days', rand(1, 100))))
            ->setAuthor('Blah blah')
            ->setLikes(rand(5,100))
            ->setImage('asteroid.jpeg');
        $entityManager->persist($article);
        $entityManager->flush();

        return new Response(sprintf('It was saved, id %d, slug %s', $article->getId(), $article->getSlug()));
    }
}