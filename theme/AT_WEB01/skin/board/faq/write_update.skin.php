<?php
// 스킨파일은 단독으로 실행할 수 없다
if(defined('_GNUBOARD_') == false) {
    exit('스킨파일은 단독으로 실행할 수 없습니다.');
}
goto_url(G5_BBS_URL.'/board.php?bo_table='.$bo_table);
?>