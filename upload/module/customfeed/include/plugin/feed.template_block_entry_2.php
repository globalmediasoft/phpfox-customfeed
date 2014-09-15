<?php
$userId = phpfox::getUserId();
if (isset($this->_aVars['aFeed'])) {
    $feedOwnerId = $this->_aVars['aFeed']['user_id'];
    $isAllowed   = false;
    if ($userId == $feedOwnerId) {
        $isAllowed = true;
    }
    
    if ($isAllowed && isset($this->_aVars['aFeed']['comment_type_id'])) {
        if ($this->_aVars['aFeed']['comment_type_id'] == 'user_status') {
            echo '<li><span>&middot;</span></li><li><a href="#?call=customfeed.edit_status&amp;height=100&amp;width=400&amp;feed_id=' . $this->_aVars['aFeed']['feed_id'] . '&amp;id=' . $this->_aVars['aFeed']['item_id'] . '" class="inlinePopup activity_feed_edit_status" title="' . Phpfox::getPhrase('customfeed.feed_edit_link_title') . '">' . Phpfox::getPhrase('customfeed.feed_edit_link_label') . '</a></li>';
        }
    }
}

?>