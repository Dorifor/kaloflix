<?php

namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FilmsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $films = [
            'Ad Astra', 'Annihilation', 'Death Note', 'Godzilla Roi des Monstres', 'Interstellar', 'John Wick 2', 'John Wick Parabellum', 'Joker', 'Kong Skull Island',
            'Le Fils du Mask', 'Les Tuche', 'Les Tuche 2', 'Les Tuche 3', 'Les Visiteurs en Amerique', 'NIKITA', 'Oblivion', 'Petit Pays', 'Scary Movie 5', 'Spectre', 'Texi 5', 'Tenet',
            'USS Greyhound la bataille de l\'Atlantique', 'Underwater'
        ];

        $liens = [
            'http://kalogire.ddns.net/films/Ad.Astra.2019.MULTi.TRUEFRENCH.1080p.HDLight.x264.AC3-TOXIC-.mp4',
            'http://kalogire.ddns.net/films/Annihilation.2018.MULTi.1080p.BluRay.HDlight.H264.DTS-Toto70300.mp4',
            'http://kalogire.ddns.net/films/Death.Note.2017.MULTi.1080p.WEBRip.x264-BRiNK.mp4',
            'http://kalogire.ddns.net/films/Godzilla-Roi-des-Monstres-2019-1080p-VFF-EN-X264-AC3-mHDgz.mp4',
            'http://kalogire.ddns.net/films/Interstellar.2014.1080p.x265.AC3.mp4',
            'http://kalogire.ddns.net/films/John-Wick-2.mp4',
            'http://kalogire.ddns.net/films/John-Wick-Parabellum-_2019_-MULTi-BRrip-1080p-x265-10bits-AC3_JiHeff.mp4',
            'http://kalogire.ddns.net/films/Joker.2019.MULTi.1080p.WEBRip.x264-TOXIC.mp4',
            'http://kalogire.ddns.net/films/Kong-Skull-Island-2017-1080p-VFF-EN-X264-AC3-mHDgz.mp4',
            'http://kalogire.ddns.net/films/Le-Fils-du-Mask-_2005_-MULTI-576p-DVD-REMUX-MPEG2-BARNAK.mp4',
            'http://kalogire.ddns.net/films/Les-Tuche-_2011_-French-AC3-BluRay-1080p-x264.GHT.mp4',
            'http://kalogire.ddns.net/films/Les-Tuche-2-_2016_-French-AC3-BluRay-1080p-x264.GHT.mp4',
            'http://kalogire.ddns.net/films/Les.Tuche.3.2018.FRENCH.1080p.BluRay.x264-LESTUCHE3.mp4',
            'http://kalogire.ddns.net/films/Les_Visiteurs_en_Amerique_-__2001__FR_1080p_HDL.mp4',
            'http://kalogire.ddns.net/films/NIKITA.1990.French.1080p.mHD.x264.AC3-touriste.mp4',
            'http://kalogire.ddns.net/films/Oblivion.2013.VFF.1080P.mHD.X264.AC3-ROMKENT.mp4',
            'http://kalogire.ddns.net/films/Petit.Pays.2020.FRENCH.HDRip.x264.AC3-CHARTAIR.mp4',
            'http://kalogire.ddns.net/films/Scary.Movie.5.2013.UNRATED.FRENCH.BRRip.AC3.XviD-TT.mp4',
            'http://kalogire.ddns.net/films/Spectre.2015.FRENCH.BDRip.XviD-GLUPS.mp4',
            'http://kalogire.ddns.net/films/Taxi-5-2018-VOSTFR-1080p-BluRay-Dolby-True-HD-HEVC-x265.mp4',
            'http://kalogire.ddns.net/films/Tenet.2020.VOST.1080p.HDRip.X264.AC3-SSS.mp4',
            'http://kalogire.ddns.net/films/USS-Greyhound-La-bataille-de-l_Atlantique-_FR-EN_-_2020_.mp4',
            'http://kalogire.ddns.net/films/Underwater.2020.MULTi.1080p.HDLight.x264.AC3-EXTREME.mp4'
        ];

        for ($i = 0; $i < count($films); $i++) {
            $genre = ($i % 2 == 0) ? $this->getReference('genre-1') : $this->getReference('genre-2');

            $film = new Film();
            $film
                ->setNom($films[$i])
                ->setDescription('ceci est le film numero : ' . $i)
                ->setImg('https://via.placeholder.com/150')
                ->setLien($liens[$i])
                ->addGenre($genre);

            $manager->persist($film);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [GenreFixtures::class];
    }
}
