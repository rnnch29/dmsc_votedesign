<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
$sqlChk = "SELECT ".$core_tb_menu."_id,".$core_tb_menu."_linkpath FROM ".$core_tb_menu;
$sqlChk = $sqlChk."  WHERE ".$core_tb_menu."_masterkey ='".$_REQUEST['masterkey']."'";
$queryChk=wewebQueryDB($coreLanguageSQL,$sqlChk);
$rowChk=wewebFetchArrayDB($coreLanguageSQL,$queryChk);
$pathArr = explode("/",$rowChk[1]);

include("../".$pathArr[1]."/incModLang.php");
include("../".$pathArr[1]."/config.php");

$sql = "SELECT ".$mod_tb_root."_id,".$mod_tb_root."_action,".$mod_tb_root."_time,".$mod_tb_root."_ip,".$mod_tb_root."_action  FROM ".$mod_tb_root;
$sql = $sql."  WHERE ".$mod_tb_root."_id >='1'  ORDER BY ".$mod_tb_root."_time DESC  LIMIT 0,5";
	//print_pre($sql);
	$query=wewebQueryDB($coreLanguageSQL,$sql) ;
	$recordCount=wewebNumRowsDB($coreLanguageSQL,$query);
	if($recordCount>=1){
	?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<?
    while($row=wewebFetchArrayDB($coreLanguageSQL,$query)) {
		$valID=$row[0];
		$valName=$row[1];
	 	$valDateCredate = dateFormatReal($row[2]);
		 $valTimeCredate = timeFormatReal($row[2]);
		$valStatus=$row[3];
		$valNameEn=rechangeQuot($row[4]);
		$valNameEn=chechNullVal($valNameEn);

					if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
							$valNameShow=$valName;
					}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
							$valNameShow=$valNameEn;
					}
		
    ?>
  <tr>
    <td width="31" align="center" height="25" valign="top">&bull;</td>
    <td  align="left"  valign="top"><a href="../<?=$mod_fd_root?>/viewContant.php?masterkey=<?=$_REQUEST['masterkey']?>&menukeyid=<?=$_REQUEST['menukeyid']?>&viewID=1&inputLt=<?=$_SESSION[$valSiteManage.'core_session_language']?>&valEditID=<?=$valID?>" class="moreDetailAb"><?=txtLimit($valNameShow,35)?></a></td>
  </tr>
  <?  } ?>
  </table>

<? }else{?>
<div style="height:140px; overflow:hidden;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="125" align="center" valign="middle"><?=$langTxt["mg:nodate"]?></td>
    </tr>
</table>
</div>
<? }?>
<script type="text/javascript">
	jQuery(function() {
		jQuery(".moreDetailAb").colorbox({width:"950", height:"600"});
	});
</script>