<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

$sql = " SELECT 
".$mod_tb_root_short.".".$mod_tb_root_short."_id as id,
".$mod_tb_root_short.".".$mod_tb_root_short."_masterkey as masterkey,
".$mod_tb_root_short.".".$mod_tb_root_short."_short_url as short_url,
".$mod_tb_root_short.".".$mod_tb_root_short."_long_url as long_url
FROM
".$mod_tb_root_short."
WHERE
".$mod_tb_root_short.".".$mod_tb_root_short."_masterkey = '".$_REQUEST['masterkey']."'
AND ".$mod_tb_root_short.".".$mod_tb_root_short."_short_url = '".$_REQUEST['inputShortUrl']."'
";

if (!empty($_REQUEST['valEditID'])) {
	$sql .= " AND ".$mod_tb_root_short.".".$mod_tb_root_short."_contantid != '".$_REQUEST['valEditID']."' ";
}

$qeury = wewebQueryDB($coreLanguageSQL, $sql);
$numOfRow = wewebNumRowsDB($coreLanguageSQL, $qeury);

$arrJson = array();
if($numOfRow == 0){
	$arrJson['status'] = 'Allowed';
	$arrJson['msg'] = 'สามารถใช้งานได้';
	$arrJson['color'] = 'green';
}else{
	$arrJson['status'] = 'Disabled';
	$arrJson['msg'] = 'ไม่สามารถใช้ได้';
	$arrJson['color'] = 'red';
}

echo json_encode($arrJson);

?>

<?php		
include("../lib/disconnect.php");
?>