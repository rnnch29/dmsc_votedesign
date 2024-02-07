<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";

			
			
		// $slect_data = array();
		// $slect_data[$mod_tb_root . "_id as ".substr("_id",1)] = "";
		// $slect_data[$mod_tb_root  . "_credate as ".substr("_credate",1)] = "";
		// $slect_data[$mod_tb_root  . "_crebyid as ".substr("_crebyid",1)] = "";
		// $slect_data[$mod_tb_root  . "_status as ".substr("_status",1)] = "";
		// $slect_data[$mod_tb_root  . "_sdate as ".substr("_sdate",1)] = "";
		// $slect_data[$mod_tb_root  . "_edate as ".substr("_edate",1)] = "";
		// $slect_data[$mod_tb_root  . "_lastdate as ".substr("_lastdate",1)] = "";
		// $slect_data[$mod_tb_root  . "_subject as ".substr("_subject",1)] = "";
		// $slect_data[$mod_tb_root  . "_lastbyid as ".substr("_lastbyid",1)] = "";
		// $slect_data[$mod_tb_root  . "_target as ".substr("_target",1)] = "";
		// $slect_data[$mod_tb_root  . "_pic as ".substr("_pic",1)] = "";
		// $slect_data[$mod_tb_root  . "_url as ".substr("_url",1)] = "";
		// $slect_data[$mod_tb_root  . "_sync as ".substr("_sync",1)] = "";
		
		// $sql = "SELECT   \n" . implode(",\n", array_keys($slect_data)) . "  ";
		// $sql .= " FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_masterkey='".$_REQUEST["masterkey"]."'  AND  ".$mod_tb_root."_id='".$_REQUEST['valEditID']."' ";
        if ($_REQUEST['inputLt'] == "Thai") {

            $sql = "SELECT   ";
            $sql .= "   
            " . $mod_tb_root . "_id,
            " . $mod_tb_root . "_q1,
            " . $mod_tb_root . "_q2,
            " . $mod_tb_root . "_q3,
            " . $mod_tb_root . "_suggest,
            " . $mod_tb_root . "_credate,
            " . $mod_tb_root . "_ip

            ";
          }
          
          
          $sql .= " FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "'  AND  " . $mod_tb_root . "_id='" . $_REQUEST['valEditID'] . "' ";


            // print_pre($sql);

			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);

			$valID = $Row[0];
            $valQ1 = rechangeQuot($Row[1]);
            $valQ2 = rechangeQuot($Row[2]);
            $valQ3 = rechangeQuot($Row[3]);
            $valSuggest  = rechangeQuot($Row[4]);
            $valCredate = dateFormatReal($Row[5]);
            $valIP  = rechangeQuot($Row[6]);
			
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);
			
			logs_access('3','View');
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
</head>

