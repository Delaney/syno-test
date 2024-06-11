<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Panelist;
use App\Tests\Factory\PanelistFactory;
use Coduo\PHPMatcher\PHPUnit\PHPMatcherAssertions;
use PHPUnit\Framework\TestCase;

final class PanelistTest extends TestCase
{
    use PHPMatcherAssertions;

    public function testGetters(): void
    {
        $panelist = new Panelist();
        $panelist->setFirstName(PanelistFactory::FIRST_NAME);
        $panelist->setLastName(PanelistFactory::LAST_NAME);
        $panelist->setEmail(PanelistFactory::EMAIL);
        $panelist->setPhone(PanelistFactory::PHONE);
        $panelist->setCountry(PanelistFactory::COUNTRY);
        $panelist->setReceiveNewsletters(PanelistFactory::RECEIVE_NEWSLETTERS);

        $this->assertSame(PanelistFactory::FIRST_NAME, $panelist->getFirstName());
        $this->assertSame(PanelistFactory::LAST_NAME, $panelist->getLastName());
        $this->assertSame(PanelistFactory::EMAIL, $panelist->getEmail());
        $this->assertSame(PanelistFactory::PHONE, $panelist->getPhone());
        $this->assertSame(PanelistFactory::COUNTRY, $panelist->getCountry());
        $this->assertSame(PanelistFactory::RECEIVE_NEWSLETTERS, $panelist->getReceiveNewsletters());
    }

}
