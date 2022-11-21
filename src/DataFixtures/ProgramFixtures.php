<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Program;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
  const PROGRAMS = [

    [
      'title' => 'The Walking Dead',
      'synopsis' => "Après une apocalypse, ayant transformé la quasi-totalité de la population en zombies, un groupe d'hommes et de femmes, mené par le shérif adjoint Rick Grimes, tente de survivre... Ensemble, ils vont devoir, tant bien que mal, faire face à ce nouveau monde, devenu méconnaissable, à travers leur périple dans le Sud profond des États-Unis.",
      'poster' => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/4UZzJ65UxR6AsKL6zjFWNYAKb3w.jpg",
      'category' => "category_Horreur"
    ],
    [
      'title' => 'Breaking Bad ',
      'synopsis' => "Walter White, professeur de chimie dans un lycée d'Albuquerque au Nouveau-Mexique, est atteint d'un cancer pulmonaire en phase terminale. Il s'associe à Jesse Pinkman, un ancien élève, cancre, toxicomane et dealer, afin d'assurer l'avenir financier de sa famille après son décès. L'improbable duo va alors synthétiser et commercialiser la plus pure méthamphétamine en cristaux jamais vue dans les Amériques.",
      'poster' => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/ggFHVNu6YYI5L9pCfOacjizRGt.jpg",
      'category' => "category_Drame"
    ],
    [
      'title' => 'Les Simpson',
      'synopsis' => "Située à Springfield, ville américaine moyenne, la série se concentre sur les singeries et les aventures quotidiennes de la famille Simpson : Homer, Marge, Bart, Lisa et Maggie, ainsi que des milliers d'autres personnages.",
      'poster' => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/nj91qQBAbQgz72PRzeghaTAbDwa.jpg",
      'category' => "category_Animation"
    ],
    [
      'title' => 'Brooklyn Nine-Nine',
      'synopsis' => "La vie au sein du commissariat de police de Brooklyn n'est pas de tout repos : une pléiade d'inspecteurs un poil loufoques doivent jongler entre leur mission de protéger et servir les habitants de la ville, leur vie personnelle et surtout celle du bureau.",
      'poster' => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/hgRMSOt7a1b8qyQR68vUixJPang.jpg",
      'category' => "category_Comédie"
    ],
    [
      'title' => 'Ragnarök',
      'synopsis' => "Dans un village norvégien pollué et troublé par la fonte des glaciers, la fin des temps semble bien réelle. Mais un combat doit opposer une légende à un mal ancestral.",
      'poster' => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/yRvUcOxCwsxMIA2ewEM15adYJmn.jpg",
      'category' => "category_Fantastique"
    ],
    [
        'title' => 'Outer Banks',
        'synopsis' => "Sur une île où les inégalités sont accentuées, John B recrute ses trois meilleurs amis pour partir à la recherche d'un trésor légendaire lié à la disparition de son père.",
        'poster' => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/ovDgO2LPfwdVRfvScAqo9aMiIW.jpg",
        'category' => "category_Action"
    ],
    [
        'title' => 'Arcane ',
        'synopsis' => "L'histoire du héros tchèque Zizka, aussi appelé Jan Zizka de Trocnov, sa relation avec une héritière locale et son combat contre un roi rival. Tacticien militaire vénéré qui a vaincu les armées de l'ordre teutonique et du Saint-Empire romain germanique, il est connu pour ses stratégies novatrices et pour avoir su entraîner rapidement des paysans à affronter des adversaires qualifiés et généralement plus nombreux.",
        'poster' => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/9osrWsk67k0ys9zeYwiMhG8mlr6.jpg",
        'category' => "category_Aventure"
    ],
    [
      'title' => 'Medieval ',
      'synopsis' => "Championnes de leurs villes jumelles et rivales, deux sœurs se battent dans une guerre où font rage des technologies magiques et des perspectives diamétralement opposées.",
      'poster' => "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/4njdAkiBdC5LnFApeXSkFQ78GdT.jpg",
      'category' => "category_Action"
  ]
  ];
  public function load(ObjectManager $manager): void
  {
    // $product = new Product();
    // $manager->persist($product);
    foreach (self::PROGRAMS as $key => $value) {
        # code...
        $program = new Program();
        $program->setTitle($value['title']);
        $program->setSynopsis($value['synopsis']);
        $program->setPoster($value['poster']);
        $program->setCategory($this->getReference($value['category']));
        $manager->persist($program);
    }
    $manager->flush();
  }

  public function getDependencies()
  {
    // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
    return [
      CategoryFixtures::class,
    ];
  }
}
