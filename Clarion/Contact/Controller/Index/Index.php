<?php

/**
 * Copyright © 2016 Clarion Technologies. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Clarion\Contact\Controller\Index;

use Clarion\Contact\Helper\Data;

/**
 * Google Map Index Controller Class
 */
class Index extends \Magento\Framework\App\Action\Action {

    /**
     * @var viewHelper
     */
    protected $viewHelper;

    /**
     * Construct
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Clarion\Contact\Helper\Data $viewHelper     
     */
    public function __construct(
    \Magento\Framework\App\Action\Context $context, \Clarion\Contact\Helper\Data $viewHelper, \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->viewHelper = $viewHelper;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Prepare and Render Layout of Page
     *
     * @return Object
     */
    public function execute() {
        $page = $this->resultPageFactory->create(false, ['isIsolated' => true]);
        $this->viewHelper->prepareAndRender($page, $this);
        return $page;
    }

}

?>