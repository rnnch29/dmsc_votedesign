<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");


if ($_REQUEST['execute'] == "insert") {


	$randomNumber = randomNameupdate(2);

    if (!is_dir($core_pathname_upload . "/" . $masterkey)) {
        mkdir($core_pathname_upload . "/" . $masterkey, 0777);
    }
    if (!is_dir($mod_path_html)) {
        mkdir($mod_path_html, 0777);
    }


    if (@file_exists($mod_path_html . "/" . $htmlfiledelete)) {
        @unlink($mod_path_html . "/" . $htmlfiledelete);
    }


    if ($_POST['inputHtml'] != "") {
        $filename = "html-".$randomNumber . ".html";
        $HTMLToolContent = str_replace("\\\"", "\"", $_POST['inputHtml']);
        $fp = fopen($mod_path_html . "/" . $filename, "w");
        chmod($mod_path_html . "/" . $filename, 0777);
        fwrite($fp, $HTMLToolContent);
        fclose($fp);
    }
	
   




	$sql = "SELECT MAX(" . $mod_tb_root . "_order) FROM " . $mod_tb_root;
	$Query = wewebQueryDB($coreLanguageSQL, $sql);
	$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
	$maxOrder = $Row[0] + 1;

	$insert = array();
	$insert[$mod_tb_root . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
	$insert[$mod_tb_root . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
	$insert[$mod_tb_root . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
	$insert[$mod_tb_root . "_title"] = "'" . changeQuot($_REQUEST['inputTitle']) . "'";

    $insert[$mod_tb_root . "_htmlfilename"] = "'" . $filename . "'";
    $insert[$mod_tb_root . "_pic"] = "'" . $_POST["picname"] . "'";




	
	$insert[$mod_tb_root . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
	$insert[$mod_tb_root . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
	$insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
	$insert[$mod_tb_root . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
	$insert[$mod_tb_root . "_sdate"] = "'" . DateFormatInsert($_REQUEST['sdateInput']) . "'";
	$insert[$mod_tb_root . "_edate"] = "'" . DateFormatInsert($_REQUEST['edateInput']) . "'";
	$insert[$mod_tb_root . "_credate"] = "" . wewebNow($coreLanguageSQL) . "";
	$insert[$mod_tb_root . "_lastdate"] = "" . wewebNow($coreLanguageSQL) . "";
	$insert[$mod_tb_root . "_status"] = "'Disable'";
	$insert[$mod_tb_root . "_order"] = "'" . $maxOrder . "'";

	$setLangTH = (!empty($_REQUEST['inputSetLang'][0])) ? $_REQUEST['inputSetLang'][0] : 0 ;
    $setLangEN = (!empty($_REQUEST['inputSetLang'][1])) ? $_REQUEST['inputSetLang'][1] : 0 ;
    $insert[$mod_tb_root . "_langth"]="'".$setLangTH."'";
    $insert[$mod_tb_root . "_langen"]="'".$setLangEN."'";



	$sql = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
	$Query = wewebQueryDB($coreLanguageSQL, $sql);
	$contantID = wewebInsertID($coreLanguageSQL);
	// print_pre($sql);

	logs_access('3', 'Insert');

	############################### Update Json  #################################
	UpdateChat($core_full_path);
	############################### Update Json  #################################
} ?>
<?php include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
	<input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
	<input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
	<input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
	<input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh'] ?>" />
	<input name="inputTh" type="hidden" id="inputTh" value="<?php echo $_REQUEST['inputTh'] ?>" />

</form>
<script language="JavaScript" type="text/javascript">
	document.myFormAction.submit();
</script>