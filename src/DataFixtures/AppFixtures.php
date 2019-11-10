<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Collections;
use App\Entity\Compositions;
use App\Entity\Images;
use App\Entity\Products;
use App\Entity\ProductSize;
use App\Entity\Sizes;
use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //sizes fixture
        $size1 = new Sizes();
        $size1->setSize('42');
        $manager->persist($size1);
        $size2 = new Sizes();
        $size2->setSize('44');
        $manager->persist($size2);
        $size3 = new Sizes();
        $size3->setSize('46');
        $manager->persist($size3);
        $size4 = new Sizes();
        $size4->setSize('48');
        $manager->persist($size4);
        $size5 = new Sizes();
        $size5->setSize('50');
        $manager->persist($size5);
        $size6 = new Sizes();
        $size6->setSize('52');
        $manager->persist($size6);
        $size7 = new Sizes();
        $size7->setSize('54');
        $manager->persist($size7);
        $size8 = new Sizes();
        $size8->setSize('56');
        $manager->persist($size8);
        $size9 = new Sizes();
        $size9->setSize('58');
        $manager->persist($size9);
        $size10 = new Sizes();
        $size10->setSize('60');
        $manager->persist($size10);
        $size11 = new Sizes();
        $size11->setSize('62');
        $manager->persist($size11);
        $size12 = new Sizes();
        $size12->setSize('64');
        $manager->persist($size12);
        //end sizes fixture
        //tag fixtures
        $tag1 = new Tags();
        $tag1->setTag('нарядное');
        $manager->persist($tag1);

        $tag2 = new Tags();
        $tag2->setTag('карандаш');
        $manager->persist($tag2);

        $tag3 = new Tags();
        $tag3->setTag('повседневное');
        $manager->persist($tag3);

        $tag4 = new Tags();
        $tag4->setTag('деловой стиль');
        $manager->persist($tag4);

        $tag5 = new Tags();
        $tag5->setTag('большие размеры');
        $manager->persist($tag5);

        //end tag fixtures
        //composition fixtures
        $comp1 = new Compositions();
        $comp1
            ->setTitle('70% вискоза 30% лен')
            ->setStatus('1');
        $manager->persist($comp1);
        $comp2 = new Compositions();
        $comp2
            ->setTitle('лен 55% вискоза 45%')
            ->setStatus('1');
        $manager->persist($comp2);
        $comp3 = new Compositions();
        $comp3
            ->setTitle('вискоза 98% спандекс 2%')
            ->setStatus('1');
        $manager->persist($comp3);
        $comp4 = new Compositions();
        $comp4
            ->setTitle('хлопок 73% полиэстер 24% эластан 3%')
            ->setStatus('1');
        $manager->persist($comp4);
        $comp5 = new Compositions();
        $comp5
            ->setTitle('полиэстер 100%')
            ->setStatus('1');
        $manager->persist($comp5);
        $comp6 = new Compositions();
        $comp6
            ->setTitle('полиэстер 61% вискоза 33% эластан 6%')
            ->setStatus('1');
        $manager->persist($comp6);
        //end composition fixture
        //categories fixture
        $cat1 = new Categories();
        $cat1
            ->setTitle('Юбки')
            ->setUrl('/catalog')
            ->setAlias('Юбка')
            ->setImage('skirt.jpeg')
            ->setStatus(1);
        $manager->persist($cat1);
        $cat2 = new Categories();
        $cat2
            ->setTitle('Брюки')
            ->setUrl('/catalog')
            ->setAlias('Брюки')
            ->setImage('pants.jpeg')
            ->setStatus(1);
        $manager->persist($cat2);
        $cat3 = new Categories();
        $cat3
            ->setTitle('Платья')
            ->setUrl('/catalog')
            ->setAlias('Платье')
            ->setImage('dress.jpeg')
            ->setStatus(1);
        $manager->persist($cat3);
        $cat4 = new Categories();
        $cat4
            ->setTitle('Блузки')
            ->setUrl('/catalog')
            ->setAlias('Блузка')
            ->setImage('blouse.jpeg')
            ->setStatus(1);
        $manager->persist($cat4);

        //end categories fixture
        //images fixtures
        $img1 = new Images();
        $img1
            ->setImage('img1.jpeg');
//            ->setProducts($prod1);

        $manager->persist($img1);
        $img2 = new Images();
        $img2->setImage('img2.jpeg');
        $manager->persist($img2);
        $img3 = new Images();
        $img3->setImage('img3.jpeg');
        $manager->persist($img3);
        $img4 = new Images();
        $img4->setImage('img4.jpeg');
        $manager->persist($img4);
        //end images fixtures


        //collestions fixtures
        $col1 = new Collections();
        $col1
            ->setTitle('Осень - зима 2020')
            ->setStatus(1);
        $manager->persist($col1);
        $col2 = new Collections();
        $col2
            ->setTitle('Осень - зима 2021')
            ->setStatus(1);
        $manager->persist($col2);
        $col3 = new Collections();
        $col3
            ->setTitle('Весна - лето 2020')
            ->setStatus(1);
        $manager->persist($col3);
        $col4 = new Collections();
        $col4
            ->setTitle('Новогодняя 2020')
            ->setStatus(1);
        $manager->persist($col4);
        $col5 = new Collections();
        $col5
            ->setTitle('Осень 2020')
            ->setStatus(1);
        $manager->persist($col5);
        //end collections fixture
        //products fixtures
        $prod1 = new Products();
        $prod1
            ->setArticle('2235')
            ->setCategory($cat2)
            ->setComposition($comp4)
            ->setDescription('Отличные женские брюки ЭлитМода')
            ->setCollection($col3)
            ->setStatus(1)
            ->setSale(0)
            ->setNew(1);
        $manager->persist($prod1);
        $prod2 = new Products();
        $prod2
            ->setArticle('1135')
            ->setCategory($cat1)
            ->setComposition($comp1)
            ->setDescription('Отличные женские брюки ЭлитМода')
            ->setCollection($col2)
            ->setStatus(1)
            ->setSale(1)
            ->setNew(0);
        $manager->persist($prod2);
        $prod3 = new Products();
        $prod3
            ->setArticle('1485')
            ->setCategory($cat4)
            ->setComposition($comp6)
            ->setDescription('Отличные женские брюки ЭлитМода')
            ->setCollection($col4)
            ->setStatus(1)
            ->setSale(1)
            ->setNew(1);
        $manager->persist($prod3);
        $prod4 = new Products();
        $prod4
            ->setArticle('1235')
            ->setCategory($cat2)
            ->setComposition($comp4)
            ->setDescription('Отличные женские брюки ЭлитМода')
            ->setCollection($col3)
            ->setStatus(1)
            ->setSale(1)
            ->setNew(0);
        $manager->persist($prod4);
        $prod5 = new Products();
        $prod5
            ->setArticle('1535')
            ->setCategory($cat4)
            ->setComposition($comp1)
            ->setDescription('Отличные женские брюки ЭлитМода')
            ->setCollection($col1)
            ->setStatus(1)
            ->setSale(1)
            ->setNew(0);
        $manager->persist($prod5);
        $prod6 = new Products();
        $prod6
            ->setArticle('1148')
            ->setCategory($cat1)
            ->setComposition($comp2)
            ->setDescription('Отличные женские брюки ЭлитМода')
            ->setCollection($col5)
            ->setStatus(1)
            ->setSale(1)
            ->setNew(0);
        $manager->persist($prod6);

        //end products fixtures

        // $manager->persist($product);

        $manager->flush();
    }
}
