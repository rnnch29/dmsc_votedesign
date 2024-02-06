<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

if ($_REQUEST['execute'] == 'update') {
	$sql = "SELECT 
	".$mod_tb_root."_id,
	".$mod_tb_root."_urlfriendly as urlfriendly

	FROM ".$mod_tb_root." 

	WHERE  ".$mod_tb_root."_masterkey = '".$_REQUEST['masterkey']."'    ";
	$sql = $sql."  AND ".$mod_tb_root."_urlfriendly ='".$_REQUEST['inputUrlFriendly']."'   ";
	$sql = $sql."  AND ".$mod_tb_root."_id !='".$_REQUEST['valEditID']."'   ";
	$query=wewebQueryDB($coreLanguageSQL,$sql);
}else{
	$sql = "SELECT 
	".$mod_tb_root."_id,
	".$mod_tb_root."_urlfriendly as urlfriendly

	FROM ".$mod_tb_root." 

	WHERE  ".$mod_tb_root."_masterkey = '".$_REQUEST['masterkey']."'    ";
	$sql = $sql."  AND ".$mod_tb_root."_urlfriendly ='".$_REQUEST['inputUrlFriendly']."'   ";
	$query=wewebQueryDB($coreLanguageSQL,$sql);
}

if($query->_numOfRows == 0){
	$listreturn['status'] = 'Allowed';
	$listreturn['msg'] = 'สามารถใช้งานได้';
	$listreturn['color'] = 'green';
}else{
	$listreturn['status'] = 'Disabled';
	$listreturn['msg'] = 'ไม่สามารถใช้ได้';
	$listreturn['color'] = 'red';
}
echo json_encode($listreturn);

?>

<?php		
include("../lib/disconnect.php");
?>