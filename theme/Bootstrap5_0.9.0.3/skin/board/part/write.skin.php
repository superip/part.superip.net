<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

sql_query(" ALTER TABLE `{$write_table}` CHANGE `wr_10` `wr_10` TEXT NOT NULL ", false);
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/custom.css">', 0);

function get_wr_2_check($wr_options='', $wr_2='')
{
    $categories_2 = explode("|", $wr_options); // 구분자가 | 로 되어 있음
    $str = "";
    for ($i=0; $i<count($categories_2); $i++) {
        $category_2 = trim($categories_2[$i]);

        if (!$category_2) continue;
		//echo $category_6."<BR>";
        $str .= "<input type=\"checkbox\" name=\"wr2[]\" value=\"$categories_2[$i]\"&nbsp;";
        if ( strpos($wr_2, $category_2) !== false) {
			//echo strpos($wr_6, $category_6);
            $str .= ' checked';
        }
        $str .= " style=\"width:20px;height:20px;border:1px;\"  >&nbsp;<span style=\"display:inline-block;height:22px; margin:7px 10px 0 0; vertical-align:middle;\">$categories_2[$i]</span> \n";
	}

	$categories = explode("|", $wr_options); // 구분자가 | 로 되어 있음
	$str = "";
	for ($i=0; $i<count($categories); $i++) {
		$category = trim($categories[$i]);
		if (!$category) continue;

		$str .= "<option value=\"$categories[$i]\"";
		if ($category == $wr_2) {
			$str .= ' selected="selected"';
		}
		$str .= ">$categories[$i]</option>\n";
	}

    return $str;
}
$wr_options = "메인보드|디스크|캐시베터리|팬|기타";
$wr_2_options = '';
$wr_2_option = get_wr_2_check($wr_options, $wr_2);

