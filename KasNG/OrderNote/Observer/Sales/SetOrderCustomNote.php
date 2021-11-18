<?php

namespace KasNG\OrderNote\Observer\Sales;

use Magento\Framework\MessageQueue\PublisherInterface;

class SetOrderCustomNote implements \Magento\Framework\Event\ObserverInterface
{
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        PublisherInterface $publisher
    ) {
        $this->logger = $logger;
        $this->publisher = $publisher;
    }

    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        $order = $observer->getData('order');
        // $order->setCustomNote("Lorem ipsum test order note");
        // $order->save();
        // Add order into queue
        $this->publisher->publish('custom.ordernote', $order->getId());
    }
}
