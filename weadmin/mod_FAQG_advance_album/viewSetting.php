<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");
$_REQUEST['valEditID'] = 1;
$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$sql = "SELECT   ";
$sql .= "   " . $mod_tb_setting . "_id ,
      " . $mod_tb_setting . "_credate ,
      " . $mod_tb_setting . "_crebyid,
      " . $mod_tb_setting . "_status,
      " . $mod_tb_setting . "_sdate  	 	 ,
      " . $mod_tb_setting . "_edate  	,
      " . $mod_tb_setting . "_lastdate,
      " . $mod_tb_setting . "_lastbyid,
      " . $mod_tb_setting . "_pic ,
      " . $mod_tb_setting . "_type ,
      " . $mod_tb_setting . "_filevdo ,
      " . $mod_tb_setting . "_url  ,
      " . $mod_tb_setting . "_view,
      " . $mod_tb_setting . "_gid    ";

// if ($_REQUEST['inputLt'] == "Thai") {
$sql .= " , " . $mod_tb_setting . "_subject  ,    " . $mod_tb_setting . "_title , " . $mod_tb_setting . "_htmlfilename   ,    " . $mod_tb_setting . "_metatitle  	 	 ,    " . $mod_tb_setting . "_description  	 	 ,    " . $mod_tb_setting . "_keywords    ";
// } elseif ($_REQUEST['inputLt'] == "Eng") {
//     $sql .= " , " . $mod_tb_setting . "_subjecten  ,    " . $mod_tb_setting . "_titleen , " . $mod_tb_setting . "_htmlfilenameen   ,    " . $mod_tb_setting . "_metatitleen  	 	 ,    " . $mod_tb_setting . "_descriptionen  	 	 ,    " . $mod_tb_setting . "_keywordsen    ";
// } else {
//     $sql .= " , " . $mod_tb_setting . "_subjectcn  ,    " . $mod_tb_setting . "_titlecn, " . $mod_tb_setting . "_htmlfilenamecn   ,    " . $mod_tb_setting . "_metatitlecn  	 	 ,    " . $mod_tb_setting . "_descriptioncn  	 	 ,    " . $mod_tb_setting . "_keywordscn    ";
// }
$sql .= "  , " . $mod_tb_setting . "_htmlfilenameen, " . $mod_tb_setting . "_htmlfilenamecn  ";

