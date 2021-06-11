<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Entity\User;
use App\Entity\Application;
use App\Form\JobOfferType;
use App\Repository\JobOfferRepository;
use App\Repository\JobCategoryRepository;
use App\Repository\ApplicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/job/offer")
 */
class JobOfferController extends AbstractController
{
    /**
     * @Route("/", name="job_offer_index", methods={"GET"})
     */
    public function index(JobOfferRepository $jobOfferRepository, JobCategoryRepository $jobCategoryRepository): Response
    {
        $user = $this->getUser();

        $allJobCategory = $jobCategoryRepository->findAll();

        if ($user instanceof User) {
            $completedProfile = $user->getCompletedProfile();
        }
        else {
            $completedProfile = null;
        }

        return $this->render('job_offer/index.html.twig', [
            'job_offers' => $jobOfferRepository->findAll(),
            'user' => $user,
            'categories' => $allJobCategory,
            'completedProfile' => $completedProfile
        ]);
    }

    /**
     * @Route("/new", name="job_offer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $jobOffer = new JobOffer();
        $form = $this->createForm(JobOfferType::class, $jobOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jobOffer);
            $entityManager->flush();

            return $this->redirectToRoute('job_offer_index');
        }

        return $this->render('job_offer/new.html.twig', [
            'job_offer' => $jobOffer,
            'form' => $form->createView(),
            'completedProfile' => $this->getUser()->getCompletedProfile()
        ]);
    }

    /**
     * @Route("/{id}", name="job_offer_show", methods={"GET"})
     */
    public function show(JobOffer $jobOffer, ApplicationRepository $applicationRepository, JobOfferRepository $jobOfferRepository): Response
    {
        $user = $this->getUser();

        if ($user instanceof User) {
            $completedProfile = $user->getCompletedProfile();
        }else {
            $completedProfile = null;
        }

        $candidacyExist = $applicationRepository->findOneBy(array('offer' => $jobOffer->getId()));

        $allOffer = $jobOfferRepository->findAll();
        $countOffer = count($allOffer);

        $indexOffer = array_search($jobOffer, $allOffer, true);

        if (!$indexOffer) {
            $oneOfferIdPrevious = $allOffer[$countOffer-1];
        }else {
                $oneOfferIdPrevious = $allOffer[$indexOffer-1];
            }

        if ($indexOffer === $countOffer-1){
            $oneOfferIdNext = $allOffer[0];
        }else {
                $oneOfferIdNext = $allOffer[$indexOffer+1];
            }

        return $this->render('job_offer/show.html.twig', [
            'job_offer' => $jobOffer,
            'completedProfile' => $completedProfile,
            'candidacyExist' => $candidacyExist,
            'oneOfferIdNext' => $oneOfferIdNext,
            'oneOfferIdPrevious' =>$oneOfferIdPrevious
        ]);
    }

    /**
     * @Route("/{id}/edit", name="job_offer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, JobOffer $jobOffer): Response
    {
        $form = $this->createForm(JobOfferType::class, $jobOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('job_offer_index');
        }

        return $this->render('job_offer/edit.html.twig', [
            'job_offer' => $jobOffer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="job_offer_delete", methods={"POST"})
     */
    public function delete(Request $request, JobOffer $jobOffer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jobOffer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($jobOffer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('job_offer_index');
    }
}
