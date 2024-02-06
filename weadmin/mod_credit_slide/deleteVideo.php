<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");

		
	if(file_exists($mod_path_vdo."/".$_REQUEST['vdoname'])) {
		@unlink($mod_path_vdo."/".$_REQUEST['vdoname']);
	}	

	$update = array();
	if ($_REQUEST['inputLt'] == 'Thai') {
		$update[] = $mod_tb_root . "_filevdo  	=''";
	}else if($_REQUEST['inputLt'] == 'Eng'){
		$update[] = $mod_tb_root . "_filevdoen  	=''";
	}
	$sql = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $_REQUEST["valEditID"] . "'  ";
	$Query = wewebQueryDB($coreLanguageSQL, $sql);

			
include("../lib/disconnect.php");
?>