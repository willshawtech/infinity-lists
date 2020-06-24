<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository\Ebay;

class EbayResponseErrorCollection
{
    /**
     * @var array
     */
    private array $errors;

    /**
     * @param EbayResponseError $error
     */
    public function addError(EbayResponseError $error)
    {
        $this->errors[] = $error;
    }

    /**
     * @return string
     */
    public function getErrorMessages() : string
    {
        $message = '';
        /** @var EbayResponseError $error */
        foreach ($this->errors as $error) {
            $message .= "\n" . $error->getErrorMessage();
        }
        return $message;
    }

    /**
     * @return bool
     */
    public function hasErrors() : bool
    {
        return !empty($this->errors);
    }

}