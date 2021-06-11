<?php

namespace App\Controller;

use App\Entity\InfoAdminCandidat;
use App\Form\InfoAdminCandidatType;
use App\Repository\InfoAdminCandidatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\User;

/**
 * @Route("/info/admin/candidat")
 */
class InfoAdminCandidatController extends AbstractController
{
    /**
     * @Route("/", name="info_admin_candidat_index", methods={"GET"})
     */
    public function index(InfoAdminCandidatRepository $infoAdminCandidatRepository): Response
    {
        return $this->render('info_admin_candidat/index.html.twig', [
            'info_admin_candidats' => $infoAdminCandidatRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/new/{id}", name="info_admin_candidat_new", methods={"GET","POST"})
     */
    public function new(Request $request, User $user): Response
    {
        $infoAdminCandidat = new InfoAdminCandidat();
        $form = $this->createForm(InfoAdminCandidatType::class, $infoAdminCandidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infoAdminCandidat);
            $entityManager->flush();

            $user->setInfoAdminCandidat($infoAdminCandidat);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_user_show',[
                'id' => $user->getId()
            ]);
        }

        return $this->render('info_admin_candidat/new.html.twig', [
            'info_admin_candidat' => $infoAdminCandidat,
            'form' => $form->createView(),
            'user' => $user
        ]);
    }

    /**
     * @Route("/{id}", name="info_admin_candidat_show", methods={"GET"})
     */
    public function show(InfoAdminCandidat $infoAdminCandidat): Response
    {
        return $this->render('info_admin_candidat/show.html.twig', [
            'info_admin_candidat' => $infoAdminCandidat,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/{id}/edit", name="info_admin_candidat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfoAdminCandidat $infoAdminCandidat): Response
    {
        $form = $this->createForm(InfoAdminCandidatType::class, $infoAdminCandidat);
        $form->handleRequest($request);
 $userRepository = $this->getDoctrine()->getRepository(User::class);
            $user = $userRepository->findOneBy(['infoAdminCandidat'=>$infoAdminCandidat]);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

           

            return $this->redirectToRoute('admin_user_show',[
                'id'=>$user->getId()
            ]);
        }

        return $this->render('info_admin_candidat/edit.html.twig', [
            'info_admin_candidat' => $infoAdminCandidat,
            'form' => $form->createView(),
            'user' => $user
        ]);
    }

    /**
     * @Route("/{id}", name="info_admin_candidat_delete", methods={"POST"})
     */
    public function delete(Request $request, InfoAdminCandidat $infoAdminCandidat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infoAdminCandidat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infoAdminCandidat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('info_admin_candidat_index');
    }
}
