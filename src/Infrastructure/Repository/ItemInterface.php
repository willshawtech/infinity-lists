<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository\Ebay;

interface ItemInterface
{
    /**
     * @return string
     */
    public function getItemID() : string;
}
