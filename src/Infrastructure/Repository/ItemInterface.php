<?php

namespace Willshaw\InfinityLists\Infrastructure\Repository;

interface ItemInterface
{
    /**
     * @return string
     */
    public function getItemID() : string;

    /**
     * @return string
     */
    public function getTitle() : string;
}
