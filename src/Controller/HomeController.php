<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JobOfferRepository;

use App\Repository\JobCategoryRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(JobOfferRepository $jobOfferRepository, JobCategoryRepository $jobCategoryRepository): Response
    {

        $lastTenOffer = $jobOfferRepository->findByTenLastOffer();

        $allJobCategory = $jobCategoryRepository->findAll();

        $user = $this->getUser();

        if ($user instanceof User) {
            $completedProfile = $user->getCompletedProfile();
        }
        else {
            $completedProfile = null;
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'user' => $user,
            'lastTen' => $lastTenOffer,
            'categories' => $allJobCategory,
            'completedProfile' => $completedProfile
        ]);
    }

    /**
     * @Route("about_us", name="about_us")
     */
    public function aboutUs(): Response
    {

        $user = $this->getUser();

        return $this->render('home/aboutUs.html.twig', [
            'user' => $user,
        ]);
    }

     /**
     * @Route("contact", name="contact")
     */
    public function contact(): Response
    {

        $user = $this->getUser();

        return $this->render('home/contact.html.twig', [
            'user' => $user,
        ]);
    }

}