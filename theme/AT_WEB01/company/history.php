<?php
include_once('./_common.php');
include_once(G5_THEME_PATH.'/head.php');



?>
<style>

/*
.sub_bn {  display: table; width: 100%;}
.intro_sub { background: url(../img/company/intro_bg.jpg) no-repeat center center fixed; background-size: cover;}

.sub_bn {height: 310px;position: relative;}
.box {position: relative;}
.bnrline{width: 40px;height: 3px;background: #fff;margin: 20px auto 20px;}
.sub_top{position: absolute;margin: auto;top: 40%;bottom: 0;left: 0;right: 0;}
.sub_top{text-align: center; color: #fff}
.sub_top h3{ font-size: 40px;color: #fff;text-align: center;line-height: 40px;}
.sub_bn_desc  {font-size: 20px;color: #fff;text-align: center;line-height: 25px;}
*/
    
    
</style>

  <script>
  new WOW().init();
  </script>




<!--
<div id="sub_content">
       <div class="sub_bn intro_sub">
            <div class="sub_top">
                <h3 class="sub_bn_tit wow fadeInDown">연혁</h3>
                <div class="bnrline wow fadeInDown"></div>
                <p class="sub_bn_desc wow fadeInDown">가치있는 홈페이지를 만들기 위해 골뱅이스토어는 노력합니다.</p>
            </div>
        </div>
    <div class="box">
    
    </div>   
</div>
-->


<div id="sub_content">
    <div class="ing_bnr_Wrap">
        <div class="bnrimg"><img src="<?php echo G5_THEME_IMG_URL?>/company/intro_bg.jpg"></div>
        <div class="bnrtxtwrap">
            <h3 class="wow fadeInDown">HISTORY</h3>
            <div class="bnrline wow fadeInDown" data-wow-delay="0.1s"></div>
            <p class="wow fadeInDown" data-wow-delay="0.2s">가치있는 홈페이지를 만들기 위해 골뱅이스토어는 노력합니다.</p>
        </div>
    </div>
    
<div class="mdlTxt">
    <h2 class="wow flipInX" data-wow-duration="2s">연혁</h2>
    <p class="wow flipInX" data-wow-delay="0.3s">골뱅이스토어가 걸어 온 길입니다.</p>
