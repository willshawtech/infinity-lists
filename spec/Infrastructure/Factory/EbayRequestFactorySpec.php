<?php

namespace spec\Willshaw\InfinityLists\Infrastructure\Factory;

use PhpSpec\ObjectBehavior;
use Willshaw\InfinityLists\Infrastructure\Factory\EbayRequestFactory;

class EbayRequestFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EbayRequestFactory::class);
    }

    function it_should_create_a_request_to_get_products_from_maritime_scientific()
    {
        $this->getMaritimeScientificProductsRequest()
            ->shouldBeAnInstanceOf('DTS\eBaySDK\Trading\Types\GetSellerListRequestType');
    }
}
