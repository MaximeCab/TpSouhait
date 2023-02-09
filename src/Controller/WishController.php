<?php

namespace App\Controller;

use App\Entity\Wish;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
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
    public function detail(EntityManagerInterface $em, $id){
        return $this->render('wish/detail.html.twig',[
            'wish' => $em->getRepository(Wish::class)->find($id)
        ]);
    }
    public function create(EntityManagerInterface $em){
     //1 ere facon
     /*$wish = new wish() ;
     $wish->setTitle("coder une appli");
     $wish->setDescription("Reussir à coder une appli seul qui me plait " );
     $wish->setAuthor('Maxime');
     $wish->setIsPublished('true');
     $wish->setDateCreated(new DateTime());*/
     //2 eme facon
    $wish = new Wish (
        'faire du snow',
        'faire du snwobard en roadtrip',
        'Maxime',
        'true',
        new DateTime());

     $em->persist($wish);
     $em->flush();
     unset($em);
     return true;
    }
}