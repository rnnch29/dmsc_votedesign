<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Manage Contant</title>
    </head>
    <body>
        <?
        if ($execute == "update") {
            $randomNumber = randomNameUpdate(1);


            // $update = array();
            // if ($_REQUEST['inputLt'] == "Thai") {
            //     $update[] = $mod_tb_root . "_subject='" . changeQuot($_POST['inputSubject']) . "'";
            // } else {
            //     $update[] = $mod_tb_root . "_subjecten='" . changeQuot($_POST['inputSubject']) . "'";
            // }
            // $update[] = $mod_tb_root . "_gid='" . $_POST["inputGroupID"] . "'";
            // // $update[] = $mod_tb_root . "_lastbyid='" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
            // // $update[] = $mod_tb_root . "_lastby='" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
            // // $update[] = $mod_tb_root . "_lastdate=NOW()";
            // $update[] = $mod_tb_root . "_title    ='" . changeQuot($inputComment)."'";
            // $update[] = $mod_tb_root . "_count='" . $_POST['inputView']."'";
            // $update[] = $mod_tb_root . "_credate      ='" . DateFormatInsert($sdateInput) . "'";
            // // $update[] = $mod_tb_root . "_edate      ='" . DateFormatInsert($edateInput) . "'";

            // $sql = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $_POST["valEditID"] . "' ";
            // // print_pre($sql);
            // $Query = wewebQueryDB($coreLanguageSQL,$sql);

            if ($_REQUEST['inputLt'] == "Thai") {
                $lang = "";
            } else if ($_REQUEST['inputLt'] == "Eng") {
                $lang = "en";
            }

            if (!empty($_REQUEST['imgalb'])) {
                foreach ($_REQUEST['imgalb'] as $idImg => $valueText) {
                    if (!empty($valueText)) {
                        $updatepic[] = $mod_tb_root_album . "_name".$lang. " = '" . $valueText . "'";
                        $sql = "UPDATE " . $mod_tb_root_album . " SET " . implode(",", $updatepic) . " WHERE " . $mod_tb_root_album . "_id='" . $idImg . "' ";
                        // print_pre($sql);
                        $Query = wewebQueryDB($coreLanguageSQL,$sql);
                    }
                }
            }

            logs_access('3', 'Update');
            ?>
        <? } ?>
        <? include("../lib/disconnect.php"); ?>
        <form action="index.php" method="post" name="myFormAction" id="myFormAction">
            <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
            <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
            <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
            <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
            <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />
            <input name="inputSearch" type="hidden" id="inputSearch" value="<?= $_REQUEST['inputSearch'] ?>" />
            <input name="inputGh" type="hidden" id="inputGh" value="<?= $_REQUEST['inputGh'] ?>" />
            <input name="inputTh" type="hidden" id="inputTh" value="<?= $_REQUEST['inputTh'] ?>" />
        </form>            
 <script language="JavaScript" type="text/javascript"> document.myFormAction.submit();</script> 
    </body></html>  
