<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'wish/' , name: 'wish_')]
class WishController extends AbstractController
{
 #[Route(path: 'list' , name: 'list',methods: ['GET'])]
public function list(EntityManagerInterface $em){
     $list = $em->getRepository(Wish::class)->findAll();
     // création du souhait //
     /*$this->create($em);*/
    return $this->render('wish/list.html.twig', [
        'list' => $list
    ]);
}
    #[Route(path: 'detail/{id}' , name: 'detail',requirements: ['id'=>'\d+'],methods: ['GET'])]
    public function detail(wish $wish){
        return $this->render('wish/detail.html.twig',[
            'wish' => $wish
        ]);
    }
    #[Route(path: 'ajout-souvenir',name: 'ajout-souvenir',methods: ['GET','POST'])]
    public function create () : \Symfony\Component\HttpFoundation\Response
    {
     $wish = new Wish();
     $wishForm = $this->createForm(WishType::class,$wish);
     return $this->render('home/ajoutSouvenir.html.twig', [
         "wishForm" => $wishForm->createView()
     ]);
    }
}