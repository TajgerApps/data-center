<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testGetFullName(): void
    {
        $customer = new Customer();
        $customer->setFirstname('John')->setLastname('Doe');
        $this->assertEquals('John Doe', $customer->getFullName());
        $customer->setFirstname('Bruce')->setLastname('Willis');
        $this->assertEquals('Bruce Willis', $customer->getFullName());
    }
}