?>
<?
function cal($id) {
    include_once(G5_PLUGIN_PATH."/jquery-ui/datepicker.php");
    echo "<script>
        $(function(){
        $('#$id').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'yy-mm-dd', showButtonPanel: true, yearRange: 'c-99:c+99', maxDate: '+0d' });
        });
        </script>
        ";
}
?>
<div>

	<blockquote><h3><?php echo $g5['title'] ?></h3></blockquote>

	<form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
	<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
	<input type="hidden" name="w" value="<?php echo $w ?>">
	<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
	<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
	<input type="hidden" name="sca" value="<?php echo $sca ?>">
	<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
	<input type="hidden" name="stx" value="<?php echo $stx ?>">
	<input type="hidden" name="spt" value="<?php echo $spt ?>">
	<input type="hidden" name="sst" value="<?php echo $sst ?>">
	<input type="hidden" name="sod" value="<?php echo $sod ?>">
	<input type="hidden" name="page" value="<?php echo $page ?>">

	<?php
	$option = '';
	$option_hidden = '';
	if ($is_notice || $is_html || $is_secret || $is_mail) {
		$option = '';
		if ($is_notice) {

			$option .= '<div class="form-check form-check-inline"><input type="checkbox" id="notice" name="notice" value="1" class="form-check-input" '.$notice_checked.'><label class="form-check-label" for="notice">공지</label></div>';
		}

		if ($is_html) {
			if ($is_dhtml_editor) {
				$option_hidden .= '<input type="hidden" value="html1" name="html">';
			} else {
				$option .= '<div class="form-check form-check-inline"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" class="form-check-input" '.$html_checked.'><label class="form-check-label" for="html">HTML</label></div>';
			}
		}

		if ($is_secret) {
			if ($is_admin || $is_secret==1) {
				$option .= '<div class="form-check form-check-inline"><input type="checkbox" id="secret" name="secret" value="secret" class="form-check-input" '.$secret_checked.'><label class="form-check-label" for="secret">비밀글</label></div>';
			} else {
				$option_hidden .= '<input type="hidden" name="secret" value="secret">';
			}
		}

		if ($is_mail) {
			$option .= '<div class="form-check form-check-inline"><input type="checkbox" id="mail" name="mail" value="mail" class="form-check-input" '.$recv_email_checked.'><label class="form-check-label" for="mail">답변메일받기</label></div>';
		}
	}

	echo $option_hidden;
	?>

	<?php if ($is_category) { ?>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">분류</label>
		<div class="col-sm-10">
			<select class="form-select" name="ca_name" id="ca_name" required>
				<option value="">분류를 선택하세요</option>
				<?php echo $category_option ?>
			</select>
		</div>
	</div>
	<?php } ?>

	<?php if ($is_name) { ?>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">이름</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required placeholder="이름">
		</div>
	</div>
	<?php } ?>

	<?php if ($is_password) { ?>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">비밀번호</label>
		<div class="col-sm-10">
			<input class="form-control" type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> placeholder="비밀번호">
		</div>
	</div>
	<?php } ?>

	<?php if ($is_email) { ?>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">이메일</label>
		<div class="col-sm-10">
			<input class="form-control" type="email" name="wr_email" value="<?php echo $email ?>" id="wr_email" placeholder="이메일">
		</div>
	</div>
	<?php } ?>

	<?php if ($is_homepage) { ?>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">홈페이지</label>
		<div class="col-sm-10">
			<input class="form-control" type="url" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" placeholder="홈페이지">
		</div>
	</div>
	<?php } ?>

	<?php if ($option) { ?>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">옵션</label>
		<div class="col-sm-10 pt-2">
			<?php echo $option ?>
		</div>
	</div>
	<?php } ?>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">요청일자</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="wr_1" value="<?php echo $wr_1; ?>" id="wr_1" placeholder="파트요청일을 입력해주세요.">
			<? cal("wr_1"); ?>
		</div>

		<label class="col-sm-2 col-form-label">파트종류</label>
		<div class="col-sm-4">
			<!--input class="form-control" type="text" name="wr_2" value="<?php echo $wr_2; ?>" id="wr_2" placeholder="파트종류를 입력해주세요."-->
			<select class="form-select" name="wr_2" id="wr_2" required>
				<option value="">분류를 선택하세요</option>
				<?php echo $wr_2_option ?>
			</select>
		</div>
	</div>
	
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">파트명</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="wr_3" value="<?php echo $wr_3; ?>" id="wr_3" placeholder="파트명을 입력해주세요.">
		</div>
		<label class="col-sm-2 col-form-label">파트넘버</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="wr_4" value="<?php echo $wr_4; ?>" id="wr_4" placeholder="파트넘버를 입력해주세요.">
		</div>
	</div>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">호스트명</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="wr_5" value="<?php echo $wr_5; ?>" id="wr_5" placeholder="호스트명을 입력해주세요.">
		</div>
		<label class="col-sm-2 col-form-label">업무명</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="wr_8" value="<?php echo $wr_8; ?>" id="wr_8" placeholder="호스트명을 입력해주세요.">
		</div>
	</div>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">모델명</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="wr_6" value="<?php echo $wr_6; ?>" id="wr_6" placeholder="모델명을 입력해주세요.">
		</div>
		<label class="col-sm-2 col-form-label">SN</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="wr_7" value="<?php echo $wr_7; ?>" id="wr_7" placeholder="SN를 입력해주세요.">
		</div>
	</div>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">장애원인</label>
		
		<div class="col-sm-10">
			<div id="autosave_wrapper">
				<div class="input-group">
					<input class="form-control" type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required placeholder="제목">
					<?php if ($is_member) { // 임시 저장된 글 기능 ?>
					<script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
					<?php if($editor_content_js) echo $editor_content_js; ?>
					<button type="button" id="btn_autosave" class="btn btn-outline-secondary" style="width:140px">임시저장 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
					<?php } ?>
				</div>

				<div id="autosave_pop">
					<strong>임시 저장된 글 목록</strong>
					<ul></ul>
					<div><button type="button" class="autosave_close">닫기</button></div>
				</div>
			</div>
		</div>        
	</div>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">조치내용</label>
		<div class="wr_content col-sm-10 <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
			<?php if($write_min || $write_max) { ?>
			<!-- 최소/최대 글자 수 사용 시 -->
			<small>이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</small>
			<?php } ?>
			<?php if(!$is_dhtml_editor) $editor_html = str_replace('<textarea id="wr_content" name="wr_content"', '<textarea id="wr_content" name="wr_content" class="form-control"', $editor_html); ?>
			<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
			<?php if($write_min || $write_max) { ?>
			<!-- 최소/최대 글자 수 사용 시 -->
			<div class="d-flex justify-content-end"><small><span id="char_count"></span> 글자</small></div>
			<?php } ?>
		</div>
	</div>
	
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">담당자</label>
		<div class="col-sm-4">
			<input class="form-control" type="text" name="wr_9" value="<?php echo $wr_9; ?>" id="wr_9" placeholder="담당자 이름 입력해주세요.">
		</div>
	</div>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">사인</label>
		<div class="col-sm-6">
			
                    <?php if($write['wr_10']) { ?>
                        <br><img src="<?php echo $write['wr_10'] ?>">
                    <?php } ?>
                        <input type="hidden" name="wr_10" value="<?php echo $write['wr_10'] ?>" class="form-control input-sm">
                        <div id="wr_10"></div>                    

                    <style type="text/css">
                        #div_signcontract{ width: 350px; }
                        .popupHeader{ margin: 10px; }
                    </style>
                    <script type="text/javascript">
                        var isSign = false;
                        var leftMButtonDown = false;
                        
                        jQuery(function(){
                            //Initialize sign pad
                            init_Sign_Canvas();
                        });
                        
                        function fun_submit() {
                            if(isSign) {
                                var canvas = $("#canvas").get(0);
                                var imgData = canvas.toDataURL();
                                jQuery('#page').find('p').remove();
                                jQuery('#page').find('img').remove();
                                jQuery('#page').append(jQuery('<p>아래의 서명날인은 사용합니다.</p>'));
                                jQuery('#wr_10').append($('<input type="hidden" name="wr_10" class="form-control input-sm">').attr('value',imgData));
                                
                                closePopUp();
                            } else {
                                alert('Please sign');
                            }
                        }
                        
                        function closePopUp() {
                            jQuery('#divPopUpSignContract').popup('close');
                            jQuery('#divPopUpSignContract').popup('close');
                        }
                        
                        function init_Sign_Canvas() {
                            isSign = false;
                            leftMButtonDown = false;
                            
                            //Set Canvas width
                            var sizedWindowWidth = $(window).width();
                            if(sizedWindowWidth > 700)
                                sizedWindowWidth = $(window).width() / 2;
                            else if(sizedWindowWidth > 400)
                                sizedWindowWidth = sizedWindowWidth - 100;
                            else
                                sizedWindowWidth = sizedWindowWidth - 50;
                             
                             //$("#canvas").width(sizedWindowWidth);
                             $("#canvas").width(350);
                             $("#canvas").height(140);
                             $("#canvas").css("border","1px solid #000");
                            
                             var canvas = $("#canvas").get(0);
                            
                             canvasContext = canvas.getContext('2d');

                             if(canvasContext)
                             {
                                 //canvasContext.canvas.width  = sizedWindowWidth;
                                 canvasContext.canvas.width  = 350;
                                 canvasContext.canvas.height = 140;

                                 canvasContext.fillStyle = "#fff";
                                 canvasContext.fillRect(0,0,sizedWindowWidth,200);
                                 
                                 canvasContext.moveTo(50,150);
                                 canvasContext.lineTo(sizedWindowWidth-50,150);
                                 canvasContext.stroke();
                                
                                 canvasContext.fillStyle = "#000";
                                 canvasContext.font="20px Arial";
                                 canvasContext.fillText("x",40,155);
                             }
                             // Bind Mouse events
                             $(canvas).on('mousedown', function (e) {
                                 if(e.which === 1) { 
                                     leftMButtonDown = true;
                                     canvasContext.fillStyle = "#000";
                                     var x = e.pageX - $(e.target).offset().left;
                                     var y = e.pageY - $(e.target).offset().top;
                                     canvasContext.moveTo(x, y);
                                 }
                                 e.preventDefault();
                                 return false;
                             });
                            
                             $(canvas).on('mouseup', function (e) {
                                 if(leftMButtonDown && e.which === 1) {
                                     leftMButtonDown = false;
                                     isSign = true;
                                 }
                                 e.preventDefault();
                                 return false;
                             });
                            
                             // draw a line from the last point to this one
                             $(canvas).on('mousemove', function (e) {
                                 if(leftMButtonDown == true) {
                                     canvasContext.fillStyle = "#000";
                                     var x = e.pageX - $(e.target).offset().left;
                                     var y = e.pageY - $(e.target).offset().top;
                                     canvasContext.lineTo(x,y);
                                     canvasContext.stroke();
                                 }
                                 e.preventDefault();
                                 return false;
                             });
                             
                             //bind touch events
                             $(canvas).on('touchstart', function (e) {
                                leftMButtonDown = true;
                                canvasContext.fillStyle = "#000";
                                var t = e.originalEvent.touches[0];
                                var x = t.pageX - $(e.target).offset().left;
                                var y = t.pageY - $(e.target).offset().top;
                                canvasContext.moveTo(x, y);
                                
                                e.preventDefault();
                                return false;
                             });
                             
                             $(canvas).on('touchmove', function (e) {
                                canvasContext.fillStyle = "#000";
                                var t = e.originalEvent.touches[0];
                                var x = t.pageX - $(e.target).offset().left;
                                var y = t.pageY - $(e.target).offset().top;
                                canvasContext.lineTo(x,y);
                                canvasContext.stroke();
                                
                                e.preventDefault();
                                return false;
                             });
                             
                             $(canvas).on('touchend', function (e) {
                                if(leftMButtonDown) {
                                    leftMButtonDown = false;
                                    isSign = true;
                                }
                             
                             });
                        }
                    </script>

                    <div data-role="page">
                        <div id="page" data-role="content">
                        </div>	
                        <div data-role="popup" id="divPopUpSignContract">
                            <div class="ui-content popUpHeight">
                                <div id="div_signcontract">
                                    <canvas id="canvas">Canvas is not supported</canvas>
                                    <div>
                                        <input id="btnSubmitSign" type="button" data-inline="true" data-mini="true" data-theme="b" value="서명확인" onclick="fun_submit()" />
                                        <input id="btnClearSign" type="button" data-inline="true" data-mini="true" data-theme="b" value="Clear" onclick="init_Sign_Canvas()" />
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>

		</div>
	</div>
	<?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">링크<?php echo $i?></label>
		<div class="col-sm-10">
			<input class="form-control" type="url" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" placeholder="링크주소를 입력해주세요.">
		</div>
	</div>
	<?php } ?>

	<?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">파일<?php echo $i+1 ?></label>
		<div class="col-sm-10">
			<div class="input-group">
				<input class="form-control" type="file" id="formFile" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="<?php echo $upload_max_filesize ?> 이하만 업로드 가능" data-default="<?php echo ($w == 'u') ? $file[$i]['source'] : ''; ?>">
				<?php if ($is_file_content) { ?>
				<input class="form-control" type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." placeholder="파일 설명을 입력해주세요.">
				<?php } ?>
			</div>
			<?php if($w == 'u' && $file[$i]['file']) { ?>
			<div class="pt-1">
			<input type="checkbox" class="form-check-input" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1">
			<label class="form-check-label" for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>

	<?php if ($is_use_captcha) { ?>
	<div class="row mb-2">
		<label class="col-sm-2 col-form-label">보안</label>
		<div class="col-sm-10">
			<?php echo $captcha_html ?>
		</div>
	</div>
	<?php } ?>

	<div class="d-flex justify-content-end mt-4">
		<div class="btn-group xs-100">
			<input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn btn-primary">
			<a href="<?php echo get_pretty_url($bo_table); ?>" class="btn btn-outline-primary">취소</a>
		</div>
	</div>

	</form>

</div>

<script>
<?php if($write_min || $write_max) { ?>
// 글자수 제한
var char_min = parseInt(<?php echo $write_min; ?>); // 최소
var char_max = parseInt(<?php echo $write_max; ?>); // 최대
check_byte("wr_content", "char_count");

$(function() {
	$("#wr_content").on("keyup", function() {
		check_byte("wr_content", "char_count");
	});
});

<?php } ?>
function html_auto_br(obj)
{
	if (obj.checked) {
		result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
		if (result)
			obj.value = "html2";
		else
			obj.value = "html1";
	}
	else
		obj.value = "";
}

function fwrite_submit(f)
{
	<?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

	var subject = "";
	var content = "";
	$.ajax({
		url: g5_bbs_url+"/ajax.filter.php",
		type: "POST",
		data: {
			"subject": f.wr_subject.value,
			"content": f.wr_content.value
		},
		dataType: "json",
		async: false,
		cache: false,
		success: function(data, textStatus) {
			subject = data.subject;
			content = data.content;
		}
	});

	if (subject) {
		alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
		f.wr_subject.focus();
		return false;
	}

	if (content) {
		alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
		if (typeof(ed_wr_content) != "undefined")
			ed_wr_content.returnFalse();
		else
			f.wr_content.focus();
		return false;
	}

	if (document.getElementById("char_count")) {
		if (char_min > 0 || char_max > 0) {
			var cnt = parseInt(check_byte("wr_content", "char_count"));
			if (char_min > 0 && char_min > cnt) {
				alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
				return false;
			}
			else if (char_max > 0 && char_max < cnt) {
				alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
				return false;
			}
		}
	}

	<?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

	document.getElementById("btn_submit").disabled = "disabled";

	return true;
}
</script>
