<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ComidaRepository;
use App\Form\ComidaType;
use App\Entity\Comida;

class ComidaController extends AbstractController
{
    private $repository;

    public function __construct(ComidaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/comida/new", name="comida_new")
     */
    public function new()
    {
        $c = new Comida();
        $c->setNombre("Nueva comida");

        $f = $this->createForm(ComidaType::class, $c);

        return $this->render('comida/new.html.twig', [
            'form' => $f->createView(),
            'controller_name' => 'ComidaController',
        ]);
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
