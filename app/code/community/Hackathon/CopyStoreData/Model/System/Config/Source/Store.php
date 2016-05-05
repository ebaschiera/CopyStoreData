<?php

class Hackathon_CopyStoreData_Model_System_Config_Source_Store
{
    protected $_options;
    protected $_websites;
    
    public function toOptionArray()
    {
        if (!$this->_options) {
            foreach (Mage::app()->getWebsites() as $website) {
                foreach ($website->getGroups() as $group) {
                    $stores = $group->getStores();
                    foreach ($stores as $store) {
                        $this->_options[] = array('value' => $store->getId(), 'label' => $website->getName() . ' - ' . $store->getName());
                    }
                }
            }
        }
        
        
        return $this->_options;
    }
}