<body>
    <form action="?" method="get" name="myForm" id="myForm">
        <input name="execute" type="hidden" id="execute" value="update" />
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
        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $_REQUEST['valEditID']?>" />
        <input name="inputLt" type="hidden" id="inputLt" value="<?php echo $_REQUEST['inputLt']?>" />
        <?php if($_REQUEST['viewID']<=0){?>
        <div class="divRightNav">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><a
                                href="<?php echo $valLinkNav1?>" target="_self"><?php echo $valNav1?></a> <img
                                src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a href="javascript:void(0)"
                                onclick="btnBackPage('index.php')"
                                target="_self"><?php echo getNameMenu($_REQUEST["menukeyid"])?></a> <img
                                src="../img/btn/nav.png" align="absmiddle" vspace="5" />
                            <?php echo $langMod["txt:titleview"]?></span></td>
                    <td class="divRightNavTb" align="right">



                    </td>
                </tr>
            </table>
        </div>
        <?php }?>
        <div class="divRightHead">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
                <tr>
                    <td height="77" align="left"><span
                            class="fontHeadRight"><?php echo $langMod["txt:titleview"]?></span></td>
                    <td align="left">
                        <table border="0" cellspacing="0" cellpadding="0" align="right">
                            <tr>
                                <td align="right">
                                    <?php if($_REQUEST['viewID']<=0){?>

                                    <div class="btnBack" title="<?php echo $langTxt["btn:back"]?>"
                                        onclick="btnBackPage('index.php')"></div>

                                    <?php }?>
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
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:subject"]?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:subjectDe2"]?></span>
                    </td>
                </tr>

                <tr>
                    <td width="40%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["txt:id"]?>:<span class="fontContantAlert"></span></td>
                    <td width="60%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valID?></div>
                    </td>
                </tr>

                <tr>
                    <td width="40%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["txt:q1"]?>:<span class="fontContantAlert"></span></td>
                    <td width="60%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                                for($i = 1; $i < 5 ; $i++){
                                    if($valQ1 == $i) {
                                        echo $langMod['q1:a'.$i];
                                    }
                                }                                                    
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="40%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["txt:q2"]?>:<span class="fontContantAlert"></span></td>
                    <td width="60%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                                for($i = 1; $i < 3 ; $i++){
                                    if($valQ2 == $i) {
                                        echo $langMod['q2:a'.$i];
                                    }
                                }                                                    
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="35%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["txt:q3"]?>:<span class="fontContantAlert"></span></td>
                    <td width="65%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                                for($i = 1; $i < 5 ; $i++){
                                    if($valQ3 == $i) {
                                        echo $langMod['q3:a'.$i];
                                    }
                                }                                                    
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td width="35%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["txt:suggest"]?>:<span class="fontContantAlert"></span></td>
                    <td width="65%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php 
                                if($valSuggest == ""){
                                    echo "-";
                                }else {
                                    echo $valSuggest;
                                }
                            ?>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table>
            <br />
            

            <!-- SET date start , end  -->
            <!-- <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langMod["txt:seo"]?></span><br />
                        <span class="formFontTileTxt"><?php echo $langMod["txt:seoDe"]?></span>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:sdate"]?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valSdate?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["tit:edate"]?>:<span class="fontContantAlert"></span></td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valEdate?></div>
                    </td>
                </tr>

                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table>
            <br /> -->


            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                <tr>
                    <td colspan="7" align="left" valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                        <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleinfo"]?></span><br />
                        <span class="formFontTileTxt"><?php echo $langTxt["us:titleinfoDe"]?></span>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langTxt["us:credate"]?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valCredate?></div>
                    </td>
                </tr>

                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langMod["txt:ip"]?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valIP?></div>
                    </td>
                </tr>

                <!-- <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langTxt["us:creby"]?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                                if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
                                    echo getUserThai($valCreby);
                                }else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
                                    echo getUserEng($valCreby);
                                }                         
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langTxt["us:lastdate"]?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView"><?php echo $valLastdate?></div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langTxt["us:creby"]?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">
                            <?php
                                if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
                                    echo getUserThai($valLastby);
                                }else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
                                    echo getUserEng($valLastby);
                                }      
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="18%" align="right" valign="top" class="formLeftContantTb">
                        <?php echo $langTxt["mg:status"]?>:</td>
                    <td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
                        <div class="formDivView">

                            <?php if($valStatus=="Enable"){?>
                            <span class="<?php echo $valStatusClass?>"><?php echo $valStatus?></span>
                            <?php }else{?>
                            <span class="<?php echo $valStatusClass?>"><?php echo $valStatus?></span>
                            <?php }?>
                        </div>
                    </td>
                </tr> -->
                <tr>
                    <td colspan="7" align="right" valign="top">&nbsp;</td>
                </tr>

            </table>
            <br />
            <?php if($_REQUEST['viewID']<=0){?>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                <tr>
                    <td colspan="7" align="right" valign="top" height="20"></td>
                </tr>
                <tr>
                    <td colspan="7" align="right" valign="middle" class="formEndContantTb"><a href="#defTop"
                            title="<?php echo $langTxt["btn:gototop"]?>"><?php echo $langTxt["btn:gototop"]?> <img
                                src="../img/btn/top.png" align="absmiddle" /></a></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </form>
    <?php include("../lib/disconnect.php");?>


</body>

</html>