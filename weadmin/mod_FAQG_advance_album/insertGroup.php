<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

if ($_REQUEST['execute'] == "insert") {
	// $randomNumber = randomNameupdate(2);

	// if (!is_dir($core_pathname_upload . "/" . $masterkey)) {
	// 	mkdir($core_pathname_upload . "/" . $masterkey, 0777);
	// }
	// if (!is_dir($mod_path_html)) {
	// 	mkdir($mod_path_html, 0777);
	// }


	// if (@file_exists($mod_path_html . "/" . $htmlfiledelete)) {
	// 	@unlink($mod_path_html . "/" . $htmlfiledelete);
	// }

	// if ($_POST['inputHtml'] != "") {
	// 	$filename = "html-G-" . $randomNumber . ".html";
	// 	$HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
	// 	$fp = fopen($mod_path_html . "/" . $filename, "w");
	// 	chmod($mod_path_html . "/" . $filename, 0777);
	// 	fwrite($fp, $HTMLToolContent);
	// 	fclose($fp);
	// } else {
	// 	$filename = '';
	// }

	$sql = "SELECT MAX(" . $mod_tb_root_group . "_order) FROM " . $mod_tb_root_group;
	$Query = wewebQueryDB($coreLanguageSQL, $sql); //******/
	$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
	$maxOrder = $Row[0] + 1;

	$insert = array();
	$insert[$mod_tb_root_group . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
	$insert[$mod_tb_root_group . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
	$insert[$mod_tb_root_group . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
	// $insert[$mod_tb_root_group . "_subjecten"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
	$insert[$mod_tb_root_group . "_title"] = "'" . changeQuot($_REQUEST['inputComment']) . "'";
	// $insert[$mod_tb_root_group . "_titleen"] = "'" . changeQuot($_REQUEST['inputComment']) . "'";
	


	// $insert[$mod_tb_root_group . "_htmlfilename"] = "'" . $filename . "'";
	$insert[$mod_tb_root_group . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
	$insert[$mod_tb_root_group . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
	$insert[$mod_tb_root_group . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
	$insert[$mod_tb_root_group . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
	$insert[$mod_tb_root_group . "_credate"] = "NOW()";
	$insert[$mod_tb_root_group . "_lastdate"] = "NOW()";
	$insert[$mod_tb_root_group . "_status"] = "'Disable'";
	$insert[$mod_tb_root_group . "_pic"] = "'" . $_POST["picname"] . "'";
	// $insert[$mod_tb_root_group . "_picen"] = "'" . $_POST["picname"] . "'";

	$insert[$mod_tb_root_group . "_order"] = "'" . $maxOrder . "'";
	$insert[$mod_tb_root_group . "_types"] = "'" . $_REQUEST['inputTypeSub'] . "'";

	// $insert[$mod_tb_root_group . "_type"] = "'" . $_REQUEST["inputType"] . "'";
	// $insert[$mod_tb_root_group . "_url"] = "'" . $_REQUEST["inputurl"] . "'";
	// $insert[$mod_tb_root_group . "_target"] = "'" . $_REQUEST["inputTarget"] . "'";

	// $insert[$mod_tb_root_group."_pic"] = "'".$_POST["picname"]."'";

	$setLangTH = (!empty($_REQUEST['inputSetLang'][0])) ? $_REQUEST['inputSetLang'][0] : 0 ;
    $setLangEN = (!empty($_REQUEST['inputSetLang'][1])) ? $_REQUEST['inputSetLang'][1] : 0 ;
    $insert[$mod_tb_root_group . "_langth"]="'".$setLangTH."'";
    $insert[$mod_tb_root_group . "_langen"]="'".$setLangEN."'";

	$sql = "INSERT INTO " . $mod_tb_root_group . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
	// print_r($sql);die();
	$Query = wewebQueryDB($coreLanguageSQL, $sql);
	$contantID = wewebInsertID($coreLanguageSQL);




	logs_access('3', 'Insert Group');
} ?>
<?php include("../lib/disconnect.php"); ?>
<form action="group.php" method="post" name="myFormAction" id="myFormAction">
	<input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
	<input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
	<input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
	<input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputgroupid'] ?>" />
</form>
<script language="JavaScript" type="text/javascript">
	document.myFormAction.submit();
</script>