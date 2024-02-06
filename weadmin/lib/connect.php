<?php
include 'adodb5/adodb.inc.php';
$dbConnect = NewADOConnection($coreLanguageSQL);

wewebConnect($coreLanguageSQL, $core_db_hostname, $core_db_username, $core_db_password, $core_db_name) or die("Warning !! N0 Connect DataBase");
/* ADODB CONNECT */

############################################
function getNameSeo($valTable, $valField) {
############################################
    global $coreLanguageSQL;
    global $dbConnect;
    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
    $sql_pic = "SELECT " . $valField . "  FROM " . $valTable . " WHERE  1=1";
	
    $row_pic = $dbConnect->execute($sql_pic);
    $txt_pic_funtion = $row_pic->fields[$valField];
	
    return $txt_pic_funtion;
}


## Core Title  ######################################################
$data_default_key = getNameSeo($core_tb_setting,$core_tb_setting."_titleB");
$fornt_name_keywords =$data_default_key;
$fornt_name_description =$data_default_key;
$core_name_title =$data_default_key;

$valNameSystem = getNameSeo($core_tb_setting,$core_tb_setting."_subject");
$valTitleSystem = getNameSeo($core_tb_setting,$core_tb_setting."_title");
$valPicSystem = getNameSeo($core_tb_setting,$core_tb_setting."_pic");
$valPicHeaderSystem = getNameSeo($core_tb_setting,$core_tb_setting."_header");
$valPicBgSystem = getNameSeo($core_tb_setting,$core_tb_setting."_bg");

/*######## Start Remove Online Prod ###############*/
	############################################
	function encodeEnv($variable) { 
	############################################
		$key = "xitgmLwmp";
		$index = 0;
		$temp="";
		$variable = str_replace("=","?O",$variable);
		for($i=0; $i < strlen($variable); $i++)
		{
								$temp .= $variable[$i].$key[$index];      
								$index++;
								if($index >= strlen($key)) $index = 0;
		}
		$variable = strrev($temp);
		$variable = base64_encode($variable);
		$variable = utf8_encode($variable);
		$variable = urlencode($variable);
		$variable = str_rot13($variable);
		return $variable;
	}
	
/*######## End Remove Online Prod ###############*/

############################################
function decodeEnv($enVariable) { 
############################################
	$enVariable = str_rot13($enVariable);
	$enVariable = urldecode($enVariable);
	$enVariable = utf8_decode($enVariable);
	$enVariable = base64_decode($enVariable);
	$enVariable = strrev($enVariable);
	$current = 0;
	$temp="";
	for($i=0; $i < strlen($enVariable); $i++)
	{
							if($current%2==0)
							{
										$temp .= $enVariable[$i];          
							}
							$current++;
	}
	$temp = str_replace("?O","=",$temp);
	parse_str($temp, $variable); 
	 return $temp;

}
############################################
function print_env($var, $name = '') {
############################################
    $style = "background-color: #0d0d0d; padding: 8px 8px 8px 8px; border: 1px solid black; text-align: left;position:relative;z-index:9999;font-size:14px;font-weight: bold;";
    echo "<pre style='$style'>" .
    ($name != '' ? "$name : " : '') .
    _get_info_var_env($var, $name) .
    "</pre>";
}


############################################
function _get_info_var_env($var, $name = '', $indent = 0) {
############################################
    static $methods = array();
    $indent > 0 or $methods = array();

    $indent_chars = '  ';
    $spc = $indent > 0 ? str_repeat($indent_chars, $indent) : '';

    $out = '';
    if (is_array($var)) {
        $out .= "<span style='color:red;'><b>Array</b></span>  <span style='color:#fff;'> " . count($var) . " </span> (\n";
        foreach (array_keys($var) as $key) {
            $out .= "$spc  <span style='color:red;'>[$key]</span><span style='color:#ffffff;'> => </span> ";
            if (($indent == 0) && ($name != '') && (!is_int($key)) && ($name == $key)) {
                $out .= "LOOP\n";
            } else {
                $out .= _get_info_var_env($var[$key], '', $indent + 1);
            }
        }
        $out .= "$spc)";
    } else if (is_object($var)) {
        $class = get_class($var);
        $out .= "<span style='color:green;'><b>Object</b></span><span style='color:#fff;'> $class </span>";
        $parent = get_parent_class($var);
        $out .= $parent != '' ? " <span style='color:green;'>extends</span> <span style='color:#fff;'> $parent </span> " : '';
        $out .= " (\n";
        $arr = get_object_vars($var);
        while (list($prop, $val) = each($arr)) {
            $out .= "$spc  " . "<span style='color:#3333ff;'>[$prop]</span><span style='color:#ffffff;'> => </span>";
            $out .= _get_info_var_env($val, $name != '' ? $prop : '', $indent + 1);
        }
        $arr = get_class_methods($var);
        // $out .= "$spc  " . "$class methods: " . count($arr) . " ";
        if (in_array($class, $methods)) {
            $out .= "[already listed]\n";
        } else {
            // $out .= "(\n";
            // $methods[] = $class;
            // while (list($prop, $val) = each($arr)) {
            //     if ($val != $class) {
            //         $out .= $indent_chars . "$spc  " . "[$val] = $arr[$prop]\n";
            //     } else {
            //         $out .= $indent_chars . "$spc  " . "[$val] [<b>constructor</b>]\n";
            //     }
            // }
            $out .= "$spc  " . ")\n";
        }
    } else {
        // $out .= "<b>Other</b> ( " . $var . " )";
        $out .=  '<span style="color:#00cc00;"><b>'.$var.'</b></span>';
    }

    return $out . "\n";
}

?>