</div>
    
    <div class="sub_con">
        <div class="inner">
            <div class="history_area">
            <!--빨#C80D21 파#0E58A4 -->
               <style>
                   .clearfix:after {content: ''; display: block; clear: both;}
                   .time_list {padding: 30px 0;  display: flex; align-items: center;}
                   .tl_line {position: relative; width: 160px; height: 160px; padding: 20px; border: 1px solid #ddd; border-radius: 50%;text-align: center;}
                   .tl_line:before {content: ''; position: absolute; top: 50%; left: 100%; width: 100px; height: 1px; background: #ddd;}
                    .tl_ood .tl_line:after{content: ''; position: absolute; top: 50%; right: -100px; width: 8px; height: 8px; margin-top: -4px; border-radius: 50%; background: #C80D21;}
                    .tl_even .tl_line:after{content: ''; position: absolute; top: 50%; right: -100px; width: 8px; height: 8px; margin-top: -4px; border-radius: 50%; background: #0E58A4;}
                    .time_list .year_cricle{padding: 20px;width: 100%; height: 100%; border-radius: 50%; display: table;}
                   .time_list .year_txt {width: 100%; height: 100%; background: #fff;border-radius: 50%; font-size: 20px; font-weight: 700;    display: table-cell;
                       vertical-align: middle;}   
                 .tl_ood  .year_cricle{background:#C80D21; }
                 .tl_even  .year_cricle{background:#0E58A4;}
                   
                   .tl_ood  .year_txt{color:#C80D21; }
                   .tl_even  .year_txt{color:#0E58A4;}
                   .time_list .tl_year {   margin-right: 80px;padding-right: 100px; }
                   .time_list .tl_txt {  width: 500px;  text-align: left;} 
                   .tl_txt li{margin-bottom: 5px;}
                   .tl_txt li:after{content: ''; display: block; clear: both;}
                   .tl_month {float: left;width: 15%; display: inline-block;padding:0 10px; font-weight: 700; font-size: 18px;}
                   .tl_info {float: left; width: 85%; display: inline-block; font-size: 18px;}
                   
                   .history_area {text-align: center;}
                   .timeline_box {display: inline-block; margin-bottom: 70px;}
                   
                   @media screen and (max-width:768px){
                        .time_list{display: block;}
                        .tl_line{display: inline-block; width: 120px; height: 120px; padding: 15px;}
                       .time_list .year_cricle {padding: 15px;}
                       .time_list .year_txt {font-size: 18px;}
                        .tl_line:before {top: 100%;left: 50%;width: 1px;height: 30px;}
                        .time_list .tl_year {margin: 0 auto;  padding-right: 0; padding-bottom: 35px;} 
                        .tl_even .tl_line:after {top: auto; right: 50%; bottom: -30px; margin-right: -4px; margin-top: 0;}
                        .tl_ood .tl_line:after {top: auto;right: 50%;bottom: -30px;margin-right: -4px;margin-top: 0;}
                     }
                   
                   @media screen and (max-width:600px){
                       .timeline_box{width: 100%;}
                       .time_list .tl_txt {width: 100%;}
                   }
                   @media screen and (max-width:480px){
                       
                       .tl_month {width: 20%; font-size: 16px;}
                       .tl_info {width: 80%; font-size: 16px;}
                       
                   }
                   
                </style>
               
                <div class="timeline_box">
                   
                        
                    
                        <div class="time_list tl_even clearfix wow fadeInUp" data-wow-delay="0.7s">
                            <div class="tl_year">
                               <div class="tl_line">
                                <div class="year_cricle">
                                    <p class="year_txt">2018</p>
                                </div>
                               </div>
                            </div>   
                            
                            <ul class="tl_txt">
                               <li>
                               <span class="tl_month">2월</span>
                              <p class="tl_info">움직이는 편의점 앱 프로젝트 수주</p>
                              </li>
                               <li>
                               <span class="tl_month">3월</span>
                              <p class="tl_info">움직이는 편의점 앱 프로젝트 수주</p>
                              </li>
                              <li>
                               <span class="tl_month">4월</span>
                              <p class="tl_info">(주)팀엔제이 "아이사랑" 앱 프로젝트 수주</p>
                              </li>
                            </ul>

                        </div>
                    
                        
                        
                        <div class="time_list tl_ood clearfix wow fadeInUp" data-wow-delay="0.7s">
                            <div class="tl_year">
                               <div class="tl_line">
                                <div class="year_cricle">
                                    <p class="year_txt">2017</p>
                                </div>
                               </div>
                            </div>   
                            
                            <ul class="tl_txt">
                              <li>
                               <span class="tl_month">1월</span>
                              <p class="tl_info">(자회사)포인트플러스 웹/앱 프로젝트 구축</p>
                              </li>
                              <li>
                               <span class="tl_month">4월</span>
                              <p class="tl_info">퍼피 웹 프로젝트 구축</p>
                              </li>
                            </ul>

                        </div>
                        
                   
                   
                        
                   
                   
                         <div class="time_list tl_even clearfix wow fadeInUp" data-wow-delay="0.7s">
                            <div class="tl_year">
                               <div class="tl_line">
                                <div class="year_cricle">
                                    <p class="year_txt">2016</p>
                                </div>
                               </div>
                            </div>   
                            
                            <ul class="tl_txt">
                               <li>
                               <span class="tl_month">9월</span>
                              <p class="tl_info">모두나와 앱 프로젝트 구축</p>
                              </li>
                            </ul>

                        </div>
                        
                        <div class="time_list tl_ood clearfix wow fadeInUp" data-wow-delay="0.7s">
                            <div class="tl_year">
                               <div class="tl_line">
                                <div class="year_cricle">
                                    <p class="year_txt">2015</p>
                                </div>
                               </div>
                            </div>   
                            
                            <ul class="tl_txt">
                              <li>
                               <span class="tl_month">1월</span>
                              <p class="tl_info">바로나와 앱 프로젝트 구축</p>
                              </li>
                              <li>
                               <span class="tl_month">4월</span>
                              <p class="tl_info">큐레이팅커뮤니티 퍼비앱 프로젝트 구축</p>
                              </li>
                            </ul>

                        </div>
                        
                        
                        
                         <div class="time_list tl_even clearfix wow fadeInUp" data-wow-delay="0.7s">
                            <div class="tl_year">
                               <div class="tl_line">
                                <div class="year_cricle">
                                    <p class="year_txt">2014</p>
                                </div>
                               </div>
                            </div>   
                            
                            <ul class="tl_txt">
                              <li>
                               <span class="tl_month">5월</span>
                              <p class="tl_info">캐쉬넛 앱 프로젝트 구축</p>
                              </li>
                               <li>
                               <span class="tl_month">5월</span>
                              <p class="tl_info">가산메뉴픽 웹/앱 프로젝트 구축</p>
                              </li>
                               <li>
                               <span class="tl_month">11월</span>
                              <p class="tl_info">시스템포유 도매쇼핑몰 웹 프로젝트 구축 </p>
                              </li>
                            </ul>

                        </div>
                        
                        <div class="time_list tl_ood clearfix wow fadeInUp" data-wow-delay="0.7s">
                            <div class="tl_year">
                               <div class="tl_line">
                                <div class="year_cricle">
                                    <p class="year_txt">2013</p>
                                </div>
                               </div>
                            </div>   
                            
                            <ul class="tl_txt">
                              <li>
                               <span class="tl_month">2월</span>
                              <p class="tl_info">어플페이지 웹 프로젝트 구축</p>
                              </li>
                            </ul>

                        </div>
                        
                        
                       
                        
                        
                </div>
            
            </div>
        </div>
    </div>

</div>




<?php
include_once(G5_THEME_PATH.'/tail.php');
?>