<?php

namespace Willshaw\InfinityLists\Domain\Repository;

use Willshaw\InfinityLists\Domain\Entity\EbayProduct;

interface EbayRepositoryInterface
{
    /**
     * @return EbayProduct[]
     */
    public function getAllProducts();
}
