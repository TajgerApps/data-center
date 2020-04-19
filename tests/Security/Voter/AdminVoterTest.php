<?php

declare(strict_types=1);

namespace App\Tests\Security\Voter;

use App\Security\Voter\AdminVoter;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class AdminVoterTest extends TestCase
{
    public AdminVoter $voter;

    public function setUp(): void
    {
        $this->voter = new AdminVoter();
    }

    public function testCreateInstance(): void
    {
        $this->assertInstanceOf(AdminVoter::class, $this->voter);
    }

    public function testVoterResultsInstance(): void
    {
        $this->markTestSkipped();

        $user = $this->getMockBuilder(TokenInterface::class)
            ->onlyMethods(['getRoles'])
            ->setMockClassName('User')->getMock();
        $user->method('getRoles')->willReturn('ROLE_ADMIN');
        $this->voter->vote($user);
    }
}
