<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<style>
#reg_result{ padding: 180px 10px;background: #eee;  min-height: 700px; }
#reg_result .btn_submit{width: auto; background: #555;}
.reg-result-txt{}
#reg_result h2 strong {color: #DC1826;}
.reg_result_con {  width: 740px; margin: 0 auto;border: 1px solid #bbb;padding:30px 20px;background: #fff;border-top: 3px solid #444;}
	
@media screen and (max-width:768px) {
	.reg_result_con {width: 100%;}
	#reg_result { padding: 100px 10px;min-height: 0;}
	#reg_result h2 {font-size: 22px;}
	#reg_result .reg_result_p {font-size: 18px; }
	.reg-result-txt{line-height: 16px; font-size: 14px;  word-break: keep-all;}
	.reg-result-txt br {display: none;}	
	#reg_result .btn_submit {font-size: 16px;height: 35px;line-height: 35px;}
}

</style>
<!-- 회원가입결과 시작 { -->
<div id="reg_result">
<div class="reg_result_con">
    <h2>회원가입이 완료되었습니다.</h2>
    <p class="reg_result_p">
        <strong><?php echo get_text($mb['mb_name']); ?></strong>님의 회원가입을 축하합니다.<br>
    </p>

    <?php if (is_use_email_certify()) {  ?>
    <p>
        회원 가입 시 입력하신 이메일 주소로 인증메일이 발송되었습니다.<br>
        발송된 인증메일을 확인하신 후 인증처리를 하시면 사이트를 원활하게 이용하실 수 있습니다.
    </p>
    <div id="result_email">
        <span>아이디</span>
        <strong><?php echo $mb['mb_id'] ?></strong><br>
        <span>이메일 주소</span>
        <strong><?php echo $mb['mb_email'] ?></strong>
    </div>
    <p>
        이메일 주소를 잘못 입력하셨다면, 사이트 관리자에게 문의해주시기 바랍니다.
    </p>
    <?php }  ?>

    <p class="reg-result-txt">
        회원님의 비밀번호는 아무도 알 수 없는 암호화 코드로 저장되므로 안심하셔도 좋습니다.<br>
        아이디, 비밀번호 분실시에는 회원가입시 입력하신 이메일 주소를 이용하여 찾을 수 있습니다.
    </p>

    <p class="reg-result-txt">
        회원 탈퇴는 언제든지 가능하며 일정기간이 지난 후, 회원님의 정보는 삭제하고 있습니다.<br>
        감사합니다.
    </p>

        <a href="<?php echo G5_URL ?>/" class="btn_submit">메인으로</a>

</div>
</div>
<!-- } 회원가입결과 끝 -->