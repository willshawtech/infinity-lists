<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository\Ebay;

use Willshaw\InfinityLists\Infrastructure\Repository\ItemInterface;

class EbayItem implements ItemInterface
{
    /**
     * @var string
     */
    private string $itemId;

    /**
     * @var string
     */
    private string $title;

    /**
     * @param string $itemId
     * @param string $title
     */
    public function __construct(string $itemId, string $title)
    {
        $this->itemId = $itemId;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getItemID(): string
    {
        return $this->itemId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
