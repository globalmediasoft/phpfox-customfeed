<?php

/**
 * [PHPFOX_HEADER]
 */
defined('PHPFOX') or exit('NO DICE!');

class Customfeed_Component_Block_Edit_Status extends Phpfox_Component {

    /**
     * Class process method wnich is used to execute this component.
     */
    public function process() {
        Phpfox::isUser(true);
        
        $iItemId = $this->getParam('iItemId');
        $aUserStatus = $this->getParam('aUserStatus');
        if ($aUserStatus) {
            $this->template()->assign(array(
                'iFeedId' => $this->getParam('iFeedId'),
                'iItemId' => $iItemId,
                'aUserStatus' => $aUserStatus
            ));
        } else {
            return '';
        }
    }

}

?>