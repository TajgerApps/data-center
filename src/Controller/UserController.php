<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Security\Roles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function index(): Response
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'users' => $users,
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $errors = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('user/login.html.twig', [
            'errors' => $errors,
            'username' => $lastUsername,
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(): Response
    {
        return new Response();
    }

    /**
     * @Route("/user/add", name="addUser")
     */
    public function add(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, Session $session, Security $security)
    {
        $this->denyAccessUnlessGranted(Roles::ROLE_ADMIN);

        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = new User($form->get('username')->getData(), $form->get('email')->getData(), $form->get('role')->getData());
            $password = $passwordEncoder->encodePassword($user, $form->get('password')->getData());
            $user->setPassword($password);
            $user->setCreatedAt(new \DateTime());
            $user->setCreatedBy($security->getUser()->getId());
            $user->setModifiedAt(new \DateTime());
            $user->setModifiedBy($security->getUser()->getId());
            try {
                $entityManager->persist($user);
                $entityManager->flush();
                $session->getFlashBag()->add('success', sprintf('Account %s has been created!', $user->getUsername()));

                return $this->redirectToRoute('/user');
            } catch (UniqueConstraintViolationException $exception) {
                $session->getFlashBag()->add('danger', 'Email and username has to be unique');
            }
        }

        return $this->render('user/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/{id}/edit", name="editUser")
     */
    public function edit(int $id, Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, Session $session, Security $security): Response
    {
        $this->denyAccessUnlessGranted(Roles::ROLE_ADMIN);

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['id' => $id]);

        $form = $this->createForm(UserType::class, $user, ['require_password' => false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setUsername($form->get('username')->getData());
            $user->setEmail($form->get('email')->getData());
            $user->setRole($form->get('role')->getData());
            $user->setPassword($passwordEncoder->encodePassword($user, $form->get('password')->getData()));
            $user->setModifiedAt(new \DateTime());
            $user->setModifiedBy($security->getUser()->getId());
            try {
                $entityManager->persist($user);
                $entityManager->flush();
                $session->getFlashBag()->add('success', sprintf('Account %s has been edited!', $user->getUsername()));

                return $this->redirectToRoute('listUser');
            } catch (UniqueConstraintViolationException $exception) {
                $session->getFlashBag()->add('danger', 'Email and username has to be unique');
            }
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/{id}/delete", name="deleteUser")
     */
    public function delete(int $id, EntityManagerInterface $entityManager, Session $session): Response
    {
        $this->denyAccessUnlessGranted(Roles::ROLE_ADMIN);

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['id' => $id]);

        try {
            $entityManager->remove($user);
            $entityManager->flush();
            $session->getFlashBag()->add('success', sprintf('Account %s has been deleted!', $user->getUsername()));
        } catch (UniqueConstraintViolationException $exception) {
            $session->getFlashBag()->add('danger', 'Account doesn\'t exists');
        }

        return $this->redirectToRoute('listUser');
    }
}