// $sql .= "  , " . $mod_tb_setting . "_picshow, " . $mod_tb_setting . "_typec, " . $mod_tb_setting . "_urlc, " . $mod_tb_setting . "_target, " . $mod_tb_setting . "_pic2, " . $mod_tb_setting . "_title2, " . $mod_tb_setting . "_urlfriendly , " . $mod_tb_setting . "_htmlfilenameen, " . $mod_tb_setting . "_htmlfilenamecn , " . $mod_tb_setting . "_file as file , " . $mod_tb_setting . "_filename as filename  ";
// $sql .= " , " . $mod_tb_setting . "_typefile as typefile , " . $mod_tb_setting . "_typefileen as typefileen , " . $mod_tb_setting . "_typefilecn as typefilecn  ";
// $sql .= " , " . $mod_tb_setting . "_urlfile as urlfile , " . $mod_tb_setting . "_urlfileen as urlfileen , " . $mod_tb_setting . "_urlfilecn as urlfilecn  ";
// $sql .= " , " . $mod_tb_setting . "_fileen as fileen , " . $mod_tb_setting . "_filenameen as filenameen  ";
// $sql .= " , " . $mod_tb_setting . "_filecn as filecn , " . $mod_tb_setting . "_filenamecn as filenamecn  ";
$sql .= " FROM " . $mod_tb_setting . "  WHERE " . $mod_tb_setting . "_masterkey='" . $_REQUEST["masterkey"] . "' ";
// print_pre($sql);die;
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$numRow = wewebNumRowsDB($coreLanguageSQL, $Query);
if (empty($numRow)) {
    $sql = "SELECT MAX(" . $mod_tb_setting . "_order) FROM " . $mod_tb_setting;
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
    $maxOrder = $Row[0] + 1;

    $insert = array();
    $insert[$mod_tb_setting . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_setting . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";

    $insert[$mod_tb_setting . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_setting . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_setting . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_setting . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";

    $insert[$mod_tb_setting . "_credate"] = "NOW()";

    $insert[$mod_tb_setting . "_lastdate"] = "NOW()";
    $insert[$mod_tb_setting . "_status"] = "'Disable'";
    $insert[$mod_tb_setting . "_order"] = "'" . $maxOrder . "'";
    $sql = "INSERT INTO " . $mod_tb_setting . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $contantID = wewebInsertID($coreLanguageSQL);
    if (!empty($contantID)) {
        $sql = "SELECT   ";
        $sql .= "   " . $mod_tb_setting . "_id ,
                " . $mod_tb_setting . "_credate ,
                " . $mod_tb_setting . "_crebyid,
                " . $mod_tb_setting . "_status,
                " . $mod_tb_setting . "_sdate  	 	 ,
                " . $mod_tb_setting . "_edate  	,
                " . $mod_tb_setting . "_lastdate,
                " . $mod_tb_setting . "_lastbyid,
                " . $mod_tb_setting . "_pic ,
                " . $mod_tb_setting . "_type ,
                " . $mod_tb_setting . "_filevdo ,
                " . $mod_tb_setting . "_url  ,
                " . $mod_tb_setting . "_view,
                " . $mod_tb_setting . "_gid    ";

        if ($_REQUEST['inputLt'] == "Thai") {
            $sql .= " , " . $mod_tb_setting . "_subject  ,    " . $mod_tb_setting . "_title , " . $mod_tb_setting . "_htmlfilename   ,    " . $mod_tb_setting . "_metatitle  	 	 ,    " . $mod_tb_setting . "_description  	 	 ,    " . $mod_tb_setting . "_keywords    ";
        } elseif ($_REQUEST['inputLt'] == "Eng") {
            $sql .= " , " . $mod_tb_setting . "_subjecten  ,    " . $mod_tb_setting . "_titleen , " . $mod_tb_setting . "_htmlfilenameen   ,    " . $mod_tb_setting . "_metatitleen  	 	 ,    " . $mod_tb_setting . "_descriptionen  	 	 ,    " . $mod_tb_setting . "_keywordsen    ";
        } else {
            $sql .= " , " . $mod_tb_setting . "_subjectcn  ,    " . $mod_tb_setting . "_titlecn, " . $mod_tb_setting . "_htmlfilenamecn   ,    " . $mod_tb_setting . "_metatitlecn  	 	 ,    " . $mod_tb_setting . "_descriptioncn  	 	 ,    " . $mod_tb_setting . "_keywordscn    ";
        }

        // $sql .= "  , " . $mod_tb_setting . "_picshow, " . $mod_tb_setting . "_typec, " . $mod_tb_setting . "_urlc, " . $mod_tb_setting . "_target, " . $mod_tb_setting . "_pic2, " . $mod_tb_setting . "_title2, " . $mod_tb_setting . "_urlfriendly , " . $mod_tb_setting . "_htmlfilenameen, " . $mod_tb_setting . "_htmlfilenamecn  ";
        // $sql .= " , " . $mod_tb_setting . "_typefile as typefile , " . $mod_tb_setting . "_typefileen as typefileen , " . $mod_tb_setting . "_typefilecn as typefilecn  ";
        // $sql .= " , " . $mod_tb_setting . "_urlfile as urlfile , " . $mod_tb_setting . "_urlfileen as urlfileen , " . $mod_tb_setting . "_urlfilecn as urlfilecn  ";
        // $sql .= " , " . $mod_tb_setting . "_fileen as fileen , " . $mod_tb_setting . "_filenameen as filenameen  ";
        // $sql .= " , " . $mod_tb_setting . "_filecn as filecn , " . $mod_tb_setting . "_filenamecn as filenamecn  ";
        $sql .= " FROM " . $mod_tb_setting . " WHERE " . $mod_tb_setting . "_masterkey='" . $_REQUEST["masterkey"] . "' ";
        $Query = wewebQueryDB($coreLanguageSQL, $sql);
        $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
    }
}
// print_pre($sql);
$valID = $Row[0];
$valCredate = DateFormat($Row[1]);
$valCreby = $Row[2];
$valStatus = $Row[3];
if ($valStatus == "Enable") {
    $valStatusClass = "fontContantTbEnable";
} elseif ($valStatus == "Related") {
    $valStatusClass = "fontContantTbRelated";
} else {
    $valStatusClass = "fontContantTbDisable";
}

if ($Row[4] == "0000-00-00 00:00:00") {
    $valSdate = "-";
} else {
    $valSdate = DateFormatReal($Row[4]);
}
if ($Row[5] == "0000-00-00 00:00:00") {
    $valEdate = "-";
} else {
    $valEdate = DateFormatReal($Row[5]);
}

$valLastdate = DateFormat($Row[6]);
$valLastby = $Row[7];

$valPicName = $Row[8];
$valPic = $mod_path_pictures . "/" . $Row[8];
$valType = $Row[9];
$valFilevdo = $Row[10];
$valPathvdo = $mod_path_vdo . "/" . $Row[10];
$valUrl = rechangeQuot($Row[11]);
$valView = number_format($Row[12]);

$valGid = $Row[13];

$valSubject = rechangeQuot($Row[14]);
$valTitle = rechangeQuot($Row[15]);
$valHtml = $mod_path_html . "/" . $Row[16];
$valMetatitle = rechangeQuot($Row[17]);
$valDescription = rechangeQuot($Row[18]);
$valKeywords = rechangeQuot($Row[19]);
$valPicShow = $Row[20];
$valTypec = $Row[21];
$valUrlc = $Row[22];
$valTarget = $Row[23];

$valPicName2 = $Row[24];
$valPic2 = $mod_path_pictures . "/" . $Row[24];
$valTitle2 = rechangeQuot($Row[25]);
$valUrlfriendly = rechangeQuot($Row[26]);
$valHtmlEN = $mod_path_html . "/" . $Row[20];
$valHtmlCN = $mod_path_html . "/" . $Row[21];

$valTypeFile = $Row['typefile'];
$valTypeFileEn = $Row['typefileen'];
$valTypeFileCn = $Row['typefilecn'];

$valUrlFile = $Row['urlfile'];
$valUrlFileEn = $Row['urlfileen'];
$valUrlFileCn = $Row['urlfilecn'];
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <link href="../css/theme.css" rel="stylesheet" />

    <title><?php echo $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm">
        <input name="execute" type="hidden" id="execute" value="update" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh'] ?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $_REQUEST['valEditID'] ?>" />
        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt'] ?>" />
        <?php if ($_REQUEST['viewID'] <= 0) { ?>
            <div class="divRightNav">
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /><?php echo $langMod["meu:contant"] ?></span></td>
                        <td class="divRightNavTb" align="right">

                            <!-- ######### Start Menu Sub Mod ########## -->
                            <!-- <div class="menuSubMod active">
                            <a  href="setting.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                                <?php echo $langMod["meu:setPermis"] ?>
                            </a>
                        </div>
                        <div class="menuSubMod">
                            <a  href="group.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
								<?php echo $langMod["meu:group"] ?>
                            </a>
                        </div>
                        <div class="menuSubMod ">
                            <a  href="index.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
								<?php echo $langMod["meu:contant"] ?>
                            </a>
                        </div> -->

                            <?php if (in_array($_REQUEST['masterkey'], $array)) { ?>

                                <?php if (in_array($_REQUEST['masterkey'], $array_masterkey_setting)) { ?>
                                    <div class="menuSubMod active">
                                        <a href="setting.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                                            <?php echo $langMod["meu:setPermis"] ?>
                                        </a>
                                    </div>
                                    <div class="menuSubMod">
                                        <a href="group.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                                            <?php echo $langMod["meu:group"] ?>
                                        </a>
                                    </div>
                                    <div class="menuSubMod ">
                                        <a href="index.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                                            <?php echo $langMod["meu:contant"] ?>
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <div class="menuSubMod">
                                        <a href="group.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                                            <?php echo $langMod["meu:group"] ?>
                                        </a>
                                    </div>
                                    <div class="menuSubMod active">
                                        <a href="index.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                                            <?php echo $langMod["meu:contant"] ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } elseif (in_array($_REQUEST['masterkey'], $array_masterkey_setting)) { ?>
                                <div class="menuSubMod active">
                                    <a href="setting.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                                        <?php echo $langMod["meu:setPermis"] ?>
                                    </a>
                                </div>
                                <div class="menuSubMod ">
                                    <a href="index.php?masterkey=<?php echo $_REQUEST['masterkey'] ?>&menukeyid=<?php echo $_REQUEST['menukeyid'] ?>">
                                        <?php echo $langMod["meu:contant"] ?>
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- ######### End Menu Sub Mod ########## -->


                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titles"] ?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php if ($_REQUEST['viewID'] <= 0) { ?>

                                        <?php if ($valPermission == "RW") { ?>
                                            <div class="btnEditView" title="<?php echo $langTxt["btn:edit"] ?>" onclick="
                                                                document.myFormHome.valEditID.value ='<?php echo $valID ?>';
                                                                document.myFormHome.inputLt.value ='Thai';
                                                                editContactNew('../<?php echo $mod_fd_root ?>/editSetting.php')">
                                                <div class="lang"><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?><?php echo $langTxt["lg:thai"] ?><?php } ?></div>
                                            </div>
                                            <?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] >= 2) { ?>
                                                <div class="btnEditView" title="<?php echo $langTxt["btn:edit"] ?>" onclick="
                                                                document.myFormHome.valEditID.value ='<?php echo $valID ?>';
                                                                document.myFormHome.inputLt.value ='Eng';
                                                                editContactNew('../<?php echo $mod_fd_root ?>/editSetting.php')">
                                                    <div class="lang"><?php echo $langTxt["lg:eng"] ?></div>
                                                </div>
                                            <?php } ?>
                                            <?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] >= 3) { ?>
                                                <div class="btnEditView" title="<?php echo $langTxt["btn:edit"] ?>" onclick="
                                                                document.myFormHome.valEditID.value ='<?php echo $valID ?>';
                                                                document.myFormHome.inputLt.value ='Chi';
                                                                editContactNew('../<?php echo $mod_fd_root ?>/editSetting.php')">
                                                    <div class="lang"><?php echo $langTxt["lg:chi"] ?></div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                        <!-- <div  class="btnBack" title="<?php echo $langTxt["btn:back"] ?>" onclick="btnBackPage('setting.php')"></div> -->
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightMain">
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:subject"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:subjectDe"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:subject:setting"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valSubject ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:title:setting"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valTitle ?></div>
                    </td>
                </tr>
            </table>
            <br />
            <?php if ($_REQUEST['menukeyid'] == '83' || $_REQUEST['menukeyid'] == '84') { ?>
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr>
                        <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] . " (TH)" ?></span><br />
                            <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>
                        </td>
                    </tr>
                    <tr <?php if (empty($valTypeFile) || $valTypeFile == 1) { ?> style="display: none;" <?php } ?>>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:linkdownload"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php echo $valUrlFile ?></div>
                        </td>
                    </tr>
                    <tr <?php if ($valTypeFile == 2) { ?> style="display: none;" <?php } ?>>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:attfile"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView">
                                <?php if ($Row['file'] != '') { ?>
                                    <?php
                                    // print_pre($Row['file']);
                                    $linkRelativePath = $mod_path_file . "/" . $Row['file'];
                                    $downloadFile = $Row['file'];
                                    $downloadFilename = $Row['filename'];
                                    $downloadID = $Row[0];
                                    $imageType = strstr($downloadFile, '.');
                                    ?>

                                    <div style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php echo get_Icon($downloadFile) ?>" align="absmiddle" width="30" /><a href="../<?php echo $mod_fd_root ?>/download.php?linkPath=<?php echo $linkRelativePath ?>&amp;downloadFile=<?php echo $downloadFile ?>"><?php echo $downloadFilename . "" . $imageType ?></a> | <?php echo $langMod["file:type"] ?>: <?php echo $imageType ?> | <?php echo $langMod["file:size"] ?>: <?php echo get_IconSize($linkRelativePath) ?> </div>
                                    <!-- | <?php echo $langMod["file:download"] ?>: <?php echo number_format($countDownload) ?> -->
                                    <div></div>
                                <?php } else { ?>
                                    -
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                </table>
                <br />

                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr>
                        <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] . " (EN)" ?></span><br />
                            <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>
                        </td>
                    </tr>
                    <tr <?php if (empty($valTypeFileEn) || $valTypeFileEn == 1) { ?> style="display: none;" <?php } ?>>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:linkdownload"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php echo $valUrlFileEn ?></div>
                        </td>
                    </tr>
                    <tr <?php if ($valTypeFileEn == 2) { ?> style="display: none;" <?php } ?>>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:attfile"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView">
                                <?php if ($Row['fileen'] != '') { ?>
                                    <?php
                                    // print_pre($Row['file']);
                                    $linkRelativePath = $mod_path_file . "/" . $Row['fileen'];
                                    $downloadFile = $Row['fileen'];
                                    $downloadFilename = $Row['filenameen'];
                                    $downloadID = $Row[0];
                                    $imageType = strstr($downloadFile, '.');
                                    ?>

                                    <div style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php echo get_Icon($downloadFile) ?>" align="absmiddle" width="30" /><a href="../<?php echo $mod_fd_root ?>/download.php?linkPath=<?php echo $linkRelativePath ?>&amp;downloadFile=<?php echo $downloadFile ?>"><?php echo $downloadFilename . "" . $imageType ?></a> | <?php echo $langMod["file:type"] ?>: <?php echo $imageType ?> | <?php echo $langMod["file:size"] ?>: <?php echo get_IconSize($linkRelativePath) ?> </div>
                                    <!-- | <?php echo $langMod["file:download"] ?>: <?php echo number_format($countDownload) ?> -->
                                    <div></div>
                                <?php } else { ?>
                                    -
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                </table>
                <br />

                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr>
                        <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] . " (MM)" ?></span><br />
                            <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>
                        </td>
                    </tr>
                    <tr <?php if (empty($valTypeFileCn) || $valTypeFileCn == 1) { ?> style="display: none;" <?php } ?>>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:linkdownload"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView"><?php echo $valUrlFileCn ?></div>
                        </td>
                    </tr>
                    <tr <?php if ($valTypeFileCn == 2) { ?> style="display: none;" <?php } ?>>
                        <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:attfile"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                            <div class="formDivView">
                                <?php if ($Row['filecn'] != '') { ?>
                                    <?php
                                    // print_pre($Row['file']);
                                    $linkRelativePath = $mod_path_file . "/" . $Row['filecn'];
                                    $downloadFile = $Row['filecn'];
                                    $downloadFilename = $Row['filenamecn'];
                                    $downloadID = $Row[0];
                                    $imageType = strstr($downloadFile, '.');
                                    ?>

                                    <div style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?php echo get_Icon($downloadFile) ?>" align="absmiddle" width="30" /><a href="../<?php echo $mod_fd_root ?>/download.php?linkPath=<?php echo $linkRelativePath ?>&amp;downloadFile=<?php echo $downloadFile ?>"><?php echo $downloadFilename . "" . $imageType ?></a> | <?php echo $langMod["file:type"] ?>: <?php echo $imageType ?> | <?php echo $langMod["file:size"] ?>: <?php echo get_IconSize($linkRelativePath) ?> </div>
                                    <!-- | <?php echo $langMod["file:download"] ?>: <?php echo number_format($countDownload) ?> -->
                                    <div></div>
                                <?php } else { ?>
                                    -
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                </table>
                <br />
            <?php } ?>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleinfo"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langTxt["us:titleinfoDe"] ?></span>
                    </td>
                </tr>
                <!-- <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langMod["tit:view"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView"><?php echo $valView ?></div>         </td>
                                </tr> -->
                <!-- <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >URL :<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                    <?php if ($_REQUEST['inputLt'] == "Thai") { ?>
                                    <a href="<?php echo  loadGetURLByMod($core_full_path, 'th', $mod_fd_frontdetailUrl, $valID, 1) ?>" target="_blank"><?php echo loadGetURLByMod($core_full_path, 'th', $mod_fd_frontdetailUrl, $valID, 1) ?></a><br />
                                    <?php } else { ?>
                                    <a href="<?php echo  loadGetURLByMod($core_full_path, 'en', $mod_fd_frontdetailUrl, $valID, 1) ?>" target="_blank"><?php echo loadGetURLByMod($core_full_path, 'en', $mod_fd_frontdetailUrl, $valID, 1) ?></a><br />
                                     <?php   }  ?>
                                     </div></td>
                                </tr> -->
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:credate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCredate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                echo getUserThai($valCreby);
                            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                echo getUserEng($valCreby);
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:lastdate"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valLastdate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["us:creby"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                echo getUserThai($valLastby);
                            } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                echo getUserEng($valLastby);
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["mg:status"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">

                        <?php if ($valPermission == "RW") { ?>
                            <div id="load_status<?php echo  $valID ?>">
                                <?php if ($valStatus == "Enable") { ?>

                                <a href="javascript:void(0)"
                                    onclick="changeStatus('load_waiting<?php echo  $valID ?>','<?php echo  $mod_tb_setting ?>','<?php echo  $valStatus ?>','<?php echo  $valID ?>','load_status<?php echo  $valID ?>','../<?php echo  $mod_fd_root ?>/statusMgs.php')"><span
                                        class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span></a>

                                <?php } else { ?>

                                <a href="javascript:void(0)"
                                    onclick="changeStatus('load_waiting<?php echo  $valID ?>','<?php echo  $mod_tb_setting ?>','<?php echo  $valStatus ?>','<?php echo  $valID ?>','load_status<?php echo  $valID ?>','../<?php echo  $mod_fd_root ?>/statusMgs.php')">
                                    <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span> </a>

                                <?php } ?>

                                <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting" style="display:none;"
                                    id="load_waiting<?php echo  $valID ?>" />
                            </div>
                            <?php } else { ?>
                            <?php if ($valStatus == "Enable") { ?>
                            <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span>
                            <?php } else { ?>
                            <span class="<?php echo  $valStatusClass ?>"><?php echo  $valStatus ?></span>
                            <?php } ?>

                            <?php } ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br /> <?php if ($_REQUEST['viewID'] <= 0) { ?>

                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                    <tr>
                        <td colspan="7" align="right" valign="top" height="20"></td>
                    </tr>
                    <tr>
                        <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"] ?>"><?php echo $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
                    </tr>
                <?php } ?>
                </table>
        </div>
    </form>
    <?php include("../lib/disconnect.php"); ?>
    <?php if ($_REQUEST['viewID'] <= 0) { ?>
        <link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css" media="screen" />
        <script language="JavaScript" type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
        <script type="text/javascript">
            jQuery(function() {
                jQuery('a[rel=viewAlbum]').fancybox({
                    'padding': 0,
                    'transitionIn': 'fade',
                    'transitionOut': 'fade',
                    'autoSize': false,
                });
            });
        </script>
    <?php } ?>

    <script type='text/javascript' src='../<?php echo $mod_fd_root ?>/swfobject.js'></script>
    <script type='text/javascript' src='../<?php echo $mod_fd_root ?>/silverlight.js'></script>
    <script type='text/javascript' src='../<?php echo $mod_fd_root ?>/wmvplayer.js'></script>
    <script type='text/javascript'>
        var filename = "<?php echo $filename ?>";
        var filetype = "<?php echo $filetype ?>";
        var cnt = document.getElementById("areaPlayer");
        if (filetype == "flv") {
            var s1 = new SWFObject('../<?php echo $mod_fd_root ?>/player.swf', 'player', '560', '315', '9');
            s1.addParam('allowfullscreen', 'true');
            s1.addParam('wmode', 'transparent');
            s1.addParam('allowscriptaccess', 'always');
            s1.addParam('flashvars', 'file=<?php echo $mod_path_vdo ?>/' + filename);
            s1.write('areaPlayer');
        } else /* if(filetype=="wmv")*/ {

            var src = '../<?php echo $mod_fd_root ?>/wmvplayer.xaml';
            var cfg = "";
            var ply;
            cfg = {
                file: '<?php echo $mod_path_vdo ?>/' + filename,
                image: '',
                height: '315',
                width: '560',
                autostart: "false",
                windowless: 'true',
                showstop: 'true'
            };
            ply = new jeroenwijering.Player(cnt, src, cfg);
        }
    </script>


</body>

</html>