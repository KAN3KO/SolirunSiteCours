<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClasseType;
use App\Repository\ClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class HomePageController extends AbstractController
{
    #[Route('/', name: 'HomePage')]
    public function index(ClasseRepository $classeRepository): Response
    {
        return $this->render('HomePage.html.twig', [

        ]);
    }
}