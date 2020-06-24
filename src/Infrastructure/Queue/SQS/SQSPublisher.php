<?php

namespace Willshaw\InfinityLists\Infrastructure\Queue\SQS;

use Aws\Sqs\SqsClient;
use Willshaw\InfinityLists\Infrastructure\Queue\PublisherInterface;

class SQSPublisher implements PublisherInterface
{
    /**
     * @var SqsClient
     */
    private SqsClient $client;

    public function __construct()
    {
        //TODO inject with factory
        $this->client = new SqsClient([
            'profile' => 'default',
            'region' => 'us-east-2',
            'version' => '2012-11-05'
        ]);
    }

    /**
     * @param string $message
     */
    public function publish(string $message)
    {
        $params = [
            'MessageBody' => $message,
            'QueueUrl' => 'https://sqs.us-east-2.amazonaws.com/107716788880/clocks-ebay-products'
        ];
        $this->client->sendMessage($params);
    }
}