<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use App\Security\Roles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures.
 */
class UserFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;

    private $entityManager;

    /**
     * UserFixtures constructor.
     *
     * @param UserPasswordEncoderInterface $encoder Password encoder instance
     */
    public function __construct(UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager)
    {
        $this->encoder = $encoder;
        $this->entityManager = $entityManager;
    }

    /**
     * @param ObjectManager $manager Object manager instance
     */
    public function load(ObjectManager $manager): void
    {
        $user = new User('admin', 'user@test.com', Roles::ROLE_CUSTOMER);
        $password = $this->encoder->encodePassword($user, 'passwd');
        $user->setPassword($password);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
