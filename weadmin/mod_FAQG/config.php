<?php
$array_home = array('nw');
## Mod Table ###################################
$mod_tb_root = "md_cms";
$mod_tb_root_group = "md_cmg";

// $mod_tb_file = "md_cmf";
// $mod_tb_fileTemp = "md_cmtp";
// $mod_tb_root_album = "md_cma";
// $mod_tb_root_albumTemp = "md_cmatp";

$mod_tb_setting = "md_cuss";


## Mod Masterkey ###################################
$arr_masterkey_link = array('wb_book');

## Mod Folder ###################################
$mod_fd_root = "mod_FAQG";

$mod_fd_frontUrl = "career/list";
$mod_fd_frontdetailUrl = "career/detail";
## Setting Value ###################################
$modTxtShowPic=array("แสดงรูปภาพในหน้ารายละเอียด","ไม่แสดง","แสดง");
$modGroupType =array("","รายละเอียดภายในเว็บไซต์" ,"เชื่อมโยงภายนอก");
// print_pre();
if ($_SESSION[$valSiteManage."core_session_language"] == 'Eng') {
    $modTxtTarget=array("","Open the original window","Open a new window");
} else {
    $modTxtTarget=array("","เปิดหน้าต่างเดิม","เปิดหน้าต่างใหม่");
}


## URL Search ###################################
$mod_url_search_th = "th/|page|/detail";
$mod_url_search_en = "en/|page|/detail";
$mod_url_search_cn = "cn/|page|/detail";

## Mod Link ###################################
$urlSegment = array(
    'trw_web' => 'training',
    'is_rs' => 'information-service',
);

## Size Photo ###################################
// $sizeWidthPic="380";
// $sizeHeightPic="457";

$sizeWidthPic="1180";
$sizeHeightPic="520";

$sizeWidthIcon="100";
$sizeHeightIcon="100";

$sizeWidthOff="50";
$sizeHeightOff="50";

// $sizeWidthPicG="580";
// $sizeHeightPicG="295";

$sizeWidthAlbum="980";
$sizeHeightAlbum="490";

$sizeWidthAlbumOff="250";
$sizeHeightAlbumOff="125";

## Mod Path RSS ###################################
$mod_fullpath_pictures  = $core_fullpath_rss."/".$masterkey."/pictures";

## Mod Path ###################################

$mod_path_html        = $core_pathname_upload."/".$masterkey."/html";
$mod_path_html_fornt  = $core_pathname_upload_fornt."/".$masterkey."/html";

$mod_path_file        = $core_pathname_upload."/".$masterkey."/file";
$mod_path_file_fornt  = $core_pathname_upload_fornt."/".$masterkey."/file";

$mod_path_pictures        = $core_pathname_upload."/".$masterkey."/pictures";
$mod_path_pictures_fornt  = $core_pathname_upload_fornt."/".$masterkey."/pictures";


$mod_path_office        = $core_pathname_upload."/".$masterkey."/office";
$mod_path_office_fornt  = $core_pathname_upload_fornt."/".$masterkey."/office";

$mod_path_real        = $core_pathname_upload."/".$masterkey."/real";
$mod_path_real_fornt  = $core_pathname_upload_fornt."/".$masterkey."/real";

$mod_path_album        = $core_pathname_upload."/".$masterkey."/album";
$mod_path_album_fornt  = $core_pathname_upload_fornt."/".$masterkey."/album";

$mod_path_vdo        = $core_pathname_upload."/".$masterkey."/vdo";
$mod_path_vdo_fornt  = $core_pathname_upload_fornt."/".$masterkey."/vdo";



## Mod Lang Conf ###################################
if($_REQUEST['inputLt']=="Thai"){
	$mod_lang_set ="";
}else if($_REQUEST['inputLt']=="Eng"){
	$mod_lang_set ="en";
}else{
	$mod_lang_set ="";
}

?>
