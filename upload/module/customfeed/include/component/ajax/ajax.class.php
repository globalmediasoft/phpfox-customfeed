<?php

class Customfeed_Component_Ajax_Ajax extends Phpfox_Ajax {
    public function edit_status() {
        Phpfox::isUser(true);
	
        $iUserId = phpfox::getUserId();
        $iFeedId = $this->get('feed_id');
        $iItemId = $this->get('id');
        $aUserStatus = phpfox::getService('customfeed.user.status')->getById($iItemId);
        if ($aUserStatus && $aUserStatus['user_id'] == $iUserId) {
            Phpfox::getBlock('customfeed.edit_status', array(
                'iFeedId' => $iFeedId,
                'iItemId' => $iItemId,
                'aUserStatus' => $aUserStatus
            ));
        } else {
            return false;
        }
    }
    
    public function update_status() {
        Phpfox::isUser(true);
	
        $iUserId  = phpfox::getUserId();
        $iItemId  = $this->get('id');
        $sContent = trim($this->get('content'));
        $aUserStatus = phpfox::getService('customfeed.user.status')->getById($iItemId);
        if ($aUserStatus && $aUserStatus['user_id'] == $iUserId && !empty($sContent)) {
            phpfox::getService('customfeed.user.status')->update($iItemId, array(
                'content' => $sContent,
                'time_stamp' => PHPFOX_TIME
            ));
            return true;
        } else {
            return false;
        }
    }
}

