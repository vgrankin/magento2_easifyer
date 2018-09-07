<?php
/**
 *  @author Phpcoder
 *  @copyright Copyright (c) 2018 Phpcoder (https://github.com/vgrankin)
 *  @package Phpcoder_Easifyer
 */

namespace Phpcoder\Easifyer\Plugin\Checkout;

use Magento\Checkout\Block\Checkout\LayoutProcessor;

/**
 * Class LayoutProcessorPlugin
 * @package Phpcoder\Easifyer\Plugin\Checkout
 */
class LayoutProcessorPlugin
{
    /**
     * @param LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        LayoutProcessor $subject,
        array $jsLayout
    )
    {
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['before-form']['children']['custom-shipping-step-fields']['children']['external_order_id_field'] = [
            'component' => "Magento_Ui/js/form/element/abstract",
            'config' => [
                'customScope' => 'customShippingStepFields',
                'template' => 'ui/form/field',
                'elementTmpl' => "ui/form/element/input",
                'id' => "external_order_id_field"
            ],
            'dataScope' => 'customShippingStepFields.custom_shipping_field[external_order_id_field]',
            'label' => "External Order ID",
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [
                'required-entry' => false,
                'min_text_len‌​gth' => 1,
                'max_text_length' => 40
            ],
            'sortOrder' => 10,
            'id' => 'custom_shipping_field[external_order_id_field]'
        ];

        return $jsLayout;
    }
}
