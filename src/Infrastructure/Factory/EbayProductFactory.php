<?php

namespace Willshaw\InfinityLists\Infrastructure\Factory;

use Willshaw\InfinityLists\Domain\Entity\EbayProduct;
use Willshaw\InfinityLists\Infrastructure\Repository\ItemInterface;

class EbayEntityFactory
{
    public function createFromItem(ItemInterface $item)
    {
        return new EbayProduct($item->getItemID());
    }
}