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
$sql .= "   " . $mod_tb_setting . "_id , " . $mod_tb_setting . "_credate , " . $mod_tb_setting . "_crebyid, " . $mod_tb_setting . "_status,    " . $mod_tb_setting . "_sdate  	 	 ,    " . $mod_tb_setting . "_edate  ";

if ($_REQUEST['inputLt'] == "Thai") {
    $sql .= " , " . $mod_tb_setting . "_subject  ,    " . $mod_tb_setting . "_title , " . $mod_tb_setting . "_htmlfilename ";
} else { 
    $sql .= " , " . $mod_tb_setting . "_subjecten  ,    " . $mod_tb_setting . "_titleen , " . $mod_tb_setting . "_htmlfilenameen  ";
}

$sql .= " FROM " . $mod_tb_setting . " WHERE " . $mod_tb_setting . "_masterkey='" . $_POST["masterkey"] . "' AND  " . $mod_tb_setting . "_id 	='" . $_POST["valEditID"] . "'";

// print_pre($sql);die;
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valid = $Row[0];
$valcredate = DateFormatInsertRe($Row[1]);
$valcreby = $Row[2];
$valstatus = $Row[3];
if ($Row[4] != "0000-00-00 00:00:00") {
    $valSdate = DateFormatInsertRe($Row[4]);
}
if ($Row[5] != "0000-00-00 00:00:00") {
    $valEdate = DateFormatInsertRe($Row[5]);
}

