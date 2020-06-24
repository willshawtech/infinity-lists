<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository\Ebay\Exception;

use Willshaw\InfinityLists\Infrastructure\Repository\Ebay\EbayResponseErrorCollection;

class EbayResponseErrorException extends \RuntimeException
{
    /**
     * @var EbayResponseErrorCollection $errors
     */
    private EbayResponseErrorCollection $errors;

    /**
     * @param EbayResponseErrorCollection $errors
     * @return EbayResponseErrorException
     */
    public static function fromErrors(EbayResponseErrorCollection $errors) : EbayResponseErrorException
    {
        $exception = new self(sprintf('Errors in ebay response: %s', $errors->getErrorMessages()));
        $exception->errors = $errors;
        return $exception;
    }

    /**
     * @return EbayResponseErrorCollection
     */
    public function getErrors() : EbayResponseErrorCollection
    {
        return $this->errors;
    }
}