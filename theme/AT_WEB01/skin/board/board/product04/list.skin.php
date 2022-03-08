<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$board['bo_gallery_width']= 383;
$board['bo_gallery_height']= 220;

?>


<?php
$g5['navTitle'] = "Product";
$g5['title'] = "제품소개4";
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
* {
    padding:0;
    margin:0;
    list-style:none;
    text-decoration:none;
}
.slick-arrow{
    cursor: pointer;
}
body{
    background-color: #eee;
}
.sec{
    width:100%;height: 770px;
    position: relative;
    display: flex;
}



.sec1 {
    height: 870px;
    background-color: #ddd;
}
.sec1-inner{
    width:1200px;height:100%;
    display: flex;flex-flow: row wrap;
    align-content: center;justify-content: center;
    margin:0 auto;
}

.sec1-inner>h3{
    font-size: 2.5rem;
    margin-bottom: 50px;
}
.sec1-slick{
    width:100%;height: 520px;



}
.slick-list,
.slick-track{
    width:100%;height: 100%;
}
.slick-track .slick-slide{
    position: relative;
    margin:0px 10px;
    overflow: visible;
}
.slick-slide .sec1-contents{
    width:100%;height: 70%;
    background-color: #fff;
    position: absolute;
    top:50%;left:50%;transform: translate(-50%,-50%);
    transition: .5s ease;
    display: flex;align-content: center;
    justify-content: center;flex-flow: row wrap;
}
.slick-current .sec1-contents{
    width:100%;height: 80%;
}
.slick-slide .sec1-contents a {
    width:100%;
    padding:0 20px;
}
.slick-slide .sec1-contents h3{
    font-size: 1.5rem;
    width:100%;text-align: center;
    margin-bottom: 10px;
}
.slick-slide .sec1-contents p{
    width:100%;
    text-align: center;
    font-size:1.1em;
    font-weight:500;
    color:#333;
    letter-spacing:-0.6px;
    padding:0 11px;
    line-height:25px;
    font-size:14px;
}
.slick-slide .sec1-contents p:nth-of-type(1){
    margin-bottom: 30px;
    color:#333;
}
.thumbnail{
    width:70px;height:70px;
    border-radius: 100%;
    position: absolute;
    background-color: #555;
    top:0;left:50%;
    transform: translate(-50%,-50%);
}
.thumbnail img {
    width:100%;
    height:100%;
    border-radius: 100%;
}

.sec1-controll .slick-arrow{
    font-size: 3rem;
    color:#888;
}
.sec1-prev {
    position:absolute;
    top:55%;
    left:15%;
    transform:translateY(-50%);
}
.sec1-prev span::after {
    content: "\f104";
    font-family: FontAwesome;
    font-size:1.5em;
}
.sec1-next {
    position:absolute;
    top:55%;
    right:15%;
    transform:translateY(-50%);
}
.sec1-next span::after {
    content: "\f105";
    font-family: FontAwesome;
    font-size:1.5em;
}


.sec6{
    height: 590px;
    background-color: rgba(0,0,0,0.3);
}

.sec6-inner{
    width:1200px;
    display: flex;flex-flow: row wrap;
    align-content: center;
    justify-content: center;
    margin:0 auto;
}
.sec6-inner h3{
    font-size:36px;
}
.sec6-inner p{
    font-size:18px;
    width:100%;
    text-align: center;
    margin:20px 0px;
}
.sec6-inner a{
    font-size:18px;
    padding:10px 60px;
    border-radius: 10px;
    background-color: #333;
    color:#fff;
    display: inline-block;
}

@media screen and (max-width:1240px){

    .sec1-inner{
        width:100%;
    }
    .sec1-controll{
        width:100%;
    }
}

@media screen and (max-width:900px) {
    .sec1{
        height: 670px;
    }
    .sec1-slick{
        width:100%;height: 420px;
    }
    .sec6 {
        height:400px;
    }
    .sec6-inner {
        width:100%;
    }
    .sec6-inner h3 {
        font-size:26px;
    }
    .sec6-inner p  {
        font-size:16px;
    }
    .sec6-inner a {
        font-size:16px;
    }
}

</style>
<body>
    <div class="sub" id="product03">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <?php  include_once(G5_THEME_PATH.'/navigation.php'); ?>
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

        <section class="sec sec1">
            <div class="sec1-inner">
                <!-- 게시판 페이지 정보 및 버튼 시작 { -->
                <div id="bo_btn_top" style="position:absolute; top:20px; left:50%; transform:translateX(-50%);">

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
                <h3>Lorem Ipsum dolor</h3>
                <div class="sec1-slick">
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
                    <div>
                        <div class="sec1-contents">
                            <div class="thumbnail">
                                <?php echo get_member_profile_img($view['mb_id']) ?>
                            </div>
                            <a href="<?php echo $list[$i]['href'] ?>">
                                <h3><?php echo $list[$i]['name'] ?></h3>
                                <p><?php echo $list[$i]['subject'] ?></p>
                                <p><?php echo utf8_strcut(strip_tags($list[$i]['wr_content']), 280, '..'); ?></p>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (count($list) == 0) { echo "<li class=\"empty_list\">게시물이 없습니다.</li>"; } ?>
                </div>
            </div>
            <div class="sec1-controll"></div>
        </section>
        </form>
        <section class="sec sec6">
            <div class="sec6-inner">
                <h3>문의사항이 있으신가요?</h3>
                <p>문의사항을 빠르게 답변 드립니다. 온라인으로 문의해주세요!<p>
                <a href="<?php echo G5_URL?>/bbs/board.php?bo_table=qna">LEARN MORE</a>
            </div>
        </section>

    </div>
</body>
<script src="<?php echo G5_THEME_URL?>/js/slick.min.js"></script>
<script src="<?php echo G5_THEME_URL?>/js/slick.js"></script>
<script>
  $(document).ready(function(){
            $('.sec1-slick').slick({
                slidesToShow:3,
                slidesToScroll:1,
                arrows:true,
                appendArrows:$('.sec1-controll'),
                prevArrow:'<div class="sec1-prev"><span></span></div>',
                nextArrow:'<div class="sec1-next"><span></span></div>',
                centerMode:true,
                centerPadding:'0px',
                responsive:[
                    {
                        breakpoint:901,
                        settings:{
                            slidesToShow:1,
                            centerPadding:"100px",
                            arrows:false,
                        }
                    },
                    {
                        breakpoint:601,
                        settings:{
                            slidesToShow:1,
                            centerPadding:"20px",
                            arrows:false,
                        }
                    }
                ]
            })
        });
</script>
</html>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>