$valSubject = rechangeQuot($Row[6]);
$valTitle = $Row[7];
$valhtml = $mod_path_html . "/" . $Row[8];
$valhtmlname = $Row[8];

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <link href="../css/theme.css" rel="stylesheet" />
    <link href="js/uploadfile.css" rel="stylesheet" />

    <title><?php echo $core_name_title ?></title>
    <link href="../js/select2/css/select2.css" rel="stylesheet" />
    <script language="JavaScript" type="text/javascript" src="../js/select2/js/select2.js"></script>

    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
    <script language="JavaScript" type="text/javascript">
        function executeSubmit() {
            with(document.myForm) {


                // if (isBlank(inputSubject)) {
                //     inputSubject.focus();
                //     jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
                // }

                // if (inputUrlcheck.value == "Allowed") {
                // 	if (isBlank(inputUrlFriendly)) {
                // 		inputUrlFriendly.focus();
                // 		jQuery("#inputUrlFriendly").addClass("formInputContantTbAlertY");
                // 		return false;
                // 	} else {
                // 		jQuery("#inputUrlFriendly").removeClass("formInputContantTbAlertY");
                // 	}
                // }else{
                // 	inputUrlFriendly.focus();
                // 	return false;
                // }

                // if (isBlank(inputDescription)) {
                //     inputDescription.focus();
                //     jQuery("#inputDescription").addClass("formInputContantTbAlertY");
                //     return false;
                // } else {
                //     jQuery("#inputDescription").removeClass("formInputContantTbAlertY");
                // }

                // var type = $('#inputTypeC:checked').val();
                // if (type == 2) {
                // 	if(isBlank(inputurlc)) {
                // 	inputurlc.focus();
                // 	jQuery("#inputurlc").addClass("formInputContantTbAlertY");
                // 	return false;
                // 	}else{
                // 		jQuery("#inputurlc").removeClass("formInputContantTbAlertY");
                // 	}


                // 	if(inputurlc.value=="http://") {
                // 		inputurlc.focus();
                // 		jQuery("#inputurlc").addClass("formInputContantTbAlertY");
                // 		return false;
                // }else{
                // 	jQuery("#inputurlc").removeClass("formInputContantTbAlertY");
                // }
                // }
                // if (type == 1) {
                var alleditDetail = CKEDITOR.instances.editDetail.getData();
                if (alleditDetail == "") {
                    jQuery("#inputEditHTML").addClass("formInputContantTbAlertY");
                    window.location.hash = '#inputEditHTML';
                    return false;
                } else {
                    jQuery("#inputEditHTML").removeClass("formInputContantTbAlertY");
                }
                jQuery('#inputHtml').val(alleditDetail);
                // }

            }

            updateContactNew('updateSetting.php');

        }


        function loadCheckUser() {
            with(document.myForm) {
                var inputValuename = document.myForm.inputUserName.value;
            }
            if (inputValuename != '') {
                checkUsermember(inputValuename);
            }
        }



        jQuery(document).ready(function() {

            jQuery('#myForm').keypress(function(e) {
                /* Start  Enter Check CKeditor */
                var focusManager = new CKEDITOR.focusManager(editDetail);
                var checkFocus = CKEDITOR.instances.editDetail.focusManager.hasFocus;
                var checkFocusTitle = jQuery("#inputDescription").is(":focus");

                if (e.which == 13) {
                    //e.preventDefault();
                    if (!checkFocusTitle) {
                        if (!checkFocus) {
                            executeSubmit();
                            return false;
                        }
                    }
                }
                /* End  Enter Check CKeditor */
            });
        });
    </script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm" enctype="multipart/form-data">
        <input name="execute" type="hidden" id="execute" value="update" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid'] ?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow'] ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize'] ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby'] ?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh'] ?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $_REQUEST['valEditID'] ?>" />
        <input name="valDelFile" type="hidden" id="valDelFile" value="" />
        <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
        <input name="inputHtml" type="hidden" id="inputHtml" value="" />
        <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php echo $valhtmlname ?>" />
        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt'] ?>" />
        <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('setting.php')" target="_self"><?php echo $langMod["meu:setPermis"] ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" />
                            <?php echo $langMod["txt:titleedits"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"], $langTxt["lg:chi"]) ?>)<?php } ?></span>
                    </td>
                    <td class="divRightNavTb" align="right">



                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titleedits"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"], $langTxt["lg:chi"]) ?>)<?php } ?></span>
                    </td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php if ($valPermission == "RW") { ?>
                                        <div class="btnSave" title="<?php echo $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                    <?php } ?>
                                    <div class="btnBack" title="<?php echo $langTxt["btn:back"] ?>" onclick="btnBackPage('setting.php')"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightMain">
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:subject"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:subjectDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:subject"] ?><span class="fontContantAlert">*</span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?php echo $valSubject ?>" /></td>
                </tr> -->

                <tr>
                    <td align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:title"] ?><span class="fontContantAlert"></span></td>
                    <td colspan="6" align="left" valign="top" class="formRightContantTb">
                        <textarea name="inputDescription" id="inputDescription" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valTitle ?></textarea>
                    </td>
                </tr>

            </table>
            <br>

            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:pic"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["inp:album"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxPicNew" class="formFontTileTxt">
                            <?php if (is_file($valPic)) { ?>
                                <img src="<?php echo $valPic ?>" style="float:left;border:#c8c7cc solid 1px;max-width:600px;" />
                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')" title="Delete file"><img src="../img/btn/delete.png" width="22" height="22" border="0" /></div>
                                <input type="hidden" name="picname" id="picname" value="<?php echo $valPicName ?>" />
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            </table> -->

            <br class="ckabout" />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:title"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:titleDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="center" valign="top" class="formRightContantTbEditor">
                        <div id="inputEditHTML">
                            <textarea name="editDetail" id="editDetail">
                                      <?php
                                        if (is_file($valhtml)) {
                                            $fd = @fopen($valhtml, "r");
                                            $contents = @fread($fd, @filesize($valhtml));
                                            @fclose($fd);
                                            echo txtReplaceHTML($contents);
                                        }
                                        ?>
                                </textarea>
                        </div>
                    </td>
                </tr>
            </table>

            <!-- <br class="ckabout" />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:album"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:albumDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["inp:album"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div id="mulitplefileuploader"><?php echo $langTxt["us:inputpicselect"] ?></div>

                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notealbum"] ?></span>
                        <div class="clearAll"></div>
                        <div id="status" class="formFontTileTxt"></div>
                        <div id="boxAlbumNew" class="formFontTileTxt">
                            <?php
                            $sql_filetemp = "SELECT  " . $mod_tb_setting_album . "_id," . $mod_tb_setting_album . "_filename," . $mod_tb_setting_album . "_name," . $mod_tb_setting_album . "_download  FROM " . $mod_tb_setting_album . " WHERE " . $mod_tb_setting_album . "_contantid 	='" . $_REQUEST['valEditID'] . "'    ORDER BY " . $mod_tb_setting_album . "_id ASC";
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

                                    $valAlbum .= "<img src=\"" . $mod_path_album . "/reO_" . $downloadFile . "\"  width=\"50\" height=\"50\"   style=\"float:left;border:#c8c7cc solid 1px;margin-top:15px;\"  />";
                                    $valAlbum .= "<div style=\"width:15px; height:15px;float:left;z-index:1; margin-left:-15px;cursor:pointer;margin-right:15px;margin-top:15px;\" onclick=\"document.myForm.valDelAlbum.value=" . $downloadID . ";delAlbumUpload('deleteAlbum.php');\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"15\" height=\"15\"  border=\"0\"/></div>";
                                }
                            }
                            echo $valAlbum;

                            ?>
                        </div>
                    </td>
                </tr>
            </table> -->
            
            <br class="ckabout" />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["inp:sefile"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" />
                        </div>
                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxFileNew" class="formFontTileTxt">
                            <?php

                            // print_pre($Row['file']);
                            $linkRelativePath = $mod_path_file . "/" . $Row['file'];
                            $downloadFile = $Row['file'];
                            $downloadFilename = $Row['filename'];
                            $downloadID = $Row[0];
                            $imageType = strstr($downloadFile, '.');
                            if ($downloadFile != '') {
                                $txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadFilename . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                                echo $txtFile;
                            }

                            ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br class="" />

            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ckabout">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:video"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:videoDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:typevdo"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <label>
                            <div class="formDivRadioL"><input name="inputType" id="inputType" value="url" type="radio" class="formRadioContantTb" onclick="jQuery('#boxInputfile').hide();jQuery('#boxInputlink').show();" <?php if ($valType == "url") { ?> checked="checked" <?php } ?> /></div>
                            <div class="formDivRadioR"><?php echo $langMod["tit:linkvdo"] ?></div>
                        </label>

                        <label>
                            <div class="formDivRadioL"><input name="inputType" id="inputType" value="file" type="radio" class="formRadioContantTb" onclick="jQuery('#boxInputlink').hide();jQuery('#boxInputfile').show();" <?php if ($valType == "file") { ?> checked="checked" <?php } ?> /></div>
                            <div class="formDivRadioR"><?php echo $langMod["tit:uploadvdo"] ?></div>
                        </label>
                        </label>
                    </td>
                </tr>
                <tr id="boxInputlink" <?php if ($valType == "file") { ?> style="display:none;" <?php } ?>>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:linkvdo"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><textarea name="inputurl" id="inputurl" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valUrl ?></textarea><br />
                        <span class="formFontNoteTxt"><?php echo $langMod["tit:linkvdonote"] ?></span>
                    </td>
                </tr>
                <tr id="boxInputfile" <?php if ($valType == "url") { ?> style="display:none;" <?php } ?>>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:uploadvdo"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="inputVideoUpload" id="inputVideoUpload" onchange="ajaxVideoUpload();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo $langMod["tit:uploadvdonote"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxVideoNew" class="formFontTileTxt">
                            <?php if (is_file($valPathvdo)) {
                                $linkRelativePath = $valPathvdo;
                                $imageType = strstr($valFilevdo, '.');
                            ?>
                                <a href="javascript:void(0)" onclick=" delVideoUpload('deleteVideo.php')"><img src="../img/btn/delete.png" align="absmiddle" title="Delete file" hspace="10" vspace="10" border="0" /></a>Video Upload | <?php echo $langMod["file:type"] ?>:
                                <?php echo $imageType ?> | <?php echo $langMod["file:size"] ?>:
                                <?php echo get_IconSize($linkRelativePath) ?>
                                <input type="hidden" name="picname" id="picname" value="<?php echo $valFilevdo ?>" />
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br class="ckabout" />

            <?php if ($_REQUEST['menukeyid'] == '83' || $_REQUEST['menukeyid'] == '84') { ?>
                <?php if ($_REQUEST['inputLt'] == "Thai") { ?>
                    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                        <tr>
                            <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] ?></span><br />
                                <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7" align="right" valign="top" height="15"></td>
                        </tr>

                        <tr style="display:none;">
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputFileName" id="inputFileName" type="text" class="formInputContantTb" /></td>
                        </tr>

                        <tr>
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["tit:groupType"] ?></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                <label>
                                    <div class="formDivRadioL"><input name="inputTypeFTH" id="inputTypeFTH" value="1" class="formRadioContantTb" type="radio" <?php if (empty($valTypeFile) || $valTypeFile == 1) { ?> checked="checked" <?php } ?> onclick="jQuery('#boxInputlinkTH').hide(); jQuery('#boxInputFileTH').show();" />
                                    </div>
                                    <div class="formDivRadioR"><?php echo "Upload File"; ?></div>
                                </label>

                                <label>
                                    <div class="formDivRadioL"><input name="inputTypeFTH" id="inputTypeFTH" value="2" class="formRadioContantTb" type="radio" <?php if ($valTypeFile == 2) { ?> checked="checked" <?php } ?> onclick="jQuery('#boxInputlinkTH').show(); jQuery('#boxInputFileTH').hide();" />
                                    </div>
                                    <div class="formDivRadioR"><?php echo "URL"; ?></div>
                                </label>
                            </td>
                        </tr>
                        <tr id="boxInputlinkTH" <?php if (empty($valTypeFile) || $valTypeFile == 1) { ?> style="display: none;" <?php } ?>>
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["tit:linkdownload"] ?></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                <textarea name="inputurlFileTH" id="inputurlFileTH" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valUrlFile ?></textarea><br />
                                <span class="formFontNoteTxt"><?php echo $langMod["tit:linkdownloadnote"] ?></span>
                            </td>
                        </tr>
                        <tr id="boxInputFileTH" <?php if ($valTypeFile == 2) { ?> style="display: none;" <?php } ?>>
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["inp:sefile"] ?><span class="fontContantAlert"></span></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                <div class="file-input-wrapper">
                                    <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                                    <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" />
                                </div>
                                <span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"] ?></span>
                                <div class="clearAll"></div>
                                <div id="boxFileNew" class="formFontTileTxt">
                                    <?php

                                    // print_pre($Row['file']);
                                    $linkRelativePath = $mod_path_file . "/" . $Row['file'];
                                    $downloadFile = $Row['file'];
                                    $downloadFilename = $Row['filename'];
                                    $downloadID = $Row[0];
                                    $imageType = strstr($downloadFile, '.');
                                    if ($downloadFile != '') {
                                        $txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadFilename . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                                        echo $txtFile;
                                    }

                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                <?php } else if ($_REQUEST['inputLt'] == "Eng") { ?>
                    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                        <tr>
                            <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] ?></span><br />
                                <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7" align="right" valign="top" height="15"></td>
                        </tr>

                        <tr style="display:none;">
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputFileName" id="inputFileName" type="text" class="formInputContantTb" /></td>
                        </tr>

                        <tr>
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["tit:groupType"] ?></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                <label>
                                    <div class="formDivRadioL"><input name="inputTypeFEN" id="inputTypeFEN" value="1" class="formRadioContantTb" type="radio" <?php if (empty($valTypeFileEn) || $valTypeFileEn == 1) { ?> checked="checked" <?php } ?> onclick="jQuery('#boxInputlinkEN').hide(); jQuery('#boxInputFileEN').show();" />
                                    </div>
                                    <div class="formDivRadioR"><?php echo "Upload File"; ?></div>
                                </label>

                                <label>
                                    <div class="formDivRadioL"><input name="inputTypeFEN" id="inputTypeFEN" value="2" class="formRadioContantTb" type="radio" <?php if ($valTypeFileEn == 2) { ?> checked="checked" <?php } ?> onclick="jQuery('#boxInputlinkEN').show(); jQuery('#boxInputFileEN').hide();" />
                                    </div>
                                    <div class="formDivRadioR"><?php echo "URL"; ?></div>
                                </label>
                            </td>
                        </tr>
                        <tr id="boxInputlinkEN" <?php if (empty($valTypeFileEn) || $valTypeFileEn == 1) { ?> style="display: none;" <?php } ?>>
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["tit:linkdownload"] ?></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                <textarea name="inputurlFileEN" id="inputurlFileEN" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valUrlFileEn ?></textarea><br />
                                <span class="formFontNoteTxt"><?php echo $langMod["tit:linkdownloadnote"] ?></span>
                            </td>
                        </tr>
                        <tr id="boxInputFileEN" <?php if ($valTypeFileEn == 2) { ?> style="display: none;" <?php } ?>>
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["inp:sefile"] ?><span class="fontContantAlert"></span></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                <div class="file-input-wrapper">
                                    <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                                    <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" />
                                </div>
                                <span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"] ?></span>
                                <div class="clearAll"></div>
                                <div id="boxFileNew" class="formFontTileTxt">
                                    <?php

                                    // print_pre($Row['file']);
                                    $linkRelativePath = $mod_path_file . "/" . $Row['fileen'];
                                    $downloadFile = $Row['fileen'];
                                    $downloadFilename = $Row['filenameen'];
                                    $downloadID = $Row[0];
                                    $imageType = strstr($downloadFile, '.');
                                    if ($downloadFile != '') {
                                        $txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadFilename . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                                        echo $txtFile;
                                    }

                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                <?php } else { ?>
                    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                        <tr>
                            <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                <span class="formFontSubjectTxt"><?php echo $langMod["txt:attfile"] ?></span><br />
                                <span class="formFontTileTxt"><?php echo $langMod["txt:attfileDe"] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7" align="right" valign="top" height="15"></td>
                        </tr>

                        <tr style="display:none;">
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["inp:chfile"] ?><span class="fontContantAlert"></span></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputFileName" id="inputFileName" type="text" class="formInputContantTb" /></td>
                        </tr>

                        <tr>
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["tit:groupType"] ?></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                <label>
                                    <div class="formDivRadioL"><input name="inputTypeFCN" id="inputTypeFCN" value="1" class="formRadioContantTb" type="radio" <?php if (empty($valTypeFileCn) || $valTypeFileCn == 1) { ?> checked="checked" <?php } ?> onclick="jQuery('#boxInputlinkCN').hide(); jQuery('#boxInputFileCN').show();" />
                                    </div>
                                    <div class="formDivRadioR"><?php echo "Upload File"; ?></div>
                                </label>

                                <label>
                                    <div class="formDivRadioL"><input name="inputTypeFCN" id="inputTypeFCN" value="2" class="formRadioContantTb" type="radio" <?php if ($valTypeFileCn == 2) { ?> checked="checked" <?php } ?> onclick="jQuery('#boxInputlinkCN').show(); jQuery('#boxInputFileCN').hide();" />
                                    </div>
                                    <div class="formDivRadioR"><?php echo "URL"; ?></div>
                                </label>
                            </td>
                        </tr>
                        <tr id="boxInputlinkCN" <?php if (empty($valTypeFileCn) || $valTypeFileCn == 1) { ?> style="display: none;" <?php } ?>>
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["tit:linkdownload"] ?></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                <textarea name="inputurlFileCN" id="inputurlFileCN" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valUrlFileCn ?></textarea><br />
                                <span class="formFontNoteTxt"><?php echo $langMod["tit:linkdownloadnote"] ?></span>
                            </td>
                        </tr>
                        <tr id="boxInputFileCN" <?php if ($valTypeFileCn == 2) { ?> style="display: none;" <?php } ?>>
                            <td width="18%" align="right" valign="top" class="formLeftContantTb">
                                <?php echo $langMod["inp:sefile"] ?><span class="fontContantAlert"></span></td>
                            <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                                <div class="file-input-wrapper">
                                    <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                                    <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" />
                                </div>
                                <span class="formFontNoteTxt"><?php echo $langMod["inp:notefile"] ?></span>
                                <div class="clearAll"></div>
                                <div id="boxFileNew" class="formFontTileTxt">
                                    <?php

                                    // print_pre($Row['file']);
                                    $linkRelativePath = $mod_path_file . "/" . $Row['filecn'];
                                    $downloadFile = $Row['filecn'];
                                    $downloadFilename = $Row['filenamecn'];
                                    $downloadID = $Row[0];
                                    $imageType = strstr($downloadFile, '.');
                                    if ($downloadFile != '') {
                                        $txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=" . $downloadID . ";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadFilename . "" . $imageType . " | " . $langMod["file:type"] . ": " . $imageType . "  | " . $langMod["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
                                        echo $txtFile;
                                    }

                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                <?php } ?>

                <br />
            <?php } ?>

            <!-- ################### SEO ################### -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:seo"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:seoDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["inp:seotitle"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagTitle" id="inputTagTitle" type="text" class="formInputContantTb" value="<?php echo $valMetatitle ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo $langMod["inp:seotitlenote"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["inp:seodes"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagDescription" id="inputTagDescription" type="text" class="formInputContantTb" value="<?php echo $valDescription ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo $langMod["inp:seodesnote"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["inp:seokey"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputTagKeywords" id="inputTagKeywords" type="text" class="formInputContantTb" value="<?php echo $valKeywords ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo $langMod["inp:seokeynote"] ?></span>
                    </td>
                </tr>
            </table> -->


            <!-- Date start, end  -->
            <!-- <br class="" />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:date"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:dateDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:sdate"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="sdateInput" id="sdateInput" type="text" class="formInputContantTbShot" value="<?php echo $valSdate ?>" /></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:edate"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="edateInput" id="edateInput" type="text" class="formInputContantTbShot" value="<?php echo $valEdate ?>" /><br />
                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notedate"] ?></span>
                    </td>
                </tr>
            </table> -->

            <br class="ckabout" />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                <tr>
                    <td colspan="7" align="right" valign="top" height="20"></td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"] ?>"><?php echo $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png" align="absmiddle" /></a></td>
                </tr>
            </table>
        </div>
    </form>
    <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
    <script type="text/javascript" language="javascript">
        /*################################# Upload Pic #######################*/
        function ajaxFileUpload() {
            var valuepicname = jQuery("input#picname").val();

            jQuery.blockUI({
                message: jQuery('#tallContent'),
                css: {
                    border: 'none',
                    padding: '35px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .9,
                    color: '#fff'
                }
            });


            jQuery.ajaxFileUpload({
                url: 'loadUpdatePic.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delpicname=' +
                    valuepicname + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                secureuri: false,
                fileElementId: 'fileToUpload',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);

                        } else {
                            jQuery("#boxPicNew").show();
                            jQuery("#boxPicNew").html(data.msg);
                            setTimeout(jQuery.unblockUI, 200);
                        }
                    }
                },
                error: function(data, status, e) {
                    alert(e);
                }
            })
            return false;

        }

        // function ajaxFileUpload2(){
        // 	var valuepicname = jQuery("input#picname2").val();

        // 	 jQuery.blockUI({
        // 			message: jQuery('#tallContent'),
        // 			css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
        // 			}
        // 		});


        // 	jQuery.ajaxFileUpload({
        // 			url:'loadUpdatePic2.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delpicname='+valuepicname+'&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
        // 			secureuri:false,
        // 			fileElementId:'fileToUpload2',
        // 			dataType: 'json',
        // 			success: function (data, status){
        // 				if(typeof(data.error) != 'undefined')
        // 				{

        // 					if(data.error != '')
        // 					{
        // 						alert(data.error);

        // 					}else
        // 					{
        // 						jQuery("#boxPicNew2").show();
        // 						jQuery("#boxPicNew2").html(data.msg);
        // 						setTimeout(jQuery.unblockUI, 200);
        // 					}
        // 				}
        // 			},
        // 			error: function (data, status, e)
        // 			{
        // 				alert(e);
        // 			}
        // 		}
        // 	)
        // 	return false;

        // }
        /*############################# Upload Album ##################################

        function ajaxFileUploadAlbum(){
        	 jQuery.blockUI({
        			message: jQuery('#tallContent'),
        			css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
        			}
        		});


        	jQuery.ajaxFileUpload({
        			url:'loadUpdateAlbum.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
        			secureuri:true,
        			fileElementId:'inputAlbumUpload',
        			dataType: 'json',
        			success: function (data, status){
        				if(typeof(data.error) != 'undefined'){

        					if(data.error != ''){
        						alert(data.error);
        					}else{
        						jQuery("#boxAlbumNew").show();
        						jQuery("#boxAlbumNew").html(data.msg);
        						setTimeout(jQuery.unblockUI, 200);
        					}

        				}
        			},
        			error: function (data, status, e){
        				alert(e);
        			}
        		}
        	)

        	return false;

        }*/

        /*################################# Upload Video #######################*/
        // function ajaxVideoUpload(){
        // 	var valuevdoname = jQuery("input#vdoname").val();

        // 	 jQuery.blockUI({
        // 			message: jQuery('#tallContent'),
        // 			css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
        // 			}
        // 		});


        // 	jQuery.ajaxFileUpload({
        // 			url:'loadUpdateVideo.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delvdoname='+valuevdoname+'&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
        // 			secureuri:false,
        // 			fileElementId:'inputVideoUpload',
        // 			dataType: 'json',
        // 			success: function (data, status){
        // 				if(typeof(data.error) != 'undefined')
        // 				{

        // 					if(data.error != '')
        // 					{
        // 						alert(data.error);

        // 					}else
        // 					{
        // 						jQuery("#boxVideoNew").show();
        // 						jQuery("#boxVideoNew").html(data.msg);
        // 						setTimeout(jQuery.unblockUI, 200);
        // 					}
        // 				}
        // 			},
        // 			error: function (data, status, e)
        // 			{
        // 				alert(e);
        // 			}
        // 		}
        // 	)
        // 	return false;

        // }

        // /*############################# Upload File ####################################*/
        function ajaxFileUploadDoc() {
            var valuefilename = jQuery("input#inputFileName").val();
            jQuery.blockUI({
                message: jQuery('#tallContent'),
                css: {
                    border: 'none',
                    padding: '35px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .9,
                    color: '#fff'
                }
            });


            jQuery.ajaxFileUpload({
                url: 'loadUpdateFile.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&nametodoc=' +
                    valuefilename + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
                secureuri: true,
                fileElementId: 'inputFileUpload',
                dataType: 'json',
                success: function(data, status) {
                    if (typeof(data.error) != 'undefined') {

                        if (data.error != '') {
                            alert(data.error);
                        } else {
                            jQuery("#boxFileNew").show();
                            jQuery("#boxFileNew").html(data.msg);
                            document.myForm.inputFileName.value = "";
                            setTimeout(jQuery.unblockUI, 200);
                        }

                    }
                },
                error: function(data, status, e) {
                    alert(e);
                }
            })

            return false;

        }

        /*################### Load FCK Editor ######################*/
        jQuery(function() {
            onLoadFCK();
        });
    </script>

    <script type="text/javascript" src="js/jquery.uploadfile.js"></script>
    <script type="text/javascript" language="javascript">
        jQuery(document).ready(function() {

            $('.ckabout').hide();
            var vajSelectFile = 0;
            var valUploadFile = 0;
            var settings = {
                url: "loadUpdateAlbum.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&menuid=<?php echo $_REQUEST['menukeyid'] ?>",
                dragDrop: false,
                fileName: "myfile",
                allowedTypes: "jpg,png,gif",
                returnType: "json",
                onSelect: function(files) {
                    vajSelectFile = files.length;
                },

                onSuccess: function(files, data, xhr) {
                    valUploadFile = valUploadFile + 1;
                    if (vajSelectFile == valUploadFile) {
                        loadShowPhotoUpdate('loadShowAlbumNewUpdate.php', 'boxAlbumNew');
                        //	alert('goooo');
                        valUploadFile = 0;
                    }
                },
                showStatusAfterSuccess: false,
                showAbort: false,
                showDone: false,
                showDelete: false,
                deleteCallback: function(data, pd) {
                    for (var i = 0; i < data.length; i++) {

                        $.post("delete.php", {
                                op: "delete",
                                name: data[i]
                            },
                            function(resp, textStatus, jqXHR) {

                                //Show Message
                                jQuery("#status").append("<div>File Deleted</div>");
                            });

                    }
                    pd.statusbar.hide(); //You choice to hide/not.

                }
            }
            var uploadObj = jQuery("#mulitplefileuploader").uploadFile(settings);


        });
    </script>


    <?php if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") { ?>
        <script language="JavaScript" type="text/javascript" src="../js/datepickerThai.js"></script>
    <?php } else { ?>
        <script language="JavaScript" type="text/javascript" src="../js/datepickerEng.js"></script>
    <?php } ?>
    <?php include("../lib/disconnect.php"); ?>

</body>

</html>