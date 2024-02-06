<?
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


			$sql = "SELECT  ";

			$sql .= "
			".$mod_tb_root."_id ,
			".$mod_tb_root."_urlminisite,
			".$mod_tb_root."_credate,
			".$mod_tb_root."_creby,
			".$mod_tb_root."_status ,
			".$mod_tb_root."_subject,
			".$mod_tb_root."_address,
			".$mod_tb_root."_tel,
			".$mod_tb_root."_fax,
			".$mod_tb_root."_pic ,
			".$mod_tb_root."_picmap ,
			".$mod_tb_root."_latitude ,
			".$mod_tb_root."_longitude,
			".$mod_tb_root."_metatitle ,
			".$mod_tb_root."_description,
			".$mod_tb_root."_keywords,
			".$mod_tb_root."_fb,
			".$mod_tb_root."_tw,
			".$mod_tb_root."_yt,
			".$mod_tb_root."_memid,
			".$mod_tb_root."_style  ,
			".$mod_tb_root."_subjecten,
			".$mod_tb_root."_addressen,
			".$mod_tb_root."_email ,
			".$mod_tb_root."_qr ,
			".$mod_tb_root."_color ,
			".$mod_tb_root."_old ,
			".$mod_tb_root."_oldurl ";

			$sql .= " 	FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_masterkey='".$_POST["masterkey"]."' AND  ".$mod_tb_root."_id 	='".$_POST["valEditID"]."'";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$valid=$Row[0];
			$valUrlminisite=$Row[1];
			$valcredate=DateFormatInsertRe($Row[2]);
			$valcreby=$Row[3];
			$valstatus=$Row[4];
			$valSubject=rechangeQuot($Row[5]);
			$valAddress=rechangeQuot($Row[6]);
			$valTel=rechangeQuot($Row[7]);
			$valFax=rechangeQuot($Row[8]);
			$valPicName=$Row[9];
			$valPic=$mod_path_pictures."/".$Row[9];

			$valPicNameMap=$Row[10];
			$valPicMap=$mod_path_pictures."/".$Row[10];

			$valLatitude=rechangeQuot($Row[11]);
			$valLongitude=rechangeQuot($Row[12]);
			$valMetatitle=rechangeQuot($Row[13]);
			$valDescription=rechangeQuot($Row[14]);
			$valKeywords=rechangeQuot($Row[15]);

			$valFb=rechangeQuot($Row[16]);
			$valTw=rechangeQuot($Row[17]);
			$valYt=rechangeQuot($Row[18]);

			$valMemberId=rechangeQuot($Row[19]);
			$valinTheme = rechangeQuot($Row[20]);
			$valSubjectEn=rechangeQuot($Row[21]);
			$valAddressEn=rechangeQuot($Row[22]);
			$valEmail=rechangeQuot($Row[23]);

			$valPicNameQrcode=$Row[24];
			$valPicQrcode=$mod_path_pictures."/".$Row[24];
			$valColor=$Row[25];

			if($valinTheme==""){
				$valinTheme = '1';
			}
			
			$valOldWebsite=$Row[26];
			$valOldWebsiteUrl=rechangeQuot($Row[27]);
		$sqlUser = "SELECT ".$core_tb_staff."_username ,".$core_tb_staff."_password   FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_id='".$valMemberId."'  ";
		$QueryUser=wewebQueryDB($coreLanguageSQL,$sqlUser);
		$RowUser=wewebFetchArrayDB($coreLanguageSQL,$QueryUser);
		$valUsername=$RowUser[0];
		$valPassword=decodeStr($RowUser[1]);

		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_POST["menukeyid"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link href="../css/theme.css" rel="stylesheet"/>
<link href="js/uploadfile.css" rel="stylesheet"/>

<title><?=$core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script language="JavaScript" type="text/javascript">
function executeSubmit() {
	with(document.myForm) {


		if(isBlank(inputSubject)) {
			inputSubject.focus();
			jQuery("#inputSubject").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
		}

		if(isBlank(inputSubjectEn)) {
			inputSubjectEn.focus();
			jQuery("#inputSubjectEn").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputSubjectEn").removeClass("formInputContantTbAlertY");
		}

		if(isBlank(inputAddress)) {
			inputAddress.focus();
			jQuery("#inputAddress").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputAddress").removeClass("formInputContantTbAlertY");
		}

		if(isBlank(inputAddressEn)) {
			inputAddressEn.focus();
			jQuery("#inputAddressEn").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputAddressEn").removeClass("formInputContantTbAlertY");
		}



		var valScoreOld =jQuery( "input:radio[name=inputOld]:checked" ).val();
		if(valScoreOld==2){
			if(isBlank(inputOldWebsite)) {
				inputOldWebsite.focus();
				jQuery("#inputOldWebsite").addClass("formInputContantTbAlertY");
				return false;
			}else{
				jQuery("#inputOldWebsite").removeClass("formInputContantTbAlertY");
			}

		}


		/*if(isBlank(inputLatitude)) {
			inputLatitude.focus();
			jQuery("#inputLatitude").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputLatitude").removeClass("formInputContantTbAlertY");
		}


		if(isBlank(inputLongitude)) {
			inputLongitude.focus();
			jQuery("#inputLongitude").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputLongitude").removeClass("formInputContantTbAlertY");
		}*/


	}

	updateContactNew('updateUnit.php');

}



jQuery(document).ready(function(){

  jQuery('#myForm').keypress(function(e) {
    /* Start  Enter Check CKeditor */
	var checkFocusTitle =jQuery("#inputAddress").is(":focus");
	var checkFocusTitleEn =jQuery("#inputAddressEn").is(":focus");

    if (e.which == 13) {
		//e.preventDefault();
			if(!checkFocusTitle){
				if(!checkFocusTitleEn){
					executeSubmit();
					return false;
			}
		}
    }
 	/* End  Enter Check CKeditor */
  });
});



function loadCheckUser() {
	with(document.myForm) {
		var inputValuename =document.myForm.inputUsername.value;
		}
		if( inputValuename!=''){
			checkUsermemberMiniEdit('<?=$valMemberId?>',inputValuename);
		}
}

function loadCheckUrl() {
	with(document.myForm) {
		var inputValuename =document.myForm.inputUrlMinisite.value;
		}
		if( inputValuename!=''){
			checkUrlMiniEdit('<?=$valid?>',inputValuename);
		}
}




function executePass() {
   var valPass =randomString();
   jQuery('#inputPassword').val(valPass);

}



            /*###################### Select theme ######################*/
            function chooseTheme(ID) {

                var themeID;
                if (ID != '') {
                    themeID = ID;
                } else {
                    themeID = "blue";
                }

                $("#inputTheme").val(themeID);
                $(".themeActive").hide();
                $("#" + themeID).show();

            }

            jQuery(document).ready(function () {
                chooseTheme('<?= $valinTheme ?>');
                jQuery('#myForm').keypress(function (e) {
                    if (e.which == 13) {
                        //e.preventDefault();
                        executeSubmit();
                        return false;
                    }
                });
            });



</script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm"  enctype="multipart/form-data">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?=$_REQUEST['valEditID']?>" />
    <input name="valDelFile" type="hidden" id="valDelFile" value="" />
    <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
    <input name="inputHtml" type="hidden" id="inputHtml" value="" />
    <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?=$valhtmlname?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?=$_REQUEST['inputLt']?>" />
    <input name="inputMemberId" type="hidden" id="inputMemberId" value="<?=$valMemberId?>" />
    <input name="inputUrlMiniO" type="hidden" id="inputUrlMiniO" value="<?=$valUrlminisite?>" />
    <input type="hidden" value="<?= $valid ?>" name="inputInfoid" id="inputInfoid"/>
   <input type="hidden" name="inputTheme" id="inputTheme" value="<?=$valinTheme?>"/>
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('unti.php')" target="_self"><?=$langMod["tit:inpName"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleedit"]?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleedit"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                     <? if($valPermission=="RW" ){?>
                                                        <div  class="btnSave" title="<?=$langTxt["btn:save"]?>" onclick="executeSubmit();"></div>
                                                      <? }?>
                                                        <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="btnBackPage('unti.php')"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain" >
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:subject"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:subjectDe"]?></span>    </td>
    </tr>
      <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:subject"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb"  value="<?=$valSubject?>"/></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:subjectEn"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubjectEn" id="inputSubjectEn" type="text"  class="formInputContantTb"  value="<?=$valSubjectEn?>"/></td>
  </tr>
   <tr >
    <td align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:address"]?><span class="fontContantAlert">*</span></td>
    <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
      <textarea name="inputAddress" id="inputAddress" cols="45" rows="5" class="formTextareaContantTb"><?=$valAddress?></textarea>     </td>
  </tr>
   <tr >
    <td align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:addressEn"]?><span class="fontContantAlert">*</span></td>
    <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
      <textarea name="inputAddressEn" id="inputAddressEn" cols="45" rows="5" class="formTextareaContantTb"><?=$valAddressEn?></textarea>     </td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:tel"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTel" id="inputTel" type="text"  class="formInputContantTbShot" value="<?=$valTel?>"/></td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:fax"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputFax" id="inputFax" type="text"  class="formInputContantTbShot" value="<?=$valFax?>"/></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:email"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputEmail" id="inputEmail" type="text"  class="formInputContantTbShot" value="<?=$valEmail?>"/></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >Facebook<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputFacebook" id="inputFacebook" type="text"  class="formInputContantTb"  value="<?=$valFb?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["mit:noteurl"]?></span></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >Twitter<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTwitter" id="inputTwitter" type="text"  class="formInputContantTb"  value="<?=$valTw?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["mit:noteurl"]?></span></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >Youtube<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputYoutube" id="inputYoutube" type="text"  class="formInputContantTb" value="<?=$valYt?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["mit:noteurl"]?></span></td>
  </tr>
  
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:old"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputOld" id="inputOld" type="radio"  class="formRadioContantTb"  value="1" <? if($valOldWebsite<=1){?> checked="checked" <? }?> onclick="$('#rowOldUrlWebsite').hide();" /></div>
    <div class="formDivRadioR"><?=$modTxtOldWebsite[1]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputOld" id="inputOld"  type="radio"  class="formRadioContantTb"   value="2"  <? if($valOldWebsite==2){?> checked="checked" <? }?> onclick="$('#rowOldUrlWebsite').show();"  /></div>
    <div class="formDivRadioR"><?=$modTxtOldWebsite[2]?></div>
    </label>
