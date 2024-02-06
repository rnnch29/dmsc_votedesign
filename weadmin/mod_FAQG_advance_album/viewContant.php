<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$sql = "SELECT   ";
$sql .= "   " . $mod_tb_root . "_id ,
      " . $mod_tb_root . "_credate ,
      " . $mod_tb_root . "_crebyid,
      " . $mod_tb_root . "_status,
      " . $mod_tb_root . "_sdate  	 	 ,
      " . $mod_tb_root . "_edate  	,
      " . $mod_tb_root . "_lastdate,
      " . $mod_tb_root . "_lastbyid,
      " . $mod_tb_root . "_gid    ";

if ($_REQUEST['inputLt'] == "Thai") {
    $sql .= "," . $mod_tb_root . "_pic , " . $mod_tb_root . "_subject  ,    "  . $mod_tb_root . "_htmlfilename, ". $mod_tb_root . "_title ";
} elseif ($_REQUEST['inputLt'] == "Eng") {
    $sql .= "," . $mod_tb_root . "_picen , " . $mod_tb_root . "_subjecten  ,    "  . $mod_tb_root . "_htmlfilenameen, ". $mod_tb_root . "_titleen ";
}

$sql .= " , " . $mod_tb_root . "_langth, " . $mod_tb_root . "_langen ";
$sql .= " , " . $mod_tb_root . "_sid as sid";
$sql .= " FROM " . $mod_tb_root . " 
LEFT JOIN
" . $mod_tb_root_group . "
ON
" . $mod_tb_root_group . "_id = " . $mod_tb_root . "_gid
WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "'  AND  " . $mod_tb_root . "_id='" . $_REQUEST['valEditID'] . "' ";


