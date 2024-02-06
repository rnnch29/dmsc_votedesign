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
    $Query = wewebQueryDB($coreLanguageSQL,$sql);
    $Row = wewebFetchArrayDB($coreLanguageSQL,$Query);
    $maxOrder = $Row[0] + 1;

    $insert = array();
    $insert[$mod_tb_root . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_root . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
    $insert[$mod_tb_root . "_subject"] = "'" . changeQuot($_REQUEST['inputSubject']) . "'";
    $insert[$mod_tb_root . "_title"] = "'" . changeQuot($_REQUEST['inputDescription']) . "'";
    $insert[$mod_tb_root . "_gid"] = "'" . $_POST["inputGroupID"] . "'";
    $insert[$mod_tb_root . "_pic"] = "'" . $_POST["picname"] . "'";
    $insert[$mod_tb_root . "_htmlfilename"] = "'" . $filename . "'";

    $insert[$mod_tb_root . "_type"] = "'" . $_POST["inputType"] . "'";
    $insert[$mod_tb_root . "_url"] = "'" . changeQuot($_REQUEST['inputUrl']) . "'";
    $insert[$mod_tb_root . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_root . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_root . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_root . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_root . "_description"] = "'" . changeQuot($_REQUEST['inputTagDescription']) . "'";
    $insert[$mod_tb_root . "_keywords"] = "'" . changeQuot($_REQUEST['inputTagKeywords']) . "'";
    $insert[$mod_tb_root . "_metatitle"] = "'" . changeQuot($_REQUEST['inputTagTitle']) . "'";
    $insert[$mod_tb_root . "_sdate"] = "'" . DateFormatInsert($_REQUEST['sdateInput']) . "'";
    $insert[$mod_tb_root . "_edate"] = "'" . DateFormatInsert($_REQUEST['edateInput']) . "'";
    // $insert[$mod_tb_root . "_target"] = "'" . $_REQUEST["inputTarget"] . "'";
    
    $setLangTH = (!empty($_REQUEST['inputSetLang'][0])) ? $_REQUEST['inputSetLang'][0] : 0 ;
    $setLangEN = (!empty($_REQUEST['inputSetLang'][1])) ? $_REQUEST['inputSetLang'][1] : 0 ;
    $insert[$mod_tb_root . "_langth"]="'".$setLangTH."'";
    $insert[$mod_tb_root . "_langen"]="'".$setLangEN."'";
 


    $insert[$mod_tb_root . "_credate"] = "NOW()";
    $insert[$mod_tb_root . "_lastdate"] = "NOW()";
    $insert[$mod_tb_root . "_status"] = "'Disable'";
    $insert[$mod_tb_root . "_pin"] = "'Unpin'";
    $insert[$mod_tb_root . "_order"] = "'" . $maxOrder . "'";
    $sql = "INSERT INTO " . $mod_tb_root . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    // print_r($sql);die;
    $Query = wewebQueryDB($coreLanguageSQL,$sql);

    logs_access('3', 'Insert');

    ## URL Search ###################################
    // $txt_value_to = encodeURL("c=" . $contantID . "");

    // $valUrlSearchTH = $mod_url_search_th . "/" . encodeStr($contantID) . "/";
    // $valUrlSearchEN = $mod_url_search_en . "/" . encodeStr($contantID) . "/";
    // $valUrlSearchCN = $mod_url_search_cn . "/" . encodeStr($contantID) . "/";


    // $insertSch = array();
    // $insertSch[$core_tb_search . "_language"] = "'" . $_REQUEST['inputLt'] . "'";
    // $insertSch[$core_tb_search . "_contantid"] = "'" . $contantID . "'";
    // $insertSch[$core_tb_search . "_masterkey"] = "'" . $_POST["masterkey"] . "'";
    // $insertSch[$core_tb_search . "_subject"] = "'" . changeQuot($_POST["inputSubject"]) . "'";
    // $insertSch[$core_tb_search . "_title"] = "'" . changeQuot($_POST["inputDescription"]) . "'";
    // $insertSch[$core_tb_search . "_keyword"] = "'" . addslashes($_POST["inputSubject"]) . " " . addslashes($_POST["inputDescription"]) . " " . htmlspecialchars($_POST['inputHtml']) . "'";
    // $insertSch[$core_tb_search . "_url"] = "'" . $valUrlSearchTH . "'";
    // $insertSch[$core_tb_search . "_urlen"] = "'" . $valUrlSearchEN . "'";
    // $insertSch[$core_tb_search . "_urlcn"] = "'" . $valUrlSearchCN . "'";
    // $insertSch[$core_tb_search . "_edate"] = "'" . DateFormatInsert($_POST["edateInput"]) . "'";
    // $insertSch[$core_tb_search . "_sdate"] = "'" . DateFormatInsert($_POST["sdateInput"]) . "'";
    // $insertSch[$core_tb_search . "_status"] = "'Disable'";
    // $sqlSch = "INSERT " . $core_tb_search . " (" . implode(",", array_keys($insertSch)) . ") VALUES (" . implode(",", array_values($insertSch)) . ")";
    // $querySch = wewebQueryDB($coreLanguageSQL,$sqlSch);

}
?>
<?php include("../lib/disconnect.php"); ?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh'] ?>" />
    <input name="inputTh" type="hidden" id="inputTh" value="<?php echo $_REQUEST['inputTh'] ?>" />
</form>
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script>
