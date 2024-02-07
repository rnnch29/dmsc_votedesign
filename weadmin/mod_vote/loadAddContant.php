<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";

			 $myRand = randomNameUpdate(2);
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_POST["menukeyid"]);

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <link href="../css/theme.css" rel="stylesheet" />

    <title><?php echo $core_name_title?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
    <script language="JavaScript" type="text/javascript">
    function executeSubmit() {
        with(document.myForm) {

            var checkbokSetLang = $('input.checkbokSetLang:checkbox:checked').length;
                if (checkbokSetLang == 0) {
                    alert('<?php echo $langMod["set:lang:web:alert"]; ?>');
                    return false;
                }

                
            if (isBlank(inputSubject)) {
                inputSubject.focus();
                jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                return false;
            } else {
                jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
            }

            /*

            if(isBlank(inputurl)) {
            	inputurl.focus();
            	jQuery("#inputurl").addClass("formInputContantTbAlertY"); 
            	return false; 
            }else{ 
            	jQuery("#inputurl").removeClass("formInputContantTbAlertY"); 
            }


            if(inputurl.value=="http://") {
            	inputurl.focus();
            	jQuery("#inputurl").addClass("formInputContantTbAlertY"); 
            	return false; 
            }else{ 
            	jQuery("#inputurl").removeClass("formInputContantTbAlertY"); 
            }
            */
        }
        insertContactNew('insertContant.php');
    }
    jQuery(document).ready(function() {

        jQuery('#myForm').keypress(function(e) {
            /* Start  Enter Check CKeditor */

            if (e.which == 13) {
                //e.preventDefault();
                executeSubmit();
                return false;
            }
            /* End  Enter Check CKeditor */
        });
    });
    </script>
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm" enctype="multipart/form-data">
        <input name="execute" type="hidden" id="execute" value="insert" />
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey']?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid']?>" />
        <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch']?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow"
            value="<?php echo $_REQUEST['module_pageshow']?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize"
            value="<?php echo $_REQUEST['module_pagesize']?>" />
        <input name="module_orderby" type="hidden" id="module_orderby"
            value="<?php echo $_REQUEST['module_orderby']?>" />
        <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh']?>" />
        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $myRand?>" />
        <input name="valDelFile" type="hidden" id="valDelFile" value="" />
        <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
        <input name="inputHtml" type="hidden" id="inputHtml" value="" />
        <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php echo $valhtmlname?>" />
        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt']?>" />
        <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a
                                href="<?php echo $valLinkNav1?>" target="_self"><?php echo $valNav1?></a> <img
                                src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)"
                                onclick="btnBackPage('index.php')"
                                target="_self"><?php echo getNameMenu($_REQUEST["menukeyid"])?></a> <img
                                src="../img/btn/nav.png" align="absmiddle" vspace="5" />
                            <?php echo $langMod["txt:titleadd"]?></span></td>
                    <td class="divRightNavTb" align="right">



                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span
                            class="fontHeadRight"><?php echo $langMod["txt:titleadd"]?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php if($valPermission=="RW" ){?>
                                    <div class="btnSave" title="<?php echo $langTxt["btn:save"]?>"
                                        onclick="executeSubmit();"></div>
                                    <?php }?>
                                    <div class="btnBack" title="<?php echo $langTxt["btn:back"]?>"
                                        onclick="btnBackPage('index.php')"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="divRightMain">




            <!-- TGP NAME  -->
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:subject"]?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:subjectDe"]?></span>
                    </td>
                </tr>

                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <!-- Checkbox th, eng  -->
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["set:lang:web"] ?><span class="fontContantAlert">*</span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <?php
                          foreach ($modTxtSetLang as $key => $value) {
                        ?>
                        <label>
                            <div class="formDivRadioL"><input name="inputSetLang[<?php echo $key ?>]"
                                    id="inputSetLang-<?php echo $key ?>" value="1" type="checkbox"
                                    class="formRadioContantTb checkbokSetLang" /></div>
                            <div class="formDivRadioR"><?php echo $value ?></div>
                        </label>
                        <?php
                        }
                        ?>
                    </td>
                </tr>

                <!-- NAME TH  -->
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:inpName"]?><span class="fontContantAlert">*</span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input
                            name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" /></td>
                </tr>

                <!-- link  -->
                <!-- <tr id="boxInputlink" style="display:show;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:linkvdo"]?><span class="fontContantAlert">*</span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><textarea
                            name="inputurl" id="inputurl" cols="45" rows="5"
                            class="formTextareaContantTb">http://</textarea><br />
                        <span class="formFontNoteTxt"><?php echo $langMod["edit:linknote"]?></span>
                    </td>
                </tr> -->

                <!-- target link -->
                <!-- <tr style="display:show;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:typevdo"]?><span class="fontContantAlert">*</span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <label>
                            <div class="formDivRadioL"><input name="inputmenutarget" id="inputmenutarget" type="radio"
                                    class="formRadioContantTb" value="1" checked="checked" /></div>
                            <div class="formDivRadioR"><?php echo $modTxtTarget[1]?></div>
                        </label>

                        <label>
                            <div class="formDivRadioL"><input name="inputmenutarget" id="inputmenutarget" type="radio"
                                    class="formRadioContantTb" value="2" /></div>
                            <div class="formDivRadioR"><?php echo $modTxtTarget[2]?></div>
                        </label>
                        </label>
                    </td>
                </tr> -->
                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table>
            <br />




            <!-- TGP UPLOAD BG  -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:pic"]?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"]?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["inp:album"]?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"]?></button>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"]?></span>
                        <div class="clearAll"></div>
                        <div id="boxPicNew" class="formFontTileTxt">
                            <input type="hidden" name="picname" id="picname" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table>
            <br /> -->

            <!-- PIC, VDO Upload -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center"
                class="tbBoxViewBorder  ckabout">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:video"] ?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:videoDe"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:typevdo"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        
                        <label>
                            <div class="formDivRadioL"><input name="inputType" id="inputType" value="pic" type="radio"
                                    class="formRadioContantTb" checked="checked" onclick="jQuery('#boxInputvdo').hide();
                                    jQuery('#boxInputfile').hide(); jQuery('#boxInputlink').hide();
                                     jQuery('#boxInputpic').show();" /></div>
                            <div class="formDivRadioR"><?php echo $langMod["inp:album"] ?></div>
                        </label>

                        
                        <label>
                            <div class="formDivRadioL"><input name="inputType" id="inputType" value="vdo" type="radio"
                                    class="formRadioContantTb" onclick="jQuery('#boxInputpic').hide();
                                                jQuery('#boxInputvdo').show();" /></div>
                            <div class="formDivRadioR"><?php echo $langMod["inp:vdo"] ?></div>
                        </label>
                        </label>
                    </td>
                </tr>

                
                <tr id="boxInputpic">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["inp:album"]?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"]?></button>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"]?></span>
                        <div class="clearAll"></div>
                        <div id="boxPicNew" class="formFontTileTxt">
                            <input type="hidden" name="picname" id="picname" />
                        </div>
                    </td>
                </tr>

                
                <tr id="boxInputvdo" style="display:none;">

                    <td width="18%" align="right" valign="top" class="formLeftContantTb"></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                       
                        <label>
                            <div class="formDivRadioL"><input name="inputTypeVdo" id="inputType" value="url"
                                    type="radio" class="formRadioContantTb" onclick="jQuery('#boxInputfile').hide();
                                                jQuery('#boxInputlink').show();" /></div>
                            <div class="formDivRadioR"><?php echo $langMod["tit:linkvdo"] ?></div>
                        </label>

                       
                        <label>
                            <div class="formDivRadioL"><input name="inputTypeVdo" id="inputType" value="file"
                                    type="radio" class="formRadioContantTb" onclick="jQuery('#boxInputlink').hide();
                                                jQuery('#boxInputfile').show();" /></div>
                            <div class="formDivRadioR"><?php echo $langMod["inp:vdo"] ?></div>
                        </label>
                        </label>
                    </td>
                </tr>

               
                <tr id="boxInputlink" style="display: none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:linkvdo"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><textarea
                            name="inputurl" id="inputurl" cols="45" rows="5"
                            class="formTextareaContantTb"></textarea><br />
                        <span class="formFontNoteTxt"><?php echo $langMod["tit:linkvdonote"] ?></span>
                    </td>
                </tr>

  
                <tr id="boxInputfile" style="display:none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:uploadvdo"] ?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"] ?></button>
                            <input type="file" name="inputVideoUpload" id="inputVideoUpload"
                                onchange="ajaxVideoUpload();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo $langMod["tit:uploadvdonote"] ?></span>
                        <div class="clearAll"></div>
                        <div id="boxVideoNew" class="formFontTileTxt"></div>
                    </td>
                </tr>

            </table>
            <br /> -->

            
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:pic"].'และ'.$langMod["txt:vdo"]?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:picDe"]?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:typevdo"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">


                        <!-- Radio Pictures  -->
                        <label>
                            <div class="formDivRadioL"><input name="inputType" id="inputType" value="pic" type="radio"
                                    class="formRadioContantTb" checked="checked" onclick="jQuery('#boxInputlink').hide();
                                    jQuery('#boxInputvdo').hide();
                                    jQuery('#boxInputurl').show();
                                    jQuery('#boxTarget').show();
                                    jQuery('#boxInputpic').show();" /></div>
                            <div class="formDivRadioR"><?php echo $langMod["txt:pic"] ?></div>
                        </label>

                        <!-- Radio Video  -->
                        <label>
                            <div class="formDivRadioL"><input name="inputType" id="inputType" value="vdo" type="radio"
                                    class="formRadioContantTb" onclick="jQuery('#boxInputlink').hide();
                                    jQuery('#boxInputpic').hide();
                                    jQuery('#boxInputurl').hide();
                                    jQuery('#boxTarget').hide();
                                    jQuery('#boxInputvdo').show();" /></div>
                            <div class="formDivRadioR"><?php echo $langMod["txt:vdo"] ?></div>
                        </label>

                        <!-- Radio url  -->
                        <label>
                            <div class="formDivRadioL"><input name="inputType" id="inputType" value="url" type="radio"
                                    class="formRadioContantTb" onclick="jQuery('#boxInputpic').hide();
                                        jQuery('#boxInputvdo').hide();
                                        jQuery('#boxInputurl').hide();
                                        jQuery('#boxTarget').hide();
                                        jQuery('#boxInputlink').show();" /></div>
                            <div class="formDivRadioR"><?php echo $langMod["tit:linkvdo"] ?></div>
                        </label>
                        

                    </td>
                </tr>

                <!-- input pic  -->
                <tr id="boxInputpic">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["inp:album"]?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"]?></button>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notepic"]?></span>
                        <div class="clearAll"></div>
                        <div id="boxPicNew" class="formFontTileTxt">
                            <input type="hidden" name="picname" id="picname" />
                        </div>
                    </td>
                </tr>

                <!-- Url Pic  -->
                <tr id="boxInputurl">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:link"]?></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><textarea
                            name="inputurl" id="inputurl" cols="45" rows="5"
                            class="formTextareaContantTb">http://</textarea><br />
                        <span class="formFontNoteTxt"><?php echo $langMod["edit:linknote"]?></span>
                    </td>
                </tr>

                <!-- Target URL  -->
                <tr id="boxTarget">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">การแสดงผล URL</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">


                        <label>
                            <div class="formDivRadioL"><input name="inputTarget" id="inputTarget" value="1"
                                    class="formRadioContantTb" type="radio" checked="checked" /></div>
                            <div class="formDivRadioR"><?php echo  $modTxtTarget[1]; ?></div>
                        </label>

                        <label>
                            <div class="formDivRadioL"><input name="inputTarget" id="inputTarget" value="2"
                                    class="formRadioContantTb" type="radio" /></div>
                            <div class="formDivRadioR"><?php echo  $modTxtTarget[2]; ?></div>
                        </label>
                    </td>
                </tr>

                <!-- input vdo -->
                <tr id="boxInputvdo" style="display: none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["inp:vdo"]?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="file-input-wrapper">
                            <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"]?></button>
                            <input type="file" name="inputVideoUpload" id="inputVideoUpload"
                                onchange="ajaxVideoUpload();" />
                        </div>

                        <span class="formFontNoteTxt"><?php echo $langMod["tit:uploadvdonote"]?></span>
                        <div class="clearAll"></div>
                        <div id="boxVideoNew" class="formFontTileTxt">
                            <input type="hidden" name="vdoname" id="vdoname" />
                        </div>
                    </td>
                </tr>

                <!-- input url youtube  -->
                <tr id="boxInputlink" style="display: none;">
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:linkvdo"] ?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><textarea
                            name="inputurlvdo" id="inputurlvdo" cols="45" rows="5"
                            class="formTextareaContantTb"></textarea><br />
                        <span class="formFontNoteTxt"><?php echo $langMod["tit:linkvdonote"] ?></span>
                    </td>
                </tr>

                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table>
            <br />

            <!-- Set date start, date end  -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:seo"]?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:seoDe"]?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top" height="15"></td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:sdate"]?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input
                            name="sdateInput" id="sdateInput" type="text" autocomplete="off"
                            class="formInputContantTbShot" value="<?php echo $sdateInput?>" /></td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:edate"]?><span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input
                            name="edateInput" id="edateInput" type="text" autocomplete="off"
                            class="formInputContantTbShot" value="<?php echo $edateInput?>" /><br />
                        <span class="formFontNoteTxt"><?php echo $langMod["inp:notedate"]?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>


            </table> -->
            
            <br />
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                <tr>
                    <td colspan="7" align="right" valign="top" height="20"></td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop"
                            title="<?php echo $langTxt["btn:gototop"]?>"><?php echo $langTxt["btn:gototop"]?> <img
                                src="../img/btn/top.png" align="absmiddle" /></a></td>
                </tr>
            </table>
        </div>
    </form>
    <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
    <script type="text/javascript" language="javascript">
    /*################################# Upload Pic #######################*/
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
            url: 'loadInsertPic.php?myID=<?php echo $myRand?>&masterkey=<?php echo $_REQUEST['masterkey']?>&langt=<?php echo $_REQUEST['inputLt']?>&delpicname=' +
                valuepicname + '&menuid=<?php echo $_REQUEST['menukeyid']?>',
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

    /*################################# Upload Video #######################*/
    function ajaxVideoUpload() {
        var valuevdoname = jQuery("input#vdoname").val();

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
            url: 'loadInsertVideo.php?myID=<?php echo $myRand ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delvdoname=' +
                valuevdoname + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
            secureuri: false,
            fileElementId: 'inputVideoUpload',
            dataType: 'json',
            success: function(data, status) {
                if (typeof(data.error) != 'undefined') {

                    if (data.error != '') {
                        alert(data.error);

                    } else {
                        jQuery("#boxVideoNew").show();
                        jQuery("#boxVideoNew").html(data.msg);
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
    </script>
    <?php if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){?>
    <script language="JavaScript" type="text/javascript" src="../js/datepickerThai.js"></script>
    <?php }else{?>
    <script language="JavaScript" type="text/javascript" src="../js/datepickerEng.js"></script>
    <?php }?>

    <?php include("../lib/disconnect.php");?>

</body>

</html>