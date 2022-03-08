<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>
<script>
    new WOW().init();
</script>

<!-- 메뉴 시작 { -->
<link rel="stylesheet" href="<?php echo $groupmenu_skin_url ?>/css/style.css">
<div class="inner">
    <div id="groupmenu" class="wow fadeInUp">
        <div class="clearfix table">
            <div class="tbody">
                <?php for ($i=0; $i<count($groupmenu); $i++) {  ?>
                <div class="group_board">
                    <div class="group_list">
                        <div id="nav1">
                            <ul>
                                <li<?php if($bo_table==$groupmenu[$i]['bo_table']) { echo " class=\"on\""; } ?>><a href="<?php echo $groupmenu[$i]['href'] ?>"><?php echo $groupmenu[$i]['subject'] ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php }  ?>
            </div>
        </div>
    </div>
</div>
<!-- } 메뉴 끝 -->