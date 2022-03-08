<?php
include_once('./_common.php');
include_once(G5_THEME_PATH.'/head.php');
?>
  <script>
  new WOW().init();
  </script>
  
<div class="ing_bnr_Wrap">
    <div class="bnrimg"><img src="<?php echo G5_THEME_IMG_URL?>/company/directions_banner.png" alt=""><br style="clear:both;"><br style="clear:both;"></div>
 <div class="bnrtxtwrap">
    <h3 class="wow fadeInDown">COMPANY</h3>
     <div class="bnrline wow fadeInDown" data-wow-delay="0.1s"></div>
    <p class="wow fadeInDown" data-wow-delay="0.2s">골뱅이스토어는 최선의 서비스를 제공합니다.</p>
    </div>

</div>
<div class="mdlTxt">
    <h2 class="wow flipInX" data-wow-duration="2s">찾아오시는 길</h2>
    <p class="wow flipInX mdlTxt_direc_p" data-wow-delay="0.3s">골뱅이스토어로 찾아오시는 길을 안내해드립니다.</p>
</div>

<div class="directions">
    <div class="inner">
        <div class="map_area">
                        <!-- * 카카오맵 - 지도퍼가기 -->
            <!-- 1. 지도 노드 -->
            <div id="daumRoughmapContainer1556788142621" class="root_daum_roughmap root_daum_roughmap_landing wow bounceInUp" style="width:100%;"></div>

            <!--
	2. 설치 스크립트
	* 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
-->
            <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

            <!-- 3. 실행 스크립트 -->
            <script charset="UTF-8">
                new daum.roughmap.Lander({
                    "timestamp": "1556788142621",
                    "key": "tcr4",
                    "mapHeight": "300",
                }).render();
            </script>
        </div>
        <div class="map_desc">
            <div class="map_desc_box wow bounceInUp">
                <div class="map_title clearfix">
                    <span class="map_icon1"></span>
                    <h3>주소</h3>
                </div>
                <ul class="map_list clearfix">
                    <li class="map_item">
                        <p class="item_desc">
                            서울특별시 금천구 가산디지털 1로 137 IT캐슬2차 401호
                        </p>
                    </li>
                </ul>
            </div>
            <div class="map_desc_box wow bounceInUp">
                <div class="map_title clearfix">
                    <span class="map_icon1"></span>
                    <h3>대중교통</h3>
                </div>
                <ul class="map_list clearfix">
                    <li class="map_item">
                        <p class="item_desc">
                            1호선, 7호선 가산디지털단지역 5번 출구로 나와서 우림라이온스밸리 앞에 있는 횡단보도 건넌 후 약 130m 직진
                        </p>
                    </li>
                    <li class="map_item bus_info">
                        <ul class="map_2list clearfix">
                            <li class="map_2item clerfix">
                                <span class="bus_line">지선</span>
                                <p class="bus_number">21번</p>
                            </li>
                            <li class="map_2item clearfix">
                                <span class="bus_line blue">간선</span>
                                <p class="bus_number">503번</p>
                            </li>
                        </ul>
                        <p class="item_desc">
                            디지털3단지사거리 정류장에서 하차 후 야치과의원 방면으로 횡단 후 약 205m 이동 뒤 왼쪽 방향으로 돌고 약 150m 직진
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>