<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository\Ebay;

use DTS\eBaySDK\Trading\Services\TradingService;
use Willshaw\InfinityLists\Infrastructure\Factory\EbayRequestFactory;
use Willshaw\InfinityLists\Infrastructure\Repository\EbaySellerResponseInterface;
use Willshaw\InfinityLists\Infrastructure\Repository\EbayServiceInterface;

class EbayService implements EbayServiceInterface
{
    /**
     * @var TradingService;
     */
    private TradingService $tradingService;

    /**
     * @var EbayRequestFactory
     */
    private EbayRequestFactory $requestFactory;

    /**
     * @param TradingService $tradingService
     * @param EbayRequestFactory $requestFactory
     */
    public function __construct(TradingService $tradingService, EbayRequestFactory $requestFactory)
    {
        $this->tradingService = $tradingService;
        $this->requestFactory = $requestFactory;
    }

    /**
     * @return EbaySellerResponseInterface[]
     */
    public function getSellerItems(): array
    {
        $responses = [];
        $pageNumber = 1;

        do {
            $response = new EbaySellerListResponse(
                $this->tradingService->getSellerList(
                    $this->requestFactory->getMaritimeScientificProductsRequest($pageNumber)
                )
            );

            $response->validateResponse();

            $responses[] = $response;

            $pageNumber++;

        } while ($pageNumber < $response->getTotalNumberOfPages());

        return $responses;
    }
}