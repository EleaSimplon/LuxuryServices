<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
// USES FOR UPLOADED FILES
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
            'id' => $this->getUser()->getId()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user, UserPasswordEncoderInterface $passwordEncoder,SluggerInterface $slugger): Response
    {
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        $dataCandidat = $user->toArray();
        $dataLength = count($dataCandidat);

        if ($form->isSubmitted() && $form->isValid()) {
       
            $photo = $form->get('photo')->getData();
            $cv = $form->get('cv')->getData();
            $passport = $form->get('passport')->getData();
            $newPassword = $form->get('password')->getData();

            

            if ($photo !== null) {
                $newFilename = $this->upload($photo, 'photo_directory', $slugger);
                $user->setPhoto($newFilename);
            }
            if ($cv !== null) {
                $newFilename = $this->upload($cv, 'cv_directory', $slugger);
                $user->setCv($newFilename);
            }
            if ($passport !== null) {
                $newFilename = $this->upload($passport, 'passport_directory', $slugger);
                $user->setPassport($newFilename);
            }

            if ($dataLength === 15){
                $user->setCompletedProfile(1);
            }


            //verifier si on modifie le password > encorder la pssword avant l'enregistrement en bdd

            if ($newPassword !== null){
                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $newPassword
                    )
                );
            }
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', [
                'id' => $this->getUser()->getId(),
            ]);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'dataCandidat' => $dataCandidat,
            'dataLength' => $dataLength,
            'completedProfile' => $user->getCompletedProfile()
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    public function upload($file, $targetDirectory, $slugger)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {

            $file->move(
                $this->getParameter($targetDirectory),
                $newFilename
            );
            return $newFilename;
        } catch (FileException $e) {
            throw new \Exception($e->getMessage());
            // ... handle exception if something happens during file upload
        }

    }

}
