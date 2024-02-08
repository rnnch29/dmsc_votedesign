<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">

    <link href="../css/theme.css" rel="stylesheet" />
    <title><?php echo  $core_name_title ?></title>
    <script language="JavaScript" type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
    <script src="../js/highcharts/code/highcharts.js"></script>
    <script src="../js/highcharts/code/modules/exporting.js"></script>
    <script src="../js/highcharts/code/modules/accessibility.js"></script>
    <script language="JavaScript" type="text/javascript">
        var countArrSort = '';
        jQuery(function() {

            jQuery("#boxHomeSort").sortable({
                update: function() {
                    var order = jQuery('#boxHomeSort').sortable('serialize');
                    countArrSort = order;
                    jQuery("#inputSort").val(countArrSort);
                    sortingContactHome('../core/sortingHome.php')
                }
            });

            jQuery("#boxHomeSort").disableSelection();

        });
    </script>
</head>

<body>
<?php
// Check to set default value #########################
        $module_default_pagesize = $core_default_pagesize2;
        $module_default_maxpage = $core_default_maxpage;
        $module_default_reduce = $core_default_reduce;
        $module_default_pageshow = 1;
        $module_sort_number = $core_sort_number;

        if ($_REQUEST['module_pagesize'] == "") {
            $module_pagesize = $module_default_pagesize;
        } else {
            $module_pagesize = $_REQUEST['module_pagesize'];
        }

        if ($_REQUEST['module_pageshow'] == "") {
            $module_pageshow = $module_default_pageshow;
        } else {
            $module_pageshow = $_REQUEST['module_pageshow'];
        }

        if ($_REQUEST['module_adesc'] == "") {
            $module_adesc = $module_sort_number;
        } else {
            $module_adesc = $_REQUEST['module_adesc'];
        }

        if ($_REQUEST['module_orderby'] == "") {
            $module_orderby = $core_tb_vote . "_id";
        } else {
            $module_orderby = $_REQUEST['module_orderby'];
        }

        if ($_REQUEST['inputSearch'] != "") {
            $inputSearch = trim($_REQUEST['inputSearch']);
        } else {
            $inputSearch = $_REQUEST['inputSearch'];
        }
        

// Search Value SQL #########################
        $sqlSearch = "";

        if ($inputSearch <> "") {
            $sqlSearch = $sqlSearch . "  AND 
		" . $core_tb_vote . "_id LIKE '%$inputSearch%' ";
        }
        ?>

