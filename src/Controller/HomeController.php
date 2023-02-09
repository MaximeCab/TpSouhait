<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(path: '' ,name: "home")]
    public function home()
    {
        return $this->render('home/home.html.twig');
    }

    #[Route(path: 'legal-stuff', name: "mentions-legale")]
    public function mentionsLegale()
    {
        return $this->render('home/mentionsLegale.html.twig');
    }

    #[Route(path: 'contact', name: 'contact')]
    public function contact()
    {
        return $this->render('home/contact.html.twig');
    }
    #[Route(path: 'about-us' , name: 'about-us',methods: ['GET'])]
    public function About_us()
    {
      return $this->render('home/aboutUs.html.twig')  ;
    }

}