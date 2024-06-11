<?php

namespace Unit\Entity;

use App\Entity\Survey;
use App\Tests\Factory\SurveyFactory;
use Coduo\PHPMatcher\PHPUnit\PHPMatcherAssertions;
use PHPUnit\Framework\TestCase;

final class SurveyTest extends TestCase
{
    use PHPMatcherAssertions;

    public function testGetters(): void
    {
        $panelist = new Survey();
        $panelist->setName(SurveyFactory::NAME);
        $panelist->setActive(SurveyFactory::ACTIVE);

        $this->assertSame(SurveyFactory::NAME, $panelist->getName());
        $this->assertSame(SurveyFactory::ACTIVE, $panelist->getActive());
    }

}
