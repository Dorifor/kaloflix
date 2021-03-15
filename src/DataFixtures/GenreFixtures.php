<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $genre1 = new Genre();
        $genre1->setLibelle('Science-Fiction');
        $this->setReference('genre-1', $genre1);
        $manager->persist($genre1);

        $genre2 = new Genre();
        $genre2->setLibelle('Action');
        $this->setReference('genre-2', $genre2);
        $manager->persist($genre2);

        $manager->flush();
    }
}
