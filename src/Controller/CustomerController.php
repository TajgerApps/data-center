<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerType;
use App\Hydrator\CustomerHydrator;
use App\Security\Roles;
use Doctrine\DBAL\Exception\ConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customers", name="customers")
     */
    public function index()
    {
        $customers = $this->getDoctrine()->getRepository(Customer::class)->findAll();

        return $this->render('customer/index.html.twig', [
            'customers' => $customers,
        ]);
    }

    /**
     * @Route("/customer/add", name="addCustomer")
     */
    public function add(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, Session $session, Security $security): Response
    {
        $form = $this->createForm(CustomerType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                /**
                 * @var Customer $customer
                 */
                $customer = $form->getData();
                $customer->setCreatedAt(new \DateTime());
                $customer->setCreatedBy($security->getUser()->getId());
                $customer->setModifiedAt(new \DateTime());
                $customer->setModifiedBy($security->getUser()->getId());

                $entityManager->persist($customer);
                $entityManager->flush();
                $session->getFlashBag()->add('success', sprintf('Account %s has been created!', $customer->getFullName()));

                return $this->redirectToRoute('customers');
            } catch (ConstraintViolationException $exception) {
                $session->getFlashBag()->add('danger', $exception->getMessage());
            }
        }

        return $this->render('customer/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/customer/{id}/delete", name="deleteCustomer")
     */
    public function delete(int $id, EntityManagerInterface $entityManager, Session $session): Response
    {
        $this->denyAccessUnlessGranted(Roles::ROLE_ADMIN);

        $customer = $this->getDoctrine()
            ->getRepository(Customer::class)
            ->findOneBy(['id' => $id]);

        try {
            $entityManager->remove($customer);
            $entityManager->flush();
            $session->getFlashBag()->add('success', sprintf('Account %s has been deleted!', $customer->getFullname()));
        } catch (UniqueConstraintViolationException $exception) {
            $session->getFlashBag()->add('danger', 'Account doesn\'t exists');
        }

        return $this->redirectToRoute('customers');
    }
}
