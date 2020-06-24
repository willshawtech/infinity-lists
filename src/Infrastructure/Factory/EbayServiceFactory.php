<?php

namespace Willshaw\InfinityLists\Infrastructure\Factory;

use DTS\eBaySDK\Constants\SiteIds;
use DTS\eBaySDK\Trading\Services\TradingService;

class EbayServiceFactory
{
    /**
     * @var string
     */
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return TradingService
     */
    public function getTradingService() : TradingService
    {
        return new TradingService([
            'siteId' => SiteIds::GB,
            'authToken' => $this->token
        ]);
    }
}