<form action="?" method="post" name="myForm" id="myForm">
        <input name="masterkey" type="hidden" id="masterkey" value="<?php echo  $_REQUEST['masterkey'] ?>" />
        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo  $_REQUEST['menukeyid'] ?>" />
        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo  $module_pageshow ?>" />
        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo  $module_pagesize ?>" />
        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo  $module_orderby ?>" />
    <div class="divRightNav">
        <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td class="divRightNavTb" align="left" id="defTop"><span class="fontContantTbNav"><?php echo  $langTxt["nav:home1"] ?></span></td>
                <td class="divRightNavTb" align="right"><?php echo  DateFormat(date('Y-m-d H:i:s')) ?></td>
            </tr>
        </table>
    </div>
    <div class="divRightHead">
        <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center">
            <tr>
                <td height="77" align="left"><span class="fontHeadRight"><?php echo  $langTxt["nav:home2"] ?></span></td>
                <td align="left">
                    <table border="0" cellspacing="0" cellpadding="0" align="right">
                        <tr>
                            <td align="right">
                            <div class="btnExport" title="<?php echo $langTxt["btn:export"] ?>" onclick="
                                        document.myFormExport.action ='exportReport.php';
                                        document.myFormExport.submit(); ">
                                        </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>


    <div class="divRightHome">
        <div class="divRightInnerHome">
            
                <div class="divRightInnerTopBoxHome">
                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        
                        <tr>
                            <td height="20" colspan="2" align="left">

                            <figure class="highcharts-figure">
                                <div id="container"></div>
                            </figure>


                            </td>
                        </tr>

                     
                    </table>


                </div>
        </div>

        <div class="divRightInnerHome">
            
                <div class="divRightInnerTopBoxHome">
                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        
                        <tr>
                            <td height="20" colspan="2" align="left">

                            <figure class="highcharts-figure">
                                <div id="container2"></div>
                            </figure>


                            </td>
                        </tr>

                     
                    </table>


                </div>
        </div>

        <div class="divRightInnerHome">
            
                <div class="divRightInnerTopBoxHome">
                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        
                        <tr>
                            <td height="20" colspan="2" align="left">

                            <figure class="highcharts-figure">
                                <div id="container3"></div>
                            </figure>


                            </td>
                        </tr>

                     
                    </table>


                </div>
        </div>
    </div>


    <div class="divRightMain">
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxListwBorder">
                <tr>
                    <!-- <td width="3%" class="divRightTitleTbL" valign="middle" align="center">
                        <input name="CheckBoxAll" type="checkbox" id="CheckBoxAll" value="Yes"
                            onclick="Paging_CheckAll(this, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)"
                            class="formCheckboxHead" />
                    </td> -->

                    <!-- <td align="left" valign="middle" class="divRightTitleTb"><span
                            class="fontTitlTbRight"><?php echo  $langMod["tit:subject"] ?></span></td>
                    <?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>
                    <?php } ?> -->

                    <!-- Top graphic name table head  -->
                    <!-- <td width="5%" class="divRightTitleTbL" valign="middle" align="left" style="padding-left: 40px;"><?php echo $langMod["txt:id"] ?></span></td>    -->

                    <td align="center" width="50%" valign="middle" class="divRightTitleTbL" ><span class="fontTitlTbRight"><?php echo $langMod["txt:suggest"] ?></span></td> 

                    <td align="center" width="50%" valign="middle" class="divRightTitleTb"><span class="fontTitlTbRight"><?php echo $langMod["txt:voteDate"] ?></span></td>

                    
                    <!-- <td width="9%" class="divRightTitleTb" valign="middle" align="center"><span
                            class="fontTitlTbRight"><?php echo  $langTxt["mg:status"] ?></span></td>
                    <td width="9%" class="divRightTitleTb" valign="middle" align="center"><span
                            class="fontTitlTbRight"><?php echo  $langTxt["us:lastdate"] ?></span></td>
                    <td width="10%" class="divRightTitleTbR" valign="middle" align="center"><span
                            class="fontTitlTbRight"><?php echo  $langTxt["mg:manage"] ?></span></td> -->
                </tr>
                <?php
// Value SQL SELECT #########################
					// $slect_data = array();
					// $slect_data[$core_tb_vote . "_id as ".substr("_id",1)] = "";
					// $slect_data[$core_tb_vote  . "_subject as ".substr("_subject",1)] = "";
					// $slect_data[$core_tb_vote  . "_lastdate as ".substr("_lastdate",1)] = "";
					// $slect_data[$core_tb_vote  . "_status as ".substr("_status",1)] = "";
					// $slect_data[$core_tb_vote  . "_pic as ".substr("_pic",1)] = "";
					// $slect_data[$core_tb_vote  . "_sync as ".substr("_sync",1)] = "";
					// $slect_data[$core_tb_vote  . "_subjecten as ".substr("_subjecten",1)] = "";
					// $slect_data[$core_tb_vote  . "_picen as ".substr("_picen",1)] = "";

// SQL SELECT #########################
                    // $sql = "SELECT \n" . implode(",\n", array_keys($slect_data)) . "    FROM " . $core_tb_vote;
                    // $sql = $sql . "  WHERE " . $core_tb_vote . "_masterkey ='" . $_REQUEST['masterkey'] . "'   ";
                    // $sql = $sql . $sqlSearch;
					
					//print_pre($sql );

                    // $query = wewebQueryDB($coreLanguageSQL, $sql);
                    // $count_totalrecord = wewebNumRowsDB($coreLanguageSQL, $query);

