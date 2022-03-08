<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

?>

<?php
$g5['navTitle'] = "Board";
$g5['title'] = "list01";
?>



<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<!-- 게시물 읽기 시작 { -->

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
    .img_box2 {
        padding-top:5%;
    }
    .viewSkin .textBox .title2 {
        font-size: 5em;
        font-weight: bold;
        font-family: 'Noto Sans KR', sans-serif;
        margin-bottom: 20px;
        color: #333;
    }
    .viewSkin .info ul {
        overflow:hidden;
        padding:4% 0;
        border-top:0.5px solid #ccc;
        border-bottom:0.5px solid #ccc;
    }
    .viewSkin .info ul li {
        width:50%;
        float:left;
        display:table;
    }
    .viewSkin .info ul li p {
        display:table-cell;
        padding:10px 0;
    }
    .viewSkin .info ul li .tit {
        width:200px;
        font-size:1.5em;
        font-weight:bold;
        color:#333;
        letter-spacing:-0.6px;
    }
    .viewSkin .info ul li .txt {
        font-size:1.5em;
        font-weight:400;
        color:#333;
        letter-spacing:-0.6px;
        text-align:center;
    }
    .viewSkin .cont_box {
        padding:5% 0 10% 0;
    }
    .viewSkin .cont_box p {
        text-align:center;
    }
    @media screen and (max-width:1200px) {
        .viewSkin .info ul li {
            width:100%;
            float:none;
        }
        .viewSkin .info ul li .tit {
            padding-left:2%;
            width:28%;
        }
        .viewSkin .info ul li .txt {
            width:70%;
        }
        .viewSkin .cont_box p br {
            display:none;
        }
    }
</style>
<body>
    <div class="sub" id="board_webzine01">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
        <section class="viewSkin_admin">
            <article class="inner">
                <h1 class="blind">게시판 리스트 옵션</h1>
                <div id="bo_v_top">
                <?php ob_start(); ?>

                <ul class="btn_bo_user bo_v_com">
                    
                    <?php if ($reply_href) { ?><li><a href="<?php echo $reply_href ?>" class="btn_b01 btn" title="답변"><i class="fa fa-reply" aria-hidden="true"></i><span class="sound_only">답변</span></a></li><?php } ?>
                    <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?>
                    <?php if($update_href || $delete_href || $copy_href || $move_href || $search_href) { ?>
                    <li>
                        <button type="button" class="btn_more_opt is_view_btn btn_b01 btn" title="게시판 리스트 옵션"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트 옵션</span></button>
                        <ul class="more_opt is_view_btn"> 
                            <?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>">수정<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li><?php } ?>
                            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" onclick="del(this.href); return false;">삭제<i class="fa fa-trash-o" aria-hidden="true"></i></a></li><?php } ?>
                            <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" onclick="board_move(this.href); return false;">복사<i class="fa fa-files-o" aria-hidden="true"></i></a></li><?php } ?>
                            <?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" onclick="board_move(this.href); return false;">이동<i class="fa fa-arrows" aria-hidden="true"></i></a></li><?php } ?>
                            <?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>">검색<i class="fa fa-search" aria-hidden="true"></i></a></li><?php } ?>
                        </ul> 
                    </li>
                    <?php } ?>
                </ul>
                <script>

                    jQuery(function($){
                        // 게시판 보기 버튼 옵션
                        $(".btn_more_opt.is_view_btn").on("click", function(e) {
                            e.stopPropagation();
                            $(".more_opt.is_view_btn").toggle();
                        });
                        $(document).on("click", function (e) {
                            if(!$(e.target).closest('.is_view_btn').length) {
                                $(".more_opt.is_view_btn").hide();
                            }
                        });
                    });
                    </script>
                    <?php
                    $link_buttons = ob_get_contents();
                    ob_end_flush();
                    ?>
                </div>
                <!-- } 게시물 상단 버튼 끝 -->
            </article>
        </section>
        <section class="viewSkin">
            <article class="inner">
                <h1 class="blind">갤러리 카테고리</h1>
                <div class="textBox">
                    <h2 class="cate">
                        <?php if ($category_name) { ?>
                            <?php echo $view['ca_name']; // 분류 출력 끝 ?>
                        <?php } ?>
                    </h2>
                    <p class="title2"><?php echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력?></p>
                    <dl>
                        <dt>등록일</dt>
                        <dd><span><?php echo date("Y-m-d", strtotime($view['wr_datetime'])) ?></span></dd>
                        <dd><span><?php echo $view['name'] ?></span></dd>
                    </dl>
                </div>
                <div class="img_box2">
                    <?php
                    // 파일 출력
                    $v_img_count = count($view['file']);
                    if($v_img_count) {
                        echo "<div id=\"bo_v_img\">\n";

                        foreach($view['file'] as $view_file) {
                            echo get_file_thumbnail($view_file);
                        }

                        echo "</div>\n";
                    }
                    ?>
                </div>

                <div class="cont_box">
                    <p><?php echo get_view_thumbnail($view['content']); ?></p>
                    <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
                </div>
                <div class="info_box">
                    <?php if ($prev_href || $next_href) { ?>
                    <ul>
                        <?php if ($prev_href) { ?>
                        <li>
                            <a  href="<?php echo $prev_href ?>">
                                <div>
                                    <span class="tit">이전글</span>
                                    <span class="icon"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                </div>
                                <div>
                                    <p class="txt"><?php echo $prev_wr_subject;?></p>
                                </div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if ($next_href) { ?>
                        <li>
                            <a href="<?php echo $next_href ?>">
                                <div>
                                    <span class="tit">다음글</span>
                                    <span class="icon"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                </div>
                                <div>
                                    <p class="txt"><?php echo $next_wr_subject;?></p>
                                </div>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <div class="list_move">
                    <a href="<?php echo $list_href ?>" >
                        목록
                    </a>           
                </div>
            </article>
        </section>
    </div>
</body>
</html>

<!-- } 게시판 읽기 끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->