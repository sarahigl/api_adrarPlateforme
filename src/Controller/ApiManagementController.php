<?php

namespace App\Controller;

use App\Repository\ChapterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/access', name: 'app_api_')]
final class ApiManagementController extends AbstractController
{
    #[Route('/management', name: 'management')]
    public function index(): Response
    {
        return $this->render('api_management/index.html.twig', [
            'controller_name' => 'ApiManagementController',
        ]);
   }
   #[Route('/chapters', name: 'show_chapters_list', methods: ['GET'])]
    public function listChapters(ChapterRepository $chapterRepository, SerializerInterface $serializer): Response
    {
        $chapters = $chapterRepository->findAll();
        // $jsonChapters = $serializer->serialize($chapters, 'json');
        // return new JsonResponse($jsonChapters, Response::HTTP_OK, ['Content-Type' => 'application/json'], true);
        return $this->render('api_management/chapters.html.twig', [
            'chapter_name' => 'Chapter List',
            'chapters'=> $chapters,
        ]);
    }
}
