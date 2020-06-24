<?php

namespace Willshaw\InfinityLists\Infrastructure\Queue;

interface PublisherInterface
{
    /**
     * @param string $message
     * @return void
     */
    public function publish(string $message);
}