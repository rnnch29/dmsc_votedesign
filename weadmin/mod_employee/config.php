<?php
## Mod Table ###################################
$mod_tb_root = "md_cms";

## Mod Folder ###################################
$mod_fd_root = "mod_benefit";

## Setting Value ###################################
$modTxtTarget=array("","เปิดหน้าต่างเดิม","เปิดหน้าต่างใหม่");

// ## Mod Link ###################################
// $urlSegment = array(
//     'vdo' => 'video',
// );

## Size Pic ###################################
$sizeWidthReal="1920";
$sizeHeightReal="310";

$sizeWidthPic="800";
$sizeHeightPic="800";

$sizeWidthOff="50";
$sizeHeightOff="50";

## Mod Path ###################################
$mod_path_office        = $core_pathname_upload."/".$masterkey."/office";
$mod_path_office_fornt  = $core_pathname_upload_fornt."/".$masterkey."/office";

$mod_path_real        = $core_pathname_upload."/".$masterkey."/real";
$mod_path_real_fornt  = $core_pathname_upload_fornt."/".$masterkey."/real";

$mod_path_pictures        = $core_pathname_upload."/".$masterkey."/pictures";
$mod_path_pictures_fornt  = $core_pathname_upload_fornt."/".$masterkey."/pictures";

$mod_path_html        = $core_pathname_upload."/".$masterkey."/html";
$mod_path_html_fornt  = $core_pathname_upload_fornt."/".$masterkey."/html";

// $mod_path_vdo        = $core_pathname_upload."/".$masterkey."/vdo";
// $mod_path_vdo_fornt  = $core_pathname_upload_fornt."/".$masterkey."/vdo";

## Mod Path New###################################
$mod_pathnew_office        = $core_pathnew_name_upload."/".$masterkey."/office";
$mod_pathnew_real        = $core_pathnew_name_upload."/".$masterkey."/real";
$mod_pathnew_pictures        = $core_pathnew_name_upload."/".$masterkey."/pictures";
// $mod_pathnew_vdo       = $core_pathnew_name_upload."/".$masterkey."/vdo";


$mod_pathtransfer_office        = $core_pathtransfer_name_upload."/".$masterkey."/office";
$mod_pathtransfer_real        = $core_pathtransfer_name_upload."/".$masterkey."/real";
$mod_pathtransfer_pictures        = $core_pathtransfer_name_upload."/".$masterkey."/pictures";
// $mod_pathtransfer_vdo        = $core_pathtransfer_name_upload."/".$masterkey."/vdo";

## Mod Lang Conf ###################################
if($_REQUEST['inputLt']=="Thai"){
	$mod_lang_set ="";
}else if($_REQUEST['inputLt']=="Eng"){
	$mod_lang_set ="en";
}else{
	$mod_lang_set ="";
}


?>