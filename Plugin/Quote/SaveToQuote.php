<?php
/**
 *  @author Phpcoder
 *  @copyright Copyright (c) 2018 Phpcoder (https://github.com/vgrankin)
 *  @package Phpcoder_Easifyer
 */

namespace Phpcoder\Easifyer\Plugin\Quote;

use Magento\Quote\Model\QuoteRepository;

/**
 * Class SaveToQuote
 * @package Phpcoder\Easifyer\Plugin\Quote
 */
class SaveToQuote
{
    /**
     * @var QuoteRepository
     */
    protected $quoteRepository;

    /**
     * SaveToQuote constructor.
     * @param QuoteRepository $quoteRepository
     */
    public function __construct(
        QuoteRepository $quoteRepository
    ) {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param \Magento\Checkout\Model\ShippingInformationManagement $subject
     * @param $cartId
     * @param \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    ) {
        if(!$extAttributes = $addressInformation->getExtensionAttributes())
            return;

        $quote = $this->quoteRepository->getActive($cartId);

        $quote->setExternalOrderIdField($extAttributes->getExternalOrderIdField());
    }
}