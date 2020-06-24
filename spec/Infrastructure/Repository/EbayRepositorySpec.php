<?php

namespace spec\Willshaw\InfinityLists\Infrastructure\Repository;

use PhpSpec\ObjectBehavior;
use Willshaw\InfinityLists\Infrastructure\Factory\EbayProductFactory;
use Willshaw\InfinityLists\Infrastructure\Repository\EbayRepository;
use Willshaw\InfinityLists\Infrastructure\Repository\EbaySellerResponseInterface;
use Willshaw\InfinityLists\Infrastructure\Repository\EbayServiceInterface;
use Willshaw\InfinityLists\Infrastructure\Repository\ItemInterface;

class EbayRepositorySpec extends ObjectBehavior
{
    function let(
        EbayServiceInterface $ebayService,
        EbayProductFactory $productFactory,
        EbaySellerResponseInterface $response,
        ItemInterface $item
    ) {
        $ebayService->getSellerItems()->willReturn([$response]);
        $response->getItems()->willReturn([$item]);
        $this->beConstructedWith($ebayService, $productFactory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(EbayRepository::class);
    }

    function it_gets_an_array_of_ebay_product_entities()
    {
        $products = $this->getAllProducts();
        $products->shouldBeArray();
        $products->shouldHaveCount(1);
        foreach($products as $product) {
            $product->shouldBeAnInstanceOf('Willshaw\InfinityLists\Domain\Entity\EbayProduct');
        }
    }
}
