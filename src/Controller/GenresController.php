<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenresController extends AbstractController
{
    #[Route('/genres/{id}', name: 'app_kaloflix_genre')]
    public function index(GenreRepository $genreRepository, $id): Response
    {
        $package = new Package(new EmptyVersionStrategy);
        $logo = $package->getUrl('/images/kaloflix.png');

        $genreId = $genreRepository->find($id);
        $genresListe = $genreRepository->findAll();

        return $this->render('genres/index.html.twig', [
            'logo' => $logo,
            'genreId' => $genreId,
            'genresListe' => $genresListe,
        ]);
    }
}
