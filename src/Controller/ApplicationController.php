<?php

namespace App\Controller;

use App\Entity\Application;
use App\Entity\JobOffer;
use App\Entity\User;
use App\Form\ApplicationType;
use App\Form\UserType;
use App\Repository\ApplicationRepository;
use App\Repository\JobOfferRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/application")
 */
class ApplicationController extends AbstractController
{
    /**
     * @Route("/", name="application_index", methods={"GET"})
     */
    public function index(ApplicationRepository $applicationRepository): Response
    {
        return $this->render('application/index.html.twig', [
            'applications' => $applicationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="application_new", methods={"GET","POST"})
     */
    public function new(Request $request, JobOffer $jobOffer , ApplicationRepository $applicationRepository, JobOfferRepository $jobOfferRepository, UserRepository $userRepository): Response
    {

    if($this->getUser()) {

        $candidacy = new Application();
        $newDate = new \DateTime();

        $candidacy->setAppliedAt($newDate);

        $candidacy->setUser($this->getUser());
        $candidacy->setOffer($jobOffer);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($candidacy);
        $entityManager->flush();

        $candidacyExist = $applicationRepository->findOneBy(array('offer' => $jobOffer->getId()));

        return $this->redirectToRoute('job_offer_show', [
            'id' => $jobOffer->getId(),
            'candidacyExist' => $candidacyExist,
            'application' => $candidacy,
        ]);
    }
    else{
        $offer = $jobOfferRepository->findOneBy(array('id' => $request->get('id')));

        return $this->redirectToRoute('job_offer_show', [
            'id' => $offer ->getId(),
        ]);
    }

    }

    /**
     * @Route("/{id}", name="application_show", methods={"GET"})
     */
    public function show(Application $application, JobOffer $jobOffer , ApplicationRepository $applicationRepository): Response
    {
        $candidacyExist = $applicationRepository->findOneBy(array('offer' => $jobOffer->getId()));

        return $this->render('application/show.html.twig', [
            'application' => $application,
            'candidacyExist' => $candidacyExist,

        ]);
    }

    /**
     * @Route("/{id}/edit", name="application_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Application $application): Response
    {
        $form = $this->createForm(ApplicationType::class, $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('application_index');
        }

        return $this->render('application/edit.html.twig', [
            'application' => $application,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="application_delete", methods={"POST"})
     */
    public function delete(Request $request, Application $application): Response
    {
        if ($this->isCsrfTokenValid('delete'.$application->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($application);
            $entityManager->flush();
        }

        return $this->redirectToRoute('application_index');
    }
}
