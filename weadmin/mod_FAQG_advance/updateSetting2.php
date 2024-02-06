<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

// print_pre($mod_path_html);die;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Contant</title>
</head>
<body>
<?php
	if($execute=="update"){
		$randomNumber = randomNameupdate(2);

		if(!is_dir($core_pathname_upload."/".$masterkey)) { mkdir($core_pathname_upload."/".$masterkey,0777); }
		if(!is_dir($mod_path_html)) { mkdir($mod_path_html,0777); }


		if(@file_exists($mod_path_html."/".$_REQUEST['inputHtmlDel'])) {
			@unlink($mod_path_html."/".$_REQUEST['inputHtmlDel']);
		}

		if ($_POST['inputHtml']!="")   {
            $filename = "html-".$_POST["valEditID"]."-".$randomNumber.".html";
            $HTMLToolContent=str_replace("\\\"","\"",$_POST['inputHtml']);
            $fp = fopen ($mod_path_html."/".$filename, "w");
            chmod($mod_path_html."/".$filename,0777);
            fwrite($fp,$HTMLToolContent);
            fclose($fp);
        }else{
			$filename = '';

		}



		$update=array();
		if($_REQUEST['inputLt']=="Thai"){
		 $update[]=$mod_tb_setting."_subject='".changeQuot($_POST['inputSubject'])."'";
		 $update[]=$mod_tb_setting."_title='".changeQuot($_POST['inputDescription'])."'";
		 $update[]=$mod_tb_setting."_htmlfilename  	='".$filename."'";
		 $update[]=$mod_tb_setting."_description='".changeQuot($_POST['inputTagDescription'])."'";
		 $update[]=$mod_tb_setting."_keywords='".changeQuot($_POST['inputTagKeywords'])."'";
		 $update[]=$mod_tb_setting."_metatitle='".changeQuot($_POST['inputTagTitle'])."'";
		}else if($_REQUEST['inputLt']=="Eng"){
		 $update[]=$mod_tb_setting."_subjecten='".changeQuot($_POST['inputSubject'])."'";
		 $update[]=$mod_tb_setting."_titleen='".changeQuot($_POST['inputDescription'])."'";
		 $update[]=$mod_tb_setting."_htmlfilenameen  	='".$filename."'";
		 $update[]=$mod_tb_setting."_descriptionen='".changeQuot($_POST['inputTagDescription'])."'";
		 $update[]=$mod_tb_setting."_keywordsen='".changeQuot($_POST['inputTagKeywords'])."'";
		 $update[]=$mod_tb_setting."_metatitleen='".changeQuot($_POST['inputTagTitle'])."'";
		}else{
		 $update[]=$mod_tb_setting."_subjectcn='".changeQuot($_POST['inputSubject'])."'";
		 $update[]=$mod_tb_setting."_titlecn='".changeQuot($_POST['inputDescription'])."'";
		 $update[]=$mod_tb_setting."_htmlfilenamecn  	='".$filename."'";
		 $update[]=$mod_tb_setting."_descriptioncn='".changeQuot($_POST['inputTagDescription'])."'";
		 $update[]=$mod_tb_setting."_keywordscn='".changeQuot($_POST['inputTagKeywords'])."'";
		 $update[]=$mod_tb_setting."_metatitlecn='".changeQuot($_POST['inputTagTitle'])."'";
		}

		// $update[]=$mod_tb_setting."_gid='".$_POST["inputGroupID"]."'";
		// $update[]=$mod_tb_setting."_picshow='".$_POST["inputTypePic"]."'";


		// $update[]=$mod_tb_setting."_title2='".changeQuot($_POST['inputDescription2'])."'";
		// $update[]=$mod_tb_setting."_urlfriendly='".changeQuot($_POST['inputUrlFriendly'])."'";

		// $update[]=$mod_tb_setting."_type='".$_POST["inputType"]."'";
		// $update[]=$mod_tb_setting."_url='".changeQuot($_REQUEST['inputurl'])."'";
		$update[]=$mod_tb_setting."_lastbyid='".$_SESSION[$valSiteManage.'core_session_id']."'";
		$update[]=$mod_tb_setting."_lastby='".$_SESSION[$valSiteManage.'core_session_name']."'";
		// if($_REQUEST['cdateInput']!=""){
		// $update[]=$mod_tb_setting."_credate  	='".DateFormatInsertCre($_REQUEST['cdateInput'])."'";
		// }else{
		// $update[]=$mod_tb_setting."_credate=NOW()";
		// }

		$update[]=$mod_tb_setting."_lastdate=NOW()";
		// $update[]=$mod_tb_setting."_sdate  	='".DateFormatInsert($sdateInput)."'";
		// $update[]=$mod_tb_setting."_edate  	='".DateFormatInsert($edateInput)."'";
		// $update[] = $mod_tb_setting . "_typec = '" . $_REQUEST["inputTypeC"] . "'";
		// $update[] = $mod_tb_setting . "_urlc = '" . $_REQUEST["inputurlc"] . "'";
		// $update[] = $mod_tb_setting . "_target  	='".$_POST['inputTarget']."'";

		 $sql="UPDATE ".$mod_tb_setting." SET ".implode(",",$update)." WHERE ".$mod_tb_setting."_id='".$_POST["valEditID"]."' ";
		//  print_pre($sql);die;
		$Query=wewebQueryDB($coreLanguageSQL,$sql);

//		$update = array();
//		$update[]=$mod_tb_setting."_subjectcn='".changeQuot($_POST['inputSubject'])."'";
//		$update[]=$mod_tb_setting."_titlecn='".changeQuot($_POST['inputDescription'])."'";
//		$sql="UPDATE ".$mod_tb_setting." SET ".implode(",",$update)." WHERE 1=1 ";
//		$Query=wewebQueryDB($coreLanguageSQL,$sql);

		logs_access('3','Update');

	## URL Search ###################################
		// if($_POST["valEditID"] != ''){
		// 	$valUrlSearchTH =$mod_url_search_th."/".$_POST["valEditID"]."/";
		// 	$valUrlSearchEN =$mod_url_search_en."/".$_POST["valEditID"]."/";
		// };
		// $updateSch=array();
		// if($_REQUEST['inputLt']=="Thai"){
		// 	$updateSch[]=$core_tb_search."_subject='".changeQuot($_REQUEST['inputSubject'])."'";
		// 	$updateSch[]=$core_tb_search."_title='".changeQuot($_REQUEST['inputDescription'])."'";
		// 	$updateSch[]=$core_tb_search."_keyword='".addslashes($_POST["inputSubject"])." ".addslashes($_POST["inputDescription"])." ".htmlspecialchars($_POST['inputHtml'])."'";
		// }else{
		// 	$updateSch[]=$core_tb_search."_subjecten='".changeQuot($_REQUEST['inputSubject'])."'";
		// 	$updateSch[]=$core_tb_search."_titleen='".changeQuot($_REQUEST['inputDescription'])."'";
		// 	$updateSch[]=$core_tb_search."_keyworden='".addslashes($_POST["inputSubject"])." ".addslashes($_POST["inputDescription"])." ".htmlspecialchars($_POST['inputHtml'])."'";
		// }

		// $updateSch[]=$core_tb_search."_url='".$valUrlSearchTH."'";
		// $updateSch[]=$core_tb_search."_urlen='".$valUrlSearchEN."'";

		// $updateSch[]=$core_tb_search."_sdate  	='".DateFormatInsert($_REQUEST['sdateInput'])."'";
		// $updateSch[]=$core_tb_search."_edate  	='".DateFormatInsert($_REQUEST['edateInput'])."'";

	 	// $sqlSch="UPDATE ".$core_tb_search." SET ".implode(",",$updateSch)." WHERE ".$core_tb_search."_contantid='".$_POST["valEditID"]."'  AND ".$core_tb_search."_masterkey='".$_POST["masterkey"]."' ";
		// $querySch=wewebQueryDB($coreLanguageSQL,$sqlSch);

	//include("../lib/incRss.php");
		?>
        <?php } ?>
 <?php include("../lib/disconnect.php");?>
<form action="setting.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh']?>" />
    <input name="inputTh" type="hidden" id="inputTh" value="<?php echo $_REQUEST['inputTh']?>" />
</form>
<script language="JavaScript" type="text/javascript">document.myFormAction.submit(); </script>
            		</body></html>
