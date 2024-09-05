<?php

namespace App\Controller;

use App\Entity\Annotation;
use App\Form\AnnotationType;
use App\Repository\AnnotationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/annotation')]
class AnnotationController extends AbstractController
{
    #[Route('/', name: 'app_annotation_index', methods: ['GET'])]
    public function index(AnnotationRepository $annotationRepository): Response
    {
        return $this->render('annotation/index.html.twig', [
            'annotations' => $annotationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_annotation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $annotation = new Annotation();
        $form = $this->createForm(AnnotationType::class, $annotation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($annotation);
            $entityManager->flush();

            return $this->redirectToRoute('app_annotation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('annotation/new.html.twig', [
            'annotation' => $annotation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_annotation_show', methods: ['GET'])]
    public function show(Annotation $annotation): Response
    {
        return $this->render('annotation/show.html.twig', [
            'annotation' => $annotation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_annotation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Annotation $annotation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AnnotationType::class, $annotation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_annotation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('annotation/edit.html.twig', [
            'annotation' => $annotation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_annotation_delete', methods: ['POST'])]
    public function delete(Request $request, Annotation $annotation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annotation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($annotation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_annotation_index', [], Response::HTTP_SEE_OTHER);
    }
}
