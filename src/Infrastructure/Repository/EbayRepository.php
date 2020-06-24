<?php
namespace Willshaw\InfinityLists\Infrastructure\Repository;

use Willshaw\InfinityLists\Domain\Entity\EbayProduct;
use Willshaw\InfinityLists\Domain\Repository\EbayRepositoryInterface;
use Willshaw\InfinityLists\Infrastructure\Factory\EbayProductFactory;

class EbayRepository implements EbayRepositoryInterface
{
    /**
     * @var EbayServiceInterface
     */
    private EbayServiceInterface $ebayService;

    /**
     * @var EbayProductFactory
     */
    private EbayProductFactory $productFactory;

    /**
     * @param EbayServiceInterface $ebayService
     * @param EbayProductFactory $productFactory
     */
    public function __construct(EbayServiceInterface $ebayService, EbayProductFactory $productFactory)
    {
        $this->ebayService = $ebayService;
        $this->productFactory = $productFactory;
    }

    /**
     * @return EbayProduct[]
     */
    public function getAllProducts()
    {
        $products = [];
        foreach($this->ebayService->getSellerItems() as $response) {
            foreach($response->getItems() as $item) {
                $products[] = $this->productFactory->createFromItem($item);
            }
        }
        return $products;
    }
}