// Find max page size #########################
                    // if ($count_totalrecord > $module_pagesize) {
                    //     $numberofpage = ceil($count_totalrecord / $module_pagesize);
                    // } else {
                    //     $numberofpage = 1;
                    // }

// Recover page show into range #########################
                    // if ($module_pageshow > $numberofpage) {
                    //     $module_pageshow = $numberofpage;
                    // }

// Select only paging range #########################
                    // $recordstart = ($module_pageshow - 1) * $module_pagesize;


                    // if ($coreLanguageSQL == "mssql") {
                    //     $sql = "SELECT " . $sqlSelect . " FROM (SELECT RuningCount = ROW_NUMBER() OVER (ORDER BY " . $module_orderby . "  " . $module_adesc . " ),*  FROM   " . $core_tb_vote;
                    //     $sql .="  WHERE " . $core_tb_vote . "_masterkey ='" . $_REQUEST['masterkey'] . "'   ";
                    //     $sql.="   ) AS LogWithRowNumbers  WHERE   (RuningCount BETWEEN " . $recordstart . "  AND " . $module_pagesize . " )";
                    //     $sql.=$sqlSearch;
                    // } else {
                    //     $sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";
                    // }


                    // $query = wewebQueryDB($coreLanguageSQL, $sql);
                    // $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
                    // $index = 1;
                    // $valDivTr = "divSubOverTb";
                    // if ($count_record > 0) {
					
                    //     while ($index < $count_record + 1) {
                    //         $row = wewebFetchArrayDB($coreLanguageSQL, $query);
                    //         $valID = $row[0];
                    //         $valName = rechangeQuot($row[1]);
                    //         $valDateCredate = dateFormatReal($row[2]);
                    //         $valTimeCredate = timeFormatReal($row[2]);
                    //         $valStatus = $row[3];
                    //         $valSyncData = $row['sync'];
                    //         $valPic = getPicAddressReal($row[4],$valSyncData,"office",$_REQUEST['masterkey']);
                    //         $valPicEN = getPicAddressReal($row[7],$valSyncData,"office",$_REQUEST['masterkey']);
                    //         $valNameEN = rechangeQuot($row[6]);

							
                    //         if ($valStatus == "Enable") {
                    //             $valStatusClass = "fontContantTbEnable";
                    //         } else {
                    //             $valStatusClass = "fontContantTbDisable";
                    //         }
							
							

                    //         if ($valDivTr == "divSubOverTb") {
                    //             $valDivTr = "divOverTb";
                    //             $valImgCycle = "boxprofile_l.png";
                    //         } else {
                    //             $valDivTr = "divSubOverTb";
                    //             $valImgCycle = "boxprofile_w.png";
                    //         }
                    //         ?>

