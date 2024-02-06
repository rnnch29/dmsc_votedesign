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
$sql .= "   " . $mod_tb_setting . "_id , " . $mod_tb_setting . "_credate , " . $mod_tb_setting . "_crebyid, " . $mod_tb_setting . "_status,    " . $mod_tb_setting . "_sdate  	 	 ,    " . $mod_tb_setting . "_edate  ,    " . $mod_tb_setting . "_pic , " . $mod_tb_setting . "_type , " . $mod_tb_setting . "_filevdo , " . $mod_tb_setting . "_url  ,  " . $mod_tb_setting . "_gid    ";

if ($_REQUEST['inputLt'] == "Thai") {
	$sql .= " , " . $mod_tb_setting . "_subject  ,    " . $mod_tb_setting . "_title , " . $mod_tb_setting . "_htmlfilename   ,    " . $mod_tb_setting . "_metatitle  	 	 ,    " . $mod_tb_setting . "_description  	 	 ,    " . $mod_tb_setting . "_keywords    ";
} elseif ($_REQUEST['inputLt'] == "Eng") {
	$sql .= " , " . $mod_tb_setting . "_subjecten  ,    " . $mod_tb_setting . "_titleen , " . $mod_tb_setting . "_htmlfilenameen   ,    " . $mod_tb_setting . "_metatitleen  	 	 ,    " . $mod_tb_setting . "_descriptionen  	 	 ,    " . $mod_tb_setting . "_keywordsen    ";
} else {
	$sql .= " , " . $mod_tb_setting . "_subjectcn  ,    " . $mod_tb_setting . "_titlecn, " . $mod_tb_setting . "_htmlfilenamecn   ,    " . $mod_tb_setting . "_metatitlecn  	 	 ,    " . $mod_tb_setting . "_descriptioncn  	 	 ,    " . $mod_tb_setting . "_keywordscn    ";
}

// $sql .= " , ".$mod_tb_setting."_picshow, ".$mod_tb_setting."_typec , ".$mod_tb_setting."_urlc, ".$mod_tb_setting."_target, ".$mod_tb_setting."_pic2, ".$mod_tb_setting."_title2, ".$mod_tb_setting."_urlfriendly  ";
// $sql .= " , ".$mod_tb_setting."_file as file , ".$mod_tb_setting."_filename as filename  ";
// $sql .= " , ".$mod_tb_setting."_typefile as typefile , ".$mod_tb_setting."_typefileen as typefileen , ".$mod_tb_setting."_typefilecn as typefilecn  ";
// $sql .= " , ".$mod_tb_setting."_urlfile as urlfile , ".$mod_tb_setting."_urlfileen as urlfileen , ".$mod_tb_setting."_urlfilecn as urlfilecn  ";
// $sql .= " , ".$mod_tb_setting."_fileen as fileen , ".$mod_tb_setting."_filenameen as filenameen  ";
// $sql .= " , ".$mod_tb_setting."_filecn as filecn , ".$mod_tb_setting."_filenamecn as filenamecn  ";
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
$valPicName = $Row[6];
$valPic = $mod_path_pictures . "/" . $Row[6];
$valType = $Row[7];
$valFilevdo = $Row[8];
$valPathvdo = $mod_path_vdo . "/" . $Row[8];
$valUrl = $Row[9];
$valGid = $Row[10];

$valSubject = rechangeQuot($Row[11]);
$valTitle = $Row[12];
$valhtml = $mod_path_html . "/" . $Row[13];
$valhtmlname = $Row[13];
$valMetatitle = rechangeQuot($Row[14]);
$valDescription = rechangeQuot($Row[15]);
$valKeywords = rechangeQuot($Row[16]);
$valPicShow = $Row[17];
$valTypeC = $Row[18];
$valUrlC = $Row[19];
$valTarget = $Row[20];
$valPicName2 = $Row[21];
$valPic2 = $mod_path_pictures . "/" . $Row[21];
$valTitle2 = $Row[22];

$valTypeFile = $Row['typefile'];
$valTypeFileEn = $Row['typefileen'];
$valTypeFileCn = $Row['typefilecn'];

$valUrlFile = $Row['urlfile'];
$valUrlFileEn = $Row['urlfileen'];
$valUrlFileCn = $Row['urlfilecn'];


$valUrlfriendly = rechangeQuot($Row[23]);
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


				// if(isBlank(inputSubject)) {
				// 	inputSubject.focus();
				// 	jQuery("#inputSubject").addClass("formInputContantTbAlertY");
				// 	return false;
				// }else{
				// 	jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
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

				// if(isBlank(inputDescription)) {
				// 	inputDescription.focus();
				// 	jQuery("#inputDescription").addClass("formInputContantTbAlertY");
				// 	return false;
				// }else{
				// 	jQuery("#inputDescription").removeClass("formInputContantTbAlertY");
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

			}

			updateContactNew('updateSetting2.php');

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
					<td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a href="<?php echo $valLinkNav1 ?>" target="_self"><?php echo $valNav1 ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)" onclick="btnBackPage('setting.php')" target="_self"><?php echo $langMod["meu:setPermis"] ?></a> <img src="../img/btn/navblack.png" align="absmiddle" vspace="5" /> <?php echo $langMod["txt:titleedits"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"], $langTxt["lg:chi"]) ?>)<?php } ?></span></td>
					<td class="divRightNavTb" align="right">



					</td>
				</tr>
			</table>
		</div>
		<div class="divRightHead">
			<table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
				<tr>
					<td height="77" align="left"><span class="fontHeadRight"><?php echo $langMod["txt:titles"] ?><?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?php echo getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"], $langTxt["lg:chi"]) ?>)<?php } ?></span></td>
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
					<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:subject:setting"] ?><span class="fontContantAlert"></span></td>
					<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb"><input name="inputSubject" id="inputSubject" type="text" class="formInputContantTb" value="<?php echo $valSubject ?>" /></td>
				</tr>
				<tr>
					<td align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:title:setting"] ?><span class="fontContantAlert"></span></td>
					<td colspan="6" align="left" valign="top" class="formRightContantTb">
						<textarea name="inputDescription" id="inputDescription" cols="45" rows="5" class="formTextareaContantTb"><?php echo $valTitle ?></textarea>
					</td>
				</tr>

			</table>
			<br />

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
				url: 'loadUpdateFile.php?myID=<?php echo $_POST["valEditID"] ?>&masterkey=<?php echo $_REQUEST['masterkey'] ?>&langt=<?php echo $_REQUEST['inputLt'] ?>&nametodoc=' + valuefilename + '&menuid=<?php echo $_REQUEST['menukeyid'] ?>',
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