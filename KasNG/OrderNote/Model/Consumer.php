<?php

namespace KasNG\OrderNote\Model;

use Magento\Framework\MessageQueue\ConsumerConfiguration;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Consumer used to process OperationInterface messages.
 */
class Consumer
{
    public function __construct(
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        ScopeConfigInterface $scopeConfig
    ) {

        $this->orderRepository = $orderRepository;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * consumer process start
     * @param $request
     * @throws \Exception
     */
    public function process($request)
    {
        $order = $this->orderRepository->get($request);
        $enable = $this->scopeConfig->getValue('ordernote/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if (intval($enable) === 1) {
            $configNote = $this->scopeConfig->getValue('ordernote/general/custom_note', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $order->setCustomNote($configNote);
            $order->save();
        }
    }
}