<?php
                // SQL SELECT #########################
                $sqlSelect = "
                " . $core_tb_vote . "_id,
                " . $core_tb_vote . "_suggest,
                " . $core_tb_vote . "_credate";  

                $sql = "SELECT " . $sqlSelect . "    FROM " . $core_tb_vote;
                $sql = $sql . "  WHERE " . $core_tb_vote . "_masterkey ='vote'   ";

               
                $sql = $sql . $sqlSearch;
                $query = wewebQueryDB($coreLanguageSQL, $sql);
                $count_totalrecord = wewebNumRowsDB($coreLanguageSQL, $query);

                $sql = $sql . $sqlSearch;
                $sql_export = $sql;

                // print_pre($sql);
                // Find max page size #########################
                if ($count_totalrecord > $module_pagesize) {
                    $numberofpage = ceil($count_totalrecord / $module_pagesize);
                } else {
                    $numberofpage = 1;
                }

                // Recover page show into range #########################
                if ($module_pageshow > $numberofpage) {
                    $module_pageshow = $numberofpage;
                }

                // Select only paging range #########################
                $recordstart = ($module_pageshow - 1) * $module_pagesize;
                if ($coreLanguageSQL == "mssql") {
                    $sql = "SELECT " . $core_tb_vote . " FROM (SELECT RuningCount = ROW_NUMBER() OVER (ORDER BY " . $module_orderby . "  " . $module_adesc . " ),*  FROM   " . $core_tb_vote;
                    $sql .= "  WHERE " . $core_tb_vote . "_masterkey ='vote'   ";
                    $sql .= "   ) AS LogWithRowNumbers  WHERE   (RuningCount BETWEEN " . $recordstart . "  AND " . $module_pagesize . " )";
                    $sql .= $sqlSearch;
                } else {
                    $sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";
                }
                //    print_pre($sql);

                $query = wewebQueryDB($coreLanguageSQL, $sql);
                $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
                // print_pre($query);die();

                $index = 1;
                $valDivTr = "divSubOverTb";

                if ($count_record > 0) {

                    while ($index < $count_record + 1) {
                        $row = wewebFetchArrayDB($coreLanguageSQL, $query);
                        $valSug = $row[1];
                        $valDate = $row[2];
             

                        // $valPic = $mod_path_office . "/" . $row[4];
                        // if (is_file($valPic)) {
                        //     $valPic = $valPic;
                        // } else {
                        //     $valPic = "../img/btn/nopic.jpg";
                        // }

                        // $valPicEN = $mod_path_office . "/" . $row[6];
                        // if (is_file($valPicEN)) {
                        //     $valPicEN = $valPicEN;
                        // } else {
                        //     $valPicEN = "../img/btn/nopic.jpg";
                        // }


                        // $valNameEn = rechangeQuot($row[5]);
                        // $valNameEn = chechNullVal($valNameEn);

                        // if ($valStatus == "Enable") {
                        //     $valStatusClass = "fontContantTbEnable";
                        // } else {
                        //     $valStatusClass = "fontContantTbDisable";
                        // }

                        if ($valDivTr == "divSubOverTb") {
                            $valDivTr = "divOverTb";
                            $valImgCycle = "boxprofile_l.png";
                        } else {
                            $valDivTr = "divSubOverTb";
                            $valImgCycle = "boxprofile_w.png";
                        }
                ?>



                

                    <?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>
                        <td class="divRightContantOverTb" valign="top" align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <!-- <td class="displayTdImg" align="center" valign="top">
                                        <div class="displayClickImg" style=" background:url(<?php echo  $valPicEN ?>) center no-repeat;border-radius: 50%;"></div>
                                    </td> -->
                                <td align="center">
                                    <?php
                                        if ($valSug == "") {
                                            echo "-";
                                        }else{  
                                            echo $valSug;
                                        }                                   
                                    ?>
                                </td>
                                </tr>
                            </table>
                        </td>
                        
                        <?php } ?>
                        <?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>
                        <td class="divRightContantOverTb" valign="top" align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <!-- <td class="displayTdImg" align="center" valign="top">
                                        <div class="displayClickImg" style=" background:url(<?php echo  $valPicEN ?>) center no-repeat;border-radius: 50%;"></div>
                                    </td> -->
                                <td align="center">
                                    <?php
                                        echo $valDate  ;                                 
                                    ?>
                                </td>
                                </tr>
                            </table>
                        </td>
                        
                        <?php } ?>

                        

                        

                        

                       

                    
                    <!-- <td class="divRightContantOverTb" valign="top" align="center">
                        <span class="fontContantTbupdate"><?php echo  $valDateCredate ?></span><br />
                        <span class="fontContantTbTime"><?php echo  $valTimeCredate ?></span>
                    </td> -->
                    <!-- <td class="divRightContantOverTbR" valign="top" align="center">
                        <?php if ($valPermission == "RW") { ?>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td valign="top" align="center" width="30">

                                    <div class="divRightManage" title="<?php echo  $langTxt["btn:top"] ?>" onclick="
                                                            document.myFormHome.inputLt.value = 'Thai';
                                                            document.myFormHome.valEditID.value =<?php echo  $valID ?>;
                                                            editContactNew('topUpdateContant.php');">
                                        <img src="../img/btn/topbtn.png" /><br />
                                        <span class="fontContantTbManage"><?php echo  $langTxt["btn:top"] ?></span>
                                    </div>
                                </td>



                                <?  if($valSyncData!=1){?>

                                
                                <td valign="top" align="center" width="30">
                                                <div class="divRightManage" title="<?php echo  $langTxt["btn:edit"] ?>" onclick="
                                            document.myFormHome.inputLt.value = 'Thai';
                                            document.myFormHome.valEditID.value =<?php echo  $valID ?>;
                                            editContactNew('editContant.php');">
                                                    <img src="../img/btn/edit.png" /><br />
                                                    <span class="fontContantTbManage"><?php echo  $langTxt["btn:edit"] ?><br />
                                                        (<?php echo  $langTxt["lg:thai"] ?>)</span>
                                                </div>
                                            </td>
                                
                                
                                <?php if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>
                                                <td valign="top" align="center" width="30">
                                                    <div class="divRightManage" title="<?php echo  $langTxt["btn:edit"] ?>" onclick="
                                            document.myFormHome.inputLt.value = 'Eng';
                                            document.myFormHome.valEditID.value =<?php echo  $valID ?>;
                                            editContactNew('editContant.php');">
                                                        <img src="../img/btn/edit.png" /><br />
                                                        <span class="fontContantTbManage"><?php echo  $langTxt["btn:edit"] ?><br />
                                                            (<?php echo  $langTxt["lg:eng"] ?>)</span>
                                                    </div>
                                                </td><?php } ?>




                                <td valign="top" align="center" width="30">
                                    <div class="divRightManage" title="<?php echo  $langTxt["btn:del"] ?>" onclick="
                                                            if (confirm('<?php echo  $langTxt["mg:delpermis"] ?>')) {
                                                                Paging_CheckedThisItem(document.myForm.CheckBoxAll, <?php echo  $index ?>, 'CheckBoxID', document.myForm.TotalCheckBoxID.value);
                                                                delContactNew('deleteContant.php');
                                                            }
                                                         ">
                                        <img src="../img/btn/delete.png" /><br />
                                        <span class="fontContantTbManage"><?php echo  $langTxt["btn:del"] ?></span>
                                    </div>
                                </td>
                                <? }?>
                            </tr>
                        </table>
                        <?php } ?>
                    </td> -->
                </tr>

                <?php
                            $index++;
                        }
                    } else {
                        ?>
                
                <tr>
                    <td colspan="5" align="center" valign="middle" class="divRightContantTbRL"
                        style="padding-top:150px; padding-bottom:150px;"><?php echo  $langTxt["mg:nodate"] ?></td>
                </tr>
                <?php } ?>

                <tr>
                    <td colspan="6" align="center" valign="middle" class="divRightContantTbRL">
                        <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr>
                                <td class="divRightNavTb" align="left"><span
                                        class="fontContantTbNavPage"><?php echo  $langTxt["pr:All"] ?>
                                        <b><?php echo  number_format($count_totalrecord) ?></b>
                                        <?php echo  $langTxt["pr:record"] ?></span></td>
                                <td class="divRightNavTb" align="right">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="right" style="padding-right:10px;"><span
                                                    class="fontContantTbNavPage"><?php echo  $langTxt["pr:page"] ?>
                                                    <?php if ($numberofpage > 1) { ?>
                                                    <select name="toolbarPageShow" class="formSelectContantPage"
                                                        onchange="document.myForm.module_pageshow.value = this.value;
                                                                    document.myForm.submit();
                                                                    ">
                                                        <?php
                                                                        if ($numberofpage < $module_default_maxpage) {
                                                                            // Show page list #########################
                                                                            for ($i = 1; $i <= $numberofpage; $i++) {
                                                                                echo "<option value=\"$i\"";
                                                                                if ($i == $module_pageshow) {
                                                                                    echo " selected";
                                                                                }
                                                                                echo ">$i</option>";
                                                                            }
                                                                        } else {
                                                                            // # If total page count greater than default max page  value then reduce page select size #########################
                                                                            $starti = $module_pageshow - $module_default_reduce;
                                                                            if ($starti < 1) {
                                                                                $starti = 1;
                                                                            }
                                                                            $endi = $module_pageshow + $module_default_reduce;
                                                                            if ($endi > $numberofpage) {
                                                                                $endi = $numberofpage;
                                                                            }
                                                                            //#####################
                                                                            for ($i = $starti; $i <= $endi; $i++) {
                                                                                echo "<option value=\"$i\"";
                                                                                if ($i == $module_pageshow) {
                                                                                    echo " selected";
                                                                                }
                                                                                echo ">$i</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                    </select>
                                                    <?php } else { ?>
                                                    <b><?php echo  $module_pageshow ?></b>
                                                    <?php } ?>
                                                    <?php echo  $langTxt["pr:of"] ?>
                                                    <b><?php echo  $numberofpage ?></b></span></td>
                                            <?php if ($module_pageshow > 1) { ?>
                                            <td width="21" align="center"> <img
                                                    src="../img/controlpage/playset_start.gif" width="21" height="21"
                                                    onmouseover="this.src = '../img/controlpage/playset_start_active.gif';
                                                                                                this.style.cursor = 'hand';"
                                                    onmouseout="this.src = '../img/controlpage/playset_start.gif';"
                                                    onclick="document.myForm.module_pageshow.value = 1;
                                                                                                document.myForm.submit();"
                                                    style="cursor:pointer;" /></td>
                                            <?php } else { ?>
                                            <td width="21" align="center"><img
                                                    src="../img/controlpage/playset_start_disable.gif" width="21"
                                                    height="21" /></td>
                                            <?php } ?>
                                            <?php
                                                if ($module_pageshow > 1) {
                                                    $valPrePage = $module_pageshow - 1;
                                                    ?>
                                            <td width="21" align="center"> <img
                                                    src="../img/controlpage/playset_backward.gif" width="21" height="21"
                                                    style="cursor:pointer;"
                                                    onmouseover="this.src = '../img/controlpage/playset_backward_active.gif';
                                                                                                this.style.cursor = 'hand';"
                                                    onmouseout="this.src = '../img/controlpage/playset_backward.gif';"
                                                    onclick="document.myForm.module_pageshow.value = '<?php echo  $valPrePage ?>';
                                                                                                document.myForm.submit();" />
                                            </td>
                                            <?php } else { ?>
                                            <td width="21" align="center"><img
                                                    src="../img/controlpage/playset_backward_disable.gif" width="21"
                                                    height="21" /></td>
                                            <?php } ?>
                                            <td width="21" align="center"> <img
                                                    src="../img/controlpage/playset_stop.gif" width="21" height="21"
                                                    style="cursor:pointer;"
                                                    onmouseover="this.src = '../img/controlpage/playset_stop_active.gif';
                                                                                            this.style.cursor = 'hand';"
                                                    onmouseout="this.src = '../img/controlpage/playset_stop.gif';"
                                                    onclick="
                                                                                            with (document.myForm) {
                                                                                                module_pageshow.value = '';
                                                                                                module_pagesize.value = '';
                                                                                                module_orderby.value = '';
                                                                                                document.myForm.submit();
                                                                                            }
                                                                                    " /></td>
                                            <?php
                                                    if ($module_pageshow < $numberofpage) {
                                                        $valNextPage = $module_pageshow + 1;
                                                        ?>
                                            <td width="21" align="center"> <img
                                                    src="../img/controlpage/playset_forward.gif" width="21" height="21"
                                                    style="cursor:pointer;"
                                                    onmouseover="this.src = '../img/controlpage/playset_forward_active.gif';
                                                                                                this.style.cursor = 'hand';"
                                                    onmouseout="this.src = '../img/controlpage/playset_forward.gif';"
                                                    onclick="document.myForm.module_pageshow.value = '<?php echo  $valNextPage ?>';
                                                                                                document.myForm.submit();" />
                                            </td>
                                            <?php } else { ?>
                                            <td width="10" align="center"><img
                                                    src="../img/controlpage/playset_forward_disable.gif" width="21"
                                                    height="21" /></td>
                                            <?php } ?>
                                            <?php if ($module_pageshow < $numberofpage) { ?>
                                            <td width="10" align="center"><img src="../img/controlpage/playset_end.gif"
                                                    width="21" height="21" style="cursor:pointer;"
                                                    onmouseover="this.src = '../img/controlpage/playset_end_active.gif';
                                                                                               this.style.cursor = 'hand';"
                                                    onmouseout="this.src = '../img/controlpage/playset_end.gif';"
                                                    onclick="document.myForm.module_pageshow.value = '<?php echo  $numberofpage ?>';
                                                                                               document.myForm.submit();" />
                                            </td>
                                            <?php } else { ?>
                                            <td width="10" align="center"><img
                                                    src="../img/controlpage/playset_end_disable.gif" width="21"
                                                    height="21" /></td>
                                            <?php } ?>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>


     <!--################################### Chart 1 ###################################-->



     <?php
            $sqlSelect = "
    " . $core_tb_vote . "_q1
";
            $sql = "SELECT " . $sqlSelect . ", COUNT(*) AS count_per_category 
        FROM " . $core_tb_vote . " 
        WHERE " . $core_tb_vote . "_masterkey ='vote'
        GROUP BY " . $core_tb_vote . "_q1";

            $query = wewebQueryDB($coreLanguageSQL, $sql);
            $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
            $sql_export = $sql;
            // $row = wewebFetchArrayDB($coreLanguageSQL, $query);
            // print_r($row);die();
            // Fetch the data from the query
            $data = array();
            while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {

                if ($row[$core_tb_vote . '_q1'] == 1) {
                    $data[] = array(
                        'name' => $langMod["q1:a1M"],
                        'y' => (int)$row['count_per_category']
                    );
                } else if ($row[$core_tb_vote . '_q1'] == 2) {
                    $data[] = array(
                        'name' => $langMod["q1:a2M"],
                        'y' => (int)$row['count_per_category']
                    );
                } else if ($row[$core_tb_vote . '_q1'] == 3) {
                    $data[] = array(
                        'name' => $langMod["q1:a3M"],
                        'y' => (int)$row['count_per_category']
                    );
                } else {
                    $data[] = array(
                        'name' => $langMod["q1:a4M"],
                        'y' => (int)$row['count_per_category']
                    );
                }
            }

            // Convert the PHP data to JSON format for use in JavaScript
            $jsonData = json_encode($data);

            // print_r($data);

            ?>



            <script type="text/javascript">
                // Use the PHP data in JavaScript
                var jsonData = <?php echo $jsonData; ?>;
                Highcharts.chart('container', {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                       
                        text: 'คำถามที่ 1',
                        style: {
                        fontSize: '15px',         
                        }
                    },
                    // tooltip: {
                    //     valueSuffix: 'unit'
                    // },
                    // subtitle: {
                    //     text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                    // },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                distance: 20
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'จำนวน',
                        colorByPoint: true,
                        data: jsonData
                    }]
                });
            </script>


            <!--################################### Chart 2 ###################################-->

            <?php
            $sqlSelect = "
    " . $core_tb_vote . "_q2
