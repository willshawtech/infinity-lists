<?php

namespace Willshaw\InfinityLists\Domain\Entity;

class EbayProduct
{
    /**
     * @var string
     */
    public string $itemId;

    /**
     * @var string
     */
    public string $title;

    /**
     * @param string $itemId
     * @param string $title
     */
    public function __construct(string $itemId, string $title)
    {
        $this->itemId = $itemId;
        $this->title = $title;
    }


}
