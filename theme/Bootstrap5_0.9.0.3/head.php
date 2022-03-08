<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

switch(substr($_SERVER['SCRIPT_FILENAME'], strlen(G5_PATH)))
{
	case '/bbs/register.php':
	case '/bbs/register_form.php':
	case '/bbs/register_result.php':
	case '/plugin/social/register_member.php':
		include_once(G5_THEME_PATH.'/head.def.php');
		return;
		break;
}

include_once(G5_THEME_PATH.'/head.def.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

include_once(G5_THEME_PATH.'/functions.php');

$menu_data = get_menu_db(0, true);
get_active_menu($menu_data);

$g5['sidebar']['right'] = !defined('_INDEX_')&&is_file(G5_PATH.'/sidebar.right.php') ? true : false;

if(defined('_INDEX_')) include G5_THEME_PATH.'/newwin.inc.php';
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
	<div class="container">
		<a class="navbar-brand" href="<?php echo G5_URL; ?>"><h1>SUPERIP</h1><i!--mg height="48" src="<?php echo G5_IMG_URL; ?>/logo.png"--></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TopNavbar" aria-controls="TopNavbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="TopNavbar">
			<ul class="navbar-nav me-auto">
				<?php echo get_layout_menu($menu_data) ?>
				<?php echo outlogin('theme/basic') ?>
			</ul>
			<form action="<?php echo G5_BBS_URL ?>/search.php" method="get">
				<input type="hidden" name="sfl" value="wr_subject||wr_content">
				<input type="hidden" name="sop" value="and">
				<div class="input-group mt-2 mb-1 my-md-0">
					<input class="form-control" type="search" name="stx" value="<?=$stx?>" placeholder="검색어" aria-label="Search">
					<button class="btn btn-secondary" type="submit">검색</button>
				</div>
			</form>
		</div>
	</div>
</nav>

<div class="container">
	<?php if($g5['sidebar']['right']) { ?>
		<div class="row">
			<div class="col-lg-9 mb-4">
	<?php }