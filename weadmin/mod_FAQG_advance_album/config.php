<?php
$array_home = array('ab_nm');
## Mod Table ###################################
$mod_tb_root = "md_cms";
$mod_tb_root_group = "md_cmg";
$mod_tb_root_subgroup = "md_cmsg";
$mod_tb_root_short = "md_short_urls";

$mod_tb_file = "md_cmf";
$mod_tb_fileTemp = "md_cmtp";
$mod_tb_root_album = "md_cma";
$mod_tb_root_albumTemp = "md_cmatp";

$mod_tb_setting = "md_cuss";

$array_masterkey = array('ab_hrm','ab_odc','ab_odw','ab_pap','ab_pcm');
$array_masterkey_fix_module = array('rs_ri');
$array_masterkey_shorturl = array('ab_nm');
## Mod Folder ###################################
$mod_fd_root = "mod_FAQG_advance_album";

$mod_fd_frontUrl = "career/list";
$mod_fd_frontdetailUrl = "career/detail";
## Setting Value ###################################
$modTxtShowPic=array("แสดงรูปภาพในหน้ารายละเอียด","ไม่แสดง","แสดง");
$modGroupType =array("","รายละเอียดภายในเว็บไซต์" ,"เชื่อมโยงภายนอก");
$modType =array("","แสดงหน้ารายละเอียด" ,"ไม่แสดงหน้ารายละเอียด");
$modTypeTheme =array("","Group Theme 1" ,"Group Theme 2");
$modTypeSub =array("","ไม่แสดงกลุ่มย่อย" ,"แสดงกลุ่มย่อย");
$modTypeUrl =array("","ไม่แสดงผล" ,"แสดงผล");
// print_pre();
if ($_SESSION[$valSiteManage."core_session_language"] == 'Eng') {
    $modTxtTarget=array("","Open the original window","Open a new window");
} else {
    $modTxtTarget=array("","เปิดหน้าต่างเดิม","เปิดหน้าต่างใหม่");
}


## URL Search ###################################
$mod_url_search_th = "th/|page|";
$mod_url_search_en = "en/|page|";
// $mod_url_search_cn = "cn/|page|";

## Mod Link ###################################
$urlSegment = array(
    'ab_odw' => 'about',
    'ab_pap' => 'about',
    'ab_pcm' => 'about',
    'ab_hrm' => 'about',
    'ab_nm' => 'about',
    'rs_ri' => 'research',
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

$sizeWidthPicG="295";
$sizeHeightPicG="580";

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
