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
	<script language="JavaScript" type="text/javascript" src="./js/script.js"></script>
	<script language="JavaScript" type="text/javascript">
		function executeSubmit() {
			with(document.myForm) {
				var checkedDetail = $('input[name="inputTypeShow"]:checked').val();
				var checkbokSetLang = $('input.checkbokSetLang:checkbox:checked').length;
				if (checkbokSetLang == 0) {
					alert('<?php echo $langMod["set:lang:web:alert"]; ?>');
					return false;
				}

				if (inputGroupID.value == 0) {
					inputGroupID.focus();
					jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
					return false;
				} else {
					jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
				}

				var inputSubgroup = $('input[name="inputSubType"]').val();
				if (inputSubgroup == 1) {
					if (inputSubGroupID.value == 0) {
						inputSubGroupID.focus();
						jQuery("#inputSubGroupID").addClass("formInputContantTbAlertY");
						return false;
					} else {
						jQuery("#inputSubGroupID").removeClass("formInputContantTbAlertY");
					}
				}

				if (isBlank(inputSubject)) {
					inputSubject.focus();
					jQuery("#inputSubject").addClass("formInputContantTbAlertY");
					return false;
				} else {
					jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
				}

				// if (isBlank(inputDescription)) {
				// 	inputDescription.focus();
				// 	jQuery("#inputDescription").addClass("formInputContantTbAlertY");
				// 	return false;
				// } else {
				// 	jQuery("#inputDescription").removeClass("formInputContantTbAlertY");
				// }

				var alleditDetail = CKEDITOR.instances.editDetail.getData();
                jQuery('#inputHtml').val(alleditDetail);


			}

			updateContactNew('updateContant.php');

		}

		jQuery(document).ready(function() {

			jQuery('#myForm').keypress(function(e) {
				/* Start  Enter Check CKeditor */
				var checkedDetail = $('input[name="inputTypeShow"]:checked').val();
				// console.log(masterkeya);
				// if (checkedDetail == 1) {
				// 	var focusManager = new CKEDITOR.focusManager(editDetail);
				// 	var checkFocus = CKEDITOR.instances.editDetail.focusManager.hasFocus;
				// }
				// var checkFocusTitle = jQuery("#inputDescription").is(":focus");

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

			var GroupID = $('#inputGroupID :selected').val();
			if (GroupID > 0) {
				onChangeSelect('openSelectSub.php', '#subgroup');
			}
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
		<input name="inputGh2" type="hidden" id="inputGh2" value="<?php echo $valSid ?>" />
		<input name="valEditID" type="hidden" id="valEditID" value="<?php echo $_REQUEST['valEditID'] ?>" />
		<input name="valDelFile" type="hidden" id="valDelFile" value="" />
		<input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
		<input name="inputHtml" type="hidden" id="inputHtml" value="" />
		<input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?php echo $valhtmlname ?>" />
		<!-- <input name="inputHtml2" type="hidden" id="inputHtml2" value="" />
    <input name="inputHtmlDel2" type="hidden" id="inputHtmlDel2" value="<?php echo $valhtmlname2 ?>" /> -->
		<input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt'] ?>" />
		<div class="divRightNav">
			<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('index.php')" target="_self"><?php echo $langMod["meu:contant"] ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <?php echo $langMod["txt:titleedit"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"], $langTxt["lg:chi"]) ?>)<?php } ?></span></td>
					<td class="divRightNavTb" align="right">



					</td>
				</tr>
			</table>
		</div>
		<div class="divRightHead">
			<table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
				<tr>
					<td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titleedit"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"], $langTxt["lg:chi"]) ?>)<?php } ?></span></td>
					<td align="left">
						<table border="0" cellspacing="0" cellpadding="0" align="right">
							<tr>
								<td align="right">
									<?php if ($valPermission == "RW") { ?>
										<div class="btnSave" title="<?php echo $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
									<?php } ?>
									<div class="btnBack" title="<?php echo $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
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
					<td colspan="7" align="right" valign="top" height="15"></td>
				</tr>

				<tr>
					<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["set:lang:web"] ?><span class="fontContantAlert">*</span></td>
					<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
						<?php
						foreach ($modTxtSetLang as $key => $value) {
						?>
							<label>
								<div class="formDivRadioL"><input name="inputSetLang[<?php echo $key ?>]" id="inputSetLang-<?php echo $key ?>" value="1" type="checkbox" class="formRadioContantTb checkbokSetLang" <?php if ($valLang[$key] == 1) {
																																																						echo 'checked';
																																																					} ?> /></div>
								<div class="formDivRadioR"><?php echo $value ?></div>
							</label>
						<?php
						}
						?>
					</td>
				</tr>
				<tr>
					<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:selectgn"] ?><span class="fontContantAlert">*</span></td>
					<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
						<select name="inputGroupID" id="inputGroupID" class="formSelectContantTb" onchange="onChangeSelect('openSelectSub.php','#subgroup');">
							<option value="0"><?php echo $langMod["tit:selectg"] ?></option>
							
							
							
							<?php
							$sql_group = "SELECT ";
							if ($_REQUEST['inputLt'] == "Thai") {
								$sql_group .= "  " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subject";
							} else if ($_REQUEST['inputLt'] == "Eng") {
								$sql_group .= " " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subjecten ";
							} else {
								$sql_group .= " " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subjectcn ";
							}
						

							$sql_group .= "  FROM " . $mod_tb_root_group . " WHERE  " . $mod_tb_root_group . "_masterkey ='" . $_REQUEST['masterkey'] . "'   ORDER BY " . $mod_tb_root_group . "_order DESC ";
							
							// print_r($sql_group);die();
							
							
							$query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
							while ($row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group)) {
								$row_groupid = $row_group[0];
								$row_groupname = $row_group[1];
							?>
								<option value="<?php echo $row_groupid ?>" data-type="<?php echo $row_group[2] ?>" <?php if ($valGid == $row_groupid) { ?> selected="selected" <?php  } ?>><?php echo $row_groupname ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr id="subgroup">

				</tr>
				<tr>
					<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:subject"] ?><span class="fontContantAlert">*</span></td>
					<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?php echo $valSubject ?>" /></td>
				</tr>
				<tr>
					<td align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:title"] ?><span class="fontContantAlert"></span></td>
					<td colspan="6" align="left" valign="top" class="formRightContantTb">
						<textarea name="inputDescription" id="inputDescription" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valTitle ?></textarea>
					</td>
				</tr>

				<!-- <tr>
					<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo  $langMod["tit:typeshow"] ?></td>
					<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
						<label>
							<div class="formDivRadioL"><input name="inputTypeShow" id="inputTypeShow" value="1" type="radio" checked="checked" class="formRadioContantTb" onclick="jQuery('.boxDetail').show();" <?php if ($valTypeC == 1) {
																																																						echo 'checked="checked"';
																																																					} ?> /></div>
							<div class="formDivRadioR"><?php echo  $modType[1] ?></div>
						</label>

						<label>
							<div class="formDivRadioL"><input name="inputTypeShow" id="inputTypeShow" value="2" type="radio" class="formRadioContantTb" onclick="jQuery('.boxDetail').hide();" <?php if ($valTypeC != 1) {
																																																	echo 'checked="checked"';
																																																} ?> /></div>
							<div class="formDivRadioR"><?php echo  $modType[2] ?></div>
						</label>
					</td>
				</tr> -->

				<!-- <tr class="boxUrl" <?php if(!in_array($_REQUEST['masterkey'], $array_masterkey_fix_module)){ echo "style='display:none;'"; } ?>>
						<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:linkurl"] ?><span class="fontContantAlert"></span></td>
						<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><textarea name="inputurl2" id="inputurl2" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valUrl2; ?></textarea><br />
								<span class="formFontNoteTxt"><?php echo $langMod["edit:linknote"] ?></span>
						</td>
				</tr>

				<tr class="boxUrl" <?php if(!in_array($_REQUEST['masterkey'], $array_masterkey_fix_module)){ echo "style='display:none;'"; } ?>>
						<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:typetheme"] ?><span class="fontContantAlert"></span></td>
						<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
								<label>
								<div class="formDivRadioL"><input name="inputmenutarget2" id="inputmenutarget2" type="radio" class="formRadioContantTb" value="1" <?php if ($valTarget != 2) { ?> checked="checked" <?php } ?> /></div>
								<div class="formDivRadioR"><?php echo $modTxtTarget[1] ?></div>
								</label>

								<label>
								<div class="formDivRadioL"><input name="inputmenutarget2" id="inputmenutarget2" type="radio" class="formRadioContantTb" value="2" <?php if ($valTarget == 2) { ?> checked="checked" <?php } ?> /></div>
								<div class="formDivRadioR"><?php echo $modTxtTarget[2] ?></div>
								</label>
								</label>
						</td>
				</tr>

			</table> -->
			<br />
			<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
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
					<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:album"] ?></td>
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
			</table>





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
                                        if (is_file($valHtml)) {
                                            $fd = @fopen($valHtml, "r");
                                            $contents = @fread($fd, @filesize($valHtml));
                                            @fclose($fd);
                                            echo txtReplaceHTML($contents);
                                        }
                                        ?>
                                </textarea>
                        </div>
                    </td>
                </tr>
            </table>
            <br class="ckabout" />


			<!-- <br />
			<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
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
					<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["inp:album"] ?></td>
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
			
			<!-- <br />
			<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
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
					<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:sdate"] ?><span class="fontContantAlert"></span></td>
					<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="sdateInput" id="sdateInput" type="text" class="formInputContantTbShot" value="<?php echo $valSdate ?>" /></td>
				</tr>
				<tr>
					<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:edate"] ?><span class="fontContantAlert"></span></td>
					<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="edateInput" id="edateInput" type="text" class="formInputContantTbShot" value="<?php echo $valEdate ?>" /><br />
						<span class="formFontNoteTxt"><?php echo $langMod["inp:notedate"] ?></span>
					</td>
				</tr>




			</table> -->

			<br />
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
				url: 'loadUpdatePic.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
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
		jQuery(function() {
            onLoadFCK();

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