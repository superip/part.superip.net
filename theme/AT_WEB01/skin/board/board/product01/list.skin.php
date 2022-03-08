<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$board['bo_gallery_width']= 550;
$board['bo_gallery_height']= 320;
?>


<?php
$g5['navTitle'] = "product";
$g5['title'] = "제품소개1";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/sub.css">
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/common.css">
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/board.css">
</head>
<style>
    #product01 .pro_list > li{
        margin-bottom:50px;
    }
    #product01 .top_box{
        overflow: hidden;
        padding-bottom:40px;
    }
    #product01 .lf_box {
        float:left;
        width:50%;
    }
    #product01 .rt_box {
        float:right;
        width:50%;
        height:320px;
        display:flex;
        flex-direction:column;
        justify-content:center;
    }
    #product01 .rt_box strong {
        font-size:2em;
        font-weight:bold;
        color:#333;
        padding-bottom:30px;
        display:block;
    }
    #product01 .rt_box p {
        font-size:1.4em;
        font-weight:400;
        color:#333;
        letter-spacing:-0.6px;
        line-height:1.3;
    }
    #product01 .rt_box .moreBtn {
        width:120px;
        height:40px;
        line-height:40px;
        background-color:#333;
        color:#fff;
        display:block;
        margin-top:20px;
    }
    #product01 .rt_box .moreBtn span {
        display:block;
        font-size:16px;
        font-weight:400;
        color:#fff;
        text-align:center;
    }
    #product01 .bottom_box a {
        width:100%;
        padding:2% 0;
        border-top:1px solid #797979;
        border-bottom:0.5px solid #ccc;
        display:block;
        display:flex;
        justify-content:center;
        cursor: pointer;
    }
    #product01 .bottom_box a span {
        position:relative;
    }
    #product01 .bottom_box a span:nth-child(1) {
        font-size:1.5em;
        font-weight:600;
        color:#767676;
    }
    #product01 .bottom_box.on a span:nth-child(2)::after {
        content: "\f106";
        transition:all 0.6s;
    }
    #product01 .bottom_box a span:nth-child(2)::after {
        content: "\f107";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right:-30px;
        font-family: FontAwesome;
        font-size: 2.3em;
        opacity: 0.8;
    }
    #product01 .bottom_box ul {
        overflow:hidden;
        padding:4% 0;
        border-bottom:0.5px solid #ccc;
    }
    #product01 .bottom_box ul li {
        width:50%;
        float:left;
        display:table;
    }
    #product01 .bottom_box ul li p {
        display:table-cell;
        padding:10px 0;
    }
    #product01 .bottom_box ul li .tit {
        width:200px;
        font-size:1.5em;
        font-weight:bold;
        color:#333;
        letter-spacing:-0.6px;
    }
    #product01 .bottom_box ul li .txt {
        font-size:1.5em;
        font-weight:400;
        color:#333;
        letter-spacing:-0.6px;
    }
    #product01 .bottom_box.on .info{
        display:block;
    }
    #product01 .bottom_box .info {
        display:none;
    }
    @media screen and (max-width:1200px) {
        .listSkin .inner {
            width:100%;
        }
        #product01 .lf_box {
            width:100%;
            float:none;
            text-align:center;
        }
        #product01 .rt_box {
            width:100%;
            float:none;
            text-align:center;
        }
        #product01 .rt_box .moreBtn {
            margin:40px auto 0 auto;
        }
        #product01 .rt_box strong {
            font-size:26px;
        }
        #product01 .rt_box p {
            font-size:16px;
        }
        #product01 .rt_box .pc{
            display:block;
        }
        #product01 .rt_box .mo {
            display:none;
        }
        #product01 .bottom_box ul li {
            width:100%;
            float:none;
        }
        #product01 .bottom_box ul li .tit {
            padding-left:2%;
            width:28%;
        }
        #product01 .bottom_box ul li .txt {
            width:70%;
        }
    }
    @media screen and (max-width:600px) {
        #product01 .lf_box img{
            width:100%;
        }
    }
