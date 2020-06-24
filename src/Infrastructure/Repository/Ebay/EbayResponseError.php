<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository\Ebay;

use DTS\eBaySDK\Trading\Types\ErrorType;

class EbayError
{
    /**
     * @var ErrorType
     */
    private ErrorType $error;

    /**
     * @param ErrorType $error
     */
    public function __construct(ErrorType $error)
    {
        $this->error = $error;
    }

    /**
     * @return ErrorType
     */
    public function getError(): ErrorType
    {
        return $this->error;
    }
}