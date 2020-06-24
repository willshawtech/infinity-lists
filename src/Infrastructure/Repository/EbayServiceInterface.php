<?php

namespace Willshaw\InfinityLists\Infrastructure\Service;

use Willshaw\InfinityLists\Infrastructure\Repository\Ebay\EbayResponseInterface;

interface EbayServiceInterface
{
    /**
     * @return EbayResponseInterface
     */
    public function getSellerItems() : EbayResponseInterface;
}
