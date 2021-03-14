<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_kaloflix_index')]
    public function index(): Response
    {
        $package = new Package(new EmptyVersionStrategy);

        $logo = $package->getUrl('/images/kaloflix.png');

        return $this->render('accueil/index.html.twig', [
            'logo' => $logo,
        ]);
    }
}