";
            $sql = "SELECT " . $sqlSelect . ", COUNT(*) AS count_per_category 
        FROM " . $core_tb_vote . " 
        WHERE " . $core_tb_vote . "_masterkey ='vote'
        GROUP BY " . $core_tb_vote . "_q2";

            $query = wewebQueryDB($coreLanguageSQL, $sql);
            $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
            $sql_export2 = $sql;

            // $row = wewebFetchArrayDB($coreLanguageSQL, $query);
            // print_r($row);die();
            // Fetch the data from the query
            $data = array();
            while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {

                if ($row[$core_tb_vote . '_q2'] == 1) {
                    $data[] = array(
                        'name' => $langMod["q2:a1M"],
                        'y' => (int)$row['count_per_category']
                    );
                } else {
                    $data[] = array(
                        'name' => $langMod["q2:a2M"],
                        'y' => (int)$row['count_per_category']
                    );
                }
            }

            // Convert the PHP data to JSON format for use in JavaScript
            $jsonData = json_encode($data);

            // print_r($data);

            ?>




            <script type="text/javascript">
                // Use the PHP data in JavaScript
                var jsonData = <?php echo $jsonData; ?>;
                Highcharts.chart('container2', {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'คำถามที่ 2',
                        style: {
                        fontSize: '15px',         
                        }
                    },
                    // tooltip: {
                    //     valueSuffix: 'unit'
                    // },
                    // subtitle: {
                    //     text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                    // },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                distance: 20
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'จำนวน',
                        colorByPoint: true,
                        data: jsonData
                    }]
                });
            </script>




            <!--################################### Chart 3 ###################################-->

            <?php
            $sqlSelect = "
            " . $core_tb_vote . "_q3
            ";
            $sql = "SELECT " . $sqlSelect . ", COUNT(*) AS count_per_category 
        FROM " . $core_tb_vote . " 
        WHERE " . $core_tb_vote . "_masterkey ='vote'
        GROUP BY " . $core_tb_vote . "_q3";

            $query = wewebQueryDB($coreLanguageSQL, $sql);
            $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
            $sql_export3 = $sql;

            // $row = wewebFetchArrayDB($coreLanguageSQL, $query);
            // print_r($row);die();
            // Fetch the data from the query
            $data = array();
            while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {

                if ($row[$core_tb_vote . '_q3'] == 1) {
                    $data[] = array(
                        'name' => $langMod["q3:a1M"],
                        'y' => (int)$row['count_per_category']
                    );
                } else if ($row[$core_tb_vote . '_q3'] == 2) {
                    $data[] = array(
                        'name' => $langMod["q3:a2M"],
                        'y' => (int)$row['count_per_category']
                    );
                } else if ($row[$core_tb_vote . '_q3'] == 3) {
                    $data[] = array(
                        'name' => $langMod["q3:a3M"],
                        'y' => (int)$row['count_per_category']
                    );
                } else {
                    $data[] = array(
                        'name' => $langMod["q3:a4M"],
                        'y' => (int)$row['count_per_category']
                    );
                }
            }

            // Convert the PHP data to JSON format for use in JavaScript
            $jsonData = json_encode($data);

            // print_r($data);

            ?>



            <script type="text/javascript">
                // Use the PHP data in JavaScript
                var jsonData = <?php echo $jsonData; ?>;
                Highcharts.chart('container3', {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'คำถามที่ 3',
                        style: {
                        fontSize: '15px',         
                        }
                    },
                    // tooltip: {
                    //     valueSuffix: 'unit'
                    // },
                    // subtitle: {
                    //     text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                    // },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                distance: 20
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'จำนวน',
                        colorByPoint: true,
                        data: jsonData
                    }]
                });
            </script>


