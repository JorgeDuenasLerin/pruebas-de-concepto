<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ComidaRepository;

class ComidaController extends AbstractController
{
    private $repository;

    public function __construct(ComidaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/comida", name="comida")
     */
    public function index()
    {
        $info = $this->repository->findAll();
        return $this->render('comida/index.html.twig', [
            'comidas' => $info,
            'controller_name' => 'ComidaController',
        ]);
    }
}