</td>
  </tr>
  <tr id="rowOldUrlWebsite" <? if($valOldWebsite<2){?> style="display:none;" <? }?> >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:oldUrl"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputOldWebsite" id="inputOldWebsite" type="text"  class="formInputContantTb" value="<?=$valOldWebsiteUrl?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["mit:noteurl"]?></span></td>
  </tr>
  </table>


     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:pic"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:picDe"]?></span>    </td>
    </tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:album"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?=$langTxt["us:inputpicselect"]?></button>
  <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
</div>

<span class="formFontNoteTxt"><?=$langMod["inp:notepic"]?></span>
<div class="clearAll"></div>
<div id="boxPicNew" class="formFontTileTxt">
<? if(is_file($valPic)){?>
		<img src="<?=$valPic?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
		<div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
  <input type="hidden" name="picname" id="picname" value="<?=$valPicName?>" />
  <? }?>
</div>
</td>
  </tr>
  </table>


     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["mit:map"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["mit:mapDe"]?></span>    </td>
    </tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:album"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?=$langTxt["us:inputpicselect"]?></button>
  <input type="file" name="fileToUploadMap" id="fileToUploadMap" onchange="ajaxFileUploadMap();" />
</div>

<span class="formFontNoteTxt"><?=$langMod["mit:notemap"]?></span>
<div class="clearAll"></div>
<div id="boxPicNewMap" class="formFontTileTxt">
<? if(is_file($valPicMap)){?>
		<img src="<?=$valPicMap?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
		<div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadMap('deletePicMap.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
  <input type="hidden" name="picnameMap" id="picnameMap" value="<?=$valPicNameMap?>" />
  <? }?>
</div>

</td>
  </tr>
  </table>

   <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["mit:qrcode"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["mit:qrcodeDe"]?></span>    </td>
    </tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:album"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?=$langTxt["us:inputpicselect"]?></button>
  <input type="file" name="fileToUploadQrcode" id="fileToUploadQrcode" onchange="ajaxFileUploadQrcode();" />
</div>

<span class="formFontNoteTxt"><?=$langMod["mit:noteQrcode"]?></span>
<div class="clearAll"></div>
<div id="boxPicNewQrcode" class="formFontTileTxt">
<? if(is_file($valPicQrcode)){?>
		<img src="<?=$valPicQrcode?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
		<div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadQrcode('deletePicQrcode.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
  <input type="hidden" name="picnameQrcode" id="picnameQrcode" value="<?=$valPicNameQrcode?>" />
  <? }?>
</div>

</td>
  </tr>
  </table>


     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["mit:mapgoogle"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["mit:mapgoogleDe"]?></span>    </td>
    </tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
<tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:Latitude"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputLatitude" id="inputLatitude" type="text"  class="formInputContantTbShot" value="<?=$valLatitude?>"/></td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:Longitude"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputLongitude" id="inputLongitude" type="text"  class="formInputContantTbShot" value="<?=$valLongitude?>"/></td>
  </tr>
  </table>

     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:titleColor"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:titleDeColor"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["txt:color"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputColor" id="inputColor" type="radio"  class="formRadioContantTb"  value="1" <? if($valColor<=1){?> checked="checked" <? }?> /></div>
    <div class="formDivRadioR"><?=$modTxtColor[1]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputColor" id="inputColor"  type="radio"  class="formRadioContantTb"   value="2"  <? if($valColor==2){?> checked="checked" <? }?>  /></div>
    <div class="formDivRadioR"><?=$modTxtColor[2]?></div>
    </label>
    </label>    </td>
      </tr>
    </table>
     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?= $langMod["txt:titleTheme"] ?></span><br/>
                            <span class="formFontTileTxt"><?= $langMod["txt:titleDeTheme"] ?></span>
                        </td>
                    </tr>
                    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb borderBottom" ><?= $langMod["txt:theme"] ?><span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb borderBottom" >
                            <ul class="selectTheme">
                                <?
                                foreach ($core_main_theme AS $keyTheme => $valueTheme) {
                                    ?>
                                    <li class="parentTheme" style="background:url(<?= $valueTheme["color"] ?>) no-repeat top; background-size:cover;cursor: pointer;" onclick="chooseTheme('<?= $keyTheme ?>')">
                                        <div class="themeActive" id="<?= $keyTheme ?>" style="display: none; text-align:center;"><div style="padding-top:50px; color:#ff0000;">แบบที่ <?=$keyTheme?></div></div>

                                    </li>
                                <? } ?>
                            </ul>

                            <div>

                            </div>
                        </td>
                    </tr>
  </table>


     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:seo"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:seoDe"]?></span>    </td>
    </tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seotitle"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitle" id="inputTagTitle" type="text"  class="formInputContantTb" value="<?=$valMetatitle?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["inp:seotitlenote"]?></span></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seodes"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescription" id="inputTagDescription"  type="text"  class="formInputContantTb" value="<?=$valDescription?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["inp:seodesnote"]?></span></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seokey"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywords" id="inputTagKeywords"  type="text"  class="formInputContantTb" value="<?=$valKeywords?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["inp:seokeynote"]?></span></td>
  </tr>
  </table>


     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:datec"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:datecDe"]?></span>    </td>
    </tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:credate"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="cdateInput" id="cdateInput" type="text"  class="formInputContantTbShot" value="<?=$valcredate?>"/></td>
  </tr>




  </table>


    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?=$langTxt["btn:gototop"]?>"><?=$langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
  </table>
  </div>
</form>
<script type="text/javascript" src="../js/ajaxfileupload.js"></script>
<script type="text/javascript" language="javascript">
	/*################################# Upload Pic #######################*/
	function ajaxFileUpload(){
		var valuepicname = jQuery("input#picname").val();

		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdatePic.php?myID=<?=$_POST["valEditID"]?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&delpicname='+valuepicname+'&menuid=<?=$_REQUEST['menukeyid']?>',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined')
					{

						if(data.error != '')
						{
							alert(data.error);

						}else
						{
							jQuery("#boxPicNew").show();
							jQuery("#boxPicNew").html(data.msg);
							setTimeout(jQuery.unblockUI, 200);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		return false;

	}


	/*################################# Upload Pic Map #######################*/
	function ajaxFileUploadMap(){
		var valuepicname = jQuery("input#picnameMap").val();

		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdatePicMap.php?myID=<?=$_POST["valEditID"]?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&delpicname='+valuepicname+'&menuid=<?=$_REQUEST['menukeyid']?>',
				secureuri:false,
				fileElementId:'fileToUploadMap',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined')
					{

						if(data.error != '')
						{
							alert(data.error);

						}else
						{
							jQuery("#boxPicNewMap").show();
							jQuery("#boxPicNewMap").html(data.msg);
							setTimeout(jQuery.unblockUI, 200);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		return false;

	}


	/*################################# Upload Pic Qrcode #######################*/
	function ajaxFileUploadQrcode(){
		var valuepicname = jQuery("input#picnameQrcode").val();

		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdatePicQrcode.php?myID=<?=$_POST["valEditID"]?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&delpicname='+valuepicname+'&menuid=<?=$_REQUEST['menukeyid']?>',
				secureuri:false,
				fileElementId:'fileToUploadQrcode',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined')
					{

						if(data.error != '')
						{
							alert(data.error);

						}else
						{
							jQuery("#boxPicNewQrcode").show();
							jQuery("#boxPicNewQrcode").html(data.msg);
							setTimeout(jQuery.unblockUI, 200);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		return false;

	}

 </script>


 <? if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){?>
 <script language="JavaScript"  type="text/javascript" src="../js/datepickerThai.js"></script>
 <? }else{?>
 <script language="JavaScript"  type="text/javascript" src="../js/datepickerEng.js"></script>
 <? }?>
 <? include("../lib/disconnect.php");?>

</body>
</html>
