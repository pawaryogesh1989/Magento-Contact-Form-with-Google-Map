<?php

/**
 * Copyright © 2016 Clarion Technologies. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Clarion\Contact\Helper;

use Magento\Framework\View\Result\Page as ResultPage;

/**
 * Google Map Data helper Class
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper {

    /**
     * @var ScopeConfig
     */
    protected $_scopeConfig;

    /**
     * @constant MAP_LONG, MAP_LATT, MAP_ADDRES, MAP_HEIGHT , MAP_MARKER , MAP_ENABLED, MAP_LAYOUT
     */
    CONST MAP_LONG = 'clarion_contact/general/map_long';
    CONST MAP_LATT = 'clarion_contact/general/map_latt';
    CONST MAP_ADDRES = 'clarion_contact/general/map_addres';
    CONST MAP_HEIGHT = 'clarion_contact/general/map_height';
    CONST MAP_MARKER = 'clarion_contact/general/map_marker';
    CONST MAP_ENABLED = 'clarion_contact/general/enable';
    CONST MAP_LAYOUT = 'clarion_contact/general/contact_layout';

    /**
     * Construct
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager     
     */
    public function __construct(\Magento\Framework\App\Helper\Context $context, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->_scopeConfig = $scopeConfig;
        $this->_storeManager = $storeManager;
    }

    /**
     * Get Longitude of Address
     *
     * @return Integer/Float
     */
    public function getMapLong() {
        return $this->_scopeConfig->getValue(self::MAP_LONG);
    }

    /**
     * Get Lattitude of Address
     *
     * @return Integer/Float
     */
    public function getMapLatt() {
        return $this->_scopeConfig->getValue(self::MAP_LATT);
    }

    /**
     * Get Address to display on Map
     *
     * @return string[]
     */
    public function getMapAddres() {
        return $this->_scopeConfig->getValue(self::MAP_ADDRES);
    }

    /**
     * Get Height of Map
     *
     * @return Integer
     */
    public function getMapHeight() {
        return $this->_scopeConfig->getValue(self::MAP_HEIGHT);
    }

    /**
     * Get Map Marker Image Icon
     *
     * @return URL
     */
    public function getMapMarker() {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . "/marker/" . $this->_scopeConfig->getValue(self::MAP_MARKER);
    }

    /**
     * Get Module Status
     *
     * @return Boolean
     */
    public function getMapEnabled() {
        return $this->_scopeConfig->getValue(self::MAP_ENABLED);
    }

    /**
     * Get Contact Page Layout
     *
     * @return String
     */
    public function getMapLayout() {
        return $this->_scopeConfig->getValue(self::MAP_LAYOUT);
    }

    /**
     * Get Store Config
     *
     * @return String
     */
    public function getStoreConfig($storePath) {
        $StoreConfig = $this->_scopeConfig->getValue($storePath, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $StoreConfig;
    }

    /**
     * Initialise Contact Page layout
     *
     * @return Object
     */
    public function initContactLayout(ResultPage $resultPage, $layout_id) {
        $page_layout = $this->getStoreConfig($layout_id);
        $pageConfig = $resultPage->getConfig();
        $pageConfig->setPageLayout($page_layout);
        $update = $resultPage->getLayout()->getUpdate();
        $controllerClass = $this->_request->getFullActionName();
        return $this;
    }

    /**
     * Prepare Contact Page Layout
     *
     * @return Object
     */
    public function prepareAndRender(ResultPage $resultPage, $controller) {
        $this->initContactLayout($resultPage, 'clarion_contact/general/contact_layout');
        return $this;
    }

}
