<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>

    </div>
</div>
        
       <div id="aside">
           <div class="close_menu" id="mobile_menu_close">
                <span class="close-line1"></span>
                <span class="close-line2"></span>
            </div>   
            <div class="mobile_menu">
                <ul>
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
                    <li class="mobile-list">
                        <a class="gnb_1da"><?php echo $row['me_name'] ?></a>
                        
                        <?php
                        $k = 0;
                        foreach( (array) $row['sub'] as $row2 ){

                            if( empty($row2) ) continue; 

                            if($k == 0)
                                echo '<ul class="mb-sub-ul">'.PHP_EOL;
                        ?>
                            <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
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
        </div>
        <div class="mask"></div>
        <script type="text/javascript">
            $( document ).ready(function(){
                
                $(function () {
                    $('.mobile_menu > ul > li > a').click(function () {
                    $( this ).parent().find('ul').slideToggle();
                    $(this).parent().siblings().children().next().slideUp();
                    return false;
                });
                $('.mobile_menu > ul > li > a').bind('touchstart', function (e) {
                    $(this).trigger('click');
                    e.preventDefault();
                });
                });

                $( "#mb-open-menu" ).click(function(){
                    $( "#aside" ).animate({"right":"0px"}, 200);
                    $( ".mask" ).css('display','block');
                    $( ".close_menu" ).animate({"right":"20px"}, 200);
                    $("body").css("position","fixed");
                });

                $( "#mobile_menu_close, .mask" ).click(function(){
                    $( "#aside" ).animate({"right":"-100%"}, 200);
                    $( ".close_menu" ).animate({"right":"-100%"}, 200);
                      $( ".mask" ).css('display','none');
                    $("body").css("position","relative");
                });
            });

        </script>
</div>

<!-- } 콘텐츠 끝 -->

<hr>

<script>
    new WOW().init();

</script>

<!-- 하단 시작 { -->
<div id="ft">
    <div id="ft_wr">
       <div id="ft_sns">
            <ul>
                <li><a href="javascirpt:;">naver blog</a></li>
                <li class="ft_sns2"><a href="javascirpt:;">daum cafe</a></li>
                <li class="ft_sns3"><a href="javascirpt:;">facebook</a></li>
                <li class="ft_sns4"><a href="javascirpt:;">instagram</a></li>
            </ul>
        </div>
        <div id="ft_contact">
            <strong>1661 - 4222</strong>
            <p>평일 : 09:00 - 18:00<br />(점심시간 12:30 - 13:30 / 주말, 공휴일 휴무)</p>
        </div>
        <div id="ft_link">
            <a href="<?php echo G5_THEME_URL ?>/company/introduce.php">회사소개</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보보호정책</a>
            <a class="ft_link3" href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">이메일무단수집거부</a>
        </div>
        
        <div id="ft_company">
            <ul>
                <li class="ft_company1">상호 : 우리플랫폼</li>
                <li class="ft_company2">대표 : 함정연</li>
                <li class="ft_company3">주소 : 서울 금천구 가산디지털1로 128 STXV타워 1406호</li>
                <li class="ft_company4">메일 : mincompany@atsign.co.kr</li>
                <li class="ft_company5">사업자등록번호 : 417-09-82969</li>
                <li class="ft_company6">통신판매업 신고번호 : <a href="javascript:;">[사업자정보확인]</a></li>
            </ul>
        </div>
        
        <div id="ft_copy">
            Copyright &copy; <b>우리플랫폼</b> <span>All rights reserved.</span>
        </div>
    </div>
    <button type="button" id="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span></button>
        <script>
        
        $(function() {
            $("#top_btn").on("click", function() {
                $("html, body").animate({scrollTop:0}, '500');
                return false;
            });
        });
        </script>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>


















