<?php

namespace spec\Willshaw\InfinityLists\Infrastructure\Factory;

use PhpSpec\ObjectBehavior;
use Willshaw\InfinityLists\Infrastructure\Factory\EbayProductFactory;

class EbayProductFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EbayProductFactory::class);
    }

}
