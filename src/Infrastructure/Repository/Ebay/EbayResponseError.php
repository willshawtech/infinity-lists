<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository\Ebay;

use DTS\eBaySDK\Trading\Types\ErrorType;

class EbayResponseError
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
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->error->ShortMessage;
    }
}