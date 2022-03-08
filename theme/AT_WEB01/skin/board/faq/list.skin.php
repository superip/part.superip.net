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

<script type="text/javascript" src="<?php echo $board_skin_url; ?>/TweenMax.js"></script>

<script>
    var qnaNum = -1;
    $(document).ready(function() {
        $('.qa_li .question').live("click", function() {
            q = $(".qa_li .question").index(this);
            if (q != qnaNum) {
                $('.qa_li .answer').stop(true, true).slideUp(400);
                $('.qa_li').removeClass('open');
                TweenMax.to($('.qa_li .question').eq(qnaNum).find('.iconDiv'), 0.4, {
                    rotation: 0
                });
                qnaNum = q;
                $('.qa_li').eq(qnaNum).addClass('open');
                $('.qa_li .answer').eq(qnaNum).stop(true, true).slideDown(400);
                TweenMax.to($('.qa_li .question').eq(qnaNum).find('.iconDiv'), 0.4, {
                    rotation: 180
                });
            } else {
                $('.qa_li .answer').eq(qnaNum).stop(true, true).slideUp(400);
                $('.qa_li').eq(qnaNum).removeClass('open');
                TweenMax.to($('.qa_li').eq(qnaNum).find('.question p'), 0.4, {
                    rotation: 0
                });
                qnaNum = -1;
            }
        });
    });
</script>

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
<div class="bnrimg product_banner"><br style="clear:both;"><br style="clear:both;">
    <div class="bnrtxtwrap">
        <h3 class="wow fadeInDown" style="visibility: visible;">FQA</h3>
            <div class="bnrline wow fadeInDown" style="visibility: visible;"></div>
        <p>골뱅이스토어는 최선의 서비스를 제공합니다.</p>
    </div>
</div>
<body id="body" class="light-mode">
<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">
    <div class="inner">

        <!-- 게시판 페이지 정보 및 버튼 시작 { -->
        <div id="bo_btn_top">


            <?php if ($rss_href || $write_href) { ?>
            <ul class="btn_bo_user">
                <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i> RSS</a></li><?php } ?>
                <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a></li><?php } ?>
                <?php if ($is_admin) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn btn_write"><i class="fa fa-pencil" aria-hidden="true"></i> 문의하기</a></li><?php } ?>
            </ul>
            <?php } ?>
        </div>
        <!-- } 게시판 페이지 정보 및 버튼 끝 -->

        <!-- 게시판 카테고리 시작 { -->
        <?php if ($is_category) { ?>
        <nav id="bo_cate">
            <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
            <ul id="bo_cate_ul">
                <?php echo $category_option ?>
            </ul>
        </nav>
        <?php } ?>
        <!-- } 게시판 카테고리 끝 -->

        <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
            <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
            <input type="hidden" name="stx" value="<?php echo $stx ?>">
            <input type="hidden" name="spt" value="<?php echo $spt ?>">
            <input type="hidden" name="sca" value="<?php echo $sca ?>">
            <input type="hidden" name="sst" value="<?php echo $sst ?>">
            <input type="hidden" name="sod" value="<?php echo $sod ?>">
            <input type="hidden" name="page" value="<?php echo $page ?>">
            <input type="hidden" name="sw" value="">

            <ul class="listWrap wow fadeInUp" data-wow-delay="0.2s">

                <?php
        for ($i=0; $i<count($list); $i++) {
        ?>

                <li class="qa_li">
                    <div class="question">
                        <?php if ($list[$i]['ca_name']){ ?><p class="ca_name"><?php echo $list[$i]['ca_name']; ?></p><?php } ?>
                        <div class="tit">
                            <?php if ($is_checkbox) { ?>
                            <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                            <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                            <?php } ?>
                            <p class="q_icon">Q</p>
                            <h3><?php echo $list[$i]['subject']; ?></h3>
                        </div>
                        <p class="iconDiv"><img src="<?php echo $board_skin_url; ?>/img/arrow.png"></p>
                    </div>
                    <div class="answer">
                        <p class="a_icon">A</p>
                        <p class="answer_con"><?php echo nl2br($list[$i]['wr_content']); ?></p>

                        <?php if ($is_admin){ ?><a href="<?php echo G5_BBS_URL ?>/write.php?w=u&bo_table=<?php echo $bo_table; ?>&wr_id=<?php echo $list[$i]['wr_id']; ?>" class="modA">[수정하기]</a><?php } ?>
                    </div>
                </li>
                <?php } ?>

            </ul>
            <?php if ($list_href || $is_checkbox || $write_href) { ?>
            <div class="bo_fx">
                <div class="clearfix">
                    <?php if ($list_href || $write_href) { ?>
                    <ul class="btn_bo_user">
                        <?php if ($is_checkbox) { ?>
                        <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_admin btn_change2"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
                        <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn_admin btn_change2"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
                        <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn_admin btn_change2"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
                        <?php } ?>
                        <?php if ($is_admin) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01 btn btn_list"><i class="fa fa-list" aria-hidden="true"></i> 목록</a></li><?php } ?>
                        <?php if ($is_admin) { ?><li class="bo_fx_write"><a href="<?php echo $write_href ?>" class="btn_b02 btn btn_write"><i class="fa fa-pencil" aria-hidden="true"></i> 문의하기</a></li><?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </form>
    </div>
</div>
<div class="wow fadeInUp"><?php echo $write_pages;  ?></div>


<!-- 게시판 검색 시작 { -->
<div class="inner clearfix wow fadeInUp">
    <fieldset id="bo_sch">

        <legend>게시물 검색</legend>

        <form name="fsearch" method="get">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
            <input type="hidden" name="sca" value="<?php echo $sca ?>">
            <input type="hidden" name="sop" value="and">
            <label for="sfl" class="sound_only">검색대상</label>
            <select name="sfl" id="sfl">
                <option value="wr_subject" <?php echo get_selected($sfl, 'wr_subject', true); ?>>전체</option>
                <option value="wr_content" <?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                <option value="wr_subject||wr_content" <?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
                <option value="mb_id,1" <?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
                <option value="mb_id,0" <?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
                <option value="wr_name,1" <?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
                <option value="wr_name,0" <?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
            </select>
            <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
            <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder="">
            <button type="submit" value="검색" class="sch_btn">검색<span class="sound_only">검색</span></button>
        </form>

    </fieldset>

</div>
<!-- } 게시판 검색 끝 -->



<?php if($is_checkbox) { ?>
<noscript>
    <p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->



<?php if ($is_checkbox) { ?>
<script>
    function all_checked(sw) {
        var f = document.fboardlist;

        for (var i = 0; i < f.length; i++) {
            if (f.elements[i].name == "chk_wr_id[]")
                f.elements[i].checked = sw;
        }
    }

    function fboardlist_submit(f) {
        var chk_count = 0;

        for (var i = 0; i < f.length; i++) {
            if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
                chk_count++;
        }

        if (!chk_count) {
            alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
            return false;
        }

        if (document.pressed == "선택복사") {
            select_copy("copy");
            return;
        }

        if (document.pressed == "선택이동") {
            select_copy("move");
            return;
        }

        if (document.pressed == "선택삭제") {
            if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
                return false;

            f.removeAttribute("target");
            f.action = "./board_list_update.php";
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
        f.action = "./move.php";
        f.submit();
    }
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->