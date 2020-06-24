<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository;

use Willshaw\InfinityLists\Infrastructure\Repository\Ebay\EbayResponseErrorCollection;

interface EbaySellerResponseInterface
{
    /**
     * @return ItemInterface[]
     */
    public function getItems() : array;

    /**
     * @return EbayResponseErrorCollection
     */
    public function getErrors() : EbayResponseErrorCollection;

    /**
     * @return int
     */
    public function getTotalNumberOfPages() : int;
}
