<?php
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("incModLang.php");
include("config.php");
$sql_group = "SELECT ";
if ($_REQUEST['inputLt'] == "Thai") {
    $sql_group .= "  " . $mod_tb_root_subgroup . "_id," . $mod_tb_root_subgroup . "_subject";
} else if($_REQUEST['inputLt'] == "Eng") {
    $sql_group .= " " . $mod_tb_root_subgroup . "_id," . $mod_tb_root_subgroup . "_subjecten ";
} 

$sql_group .= " 
FROM " . $mod_tb_root_subgroup . " 
WHERE 
" . $mod_tb_root_subgroup . "_masterkey ='" . $_REQUEST['masterkey'] . "' AND
" . $mod_tb_root_subgroup . "_gid ='" . $_REQUEST['inputGroupID'] . "'
ORDER BY " . $mod_tb_root_subgroup . "_order DESC ";




$query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
$numrow_group = wewebNumRowsDB($coreLanguageSQL, $query_group);



// print_pre($sql_group);
// print_pre($numrow_group);
if ($numrow_group > 0) {
?>

<td width="18%" align="right" valign="top" class="formLeftContantTb"><?php echo $langMod["tit:selectsgn"] ?><span class="fontContantAlert">*</span></td>
<td width="82%" colspan="6" align="left" valign="top" class="formRightContantTb">
    <select name="inputSubGroupID" id="inputSubGroupID" class="formSelectContantTb">
        <option value="0"><?php echo $langMod["tit:selectsg"] ?></option>
        <?php

        $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
        while ($row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group)) {
            $row_groupid = $row_group[0];
            $row_groupname = $row_group[1];
        ?>
            <option value="<?php echo $row_groupid ?>" <?php if ($_REQUEST['inputGh2'] == $row_groupid) { ?> selected="selected" <?php } ?>><?php echo $row_groupname ?></option>
        <?php } ?>
    </select>
    <input name="inputSubType" id="inputSubType" type="hidden" value="1" class="formInputContantTb" />
</td>


<?php } ?>