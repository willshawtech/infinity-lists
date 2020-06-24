<?php

namespace Willshaw\InfinityLists\Infrastructure\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use \DTS\eBaySDK\Shopping\Services;
use \DTS\eBaySDK\Shopping\Types;

class EbayTimeCommand extends Command
{
    /**
     * @desc The name of the command (the part after "bin/console")
     * @var string
     */
    protected static $defaultName = 'app:ebay-time';

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Create the service object.
        $service = new Services\ShoppingService();

        // Create the request object.
        $request = new Types\GeteBayTimeRequestType();

        // Send the request to the service operation.
        $response = $service->geteBayTime($request);
        $time = $response->Timestamp->format('H:i (\G\M\T) l jS Y');
        // Output the result of calling the service operation.
        $output->writeln(sprintf("The official eBay time is: %s", $time));

        return 0;
    }
}