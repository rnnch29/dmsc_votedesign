<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

// print_pre($_REQUEST['inputLt']);die;

		
	$sql_fileNew="SELECT ".$mod_tb_setting."_file , ".$mod_tb_setting."_fileen , ".$mod_tb_setting."_filecn FROM ".$mod_tb_setting." WHERE ".$mod_tb_setting."_id 	='".$_REQUEST['valDelFile']."' ";
	$query_fileNew=wewebQueryDB($coreLanguageSQL,$sql_fileNew);
	$row_fileNew=wewebFetchArrayDB($coreLanguageSQL,$query_fileNew);
	if ($_REQUEST['inputLt'] == 'Thai') {
		$downloadFile=$row_fileNew[0];
	} elseif ($_REQUEST['inputLt'] == 'Eng') {
		$downloadFile=$row_fileNew[1];
	} else {
		$downloadFile=$row_fileNew[2];
	}
	

	if(file_exists($mod_path_file."/".$downloadFile)) {
		@unlink($mod_path_file."/".$downloadFile);
	}	

	if ($_REQUEST['inputLt'] == 'Thai') {
		$update[]=$mod_tb_setting."_file  	= '' ";
		$update[]=$mod_tb_setting."_filename  	= '' ";
	} elseif ($_REQUEST['inputLt'] == 'Eng') {
		$update[]=$mod_tb_setting."_fileen  	= '' ";
		$update[]=$mod_tb_setting."_filenameen  	= '' ";
	} else {
		$update[]=$mod_tb_setting."_filecn  	= '' ";
		$update[]=$mod_tb_setting."_filenamecn  	= '' ";
	}

	
	$sql="UPDATE ".$mod_tb_setting." SET ".implode(",",$update)." WHERE ".$mod_tb_setting."_id='".$_REQUEST["valDelFile"]."'  ";
	// print_pre($sql);
	// die();
	$Query = wewebQueryDB($coreLanguageSQL, $sql);
		
	// $sql="DELETE FROM ".$mod_tb_setting." WHERE   ".$mod_tb_setting."_id='".$_REQUEST['valDelFile']."' ";
	// $Query=wewebQueryDB($coreLanguageSQL,$sql);
	
			
		// $sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid 	='".$_REQUEST['valEditID']."'   ORDER BY ".$mod_tb_file."_id ASC";
		// 	$query_file=wewebQueryDB($coreLanguageSQL,$sql);
		// 	$number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
		// 	if($number_row>=1){
		// 	$txtFile="";
		// 	while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
		// 	$linkRelativePath = $mod_path_file."/".$row_file[1];
		// 	$downloadFile = $row_file[1];
		// 	$downloadID = $row_file[0];
		// 	$downloadName = $row_file[2];
		// 	$countDownload= $row_file[3];
		// 	$imageType = strstr($downloadFile,'.');														
			
		//  	$txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=".$downloadID.";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>".$downloadName."".$imageType." | ".$langMod["file:type"].": ".$imageType."  | ".$langMod["file:size"].": ".get_IconSize($linkRelativePath)."<br/>";
									
		// 							 }
		// 							}
		// 	echo $txtFile;
include("../lib/disconnect.php");
			
?>