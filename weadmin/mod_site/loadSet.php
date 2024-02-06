<?php

include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");
$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$sqlCheck = "SELECT " . $mod_tb_set . "_id   FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  ";
$queryCheck = wewebQueryDB($coreLanguageSQL, $sqlCheck);
$countNumCheck = wewebNumRowsDB($coreLanguageSQL, $queryCheck);

 //$queryCheck = $dbConnect->execute($sqlCheck);
 //print_pre($queryCheck);
 //$countNumCheck = $queryCheck->nu

if ($countNumCheck <= 0) {
    $insert = array();
    $insert[$mod_tb_set . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_set . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
    $insert[$mod_tb_set . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_set . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_set . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_set . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_set . "_lastdate"] = "NOW()";
    $insert[$mod_tb_set . "_credate"] = "NOW()";
    $sqlInsert = "INSERT INTO " . $mod_tb_set . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $queryInsert = wewebQueryDB($coreLanguageSQL, $sqlInsert);
   //$queryInsert = $dbConnect->execute($queryInsert);
}

	$slect_data = array();
	$slect_data[$mod_tb_set . "_id as ".substr("_id",1)] = "";
	$slect_data[$mod_tb_set  . "_credate as ".substr("_credate",1)] = "";
	$slect_data[$mod_tb_set  . "_crebyid as ".substr("_crebyid",1)] = "";
	$slect_data[$mod_tb_set  . "_lastdate as ".substr("_lastdate",1)] = "";
	$slect_data[$mod_tb_set  . "_lastbyid as ".substr("_lastbyid",1)] = "";
	$slect_data[$mod_tb_set  . "_description as ".substr("_description",1)] = "";
	$slect_data[$mod_tb_set  . "_keywords as ".substr("_keywords",1)] = "";
	$slect_data[$mod_tb_set  . "_metatitle as ".substr("_metatitle",1)] = "";
	$slect_data[$mod_tb_set  . "_subject as ".substr("_subject",1)] = "";
	$slect_data[$mod_tb_set  . "_subjecten as ".substr("_subjecten",1)] = "";
	$slect_data[$mod_tb_set  . "_social as ".substr("_social",1)] = "";
	$slect_data[$mod_tb_set  . "_config as ".substr("_config",1)] = "";
	$slect_data[$mod_tb_set  . "_addresspic as ".substr("_addresspic",1)] = "";
	$slect_data[$mod_tb_set  . "_subjectoffice as ".substr("_subjectoffice",1)] = "";
	$slect_data[$mod_tb_set  . "_subjectofficeen as ".substr("_subjectofficeen",1)] = "";

	$sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . "
	 FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  ";
	$Query = wewebQueryDB($coreLanguageSQL, $sql);
	$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
	//print_pre($sql );
	$valID = $Row['id'];
	$valCredate = DateFormat($Row['credate']);
	$valCreby = $Row['crebyid'];
	$valLastdate = DateFormat($Row['lastdate']);
	$valLastby = $Row['lastbyid'];
	
	$valSubject = $Row['subject'];
	$valSubjecten = $Row['subjecten'];
	$valSubjectOffice = rechangeQuot($Row['subjectoffice']);
	$valSubjectOfficeen = rechangeQuot($Row['subjectofficeen']);
	
	
	$valMetatitle = rechangeQuot($Row['metatitle']);
	$valDescription = rechangeQuot($Row['description']);
	$valKeywords = rechangeQuot($Row['keywords']);
	
	$valPicName = $Row['addresspic'];
	$valPic = $mod_path_pictures . "/" . $Row['addresspic'];
	
	$ValSocial = unserialize($Row['social']);
	$ValConfig = unserialize($Row['config']);

	$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);
	logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow"/>
        <meta name="googlebot" content="noindex, nofollow"/>
        <link href="../css/theme.css" rel="stylesheet"/>

        <title><?php echo  $core_name_title ?></title>
        <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
    </head>

    <body>
        <form action="?" method="get" name="myForm" id="myForm">
            <input name="execute" type="hidden" id="execute" value="update" />
            <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
            <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
            <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo  $_REQUEST['inputSearch'] ?>" />
            <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $_REQUEST['module_pageshow'] ?>" />
            <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $_REQUEST['module_pagesize'] ?>" />
            <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo  $_REQUEST['module_orderby'] ?>" />
            <input name="inputGh" type="hidden" id="inputGh" value="<?php echo  $_REQUEST['inputGh'] ?>" />
            <input name="valEditID" type="hidden" id="valEditID" value="<?php echo  $_REQUEST['valEditID'] ?>" />
            <?php if ($_REQUEST['viewID'] <= 0) { ?>
                <div class="divRightNav">
                    <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                            <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?php echo  $valLinkNav1 ?>" target="_self"><?php echo  $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo  getNameMenu($_REQUEST["menukeyid"]) ?></span></td>
                            <td  class="divRightNavTb" align="right">

                            </td>
                        </tr>
                    </table>
                </div>
            <?php } ?>

            <!-- Btn Edit  -->
            <div class="divRightHead">
                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                    <tr>
                        <td height="77" align="left"><span class="fontHeadRight"><?php echo  getNameMenu($_REQUEST["menukeyid"]) ?></span></td>
                        <td align="left">
                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                <tr>
                                    <td align="right">
                                        <?php if ($valPermission == "RW" && $_REQUEST['viewID'] <= 0) { ?>

                                            <table  border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td align="center">
                                                        <table  align="center" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td align="center">
                                                                    <div  class="btnEditView" title="<?php echo  $langTxt["btn:edit"] ?>" onclick="
                                                                                document.myFormHome.valEditID.value =<?php echo  $valID ?>;
                                                                                editContactNew('../<?php echo  $mod_fd_root ?>/editSet.php')"></div>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </table>

                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Under btn edit  -->
            <div class="divRightMain" >
                <br />
                <!-- ######## system name #########  -->
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;" >
                            <span class="formFontSubjectTxt"><?php echo  $langMod["txt:about"] ?>(<?php echo  $langTxt["lg:thai"] ?>)</span><br/>
                            <span class="formFontTileTxt"><?php echo  $langMod["txt:aboutDe"] ?>(<?php echo  $langTxt["lg:thai"] ?>)</span>                            </td>
                    </tr>

                    <!-- sys name th  -->
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["ab:subject"] ?>(<?php echo  $langTxt["lg:thai"] ?>) :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  $valSubject ?></div></td>
                    </tr>

                    <!-- sys name en  -->
                     <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["ab:subject"] ?>(<?php echo  $langTxt["lg:eng"] ?>) :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  $valSubjecten ?></div></td>
                    </tr>

                    <!-- office name th  -->
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["ab:office"] ?>(<?php echo  $langTxt["lg:thai"] ?>) :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  $valSubjectOffice ?></div></td>
                    </tr>
                    
                   
                    <!-- office name en  -->             
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["ab:office"] ?>(<?php echo  $langTxt["lg:eng"] ?>) :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  $valSubjectOfficeen ?></div></td>
                    </tr>
                    <tr>
      <td colspan="7" align="right"  valign="top">&nbsp;</td>
      </tr>
                </table>
                
                <br />


                <!-- ######## Tag title desctription ########  -->
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                            <span class="formFontSubjectTxt"><?php echo  $langMod["txt:set"] ?></span><br/>
                            <span class="formFontTileTxt"><?php echo  $langMod["txt:setDe"] ?></span>   </td>
                    </tr>

                    <!-- title  -->
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:seotitle"] ?> : <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  $valMetatitle ?></div></td>
                    </tr>

                    <!-- description  -->
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:seodes"] ?> : <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  $valDescription ?></div></td>
                    </tr>

                    <!-- keywords  -->
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["inp:seokey"] ?> : <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  $valKeywords ?></div></td>
                    </tr>

                    <tr>
                        <td colspan="7" align="right"  valign="top">&nbsp;</td>
                    </tr>
                </table>
                <br />


                <!-- ######## social media ######## -->
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                            <span class="formFontSubjectTxt"><?php echo  $langMod["txt:setSocial"] ?></span><br/>
                            <span class="formFontTileTxt"><?php echo  $langMod["txt:setSocialDe"] ?></span>   </td>
                    </tr>

                    <!-- facebook  -->
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["social:fb"] ?> :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?php echo  $ValSocial[$langMod["social:fb"]]['link'] ?>" target="_blank"><?php echo  $ValSocial[$langMod["social:fb"]]['link'] ?></a></div></td>
                    </tr>
                    <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["social:tw"] ?> :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?php echo  $ValSocial[$langMod["social:tw"]]['link'] ?>" target="_blank"><?php echo  $ValSocial[$langMod["social:tw"]]['link'] ?></a></div></td>
                    </tr> -->

                    <!-- youtube  -->
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["social:yt"] ?> :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?php echo  $ValSocial[$langMod["social:yt"]]['link'] ?>" target="_blank"><?php echo  $ValSocial[$langMod["social:yt"]]['link'] ?></a></div></td>
                    </tr>
                    <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["social:ig"] ?> :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?php echo  $ValSocial[$langMod["social:ig"]]['link'] ?>" target="_blank"><?php echo  $ValSocial[$langMod["social:ig"]]['link'] ?></a></div></td>
                    </tr> -->

                    <!-- line  -->
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["social:li"] ?> :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?php echo  $ValSocial[$langMod["social:li"]]['link'] ?>" target="_blank"><?php echo  $ValSocial[$langMod["social:li"]]['link'] ?></a></div></td>
                    </tr>

                    <tr>
                        <td colspan="7" align="right"  valign="top">&nbsp;</td>
                    </tr>
                </table>
                <br />
				

                <!-- Address  -->
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                            <span class="formFontSubjectTxt"><?php echo  $langMod["info:title"] ?></span><br/>
                            <span class="formFontTileTxt"><?php echo  $langMod["info:titlede"] ?></span>   </td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:address"] ?> (<?php echo  $langTxt["lg:thai"] ?>):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  nl2br($ValConfig['address']) ?></div></td>
                    </tr>
                    
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:address"] ?> (<?php echo  $langTxt["lg:eng"] ?>):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  nl2br($ValConfig['addressen'])?></div></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  $ValConfig['tel'] ?></div></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:fax"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  $ValConfig['fax'] ?></div></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:email"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?php echo  $ValConfig['email'] ?></div></td>
                    </tr>
                  <tr >
                     <td colspan='8' valign='top' align='right' height='1'><div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div> </td>
                  </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:googlemap"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView">
                                [ <?php echo  $ValConfig['glati'] ?> , <?php echo  $ValConfig['glongti'] ?> ] <br/>
                                <iframe width="80%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo  $ValConfig['glati'] ?>,<?php echo  $ValConfig['glongti'] ?>&hl=es;z=20&amp;output=embed"></iframe>
                                <br />
                            </div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langMod["info:picaddress"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                <?php if (is_file($valPic)) { ?>
                                    <img src="<?php echo  $valPic ?>"  style="float:left;border:#c8c7cc solid 1px; max-width:650px;"  />
                                <?php } ?>
                            </div></td>
                    </tr>
                    <tr>
      <td colspan="7" align="right"  valign="top">&nbsp;</td>
      </tr>
                </table>

                <br />
 

                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" >
                            <span class="formFontSubjectTxt"><?php echo  $langTxt["us:titleinfo"] ?></span><br/>
                            <span class="formFontTileTxt"><?php echo  $langTxt["us:titleinfoDe"] ?></span>     </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langTxt["us:credate"] ?>:</td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView"><?php echo  $valCredate ?></div>         </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langTxt["us:creby"] ?>:</td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView">
                                <?php
                                if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                    echo getUserThai($valCreby);
                                } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                    echo getUserEng($valCreby);
                                }
                                ?>
                            </div>         </td>
                    </tr>


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langTxt["us:lastdate"] ?>:</td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView"><?php echo  $valLastdate ?></div>         </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo  $langTxt["us:creby"] ?>:</td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView">
                                <?php
                                if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                    echo getUserThai($valLastby);
                                } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                    echo getUserEng($valLastby);
                                }
                                ?>
                            </div>         </td>
                    </tr>



                    <tr >
                        <td colspan="7" align="right"  valign="top" height="20"></td>
                    </tr>
                </table>
                <br />

                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >
                    <?php if ($_REQUEST['viewID'] <= 0) { ?>


                        <tr >
                            <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo  $langTxt["btn:gototop"] ?>"><?php echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </form>
        <?php include("../lib/disconnect.php"); ?>

    </body>
</html>
