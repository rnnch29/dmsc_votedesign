<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

for($i=1;$i<=$_REQUEST['TotalCheckBoxID'];$i++) {
 $myVar=$_REQUEST['CheckBoxID'.$i];


	if(strlen($myVar)>=1) {
	$permissionID=$myVar;
		
			$sql = "SELECT  ".$mod_tb_root."_pic," .$mod_tb_root."_filevdo, "
			.$mod_tb_root."_picen," .$mod_tb_root."_filevdoen
			FROM " .$mod_tb_root." WHERE  ".$mod_tb_root."_id='".$permissionID."' ";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$deletepic =$Row[0];
			$deletevdo =$Row[1];

			$deletepicEN =$Row[2];
			$deletevdoEN =$Row[3];
			//print_pre($sql);
			
			######################### Delete  In Folder Pic ###############################
			if(file_exists($mod_path_pictures."/".$deletepic)) {
				@unlink($mod_path_pictures."/".$deletepic);
			}
			
			if(file_exists($mod_path_office."/".$deletepic)) {
				@unlink($mod_path_office."/".$deletepic);
			}
			
			if(file_exists($mod_path_real."/".$deletepic)) {
				@unlink($mod_path_real."/".$deletepic);
			}

			if(file_exists($mod_path_vdo."/".$deletevdo)) {
				@unlink($mod_path_vdo."/".$deletevdo);
			}

			######################### Delete  In Folder Pic ENGLISH ###############################
			if(file_exists($mod_path_pictures."/".$deletepicEN)) {
				@unlink($mod_path_pictures."/".$deletepicEN);
			}
						
			if(file_exists($mod_path_office."/".$deletepicEN)) {
				@unlink($mod_path_office."/".$deletepicEN);
			}
						
			if(file_exists($mod_path_real."/".$deletepicEN)) {
				@unlink($mod_path_real."/".$deletepicEN);
			}
			
			if(file_exists($mod_path_vdo."/".$deletevdoEN)) {
				@unlink($mod_path_vdo."/".$deletevdoEN);
			}

			######################### Delete  Contant ###############################
			$sql="DELETE FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_id=".$permissionID." ";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
		
		}}
		 logs_access('3','Delete');

		############################### Update Json  #################################
		UpdateChat($core_full_path);
		############################### Update Json  #################################
	?>
<?php include("../lib/disconnect.php");?>
<form action="index.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST['menukeyid']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST['module_orderby']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?php echo $_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?php echo $_REQUEST['inputGh']?>" />
    <input name="inputTh" type="hidden" id="inputTh" value="<?php echo $_REQUEST['inputTh']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>