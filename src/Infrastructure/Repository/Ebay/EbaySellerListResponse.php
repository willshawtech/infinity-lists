<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository\Ebay;

use DTS\eBaySDK\Trading\Types\GetSellerListResponseType;
use Willshaw\InfinityLists\Infrastructure\Repository\Ebay\Exception\EbayResponseErrorException;
use Willshaw\InfinityLists\Infrastructure\Repository\Ebay\Exception\EbayResponseException;
use Willshaw\InfinityLists\Infrastructure\Repository\EbaySellerResponseInterface;
use Willshaw\InfinityLists\Infrastructure\Repository\ItemInterface;

class EbaySellerListResponse implements EbaySellerResponseInterface
{
    private GetSellerListResponseType $ebayResponse;

    public function __construct(GetSellerListResponseType $ebayResponse)
    {
        $this->ebayResponse = $ebayResponse;
    }

    /**
     * @throws EbayResponseErrorException
     * @throws EbayResponseException
     * @return bool
     */
    public function validateResponse()
    {
        $errors = $this->getErrors();

        if ($errors->hasErrors()) {
            throw EbayResponseErrorException::fromErrors($errors);
        }

        if ($this->ebayResponse->Ack === 'Failure' || !isset($this->ebayResponse->ItemArray->Item)) {
            var_dump($this->ebayResponse);die();
            throw new EbayResponseException('Response failed to Ack or missing payload');
        }

        if (!isset($this->ebayResponse->PaginationResult->TotalNumberOfPages)) {
            throw new EbayResponseException('Missing total number of pages from response');
        }

        return true;
    }

    /**
     * @return EbayResponseErrorCollection
     */
    public function getErrors(): EbayResponseErrorCollection
    {
        $errors = new EbayResponseErrorCollection();
        if (isset($this->ebayResponse->Errors)) {
            foreach ($this->ebayResponse->Errors as $error) {
                $errors->addError(new EbayResponseError($error));
            }
        }
        return $errors;
    }


    /**
     * @return ItemInterface[]
     */
    public function getItems(): array
    {
        $items = [];
        if ($this->validateResponse()) {
            foreach($this->ebayResponse->ItemArray->Item as $item) {
                $items[] = new EbayItem(
                    $item->ItemID,
                    $item->Title
                );
            }
        }
        return $items;
    }

    /**
     * @return int
     */
    public function getTotalNumberOfPages(): int
    {
        if ($this->validateResponse()) {
            return $this->ebayResponse->PaginationResult->TotalNumberOfPages;
        }
    }
}