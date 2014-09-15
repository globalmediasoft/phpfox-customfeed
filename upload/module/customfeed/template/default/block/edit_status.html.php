<?php

defined('PHPFOX') or exit('NO DICE!');
?>
<script type="text/javascript">
var iFeedStatusId = {$iFeedId};
var iFeedUserStatusId = {$iItemId};
</script>
{literal}
<style type="text/css">
#edit_status_content {
    display: block;
    width: 100%;
}
</style>
<script type="text/javascript">
if (typeof(doSubmitEditFeedStatus) === 'undefined') {
    var doSubmitEditFeedStatus = function() {
        var sContent = $('#edit_status_content').val();
        if (sContent == '') {
            $('#edit_status_public_message').show();
            return false;
        } else {
            $.ajaxCall('customfeed.update_status', 'id=' + iFeedUserStatusId + '&content=' + sContent);
            $('#js_item_feed_' + iFeedStatusId).find('.activity_feed_content_status').html(sContent);
            tb_remove();
            return true;
        }
    };
}
</script>
{/literal}
<div id="js_edit_status_body">
    <div class="p_4">
        <div id="edit_status_public_message" class="public_message" style="display: none;"><?php echo Phpfox::getPhrase('customfeed.feed_status_content_not_empty');?></div>
        <textarea id="edit_status_content" rows="5">
            {$aUserStatus.content}
        </textarea>
        <input type="button" value="{phrase var='core.submit'}" class="button" onclick="return doSubmitEditFeedStatus();" />
    </div>
</div>