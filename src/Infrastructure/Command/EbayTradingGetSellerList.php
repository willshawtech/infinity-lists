<?php
namespace Willshaw\InfinityLists\Infrastructure\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Willshaw\InfinityLists\Domain\Repository\EbayRepositoryInterface;
use Willshaw\InfinityLists\Infrastructure\Queue\PublisherInterface;

class EbayTradingGetSellerList extends Command
{
    /**
     * @var EbayRepositoryInterface
     */
    private EbayRepositoryInterface $ebayRepository;

    /**
     * @var PublisherInterface
     */
    private PublisherInterface $publisher;

    /**
     * The name of the command (the part after "bin/console")
     * @var string
     */
    protected static $defaultName = 'app:ebay-get-list';

    /**
     * @param EbayRepositoryInterface $ebayRepository
     * @param PublisherInterface $publisher
     */
    public function __construct(EbayRepositoryInterface $ebayRepository, PublisherInterface $publisher)
    {
        parent::__construct();
        $this->ebayRepository = $ebayRepository;
        $this->publisher = $publisher;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach($this->ebayRepository->getAllProducts() as $product) {
            $this->publisher->publish(json_encode([
                'id' => $product->itemId,
                'title' => $product->title
            ]));
        }
        return 0;
    }
}