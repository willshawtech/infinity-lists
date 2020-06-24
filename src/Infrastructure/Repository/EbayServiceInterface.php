<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository;

interface EbayServiceInterface
{
    /**
     * @return EbaySellerResponseInterface[]
     */
    public function getSellerItems() : array;
}
