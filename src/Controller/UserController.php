<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user')]
    public function indexAction(): Response
    {
        $age = 10;

        return $this->render('user.html.twig', ['test' => $age]);

    }

    #[Route('/user/api')]
    public function apiAction(): JsonResponse
    {
        return new JsonResponse(['status' => 'ok', 'data' => ['name' => 'test']]);
    }

    #[Route('/lucky/number/{max}', name: 'app_lucky_number')]
    public function number(int $max): Response
    {
        $number = random_int(0, $max);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

}
