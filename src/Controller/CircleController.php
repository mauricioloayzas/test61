<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\GeometryCalculator;
use App\Entity\Circle;

class CircleController extends AbstractController
{
    #[Route('/circle/{radius}', name: 'app_circle')]
    public function index(float $radius): JsonResponse
    {
        $circle = new Circle();
        $circle->setRadius($radius);
        $circle->setCircumference();
        $circle->setSurface();
        return $this->json($circle);
    }

    #[Route('/circle/sum-objects', methods: ["POST"], name: 'app_circle_sum_object')]
    public function sumObjects(Request $request, GeometryCalculator $geometryCalculator): JsonResponse
    {
        $circle = new Circle();

        $object1 = json_decode($request->request->get('object1'), TRUE);
        $circle->setRadius($object1['radius']);
        $circle->setCircumference();
        $circle->setSurface();
        $object1 = $circle;

        $object2 = json_decode($request->request->get('object2'), TRUE);
        $circle->setRadius($object2['radius']);
        $circle->setCircumference();
        $circle->setSurface();
        $object2 = $circle;

        return $this->json([
            'sumCircumference'  => $geometryCalculator->getSumCircumference($object1, $object2),
            'sumSurface'        => $geometryCalculator->getSumSurface($object1, $object2)
        ]);
    }
}
