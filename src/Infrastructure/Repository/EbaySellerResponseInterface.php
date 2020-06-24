<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository;

use Psr\Http\Message\ResponseInterface;
use Willshaw\InfinityLists\Infrastructure\Repository\Ebay\Exception\EbayEmptyResponseException;
use Willshaw\InfinityLists\Infrastructure\Repository\Ebay\Exception\EbayResponseErrorException;

interface EbaySellerResponseInterface
{
    /**
     * @return ItemInterface[]
     */
    public function getItems() : array;

    /**
     * @throws EbayResponseErrorException
     * @throws EbayEmptyResponseException
     * @return bool
     */
    public function checkError() : bool;

    /**
     * @return int
     */
    public function getTotalNumberOfPages() : int;
}
