<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends BaseFixtures
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function (Article $article, int $count) {
            $article->setTitle($this->faker->sentence(3))
                ->setContent($this->faker->text(300))
                ->setAuthor($this->faker->name())
                ->setLikes($this->faker->numberBetween(5, 100))
                ->setImage($this->faker->image('public/images', 640, 480, null, false));
            if ($this->faker->boolean(70)) {
                $article->setPublishedAt($this->faker->dateTimeBetween('-100 days', '-1 day'));
            }
        });

        $this->manager->flush();
    }
}
