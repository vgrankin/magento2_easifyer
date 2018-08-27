<?php
/**
 *  @author Phpcoder
 *  @copyright Copyright (c) 2018 Phpcoder (https://github.com/vgrankin)
 *  @package Phpcoder_Easifyer
 */

namespace Phpcoder\Easifyer\Observer;

/**
 * Class SaveCustomFieldsInOrder
 * @package Phpcoder\Easifyer\Observer
 */
class SaveCustomFieldsInOrder implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();

        $order->setData("external_order_id_field",$quote->getExternalOrderIdField());

        return $this;
    }
}