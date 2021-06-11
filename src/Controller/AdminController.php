<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Client;
use App\Entity\JobOffer;
use App\Entity\Application;
use App\Entity\InfoAdminCandidat;
use App\Entity\InfoAdminClient;
use App\Repository\UserRepository;
use App\Repository\ClientRepository;
use App\Repository\JobOfferRepository;
use App\Form\ClientType;
use App\Form\JobOfferType;
use App\Form\JobCategoryType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    /**
     * @isGranted("ROLE_ADMIN")
     * @Route("/admin", name="admin")
     */
    public function index(JobOfferRepository $jobOfferRepository, ClientRepository $customerRepository): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class);

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'user' => $this->getUser(),
            'users' => $user->findAll(),
            'job_offers' => $jobOfferRepository->findAll(),
            'customers' => $customerRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("admin/client/new", name="clientNew", methods={"GET","POST"})
     */
    public function new(Request $request): Response //NEW CUSTOMER
    {
        $client = new Client();
        $date = new \DateTime();
        $client-> setCreatedAt($date);
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('customerlist');
        }

        return $this->render('admin/clientNew.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("admin/offer/new", name="offerNew", methods={"GET","POST"})
     */
    public function newOffre(Request $request): Response
    {
        $offer = new JobOffer();
        $date = new \DateTime();
        $offer-> setCreatedAt($date);
        $form = $this->createForm(JobOfferType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offer);
            $entityManager->flush();

            return $this->redirectToRoute('offerList');
        }

        return $this->render('admin/offerNew.html.twig', [
            'offer' => $offer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @isGranted("ROLE_ADMIN")
     * @Route("admin/userlist", name="userlist")
     */
    public function usersList(UserRepository $user)
    {
        $user= $this->getDoctrine()->getRepository(User::class);

        return $this->render('admin/listUser.html.twig', [
            'users' => $user->findAll(),
            'user' => $this->getUser()
        ]);
    }

      /**
     * @isGranted("ROLE_ADMIN")
     * @Route("admin/customerList", name="customerList")
     */
    public function customerList(ClientRepository $customer)
    {
        $customer= $this->getDoctrine()->getRepository(Client::class);

        return $this->render('admin/listCustomer.html.twig', [
            'clients' => $customer->findAll(),
            // 'user' => $this->getUser()
        ]);
    }

     /**
     * @isGranted("ROLE_ADMIN")
     * @Route("admin/applicationList", name="applicationList")
     */
    public function applicationList()
    {
        $application = $this->getDoctrine()->getRepository(Application::class);
        $candidate = $this->getDoctrine()->getRepository(User::class);
        $customer = $this->getDoctrine()->getRepository(Client::class);
        $offer = $this->getDoctrine()->getRepository(JobOffer::class);

        return $this->render('admin/listApplication.html.twig', [
            'applications' => $application->findAll(),
            'candidates' => $candidate->findAll(),
            'clients' => $customer->findAll(),
            'offers' => $offer->findAll(),
            // 'user' => $this->getUser()
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("admin/offerList", name="offerList")
     */
    public function offerList(Request $request, JobOfferRepository $jobOfferRepository, PaginatorInterface $paginator)
    {

        // $infoAdminRepository = $this->getDoctrine()->getRepository(InfoAdminClient::class);
        // $infoAdmin = $infoAdminRepository->findOneBy(['id'=> $client->getInfoAdminClient()]);

        $offers = $jobOfferRepository->findAll();

        $offers = $paginator->paginate(
            $offers, /* query NOT result */// REQUEST CONTAINS DATA TO PAGINATE (OFFRES)
            $request->query->getInt('page', 1),// NUM PAGE EN COURS(URL) OU 1 SI AUCUNE PAGE
            5 // NUM DE RESULT PAR PAGE
        );

        return $this->render('admin/listOffer.html.twig', [
            'job_offers' => $offers,
            // 'info_admin'=>$infoAdmin,
            // 'clients' => $client
            /*'user'=>$this->getUser()*/
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("admin/admin_user_show/{id}", name="admin_user_show", methods={"GET"})
     */
    public function showUser(User $user): Response
    {
        $infoAdminRepository = $this->getDoctrine()->getRepository(InfoAdminCandidat::class);
        $infoAdminUser = $infoAdminRepository->findOneBy(['id'=> $user->getInfoAdminCandidat()]);

        //renvoi true ou false si une note est deja créer
        return $this->render('admin/showUser.html.twig', [
            'user' => $user,
            'info_admin'=>$infoAdminUser
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("admin/admin_customer_show/{id}", name="admin_customer_show", methods={"GET"})
     */
    public function showCustomer(Client $client): Response
    {
        $infoAdminRepository = $this->getDoctrine()->getRepository(InfoAdminClient::class);
        $infoAdminClient = $infoAdminRepository->findOneBy(['id'=> $client->getInfoAdminClient()]);
        
        return $this->render('admin/showCustomer.html.twig', [
            'user' => $this->getUser(),
            'info_admin_client'=>$infoAdminClient,
            'client' => $client
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("admin/admin_application_show/{id}", name="admin_application_show", methods={"GET"})
     */
    public function showApplication(Application $application): Response
    {
        
        return $this->render('admin/showApplication.html.twig', [
            'id' => $application->getId(),
            'user' =>$this->getUser(),
            'application' => $application,
            'infoCustomer' => $application->getOffer()->getClient()->getSocietyName(),
            'firstName' => $application->getUser()->getFirstName(),
            'title' => $application->getOffer()->getTitleJob(),
            'email' => $application->getUser()->getEmail(),
            'contactName' => $application->getOffer()->getClient()->getNameContact(),
            'contactMail' => $application->getOffer()->getClient()->getMailContact()
        ]);
    }

}