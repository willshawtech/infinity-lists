<?php

namespace spec\Willshaw\InfinityLists\Infrastructure\Factory;

use PhpSpec\ObjectBehavior;
use Willshaw\InfinityLists\Infrastructure\Factory\EbayServiceFactory;

class EbayServiceFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('aToken');
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(EbayServiceFactory::class);
    }

    function it_should_create_a_trading_service()
    {
        $this->getTradingService()->shouldBeAnInstanceOf('DTS\eBaySDK\Trading\Services\TradingService');
    }
}
