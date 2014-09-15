<?php

defined('PHPFOX') or exit('NO DICE!');

class Customfeed_Service_User_Status extends Phpfox_Service {
    public function __construct() {
        $this->_sTable = Phpfox::getT('user_status');
    }
    
    public function getById($iItemId) {
        return $this->database()->select('*')
                    ->from($this->_sTable)
                    ->where('status_id = ' . (int) $iItemId)
                    ->execute('getSlaveRow');
    }
    
    public function update($iItemId, $data) {
        if (isset($data['content'])) {
            $data['content'] = $this->preParse()->prepare($data['content']);
        }
        $this->database()->update($this->_sTable, $data, 'status_id = ' . (int) $iItemId);
    }
}