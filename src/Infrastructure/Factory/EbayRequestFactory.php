<?php

namespace Willshaw\InfinityLists\Infrastructure\Factory;

use DTS\eBaySDK\Trading\Types\GetSellerListRequestType;
use DTS\eBaySDK\Trading\Types\PaginationType;

class EbayRequestFactory
{
    /**
     * @param int $pageNumber
     * @return GetSellerListRequestType
     */
    public function getMaritimeScientificProductsRequest(int $pageNumber = 1) : GetSellerListRequestType
    {
        return new GetSellerListRequestType([
            'UserID' => 'maritime-scientific',
            'StartTimeFrom' => new \DateTime('2020-05-19T15:03:01.012345Z'),
            'StartTimeTo' => new \DateTime('now'),
            'DetailLevel' => ['ItemReturnDescription'],
            'Pagination' => new PaginationType([
                'EntriesPerPage' => 5,
                'PageNumber' => $pageNumber
            ])
        ]);
    }
}