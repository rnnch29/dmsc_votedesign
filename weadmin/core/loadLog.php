<?php
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../lib/checkMemberSA.php");
include("../core/incLang.php");
 
// Value SQL SELECT #########################
$sqlSelect = "".$core_tb_vote."_suggest,".$core_tb_vote."_credate";

	if($coreLanguageSQL=="mssql"){
	$valLimitTop ="TOP (10)";
	$valLimitMysql ="";
	}else{
	$valLimitTop ="";
	$valLimitMysql =" LIMIT 0,10";
	}
	$sqlLogs="SELECT ".$valLimitTop." ".$sqlSelect."    FROM ".$core_tb_vote." WHERE   ".$core_tb_vote."_id >=1 ORDER BY ".$core_tb_vote."_credate DESC  ".$valLimitMysql."";
	
	// print_r($sqlLogs);die();
	$queryLogs=wewebQueryDB($coreLanguageSQL,$sqlLogs);
	$countLogs=wewebNumRowsDB($coreLanguageSQL,$queryLogs);
	if($countLogs>=1){
	$indexLog=0;
	?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >

  

<tr>
    <td width="15%" height="30" align="center"  class="divRightTrHomeLog" valign="top"><b><?php echo $langTxt["mg:suggest"]?></b></td>
    <td width="15%" align="center"  class="divRightTrHomeLog" valign="top"><b><?php echo $langTxt["home:date"]?></b></td>
  </tr>

    <?php
	while($rowLogs=wewebFetchArrayDB($coreLanguageSQL,$queryLogs)) {
	$indexLog++;
		$valSug=$rowLogs[0];
		$valDate=$rowLogs[1];



		
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			$valNameUser= getUserThai($valSid);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			$valNameUser= getUserEng($valSid);
		}

	if($indexLog<$countLogs){
		 $valClassTrLog="divRightTrHomeLog";
	}else{
		 $valClassTrLog="";
	}
   ?>
     <tr>

	 <td height="35" align="center" class="<?php echo $valClassTrLog?>">
    <?php echo isset($valSug) && $valSug !== '' ? $valSug : '-'; ?>
</td>

	
    <td align="center"  class="<?php echo $valClassTrLog?>"><?php echo $valDate?></td> 


  </tr>
   <?php }?>
   </table>
<?php  }?>
<?php include("../lib/disconnect.php");?>
