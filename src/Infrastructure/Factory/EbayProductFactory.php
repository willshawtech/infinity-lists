<?php

namespace Willshaw\InfinityLists\Infrastructure\Factory;

use Willshaw\InfinityLists\Domain\Entity\EbayProduct;
use Willshaw\InfinityLists\Infrastructure\Repository\ItemInterface;

class EbayProductFactory
{
    /**
     * @param ItemInterface $item
     * @return EbayProduct
     */
    public function createFromItem(ItemInterface $item)
    {
        return new EbayProduct(
            $item->getItemID(),
            $item->getTitle()
        );
    }
}