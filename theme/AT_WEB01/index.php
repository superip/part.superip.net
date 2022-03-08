<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

  <script>
    new WOW().init();
  </script>
  <script>
    function toggleDarkLight() {
    var body = document.setAttribute("body");
    var currentClass = body.className;
    body.className = currentClass == "dark-mode" ? "light-mode" : "dark-mode";
    }
</script>
<button type="button" name="dark_light" onclick="toggleDarkLight()" title="Toggle dark/light mode" id="darkLight">🌛</button>

<div class="bannerWrap">
    <img src="<?php echo G5_THEME_IMG_URL ?>/main/banner1.png">
    <div>
        <img class="wow fadeInDown" data-wow-delay="0s" src="<?php echo G5_THEME_IMG_URL ?>/main/banner_logo.png">
        <h2 class="wow fadeInDown" data-wow-delay="0.3s">골뱅이커뮤니케이션</h2>
        <p class="wow fadeInDown" data-wow-delay="0.6s">골뱅이스토어는 고객들의 의견을 존중하고<span>획기적인 기획과 저가격으로 최고의 효과로 마케팅을 합니다.</span></p>
        <div class="square_bracket1 wow fadeInLeft" data-wow-delay="0.1s"></div>
        <div class="square_bracket2 wow fadeInRight" data-wow-delay="0.1s"></div>
    </div>
</div>
<div class="aboutWrap">
   <div class="box inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s"><span>ATSTORE</span>ABOUT</h2>
            <p class="wow fadeInDown" data-wow-delay="0.4s">저희 골뱅이스토어는 고객에게 만족을 드리기 위해 지난 수년간의 노력과 수차례의 시행착오를 통해 고객님들과 함께 성장해왔습니다. 수많은 경험을 바탕으로 고객의 요구에 적합한 마케팅을 제작합니다. 항상 신뢰받는 기업, 끊임없이 개발하는 기업, 투명한 기업을 이루도록 최선을 다하겠습니다.</p>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="first wow bounceInUp" data-wow-delay="0.5s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon1.png">
                    <p>진행중인 프로젝트 수</p>
                    <strong><span>8,<span class="number" data-max="506" data-vel="6">506</span></span>건</strong>
                </li>
                <li class="second wow bounceInUp" data-wow-delay="0.6s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon2.png">
                    <p>함께한 클라이언트 수</p>
                    <strong><span>1,<span class="number" data-max="766" data-vel="1">766</span></span>명</strong>
                </li>
                <li class="third wow bounceInUp" data-wow-delay="0.7s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/about_icon3.png">
                    <p>진행중인 상담 수</p>
                    <strong><span class="number" data-max="106" data-vel="30">106</span>건</strong>
                </li>                                 
            </ul>
        </div>
    </div>
</div>

<div class="coreComWrap">
   <div class="box inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s"><span>ATSTORE</span>핵심역량</h2>
            <p class="wow fadeInDown" data-wow-delay="0.4s">앞서가는 트랜드와 끊임없이 발전해가는 골뱅이커뮤니케이션입니다.</p>
        </div>
        <div class="detail">
            <ul class="clearfix">
                <li class="wow bounceInUp" data-wow-delay="0.5s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/coreCom_icon1.png">
                    <strong>분석 및 컨설팅</strong>
                    <p>시장조사 및 소비자 트렌드 분석과<span>차별화된 컨설팅</span></p>
                </li>
                <li class="second wow bounceInUp" data-wow-delay="0.6s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/coreCom_icon2.png">
                    <strong>타겟팅</strong>
                    <p>트렌드 소비자에 맞춘<span>정확한 타겟팅</span></p>
                </li>
                <li class="wow bounceInUp" data-wow-delay="0.7s">
                    <img src="<?php echo G5_THEME_IMG_URL ?>/main/coreCom_icon3.png">
                    <strong>마케팅</strong>
                    <p>매출증대를 위한<span>마케팅 기획 및 실행</span></p>
                </li>                                 
            </ul>
        </div>
    </div>
</div>


<div class="portfolioWrap">
    <div class="inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s"><span>ATSTORE</span>PORTFOLIO</h2>
            <p class="wow fadeInDown" data-wow-delay="0.4s">앞서가는 트렌드와 끊임없이 발전해가는 골뱅이커뮤니케이션입니다.</p>
        </div>
        <div class="latest_wr wow bounceInUp" data-wow-delay="0.5s">
            <?php echo latest('theme/okcarousel', 'at01_gallery', 6, 0, 300,300);?>
        </div>
        <div class="latest_wr2 wow bounceInUp" data-wow-delay="0.5s">
            <?php echo latest('theme/pic_basic', 'at01_gallery', 6, 0, 300,300);?>
        </div>
        <div class="port_go">
            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=at01_gallery">포트폴리오 더보기</a>
        </div>
    </div>

</div>
<div class="consertWrap">
   <div class="box inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s"><span>ATSTORE</span>CONSERTING</h2>
        </div>
        <div class="latest_wr wow bounceInUp" data-wow-delay="0.4s">
            <div class="ing_projects">
                <?php echo latest('theme/basic', 'QA', 6, 24, 1);?>
            </div>
            
            <div class="news wow bounceInUp" data-wow-delay="0.5s">
                <?php echo latest('theme/basic', 'at01_news', 6, 24, 2);?>
            </div>
        </div>
    </div>
</div>
<div class="contactWrap">
    <div class="box inner">
        <div class="main_title">
            <h2 class="wow fadeInDown" data-wow-delay="0.3s"><span>CONTACT</span>US</h2>
            <p class="wow fadeInDown" data-wow-delay="0.4s">골뱅이커뮤니케이션으로 찾아오시는 길을 안내해드립니다.</p>
        </div>
        <div class="detail">
            <div id="daumRoughmapContainer1556788142621" class="root_daum_roughmap root_daum_roughmap_landing wow bounceInUp" style="width:100%;"></div>
            <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
            <script charset="UTF-8">
                new daum.roughmap.Lander({
                    "timestamp": "1556788142621",
                    "key": "tcr4",
                }).render();
            </script>
        </div>
    </div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>