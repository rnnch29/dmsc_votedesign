<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:userManage2"];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

$sql = "SELECT   ";
$sql .= "   " . $mod_tb_root . "_id ," . $mod_tb_root . "_subject  ";
$sql .= " FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "'  AND  " . $mod_tb_root . "_id='" . $_REQUEST['valEditID'] . "' ";
// print_pre($sql);
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valID = $Row[0];
$valSubject = rechangeQuot($Row[1]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">

  <link href="../css/theme.css" rel="stylesheet" />
  <title><?= $core_name_title ?></title>
  <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
  <script language="JavaScript" type="text/javascript">
    var countArrSort = '';
    jQuery(function() {

      jQuery("#boxPermissionSort").sortable({
        update: function() {
          var order = jQuery('#boxPermissionSort').sortable('serialize');
          countArrSort = order;
          jQuery("#inputSort").val(countArrSort);
          //alert(countArrSort);
        }
      });

      jQuery("#boxPermissionSort").disableSelection();

    });
  </script>
</head>

<body>
  <form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="insert" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
    <input name="myParentID" type="hidden" id="myParentID" value="<?= $_REQUEST['myParentID'] ?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?= $_REQUEST['inputSearch'] ?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?= $_REQUEST['inputGh'] ?>" />
    <input name="inputSort" type="hidden" id="inputSort" value="" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?= $_REQUEST['valEditID'] ?>" />
		<!-- <input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt'] ?>" /> -->
    
    <div class="divRightNav">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('editPic.php')" target="_self"><?= getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:sortpermis"] ?></span></td>
          <td class="divRightNavTb" align="right">

          </td>
        </tr>
      </table>
    </div>
    <div class="divRightHead">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
        <tr>
          <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:sortpermis"] ?></span></td>
          <td align="left">
            <table border="0" cellspacing="0" cellpadding="0" align="right">
              <tr>
                <td align="right">
                  <? if ($valPermission == "RW") { ?>
                    <div class="btnSave" title="<?= $langTxt["btn:save"] ?>" onclick="sortingContactNew('sortingPic.php');"></div><? } ?>
                  <div class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
    <div class="divRightMain">
      <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
        <td style=" border-top:#c8c7cc solid 1px; background-color: #fff;" colspan="7" align="left" valign="middle" class="formTileTxt">
          <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">

            <tr>
              <td style="background-color: #fff;" colspan="7" align="left" valign="middle" class="formTileTxt">
                <?
                if ($_REQUEST['inputLt'] == "Thai") {
                  $lang = "";
                  $lang2 = "th";
                } else if ($_REQUEST['inputLt'] == "Eng") {
                  $lang = "en";
                  $lang2 = "en";
                }
                
                $sql = "SELECT   " . $mod_tb_root_album . "_id," . $mod_tb_root_album . "_filename".$lang."   FROM " . $mod_tb_root_album . " WHERE  " . $mod_tb_root_album . "_contantid 	='" . $_REQUEST['valEditID'] . "' AND ". $mod_tb_root_album . "_lang".$lang2." 	='1'   ORDER BY " . $mod_tb_root_album . "_order ASC    ";
                print_pre($sql);
                $query = wewebQueryDB($coreLanguageSQL, $sql);
                $recordCount = wewebNumRowsDB($coreLanguageSQL, $query);
                if ($recordCount >= 1) {
                ?>
                  <ul id="boxPermissionSort">
                    <?
                    while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
                      $valID = $row[0];
                      $valName = $row[1];
                    ?>
                      <li id="listItem_<?= $valID ?>" class="boxHomeSortPic" style="width:50px; height:50px;float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px; margin-top:15px; ">

                        <img src="<?= $mod_path_album . "/" . $valName ?>" width="50" height="50" />

                      </li>
                    <? } ?>
                  </ul>
                <? } ?>
              </td>
            </tr>


            <tr>
              <td colspan="7" align="right" valign="top" height="20"></td>
            </tr>
          </table>
          <tr>
            <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?= $langTxt["btn:gototop"] ?>"><?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
          </tr>
      </table>
    </div>
  </form>
  <? include("../lib/disconnect.php"); ?>

</body>

</html>