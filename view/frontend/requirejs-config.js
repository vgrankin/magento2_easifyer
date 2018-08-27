/**
 *  @author Phpcoder
 *  @copyright Copyright (c) 2018 Phpcoder (https://github.com/vgrankin)
 *  @package Phpcoder_Easifyer
 */

var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/view/shipping': {
                'Phpcoder_Easifyer/js/view/shipping': true
            }
        }
    },
    "map": {
        "*": {
            "Magento_Checkout/js/model/shipping-save-processor/default" : "Phpcoder_Easifyer/js/shipping-save-processor"
        }
    }
};