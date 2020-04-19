<?php

declare(strict_types=1);

namespace App\Tests\Generic;

use App\Hydrator\CustomerHydrator;
use PHPUnit\Framework\TestCase;

class CustomerHydratorTest extends TestCase
{
    public function testGenerateSetterName()
    {
        $this->assertEquals('setFirstname', CustomerHydrator::generateSetterName('firstname'));
        $this->assertEquals('setCompanyName', CustomerHydrator::generateSetterName('company_name'));
        $this->assertEquals('setShortCompanyName', CustomerHydrator::generateSetterName('short_company_name'));
    }

    public function testGenerateGetterName()
    {
        $this->assertEquals('getFirstname', CustomerHydrator::generateGetterName('firstname'));
        $this->assertEquals('getCompanyName', CustomerHydrator::generateGetterName('company_name'));
        $this->assertEquals('getShortCompanyName', CustomerHydrator::generateGetterName('short_company_name'));
    }
}