$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valID = $Row[0];
$valCredate = DateFormat($Row[1]);
$valCreby = $Row[2];
$valStatus = $Row[3];
if ($valStatus == "Enable") {
    $valStatusClass = "fontContantTbEnable";
} elseif ($valStatus == "Home") {
    $valStatusClass = "fontContantTbHomeSt";
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

// $valType = $Row[8];
// $valFilevdo = $Row[9];
// $valPathvdo = $mod_path_vdo . "/" . $Row[9];
// $valUrl = rechangeQuot($Row[10]);
// $valView = number_format($Row[11]);
$valGid = $Row[8];
$valPicName = $Row[9];
$valPic = $mod_path_pictures . "/" . $Row[9];

$valSubject = rechangeQuot($Row[10]);
$valHtml = $mod_path_html . "/" . $Row[11];
$valhtmlname = $Row[11];
$valTitle = rechangeQuot($Row[12]);


// $valMetatitle = rechangeQuot($Row[17]);
// $valDescription = rechangeQuot($Row[18]);
// $valKeywords = rechangeQuot($Row[19]);
// $valPicShow = $Row[20];
// $valTypec = $Row[21];
// $valUrlc = $Row[22];
// $valTarget = $Row[23];

// $valUrlfriendly = rechangeQuot($Row[24]);
$valLang[0] = $Row[13];
$valLang[1] = $Row[14];
// $valLang[2] = $Row[14];
// $valUrl2 = $Row['url2'];

// $valPin = $Row['pin'];
// if ($valPin == "Pin") {
//     $valStatusPinClass =  "fontContantTbNew";
// } else {
//     $valStatusPinClass =  "fontContantTbDisable";
// }

$sql_g_type = "SELECT ".$mod_tb_root_group."_types FROM ".$mod_tb_root_group." WHERE ".$mod_tb_root_group."_id = '".$valGid."'";
// print_r($sql_g_type);die();


$query_g_type = wewebQueryDB($coreLanguageSQL, $sql_g_type);
$row_g_type = wewebFetchArrayDB($coreLanguageSQL, $query_g_type);
$valSid = $Row['sid'];
$valGtype = $Row['gtype'];

// $callCheckUrl = callCheckUrl($valID, $mod_tb_root_short);

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
                        <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?php echo $langMod["meu:contant"] ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <?php echo $langMod["txt:titleview"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"], $langTxt["lg:chi"]) ?>)<?php } ?></span></td>
                        <td class="divRightNavTb" align="right">



                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titleview"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"], $langTxt["lg:chi"]) ?>)<?php } ?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php if ($_REQUEST['viewID'] <= 0) { ?>
                                        <?php if ($valPermission == "RW") { ?>
                                            <div class="btnEditView" title="<?php echo $langTxt["btn:edit"] ?>" onclick="
                                                                        document.myFormHome.valEditID.value =<?php echo $valID ?>;
                                                                        editContactNew('../<?php echo $mod_fd_root ?>/editContant.php')"></div>
                                        <?php } ?>
                                        <div class="btnBack" title="<?php echo $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
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
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["set:lang:web"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <?php
                        foreach ($modTxtSetLang as $key => $value) {
                        ?>
                            <div class="formDivView">
                                <?php
                                if ($valLang[$key] == 1) {
                                    echo '- ' . $value;
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:subjectg"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <?php
                        $sql_group = "SELECT ";
                        if ($_REQUEST['inputLt'] == "Thai") {
                            $sql_group .= "  " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subject";
                        } else {
                            $sql_group .= " " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subjecten ";
                        }

                        $sql_group .= "  FROM " . $mod_tb_root_group . " WHERE  " . $mod_tb_root_group . "_masterkey ='" . $_REQUEST['masterkey'] . "' 
                        AND  " . $mod_tb_root_group . "_id ='" . $valGid . "' ORDER BY " . $mod_tb_root_group . "_order DESC ";
                        $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                        $row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group);
                        ?>
                        <div class="formDivView"><?php echo $row_group[1]; ?></div>
                    </td>
                </tr>
                
               

                <?php if($row_g_type[0] == 2){ ?>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:subjectsg"] ?>:<span class="fontContantAlert"></span></td>
                    
                    
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <?php
                        $sql_group = "SELECT ";
                        if ($_REQUEST['inputLt'] == "Thai") {
                            $sql_group .= "  " . $mod_tb_root_subgroup . "_id," . $mod_tb_root_subgroup . "_subject";
                        } else {
                            $sql_group .= " " . $mod_tb_root_subgroup . "_id," . $mod_tb_root_subgroup . "_subjecten ";
                        }

                        $sql_group .= "  FROM " . $mod_tb_root_subgroup . " WHERE  " . $mod_tb_root_subgroup . "_masterkey ='" . $_REQUEST['masterkey'] . "' 
                        AND  " . $mod_tb_root_subgroup . "_id ='" . $valSid . "' ORDER BY " . $mod_tb_root_subgroup . "_order DESC ";
                        
                        $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                        $row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group);
                        ?>
                        <div class="formDivView"><?php echo $row_group[1]; ?></div>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valSubject ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:title"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valTitle ?></div>
                    </td>
                </tr>
            </table>
            <br />



            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " >
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:pic"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <img src="<?php echo $valPic ?>" style="float:left;border:#c8c7cc solid 1px; max-width:600px;" onerror="this.src='<?php echo "../img/btn/nopic.jpg" ?>'" />
                        </div>
                    </td>
                </tr>

            </table> -->


            <!-- Album -->
            <br<?php if ($valTypec == 2) { ?> style="display:none;" <?php } ?> />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php if ($valTypec == 2) { ?> style="display:none;" <?php } ?>>
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:album"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:albumDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["txt:album"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                            if ($_REQUEST['inputLt'] == "Thai") {
								$lang = "th";
							} else if ($_REQUEST['inputLt'] == "Eng") {
								$lang = "en";
							}
                            // $sql_filetemp = "SELECT  " . $mod_tb_root_album . "_id," . $mod_tb_root_album . "_filename," . $mod_tb_root_album . "_name," . $mod_tb_root_album . "_download  FROM " . $mod_tb_root_album . " WHERE " . $mod_tb_root_album . "_contantid 	='" . $_REQUEST['valEditID'] . "' AND " . $mod_tb_root_album . "_lang".$lang." = '1 '
                            // ORDER BY " . $mod_tb_root_album . "_id ASC";

                            $sql_filetemp = "SELECT  ";
							if ($_REQUEST['inputLt'] == "Thai") {
								$sql_filetemp .= $mod_tb_root_album . "_id  ," . $mod_tb_root_album . "_filename,
								" . $mod_tb_root_album . "_name,
								" . $mod_tb_root_album . "_download ";
    
							} elseif ($_REQUEST['inputLt'] == "Eng") {
								$sql_filetemp .= $mod_tb_root_album . "_id  ," . $mod_tb_root_album . "_filenameen,
								" . $mod_tb_root_album . "_nameen,
								" . $mod_tb_root_album . "_downloaden ";
							}  
							$sql_filetemp .= " FROM " . $mod_tb_root_album . " WHERE " . $mod_tb_root_album . "_contantid 	='" . $_REQUEST['valEditID'] . "'
							AND " . $mod_tb_root_album . "_lang".$lang." = '1'  
							ORDER BY " . $mod_tb_root_album . "_order ASC";

                            $query_filetemp = wewebQueryDB($coreLanguageSQL, $sql_filetemp);
                            $number_filetemp = wewebNumRowsDB($coreLanguageSQL, $query_filetemp);
                            if ($number_filetemp >= 1) {
                                $valAlbum = "";
                                while ($row_filetemp = wewebFetchArrayDB($coreLanguageSQL, $query_filetemp)) {
                                    $linkRelativePath = $mod_path_album . "/" . $row_filetemp[1];
                                    $downloadFile = $row_filetemp[1];
                                    $downloadID = $row_filetemp[0];
                                    $downloadName = $row_filetemp[2];
                                    $countDownload = $row_filetemp[3];
                                    $imageType = strstr($downloadFile, '.');
                            ?>
                                    <?php if ($_REQUEST['viewID'] <= 0) { ?>
                                        <a rel="viewAlbum" title="" href="<?php echo $mod_path_album . "/reB_" . $downloadFile ?>">
                                            <img src="<?php echo $mod_path_album . "/reO_" . $downloadFile ?>" width="50" height="50" style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;" /></a>
                                    <?php } else { ?>
                                        <img src="<?php echo $mod_path_album . "/reO_" . $downloadFile ?>" width="50" height="50" style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;" />
                                    <?php } ?>
                                <?php }
                            } else { ?>
                                -
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br/>






            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:title"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo $langTxt["lg:thai"] ?>)<?php } ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:titleDe2"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="left" valign="top" class="formTileTxt">
                        <div class="viewEditorTileTxt">
                            <?php
                            $fd = @fopen($valHtml, "r");
                            $contents = @fread($fd, filesize($valHtml));
                            @fclose($fd);
                            echo txtReplaceHTML($contents);
                            ?>
                        </div>
                    </td>
                </tr>
            </table>
<!-- 
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:pic"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <img src="<?php echo $valPic ?>" style="float:left;border:#c8c7cc solid 1px; max-width:600px;" onerror="this.src='<?php echo "../img/btn/nopic.jpg" ?>'" />
                        </div>
                    </td>
                </tr>

            </table> -->



            
            <!-- <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:date"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:dateDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:sdate"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valSdate ?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:edate"] ?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valEdate ?></div>
                    </td>
                </tr> -->


            </table>
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleinfo"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langTxt["us:titleinfoDe"] ?></span>
                    </td>
                </tr>
                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:view"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valView ?></div>
                    </td>
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
                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["mg:statuspin"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">

                            <?php if ($valPin == "Pin") { ?>
                                <span class="<?php echo $valStatusPinClass ?>"><?php echo $valPin ?></span>
                            <?php } else { ?>
                                <span class="<?php echo $valStatusPinClass ?>"><?php echo $valPin ?></span>
                            <?php } ?>
                        </div>
                    </td>
                </tr> -->
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langTxt["mg:status"] ?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">

                            <?php if ($valStatus == "Enable") { ?>
                                <span class="<?php echo $valStatusClass ?>"><?php echo $valStatus ?></span>
                            <?php } else { ?>
                                <span class="<?php echo $valStatusClass ?>"><?php echo $valStatus ?></span>
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