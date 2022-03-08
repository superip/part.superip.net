<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<script>
    new WOW().init();
</script>
<script>
    function toggleDarkLight() {
    var body = document.getElementById("body");
    var currentClass = body.className;
    body.className = currentClass == "dark-mode" ? "light-mode" : "dark-mode";
    }
</script>
<button type="button" name="dark_light" onclick="toggleDarkLight()" title="Toggle dark/light mode" id="darkLight">🌛</button>

<script>
    $(function() {
        $("#gnb .gnb_1dli").mouseenter(function() {
            var menuWidth = $("#gnb .gnb_1dli").outerWidth();
            var menuLeft = 0;
            var index = $(this).index();

            for (var i = 0; i <= index - 1; i++) {
                menuLeft += $("#gnb .gnb_1dli").eq(i).outerWidth();
            }
            menuLeft -= $(this).outerWidth();
            $("#nav_bar").stop().animate({
                width: menuWidth,
                left: menuLeft
            }, 300);
        });

        $("#gnb").mouseleave(function() {
            $("#nav_bar").stop().animate({
                width: 0,
                left: 0
            }, 0);
        });
        setInterval(function() {
            if ($(window).scrollTop() >= 90) {
                $("#hd").addClass("scrollBg");
                $("#logo img.logo_pc").attr("src", "<?php echo G5_THEME_IMG_URL ?>/common/logo.png");
            } else {
                $("#hd").removeClass("scrollBg");
                $("#logo img.logo_pc").attr("src", "<?php echo G5_THEME_IMG_URL ?>/common/logo_white.png");
            }
        }, 300);
    });
</script>




            


<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
    <div id="hd_wrapper">
        <div class="inner">
            <div id="mb-open-menu">
                <span class="line1"></span>
                <span class="line2"></span>
                <span class="line3"></span>
            </div>
            <div id="tnb">
                <ul>
                    <?php if ($is_member) {  ?>
                    <li class="register"><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php"><i class="fa fa-cog" aria-hidden="true"></i> 정보수정</a></li>
                    <li class="logout"><a href="<?php echo G5_BBS_URL ?>/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> 로그아웃</a></li>
                    <?php if ($is_admin) {  ?>
                    <li class="tnb_admin"><a href="<?php echo G5_ADMIN_URL ?>"><b><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</b></a></li>
                    <?php }  ?>
                    <?php } else {  ?>
                    <li class="join"><a href="<?php echo G5_BBS_URL ?>/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> 회원가입</a></li>
                    <li class="login"><a href="<?php echo G5_BBS_URL ?>/login.php"><b><i class="fa fa-sign-in" aria-hidden="true"></i> 로그인</b></a></li>
                    <?php }  ?>
                </ul>
            </div>
            
           
            <div id="logo">
                <a href="<?php echo G5_URL ?>">
                    <img class="logo_pc" src="<?php echo G5_THEME_IMG_URL ?>/common/logo_white.png" alt="<?php echo $config['cf_title']; ?>">
                    <img class="logo_mobile" src="<?php echo G5_THEME_IMG_URL ?>/common/logo_white.png" alt="<?php echo $config['cf_title']; ?>">
                </a>
            </div>

            <ul class="hd_login">        
                <?php if ($is_member) {  ?>
                <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
                <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
                <?php if ($is_admin) {  ?>
                <li class="tnb_admin"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
                <?php }  ?>
                <?php } else {  ?>
                <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
                <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
                <?php }  ?>
            </ul>
            <nav id="gnb">
                <h2>메인메뉴</h2>
                <div class="gnb_wrap">
                    <ul id="gnb_1dul">
                        <li class="gnb_1dli gnb_mnal"><button type="button" class="gnb_menu_btn"><i class="fa fa-bars" aria-hidden="true"></i><span class="sound_only">전체메뉴열기</span></button></li>
                        <?php
                    $sql = " select *
                                from {$g5['menu_table']}
                                where me_use = '1'
                                  and length(me_code) = '2'
                                order by me_order, me_id ";
                    $result = sql_query($sql, false);
                    $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                    $menu_datas = array();

                    for ($i=0; $row=sql_fetch_array($result); $i++) {
                        $menu_datas[$i] = $row;

                        $sql2 = " select *
                                    from {$g5['menu_table']}
                                    where me_use = '1'
                                      and length(me_code) = '4'
                                      and substring(me_code, 1, 2) = '{$row['me_code']}'
                                    order by me_order, me_id ";
                        $result2 = sql_query($sql2);
                        for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                            $menu_datas[$i]['sub'][$k] = $row2;
                        }

                    }

                    $i = 0;
                    foreach( $menu_datas as $row ){
                        if( empty($row) ) continue; 
                    ?>
                        <li class="gnb_1dli" style="z-index:<?php echo $gnb_zindex--; ?>">
                            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                            <?php
                        $k = 0;
                        foreach( (array) $row['sub'] as $row2 ){

                            if( empty($row2) ) continue; 

                            if($k == 0)
                                echo '<span class="bg">하위분류</span><ul class="gnb_2dul">'.PHP_EOL;
                        ?>
                        <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                        <?php
                        $k++;
                        }   //end foreach $row2

                        if($k > 0)
                            echo '</ul>'.PHP_EOL;
                        ?>
                        </li>
                        <?php
                    $i++;
                    }   //end foreach $row

                    if ($i == 0) {  ?>
                        <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div id="nav_bar"></div>
            </nav>
            <script>
                $(function() {
                    $(".gnb_menu_btn").click(function() {
                        $("#gnb_all").show();
                    });
                    $(".gnb_close_btn").click(function() {
                        $("#gnb_all").hide();
                    });
                });
            </script>
        </div>
    </div>
</div>
<!-- } 상단 끝 -->
<!--<div class="popup_log">-->
    
<!--</div>-->

<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">

        <div id="container">
            <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php } ?>