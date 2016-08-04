<?php

/**
 * Copyright © 2016 Clarion Technologies. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Clarion\Contact\Model\Config\Source;

/**
 * Page Layout item model 
 */
class PageLayout implements \Magento\Framework\Option\ArrayInterface {

    /**
     * Page Layout Options
     * @return Array[]
     */
    public function toOptionArray() {
        return array(
            array('value' => '1column', 'label' => ('1 Column')),
            array('value' => '2columns-left', 'label' => ('2 columns Left Bar')),
            array('value' => '2columns-right', 'label' => ('2 columns Right Bar')),
            array('value' => '3columns', 'label' => ('3 Columns')),
            array('value' => 'empty', 'label' => ('Empty'))
        );
    }

}

?>