<?php
            $sqlSelect = "
            " . $core_tb_vote . "_suggest
            ";
            $sql = "SELECT " . $sqlSelect . "
        FROM " . $core_tb_vote."";

            $query = wewebQueryDB($coreLanguageSQL, $sql);
            $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
            $sql_export4 = $sql;
// print_r($sql);die();
            ?>
            </table>
            <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php echo  $index - 1 ?>" />
            <div class="divRightContantEnd"></div>
        </div>
</form>
<form action="?" method="post" name="myFormExport" id="myFormExport">
                <input name="sql_export" type="hidden" id="sql_export" value="<?php echo $sql_export ?>" />
                <input name="sql_export2" type="hidden" id="sql_export2" value="<?php echo $sql_export2 ?>" />
                <input name="sql_export3" type="hidden" id="sql_export3" value="<?php echo $sql_export3 ?>" />
                <input name="sql_export4" type="hidden" id="sql_export4" value="<?php echo $sql_export4 ?>" />
                <input name="language_export" type="hidden" id="language_export" value="<?php echo $_SESSION[$valSiteManage . 'core_session_language'] ?>" />
                <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST["masterkey"] ?>" />
                <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST["menukeyid"] ?>" />
            </form>
    <?php include("../lib/disconnect.php"); ?>
</body>

</html>