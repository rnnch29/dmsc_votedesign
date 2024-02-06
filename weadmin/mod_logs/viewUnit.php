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

		$valEditID=	loadMenuSiteUnit($_SESSION[$valSiteManage . 'core_session_id']);

			$sql = "SELECT   ";
			$sql .= "
			".$mod_tb_root."_id ,
			".$mod_tb_root."_urlminisite,
			".$mod_tb_root."_credate ,
			".$mod_tb_root."_crebyid,
			".$mod_tb_root."_status,
			".$mod_tb_root."_address ,
			".$mod_tb_root."_tel,
			".$mod_tb_root."_lastdate,
			".$mod_tb_root."_subject ,
			".$mod_tb_root."_lastbyid,
			".$mod_tb_root."_fax,
			".$mod_tb_root."_pic ,
			".$mod_tb_root."_picmap ,
			".$mod_tb_root."_latitude,
			".$mod_tb_root."_longitude,
			".$mod_tb_root."_metatitle ,
			".$mod_tb_root."_description,
			".$mod_tb_root."_keywords,
			".$mod_tb_root."_fb,
			".$mod_tb_root."_tw,
			".$mod_tb_root."_yt,
			".$mod_tb_root."_memid ,
			".$mod_tb_root."_style   ,
			".$mod_tb_root."_subjecten,
			".$mod_tb_root."_addressen,
			".$mod_tb_root."_email ,
			".$mod_tb_root."_qr ,
			".$mod_tb_root."_color ,
			".$mod_tb_root."_old ,
			".$mod_tb_root."_oldurl ";

			$sql .= " FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_masterkey='".$_REQUEST["masterkey"]."'  AND  ".$mod_tb_root."_id='".$valEditID."' ";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$valID=$Row[0];
			$valUrlminisite=loadGetURLMinisiteByType($coreTypeUrlMini,$Row[1],$core_full_path);
			$valCredate=DateFormat($Row[2]);
			$valCreby=$Row[3];
			$valStatus=$Row[4];
			if($valStatus=="Enable"){
				$valStatusClass=	"fontContantTbEnable";
			}else{
				$valStatusClass=	"fontContantTbDisable";
			}

			$valAddress=rechangeQuot($Row[5]);
			$valTel=rechangeQuot($Row[6]);

			$valLastdate=DateFormat($Row[7]);
			$valSubject=rechangeQuot($Row[8]);
			$valLastby=$Row[9];

			$valFax=rechangeQuot($Row[10]);
			$valPicName=$Row[11];
			$valPic=$mod_path_pictures."/".$Row[11];
			$valPicNameMap=$Row[12];
			$valPicMap=$mod_path_pictures."/".$Row[12];

			$valLatitude=rechangeQuot($Row[13]);
			$valLongitude=rechangeQuot($Row[14]);

			$valMetatitle=rechangeQuot($Row[15]);
			$valDescription=rechangeQuot($Row[16]);
			$valKeywords=rechangeQuot($Row[17]);

			$valFb=rechangeQuot($Row[18]);
			$valTw=rechangeQuot($Row[19]);
			$valYt=rechangeQuot($Row[20]);
			$valMemberId=$Row[21];
			$valinTheme=$Row[22];
			$valSubjectEn=rechangeQuot($Row[23]);
			$valAddressEn=rechangeQuot($Row[24]);
			$valEmail=rechangeQuot($Row[25]);
			$valPicNameQrcode=$Row[26];
			$valPicQrcode=$mod_path_pictures."/".$Row[26];
			$valColor=$Row[27];
			
			$valOldWebsite=$Row[28];
			$valOldWebsiteUrl=rechangeQuot($Row[29]);
			if($valOldWebsite<=0){
				$valOldWebsite=1;
			}


		$sqlUser = "SELECT ".$core_tb_staff."_username ,".$core_tb_staff."_password   FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_id='".$valMemberId."'  ";
		$QueryUser=wewebQueryDB($coreLanguageSQL,$sqlUser);
		$RowUser=wewebFetchArrayDB($coreLanguageSQL,$QueryUser);
		$valUsername=$RowUser[0];
		$valPassword=decodeStr($RowUser[1]);


		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);

			logs_access('3','View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link href="../css/theme.css" rel="stylesheet"/>

<title><?=$core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?=$valEditID?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?=$_REQUEST['inputLt']?>" />
    <? if($_REQUEST['viewID']<=0){?>
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('unti.php')" target="_self"><?=$langMod["tit:inpName"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleview"]?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                    <? }?>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleview"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
													<? if($_REQUEST['viewID']<=0){?>
                                                    <? if($valPermission=="RW"){?>
                                                        <div  class="btnEditView" title="<?=$langTxt["btn:edit"]?>" onclick="
                                                        document.myFormHome.valEditID.value=<?=$valID?>;
                                                        editContactNew('../<?=$mod_fd_root?>/editUnit.php')"></div>
                                                     <? }?>

                                                        <? }?>
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
   <span class="formFontSubjectTxt"><?=$langMod["mit:minisite"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["mit:minisiteDe"]?></span>        </td>
    </tr>

      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:urlminisite"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><a  href="<?=$valUrlminisite?>" target="_blank"><div class="formDivView"><?=$valUrlminisite?></div></a></td>
  </tr>
     <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:username"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valUsername?></div></td>
  </tr>
     <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:pass"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valPassword?></div></td>
  </tr>
  </table>


     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:subject"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:subjectDe"]?></span>    </td>
    </tr>

      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:subject"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valSubject?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:subjectEn"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valSubjectEn?></div></td>
  </tr>
     <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:address"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valAddress?></div></td>
  </tr>
     <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:addressEn"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valAddressEn?></div></td>
  </tr>

      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:tel"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valTel?></div></td>
  </tr>

      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:fax"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valFax?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:email"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valEmail?></div></td>
  </tr>
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >Facebook : <span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valFb?></div></td>
  </tr>

      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >Twitter : <span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valTw?></div></td>
  </tr>

      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >Youtube : <span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valYt?></div></td>
  </tr>
        <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:old"]?> : <span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$modTxtOldWebsite[$valOldWebsite]?></div></td>
  </tr>

      <tr <? if($valOldWebsite<2){?> style="display:none;" <? }?>>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:oldUrl"]?> : <span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valOldWebsiteUrl?></div></td>
  </tr>

  </table>


     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:pic"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:picDe"]?></span>    </td>
    </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
    <img src="<?=$valPic?>"  style="float:left;border:#c8c7cc solid 1px; max-width:600px;"  onerror="this.src='<?="../img/btn/nopic.jpg"?>'"  />
    </div></td>
  </tr>
  </table>


     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
     <span class="formFontSubjectTxt"><?=$langMod["mit:map"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["mit:mapDe"]?></span>     </td>
    </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
    <img src="<?=$valPicMap?>"  style="float:left;border:#c8c7cc solid 1px; max-width:600px;"  onerror="this.src='<?="../img/btn/nopic.jpg"?>'"  />
    </div></td>
  </tr>
  </table>
<br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
     <span class="formFontSubjectTxt"><?=$langMod["mit:qrcode"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["mit:qrcodeDe"]?></span>     </td>
    </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
    <img src="<?=$valPicQrcode?>"  style="float:left;border:#c8c7cc solid 1px; max-width:600px;"  onerror="this.src='<?="../img/btn/nopic.jpg"?>'"  />
    </div></td>
  </tr>
  </table>

     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["mit:mapgoogle"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["mit:mapgoogleDe"]?></span>     </td>
    </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:Latitude"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valLatitude?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["mit:Longitude"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valLongitude?></div></td>
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
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["txt:color"]?>: <span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$modTxtColor[$valColor]?></div>
  </td>
      </tr>
    </table>
     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?= $langMod["txt:titleTheme"] ?><? if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?= $langTxt["lg:thai"] ?>)<? } ?></span><br/>
                            <span class="formFontTileTxt"><?= $langMod["txt:titleDeTheme"] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb " ><?= $langMod["txt:theme"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView">
                                <ul class="selectTheme">
                                    <li class="parentTheme" style="background:url(<?= $core_main_theme[$valinTheme]["color"] ?>) no-repeat top; background-size:cover; "></li>
                                </ul>
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
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seotitle"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valMetatitle?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seodes"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valDescription?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seokey"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valKeywords?></div></td>
  </tr>

  </table>


     <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langTxt["us:titleinfo"]?></span><br/>
    <span class="formFontTileTxt"><?=$langTxt["us:titleinfoDe"]?></span>     </td>
    </tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:credate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valCredate?></div>         </td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valCreby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valCreby);
		}


	?>
	 </div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:lastdate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valLastdate?></div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valLastby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valLastby);
		}


	?>
	 </div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["mg:status"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">

               <? if($valStatus=="Enable"){?>
                   <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }else{?>
                    <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }?>
     </div>         </td>
  </tr>
    </table>

      <? if($_REQUEST['viewID']<=0){?>

    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >
   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?=$langTxt["btn:gototop"]?>"><?=$langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
    <? }?>
  </table>
  </div>
</form>
<? include("../lib/disconnect.php");?>

</body>
</html>