</style>
<body>
    <div class="sub" id="product01">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="listSkin">
            <div class="inner">
                <!-- 게시판 목록 시작 { -->
                <div id="bo_list" style="width:<?php echo $width; ?>">

                <form name="fboardlist" id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">

                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
                <input type="hidden" name="stx" value="<?php echo $stx ?>">
                <input type="hidden" name="spt" value="<?php echo $spt ?>">
                <input type="hidden" name="sca" value="<?php echo $sca ?>">
                <input type="hidden" name="sst" value="<?php echo $sst ?>">
                <input type="hidden" name="sod" value="<?php echo $sod ?>">
                <input type="hidden" name="page" value="<?php echo $page ?>">
                <input type="hidden" name="sw" value="">

                <!-- 게시판 페이지 정보 및 버튼 시작 { -->
                <div id="bo_btn_top">

                    <ul class="btn_bo_user">
                        <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn" title="관리자"><i class="fa fa-cog fa-spin fa-fw"></i><span class="sound_only">관리자</span></a></li><?php } ?>
                        <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
                        <li>
                            <button type="button" class="btn_bo_sch btn_b01 btn" title="게시판 검색"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">게시판 검색</span></button>
                        </li>
                        <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?>
                        <?php if ($is_admin == 'super' || $is_auth) {  ?>
                        <li>
                            <button type="button" class="btn_more_opt is_list_btn btn_b01 btn" title="게시판 리스트 옵션"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트 옵션</span></button>
                            <?php if ($is_checkbox) { ?>	
                            <ul class="more_opt is_list_btn">  
                                <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
                                <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
                                <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
                            </ul>
                            <?php } ?>
                        </li>
                        <?php }  ?>
                    </ul>
                </div>
                <!-- } 게시판 페이지 정보 및 버튼 끝 -->
                <!-- 게시판 카테고리 시작 { -->
                <?php if ($is_category) { ?>
                <nav id="board_cate">
                    <ul>
                        <?php echo $category_option ?>
                    </ul>
                </nav>
                <?php } ?>
                <!-- } 게시판 카테고리 끝 -->                        
                <div class="listForm">
                    <ul class="pro_list">
                        <?php for ($i=0; $i<count($list); $i++) {

                        $classes = array();

                        $classes[] = 'gall_li';
                        $classes[] = 'col-gn-'.$bo_gallery_cols;

                        if( $i && ($i % $bo_gallery_cols == 0) ){
                            $classes[] = 'box_clear';
                        }

                        if( $wr_id && $wr_id == $list[$i]['wr_id'] ){
                            $classes[] = 'gall_now';
                        }

                        $line_height_style = ($board['bo_gallery_height'] > 0) ? 'line-height:'.$board['bo_gallery_height'].'px' : '';
                        ?>
                        <li>
                            <div class="top_box">
                                <div class="lf_box">
                                    <?php
                                    if ($list[$i]['is_notice']) { // 공지사항  ?>
                                        <span class="is_notice" style="<?php echo $line_height_style; ?>">공지</span>
                                    <?php } else {
                                        $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);

                                        if($thumb['src']) {
                                            $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
                                        } else {
                                            $img_content = '<span class="no_image" style="'.$line_height_style.'">no image</span>';
                                        }

                                        echo run_replace('thumb_image_tag', $img_content, $thumb);
                                    }
                                    ?>
                                </div>
                                <div class="rt_box">
                                    <strong class="tit">
                                        <?php echo $list[$i]['subject'] ?> 
                                    </strong>
                                    <p class="txt">
                                        <?php
                                            if (is_mobile()){
                                                echo utf8_strcut(strip_tags($list[$i]['wr_content']), 130, '..');                                            
                                            }else{
                                                echo utf8_strcut(strip_tags($list[$i]['wr_content']), 235, '..');  
                                            }
                                        ?>
                                    </p>
                                    <a href="<?php echo $list[$i]['href'] ?>" class="moreBtn">
                                        <span>more +</span>
                                    </a>
                                </div>
                            </div>
                            <div class="bottom_box">
                                <a class="drop_btn">
                                    <span>자세히 보기</span>
                                    <span></span>
                                </a>
                                <div class="info">
                                    <ul>
                                        <li>
                                            <p class="tit">테마</p>
                                            <p class="txt"><?php echo $list[$i]['wr_1'] ?></p>
                                        </li>
                                        <li>
                                            <p class="tit">가격</p>
                                            <p class="txt"><?php echo $list[$i]['wr_2'] ?></p>
                                        </li>
                                        <li>
                                            <p class="tit">버전</p>
                                            <p class="txt"><?php echo $list[$i]['wr_3'] ?></p>
                                        </li>
                                        <li>
                                            <p class="tit">주요사업</p>
                                            <p class="txt"><?php echo $list[$i]['wr_4'] ?></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if (count($list) == 0) { echo "<li class=\"empty_list\">게시물이 없습니다.</li>"; } ?>
                    </ul>
                </div>
                <!-- 페이지 -->
                <?php echo $write_pages; ?>
                <!-- 페이지 -->

                <?php if ($list_href || $is_checkbox || $write_href) { ?>
                <div class="bo_fx">
                    <?php if ($list_href || $write_href) { ?>
                    <ul class="btn_bo_user">
                        <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn" title="관리자"><i class="fa fa-cog fa-spin fa-fw"></i><span class="sound_only">관리자</span></a></li><?php } ?>
                        <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
                        <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?>
                    </ul>	
                    <?php } ?>
                </div>
                <?php } ?>   
                </form>

                <!-- 게시판 검색 시작 { -->
                <div class="bo_sch_wrap">
                    <fieldset class="bo_sch">
                        <h3>검색</h3>
                        <form name="fsearch" method="get">
                        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                        <input type="hidden" name="sca" value="<?php echo $sca ?>">
                        <input type="hidden" name="sop" value="and">
                        <label for="sfl" class="sound_only">검색대상</label>
                        <select name="sfl" id="sfl">
                            <?php echo get_board_sfl_select_options($sfl); ?>
                        </select>
                        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                        <div class="sch_bar">
                            <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder=" 검색어를 입력해주세요">
                            <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
                        </div>
                        <button type="button" class="bo_sch_cls" title="닫기"><i class="fa fa-times" aria-hidden="true"></i><span class="sound_only">닫기</span></button>
                        </form>
                    </fieldset>
                    <div class="bo_sch_bg"></div>
                </div>
                <script>
                jQuery(function($){
                    // 게시판 검색
                    $(".btn_bo_sch").on("click", function() {
                        $(".bo_sch_wrap").toggle();
                    })
                    $('.bo_sch_bg, .bo_sch_cls').click(function(){
                        $('.bo_sch_wrap').hide();
                    });
                });
                </script>
                <!-- } 게시판 검색 끝 --> 
                </div>

                <?php if($is_checkbox) { ?>
                <noscript>
                <p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
                </noscript>
                <?php } ?>

                <?php if ($is_checkbox) { ?>
                <script>
                function all_checked(sw) {
                var f = document.fboardlist;

                for (var i=0; i<f.length; i++) {
                    if (f.elements[i].name == "chk_wr_id[]")
                        f.elements[i].checked = sw;
                }
                }

                function fboardlist_submit(f) {
                var chk_count = 0;

                for (var i=0; i<f.length; i++) {
                    if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
                        chk_count++;
                }

                if (!chk_count) {
                    alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
                    return false;
                }

                if(document.pressed == "선택복사") {
                    select_copy("copy");
                    return;
                }

                if(document.pressed == "선택이동") {
                    select_copy("move");
                    return;
                }

                if(document.pressed == "선택삭제") {
                    if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
                        return false;

                    f.removeAttribute("target");
                    f.action = g5_bbs_url+"/board_list_update.php";
                }

                return true;
                }

                // 선택한 게시물 복사 및 이동
                function select_copy(sw) {
                var f = document.fboardlist;

                if (sw == "copy")
                    str = "복사";
                else
                    str = "이동";

                var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

                f.sw.value = sw;
                f.target = "move";
                f.action = g5_bbs_url+"/move.php";
                f.submit();
                }

                // 게시판 리스트 관리자 옵션
                jQuery(function($){
                $(".btn_more_opt.is_list_btn").on("click", function(e) {
                    e.stopPropagation();
                    $(".more_opt.is_list_btn").toggle();
                });
                $(document).on("click", function (e) {
                    if(!$(e.target).closest('.is_list_btn').length) {
                        $(".more_opt.is_list_btn").hide();
                    }
                });
                });
                </script>
                <?php } ?>
                <!-- } 게시판 목록 끝 -->
            </div>
        </section>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('.bottom_box').click(function(){
            $(this).find('.info').stop(500).slideToggle(300);
            $(this).toggleClass('on');
        });
    })
</script>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>