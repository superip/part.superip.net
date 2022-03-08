<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<?php
$g5['navTitle'] = "고객센터";
$g5['title'] = "자주 묻는 질문";
?>

<script>
var qnaNum = -1;
$(document).ready(function(){
	$('.qa_li').click(function(){
        var faq = $(this).index();
        $('.answer').eq(faq).stop().slideToggle('on');
        $('.question').eq(faq).toggleClass('on');
	});
});	
</script>


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

/* QNA */
@import url('http://fonts.googleapis.com/earlyaccess/notosanskr.css');
#faq .qa_li {
    border-top:1px solid #ddd;
}
#faq .qa_li:last-child {
    border-bottom:1px solid #ddd;
}
#faq .listForm .question{
    width:100%;
    padding:3% 20px;
    cursor: pointer;
    overflow:hidden;
    position:relative;
}
#faq .listForm .question .lf_box{
    width:90%;
    display:table;
    float:left;
}
#faq .listForm .question.on .faq_icon  {
    background-color:#333;
    transition:all 0.6s;
}
#faq .listForm .question .faq_icon {
    display:table-cell;
    vertical-align:middle;
    width:50px;
    height:50px;
    border-radius:50%;
    background-color:#c7c7c7;
}
#faq .listForm .question .faq_icon span {
    font-size:18px;
    font-weight:bold;
    color:#fff;
    display:block;
    text-align:center;
    line-height:50px;
}
#faq .listForm .question .tit {
    display:table-cell;
    vertical-align:middle;
    font-size:18px;
    font-weight:bold;
    color:#333;
    padding-left:20px;
}
#faq .listForm .question .rt_box {
    position:absolute;
    top:50%;
    margin-top:-7.5px;
    right:10px;
}
#faq .listForm .question.on .rt_box{
    transform:rotate(180deg);
    transition:all 0.6s;
}
#faq .listForm .answer.on {
    display:block;
    transition:all 0.6s;
}
#faq .listForm .answer {
    padding:3% 20px;
    background-color:#f6f6f6;
    display:none;
    overflow:hidden;
}
#faq .listForm .answer .lf_box{
    width:90%;
    float:left;
}
#faq .listForm .answer .faq_icon {
    display:block;
    width:50px;
    height:50px;
    border-radius:50%;
    border:1px solid #ddd;
    box-sizing:border-box;
    background-color:#fff;
}
#faq .listForm .answer .faq_icon span {
    font-size:18px;
    font-weight:bold;
    color:#333;
    display:block;
    text-align:center;
    line-height:50px;
}
#faq .listForm .answer .tit {
    display:table-cell;
    vertical-align:middle;
    font-size:17px;
    font-weight:400;
    color:#333;
    padding-left:20px;
}
#faq .listForm .answer .rt_box {
    width:15%;
    float:right;
    line-height:50px;
}
@media screen and (max-width:900px) {
    #faq .listForm .question {
        padding:5% 0;
    }
    #faq .listForm .question .tit {
        font-size:14px;
        padding-left:7px;
    }
    #faq .listForm .question .faq_icon {
        width:60px;
        height:60px;
        background-color:transparent;
    }
    #faq .listForm .question.on .faq_icon {
        background-color:transparent;
    }
    #faq .listForm .question .faq_icon span {
        color:#333;
    }
    #faq .listForm .answer .faq_icon {
        width:60px;
        height:60px;
    }
    #faq .listForm .answer .tit {
        padding-top:10px;
        padding-left:0px;
    }
    #faq .listForm .question .rt_box img{
        width:10px;
    }
}
</style>
<body>
    <div class="sub" id="faq">
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
                    <ul>
                        <?php
                        for ($i=0; $i<count($list); $i++) {
                        ?>
                        <li class="qa_li">
                            <div class="question">
                                <div class="lf_box">
                                    <p class="faq_icon">
                                        <span>Q</span>
                                    </p>
                                    <?php if ($list[$i]['ca_name']){ ?><p class="ca_name"><?php echo $list[$i]['ca_name']; ?></p><?php } ?>
                                    <p class="tit">
                                        <?php echo $list[$i]['subject']; ?>
                                    </p>
                                </div>
                                <div class="rt_box">
                                    <span>
                                        <img src="<?php echo $board_skin_url; ?>/img/faq_arrow.png">
                                    </span>
                                </div>
                            </div>
                            <div class="answer">
                                <div class="lf_box">
                                    <p class="faq_icon">
                                        <span>A</span>
                                    </p>
                                    <p class="tit"><?php echo nl2br($list[$i]['wr_content']); ?></p>
                                </div>
                                <div class="rt_box">
                                    <?php if ($is_admin){ ?><a href="<?php echo G5_BBS_URL ?>/write.php?w=u&bo_table=<?php echo $bo_table; ?>&wr_id=<?php echo $list[$i]['wr_id']; ?>" class="modA">[수정하기]</a><?php } ?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                        </ul>
                        <p class="info_txt">
                            <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
                        </p>
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

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>