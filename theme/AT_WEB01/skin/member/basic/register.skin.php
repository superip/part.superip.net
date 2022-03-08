<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<style>

</style>
<!-- 회원가입약관 동의 시작 { -->
<div>
    <div class="reg-inner">
    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    @include_once(get_social_skin_path().'/social_register.skin.php');
    ?>
    <div class="register_tit">
<!--        <h1>회원가입 </h1>  -->
    	<p class="reg-tit">회원가입 및 약관동의</p><span class="reg-tit-desc">join</span>
    </div>
    <form  name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

    <!-- <p>회원가입약관 및 개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.</p> -->
    <div id="fregister_chkall">
        <label for="chk_all">전체선택</label>
        <input type="checkbox" name="chk_all"  value="1"  id="chk_all">

    </div>
    <section id="fregister_term">
        <h2 class="reg-title"><!-- <i class="fa fa-check-square-o" aria-hidden="true"></i> --> 이용약관</h2>
        <textarea readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
        <fieldset class="fregister_agree">
            <input type="checkbox" name="agree" value="1" id="agree11">
            <label for="agree11">회원가입약관의 내용에 동의합니다.</label>
        </fieldset>
    </section>

    <section id="fregister_private">
        <h2 class="reg-title"><!-- <i class="fa fa-check-square-o" aria-hidden="true"></i>  -->개인정보처리방침안내</h2>
        <div>
               <div class="ind-agree-box">
                    <h5>수집하는 개인정보의 항목</h5>
                    <p class="ag-tit">회사는 회원가입, 상담, 서비스 신청 등을 위해 아래와 같은 개인정보를 수집하고 있습니다.</p>
                    <ul>
                        <li><strong>- 수집항목</strong> : <span class="privacy_column_list">아이디, 별명, 패스워드, 성명, e-mail, 주소, 전화번호, 휴대전화, 생년월일, 결혼, 추천인 아이디</span></li>
                        <li><strong>- 개인정보 수집방법</strong> : <span>홈페이지</span>(<span>회원가입</span>)</li>
                    </ul>

                    <h5>개인정보의 수집 및 이용목적</h5>
                    <p class="ag-tit">회사는 수집한 개인정보를 다음의 목적을 위해 활용합니다.</p>
                    <ul>
                        <li>
                            <strong>- 서비스 제공에 관한 계약 이행 및 서비스 제공에 따른 요금정산</strong>
                            <p>구매 및 요금 결제, 물품배송 또는 청구지 등 발송</p>
                        </li>
                        <li>
                            <strong>- 회원 관리</strong>
                            <p>회원제 서비스 이용에 따른 본인확인, 개인 식별, 불량회원의 부정 이용 방지와 비인가 사용 방지, 가입 의사 확인, 연령확인</p>
                        </li>
                    </ul>

                    <h5>개인정보의 보유 및 이용기간</h5>
                    <p class="ag-tit">회사는 개인정보 수집 및 이용목적이 달성된 후에는 예외 없이 해당 정보를 지체 없이 파기합니다.</p>
                </div>
        </div>

        <fieldset class="fregister_agree">
            <input type="checkbox" name="agree2" value="1" id="agree21">
            <label for="agree21">개인정보처리방침안내의 내용에 동의합니다.</label>
        </fieldset>
    </section>

    <div class="btn_confirm">
        <input type="submit" class="btn_submit" value="회원가입">
    </div>

    </form>

    <script>
    function fregister_submit(f)
    {
        if (!f.agree.checked) {
            alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree2.focus();
            return false;
        }

        return true;
    }
    
    jQuery(function($){
        // 모두선택
        $("input[name=chk_all]").click(function() {
            if ($(this).prop('checked')) {
                $("input[name^=agree]").prop('checked', true);
            } else {
                $("input[name^=agree]").prop("checked", false);
            }
        });
    });

    </script>
    </div>
</div>
<!-- } 회원가입 약관 동의 끝 -->
