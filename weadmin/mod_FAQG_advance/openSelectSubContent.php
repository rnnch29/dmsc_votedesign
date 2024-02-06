<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");
$sql_group = "SELECT ";
if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
    $sql_group .= "  " . $mod_tb_root_subgroup . "_id," . $mod_tb_root_subgroup . "_subject";
} else if($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
    $sql_group .= " " . $mod_tb_root_subgroup . "_id," . $mod_tb_root_subgroup . "_subject ";
} else {
  $sql_group .= " " . $mod_tb_root_subgroup . "_id," . $mod_tb_root_subgroup . "_subject ";
}

$sql_group .= " 
FROM " . $mod_tb_root_subgroup . " 
WHERE 
" . $mod_tb_root_subgroup . "_masterkey ='" . $_REQUEST['masterkey'] . "' AND
" . $mod_tb_root_subgroup . "_gid ='" . $_REQUEST['inputGh'] . "'
ORDER BY " . $mod_tb_root_subgroup . "_order DESC ";



$query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
$numrow_group = wewebNumRowsDB($coreLanguageSQL, $query_group);
// print_pre($_REQUEST);
// print_pre($numrow_group);
?>

<select name="inputGh2" id="inputGh2" onchange="document.myForm.submit(); " class="formSelectSearchStyle">
  <option value="0"><?php echo $langMod["tit:selectsg"] ?> </option>
  <?php
  while ($row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group)) {
      $row_groupid = $row_group[0];
      $row_groupname = $row_group[1];
  ?>
      <option value="<?php echo $row_groupid ?>" <?php if ($_REQUEST['inputGh2'] == $row_groupid) { ?> selected="selected" <?php } ?>><?php echo $row_groupname ?></option>
  <?php } ?>
</select>