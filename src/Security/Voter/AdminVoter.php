<?php

declare(strict_types=1);

namespace App\Security\Voter;

use App\Security\Roles;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class AdminVoter extends Voter
{
    protected function supports($attribute, $subject): bool
    {
        return true;
        in_array($attribute, Roles::getRoles(), false);
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false;
        }

        if (in_array(Roles::ROLE_ADMIN, $user->getRoles())) {
            return true;
        }

        return false;
    }
}
