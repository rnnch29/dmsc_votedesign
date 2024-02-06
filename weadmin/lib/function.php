<?
global $valSiteManage, $coreLanguageSQL;
$core_session_language = $_SESSION[$valSiteManage . 'core_session_language'];
$core_session_memberid = $_SESSION[$valSiteManage."core_session_id"];

########################################################################################

function logs_access($action, $actionType) {
########################################################################################
    global $core_pathname_logs, $masterkey, $menukeyid, $execute, $core_tb_log, $valSiteManage, $coreLanguageSQL;

    $CurrentPath = $core_pathname_logs . "";
    if (!is_dir($CurrentPath)) {
        mkdir($CurrentPath, 0777);
    }

    $myDateNow = date("Y-m-d");
    $myTimeNow = date("H:i:s");

    if ($action == 1) {

        if (!is_dir($CurrentPath . "/login")) {
            mkdir($CurrentPath . "/login", 0777);
        }
        $logsfile = $CurrentPath . "/login/" . $myDateNow . ".logs";
        if (!is_file($logsfile)) {
            $fp = @fopen($logsfile, 'w+');
            fwrite($fp, $actionType . "|:|" . session_id() . "|:|" . $action . "|:|" . $_SESSION[$valSiteManage . "core_session_id"] . "|:|" . $_SESSION[$valSiteManage . "core_session_name"] . "|:|" . get_real_ip() . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
            fclose($fp);
            chmod($logsfile, 0666);
        } else {
            $fp = @fopen($logsfile, 'a');
            fwrite($fp, $actionType . "|:|" . session_id() . "|:|" . $action . "|:|" . $_SESSION[$valSiteManage . "core_session_id"] . "|:|" . $_SESSION[$valSiteManage . "core_session_name"] . "|:|" . get_real_ip() . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
            fclose($fp);
        }

        /* ################## Start Insert Login DB ########################## */

        $insert[$core_tb_log . "_action"] = "'" . $actionType . "'";
        $insert[$core_tb_log . "_sessid"] = "'" . session_id() . "'";
        $insert[$core_tb_log . "_sid"] = "'" . $_SESSION[$valSiteManage . "core_session_id"] . "'";
        $insert[$core_tb_log . "_sname"] = "'" . $_SESSION[$valSiteManage . "core_session_name"] . "'";
        $insert[$core_tb_log . "_ip"] = "'" . get_real_ip() . "'";
        $insert[$core_tb_log . "_time"] = "" . wewebNow($coreLanguageSQL) . "";
        $insert[$core_tb_log . "_type"] = "'Login'";
        $insert[$core_tb_log . "_actiontype"] = "'" . $action . "'";

        $sqlLog = "INSERT INTO " . $core_tb_log . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
        $queryLog = wewebQueryDB($coreLanguageSQL, $sqlLog);

        /* ################## End Insert Login DB ########################## */
    } else if ($action == 2) {
        if ($_SESSION[$valSiteManage . "core_session_id"] > 0) {
            if (!is_dir($CurrentPath . "/access-user")) {
                mkdir($CurrentPath . "/access-user", 0777);
            } # ÊÃéÒ§ path
            $logsfile = $CurrentPath . "/access-user/" . $myDateNow . "_" . $_SESSION[$valSiteManage . "core_session_id"] . ".logs";

            if (!is_file($logsfile)) {
                $fp = @fopen($logsfile, 'w+');
                fwrite($fp, $actionType . "|:|" . session_id() . "|:|" . $action . "|:|" . _getURL() . "|:|" . $masterkey . "|:|" . $menukeyid . "|:|" . $_SESSION[$valSiteManage . "core_session_id"] . "|:|" . $_SESSION[$valSiteManage . "core_session_name"] . "|:|" . get_real_ip() . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
                fclose($fp);
                chmod($logsfile, 0666);
            } else {
                $fp = @fopen($logsfile, 'a');
                fwrite($fp, $actionType . "|:|" . session_id() . "|:|" . $action . "|:|" . _getURL() . "|:|" . $masterkey . "|:|" . $menukeyid . "|:|" . $_SESSION[$valSiteManage . "core_session_id"] . "|:|" . $_SESSION[$valSiteManage . "core_session_name"] . "|:|" . get_real_ip() . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
                fclose($fp);
            }



            /* ################## Start Insert Access User DB ########################## */

            $insert[$core_tb_log . "_action"] = "'" . $actionType . "'";
            $insert[$core_tb_log . "_sessid"] = "'" . session_id() . "'";
            $insert[$core_tb_log . "_sid"] = "'" . $_SESSION[$valSiteManage . "core_session_id"] . "'";
            $insert[$core_tb_log . "_sname"] = "'" . $_SESSION[$valSiteManage . "core_session_name"] . "'";
            $insert[$core_tb_log . "_ip"] = "'" . get_real_ip() . "'";
            $insert[$core_tb_log . "_time"] = "" . wewebNow($coreLanguageSQL) . "";
            $insert[$core_tb_log . "_type"] = "'Access User'";
            $insert[$core_tb_log . "_actiontype"] = "'" . $action . "'";
            $insert[$core_tb_log . "_url"] = "'" . _getURL() . "'";
            $insert[$core_tb_log . "_key"] = "'" . $masterkey . "'";
            $insert[$core_tb_log . "_menuid"] = "'" . $menukeyid . "'";

            $sqlLog = "INSERT INTO " . $core_tb_log . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $queryLog = wewebQueryDB($coreLanguageSQL, $sqlLog);

            /* ################## End Insert Access User DB ########################## */
        }
    } else if ($action == 3) {
        if ($_SESSION[$valSiteManage . "core_session_id"] > 0) {
            if (!is_dir($CurrentPath . "/access-action")) {
                mkdir($CurrentPath . "/access-action", 0777);
            } # ÊÃéÒ§ path
            $logsfile = $CurrentPath . "/access-action/" . $myDateNow . "_" . $_SESSION[$valSiteManage . "core_session_id"] . ".logs";

            if (!is_file($logsfile)) {
                $fp = @fopen($logsfile, 'w+');
                fwrite($fp, $actionType . "|:|" . session_id() . "|:|" . $action . "|:|" . _getURL() . "|:|" . $masterkey . "|:|" . $menukeyid . "|:|" . $execute . "|:|" . $_SESSION[$valSiteManage . "core_session_id"] . "|:|" . $_SESSION[$valSiteManage . "core_session_name"] . "|:|" . get_real_ip() . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
                fclose($fp);
                chmod($logsfile, 0666);
            } else {
                $fp = @fopen($logsfile, 'a');
                fwrite($fp, $actionType . "|:|" . session_id() . "|:|" . $action . "|:|" . _getURL() . "|:|" . $masterkey . "|:|" . $menukeyid . "|:|" . $execute . "|:|" . $_SESSION[$valSiteManage . "core_session_id"] . "|:|" . $_SESSION[$valSiteManage . "core_session_name"] . "|:|" . get_real_ip() . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
                fclose($fp);
            }


            /* ################## Start Insert Access User DB ########################## */

            $insert[$core_tb_log . "_action"] = "'" . $actionType . "'";
            $insert[$core_tb_log . "_sessid"] = "'" . session_id() . "'";
            $insert[$core_tb_log . "_sid"] = "'" . $_SESSION[$valSiteManage . "core_session_id"] . "'";
            $insert[$core_tb_log . "_sname"] = "'" . $_SESSION[$valSiteManage . "core_session_name"] . "'";
            $insert[$core_tb_log . "_ip"] = "'" . get_real_ip() . "'";
            $insert[$core_tb_log . "_time"] = "" . wewebNow($coreLanguageSQL) . "";
            $insert[$core_tb_log . "_type"] = "'Access Menu'";
            $insert[$core_tb_log . "_actiontype"] = "'" . $action . "'";
            $insert[$core_tb_log . "_url"] = "'" . _getURL() . "'";
            $insert[$core_tb_log . "_key"] = "'" . $masterkey . "'";
            $insert[$core_tb_log . "_menuid"] = "'" . $menukeyid . "'";

            $sqlLog = "INSERT INTO " . $core_tb_log . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $queryLog = wewebQueryDB($coreLanguageSQL, $sqlLog);

            /* ################## End Insert Access User DB ########################## */
        }
    } else if ($action == 4) {
        if ($_SESSION[$valSiteManage . "core_session_id"] > 0) {
            if (!is_dir($CurrentPath . "/access-permission")) {
                mkdir($CurrentPath . "/access-permission", 0777);
            } # ÊÃéÒ§ path
            $logsfile = $CurrentPath . "/access-permission/" . $myDateNow . "_" . $_SESSION[$valSiteManage . "core_session_id"] . ".logs";

            if (!is_file($logsfile)) {
                $fp = @fopen($logsfile, 'w+');
                fwrite($fp, $actionType . "|:|" . session_id() . "|:|" . $action . "|:|" . _getURL() . "|:|" . $masterkey . "|:|" . $menukeyid . "|:|" . $_SESSION[$valSiteManage . "core_session_id"] . "|:|" . $_SESSION[$valSiteManage . "core_session_name"] . "|:|" . get_real_ip() . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
                fclose($fp);
                chmod($logsfile, 0666);
            } else {
                $fp = @fopen($logsfile, 'a');
                fwrite($fp, $actionType . "|:|" . session_id() . "|:|" . $action . "|:|" . _getURL() . "|:|" . $masterkey . "|:|" . $menukeyid . "|:|" . $_SESSION[$valSiteManage . "core_session_id"] . "|:|" . $_SESSION[$valSiteManage . "core_session_name"] . "|:|" . get_real_ip() . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
                fclose($fp);
            }


            /* ################## Start Insert Access User DB ########################## */

            $insert[$core_tb_log . "_action"] = "'" . $actionType . "'";
            $insert[$core_tb_log . "_sessid"] = "'" . session_id() . "'";
            $insert[$core_tb_log . "_sid"] = "'" . $_SESSION[$valSiteManage . "core_session_id"] . "'";
            $insert[$core_tb_log . "_sname"] = "'" . $_SESSION[$valSiteManage . "core_session_name"] . "'";
            $insert[$core_tb_log . "_ip"] = "'" . get_real_ip() . "'";
            $insert[$core_tb_log . "_time"] = "" . wewebNow($coreLanguageSQL) . "";
            $insert[$core_tb_log . "_type"] = "'Access Permission'";
            $insert[$core_tb_log . "_actiontype"] = "'" . $action . "'";
            $insert[$core_tb_log . "_url"] = "'" . _getURL() . "'";
            $insert[$core_tb_log . "_key"] = "'" . $masterkey . "'";
            $insert[$core_tb_log . "_menuid"] = "'" . $menukeyid . "'";

            $sqlLog = "INSERT INTO " . $core_tb_log . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            $queryLog = wewebQueryDB($coreLanguageSQL, $sqlLog);

            /* ################## End Insert Access User DB ########################## */
        }
    } else {

    }
}

############################################

function get_real_ip() {
############################################
    $ip = false;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = false;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i])) {
                if (version_compare(phpversion(), "5.0.0", ">=")) {
                    if (ip2long($ips[$i]) != false) {
                        $ip = $ips[$i];
                        break;
                    }
                } else {
                    if (ip2long($ips[$i]) != - 1) {
                        $ip = $ips[$i];
                        break;
                    }
                }
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

############################################

function _getURL() {
############################################
    $Parameter = (strlen($_SERVER["QUERY_STRING"]) > 0) ? "?" . $_SERVER["QUERY_STRING"] : "";
    return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"] . $Parameter; #$_SERVER['REQUEST_URI'];
}

############################################
function changeQuot($Data) {
############################################
global $dbConnect;


	if(!is_numeric($Data) && !is_array($Data)){
		$valTrim = trim($Data);
	}else{
		$valTrim = $Data;
	}
	$valChangeQuot=wewebEscape($dbConnect,$valTrim);
	//$valChangeQuot=str_replace("'","&rsquo;",str_replace('"','&quot;',$valChangeQuot));
	$valChangeQuot= str_replace("'","&rsquo;",str_replace('"','&quot;',$valChangeQuot));

	return $valChangeQuot;
}

############################################
function sanitize ($input){
############################################
global $dbConnect;

     if(get_magic_quotes_gpc()) { //check if magic_quotes is on;
          $input = stripslashes($input); //it is, so strip any slashes and prepare for next step;
     }
     //if get_magic_quotes_gpc() is on, slashes were already stripped .. if it's off, mysql_real_escape_string() will take care of the rest;
     $output = addslashes($input);

     return $output;
}

############################################
function rechangeQuot($Data) {
############################################
	$valChangeQuot=htmlspecialchars(str_replace("&rsquo;","'",str_replace('&quot;','"',$Data)));
	return $valChangeQuot;
}

############################################
function encodeStr($variable) { 
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
############################################
function decodeStr($enVariable) { 
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

//#################################################
function encodeURL($variable)
{
    //#################################################
    //-- ฟังก์ชั่นการเข้ารหัส ตัวแปรแบบ GET ผ่าน URL

    $key = "xitgmLwmp";
    $index = 0;
    $temp = "";
    $variable = str_replace("=", "๐O", $variable);
    for ($i = 0; $i < strlen($variable); $i++) {
        $temp .= $variable[$i] . $key[$index];
        $index++;
        if ($index >= strlen($key))
            $index = 0;
    }
    $variable = strrev($temp);
    $variable = base64_encode($variable);
    $variable = utf8_encode($variable);
    $variable = urlencode($variable);
    $variable = str_rot13($variable);

    $variable = str_replace("%", "o7o", $variable);
    return "WP=" . $variable;
}

//#################################################
function decodeURL($enVariable)
{
    //#################################################
    //-- ฟังก์ชั่นการถอดรหัส ตัวแปรแบบ GET ผ่าน URL
    // การใช้งาน decodeURL($_SERVER["QUERY_STRING"]);
    $key = "xitgmLwmp";

    $ex = explode("WP=", $enVariable);
    $enVariable = $ex[1];
    $enVariable = str_replace("o7o", "%", $enVariable);

    $enVariable = str_rot13($enVariable);
    $enVariable = urldecode($enVariable);
    $enVariable = utf8_decode($enVariable);
    $enVariable = base64_decode($enVariable);
    $enVariable = strrev($enVariable);

    $current = 0;
    $temp = "";
    for ($i = 0; $i < strlen($enVariable); $i++) {
        if ($current % 2 == 0) {
            $temp .= $enVariable[$i];
        }
        $current++;
    }
    $temp = str_replace("๐O", "=", $temp);

    parse_str($temp, $variable);
    //echo "temp=".$temp;

    foreach ($variable as $key => $value) {
        $_REQUEST[$key] = $value;
        global $$key;
        $$key = $value;
    }
}

//#################################################
function DateFormat($DateTime) {
//#################################################
    global $core_session_language;
    $DateTime = date("Y-m-d H:i", strtotime($DateTime));

    $DateTimeArr = explode(" ", $DateTime);
    $Date = $DateTimeArr[0];
    $Time = $DateTimeArr[1];

    $DateArr = explode("-", $Date);

    if ($core_session_language == "Thai")
        $DateArr[0] = ($DateArr[0] + 543);

    return $DateArr[2] . "/" . $DateArr[1] . "/" . $DateArr[0] . " " . $Time;
}

//#################################################
function DateFormatPdf($DateTime) {
//#################################################
    global $core_session_language;
    $DateTime = date("Y-m-d H:i", strtotime($DateTime));

    $DateTimeArr = explode(" ", $DateTime);
    $Date = $DateTimeArr[0];
    $Time = $DateTimeArr[1];

    $DateArr = explode("-", $Date);

    if ($core_session_language == "Thai")
        $DateArr[0] = ($DateArr[0] + 543);

    return $DateArr[2] . "/" . $DateArr[1] . "/" . $DateArr[0];
}

//#################################################
function DateFormatPdfChk($DateTime) {
//#################################################
    global $core_session_language;
    $DateTime = date("Y-m-d H:i", strtotime($DateTime));

    $DateTimeArr = explode(" ", $DateTime);
    $Date = $DateTimeArr[0];
    $Time = $DateTimeArr[1];

    $DateArr = explode("-", $Date);



    return $DateArr[0] . "-" . $DateArr[1] . "-" . $DateArr[2];
}

//#################################################
function DateFormatPdfTime($DateTime) {
//#################################################
    global $core_session_language;
    $DateTime = date("Y-m-d H:i", strtotime($DateTime));

    $DateTimeArr = explode(" ", $DateTime);
    $Date = $DateTimeArr[0];
    $Time = $DateTimeArr[1];

    $DateArr = explode("-", $Date);

    if ($core_session_language == "Thai")
        $DateArr[0] = ($DateArr[0] + 543);

    return $Time;
}

//#################################################
function dateFormatReal($DateTime,$type=true) {
//#################################################
    global $core_session_language;
    if ($DateTime == "0000-00-00 00:00:00") {
        $valReturnData = "";
    } else {
        $DateTime = date("Y-m-d H:i", strtotime($DateTime));

        if ($DateTime != "") {
            $DateTimeArr = explode(" ", $DateTime);
            $Date = $DateTimeArr[0];
            $Time = $DateTimeArr[1];

            $DateArr = explode("-", $Date);

            if ($core_session_language == "Thai")
                $DateArr[0] = ($DateArr[0] + 543);
            $valReturnData = $DateArr[2] . "/" . $DateArr[1] . "/" . $DateArr[0];
        }else {
            $valReturnData = "-";
        }
    }
    return $valReturnData;
}

//#################################################
function timeFormatReal($DateTime) {
//#################################################
    global $core_session_language;
    $DateTime = date("Y-m-d H:i", strtotime($DateTime));

    $DateTimeArr = explode(" ", $DateTime);
    $Date = $DateTimeArr[0];
    $Time = $DateTimeArr[1];

    $timeArr = explode(":", $Time);


    return $timeArr[0] . ":" . $timeArr[1];
}

############################################
function getUserEng($myUserID) {
############################################
    global $core_db_name, $core_tb_staff, $coreLanguageSQL;


    $sql = "SELECT " . $core_tb_staff . "," . $core_tb_staff . "_lnameeng  FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_id='" . $myUserID . "'";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
    if ($RecordCount >= 1) {
        $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
        $name_return = $Row[0] . " " . $Row[1];
        return($name_return);
    }
}

############################################

function getUserThai($myUserID) {
############################################
    global $core_db_name, $core_tb_staff, $coreLanguageSQL;

    $sql = "SELECT " . $core_tb_staff . "_fnamethai," . $core_tb_staff . "_lnamethai  FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_id='" . $myUserID . "'";
	//print_pre($sql);
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
    if ($RecordCount >= 1) {
        $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
        $name_return =  $Row[0] . " " . $Row[1];
    }
    return($name_return);
}

############################################

function getUserPermissionOnMenu($myUserID, $myMenuID) {
############################################
    global $core_db_name, $core_tb_permission, $coreLanguageSQL;

    $sql = "SELECT " . $core_tb_permission . "_permission  FROM " . $core_tb_permission . " WHERE " . $core_tb_permission . "_menuid='" . $myMenuID . "' AND " . $core_tb_permission . "_perid='" . $myUserID . "'";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
    if ($RecordCount >= 1) {
        $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);

        return($Row[0]);
    } else {
        return("NA");
    }
}

############################################

############################################

function getUserPermissionOnContent($myUserID, $myMenuID) {
    ############################################
        global $core_db_name, $core_tb_permission, $coreLanguageSQL;
    
        $sql = "SELECT " . $core_tb_permission . "_permission  FROM " . $core_tb_permission . " WHERE " . $core_tb_permission . "_menuid='" . $myMenuID . "' AND " . $core_tb_permission . "_perid='" . $myUserID . "'";
        $Query = wewebQueryDB($coreLanguageSQL, $sql);
        
        $RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
        if ($RecordCount >= 1) {
            $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
            return($Row[0]);
        } else {
            return("NA");
        }

    }

############################################









function resize($img, $w, $h, $newfilename) {
############################################
    //Check if GD extension is loaded
    if (!extension_loaded('gd') && !extension_loaded('gd2')) {
        trigger_error("GD is not loaded", E_USER_WARNING);
        return false;
    }

    //Get Image size info
    $imgInfo = getimagesize($img);
    switch ($imgInfo[2]) {
        case 1: $im = imagecreatefromgif($img);
            break;
        case 2: $im = imagecreatefromjpeg($img);
            break;
        case 3: $im = imagecreatefrompng($img);
            break;
        default: trigger_error('Unsupported filetype!', E_USER_WARNING);
            break;
    }

    //If image dimension is smaller, do not resize
    if ($imgInfo[0] <= $w && $imgInfo[1] <= $h) {
        $nHeight = $imgInfo[1];
        $nWidth = $imgInfo[0];
    } else {
        //yeah, resize it, but keep it proportional
        if ($w / $imgInfo[0] > $h / $imgInfo[1]) {
            $nWidth = $w;
            $nHeight = $imgInfo[1] * ($w / $imgInfo[0]);
        } else {
            $nWidth = $imgInfo[0] * ($h / $imgInfo[1]);
            $nHeight = $h;
        }
    }
    $nWidth = round($nWidth);
    $nHeight = round($nHeight);

    $newImg = imagecreatetruecolor($nWidth, $nHeight);

    /* Check if this image is PNG or GIF, then set if Transparent */
    if (($imgInfo[2] == 1) OR ( $imgInfo[2] == 3)) {
        imagealphablending($newImg, false);
        imagesavealpha($newImg, true);
        $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
        imagefilledrectangle($newImg, 0, 0, $nWidth, $nHeight, $transparent);
    }
    imagecopyresampled($newImg, $im, 0, 0, 0, 0, $nWidth, $nHeight, $imgInfo[0], $imgInfo[1]);

    //Generate the file, and rename it to $newfilename
    switch ($imgInfo[2]) {
        case 1: imagegif($newImg, $newfilename);
            break;
        case 2: imagejpeg($newImg, $newfilename);
            break;
        case 3: imagepng($newImg, $newfilename);
            break;
        default: trigger_error('Failed resize image!', E_USER_WARNING);
            break;
    }

    return $newfilename;
}

############################################

function load_picmemberBack($creid) {
############################################
    global $core_tb_staff, $coreLanguageSQL;

    $sql_pic = "SELECT " . $core_tb_staff . "_picture FROM " . $core_tb_staff . " WHERE   " . $core_tb_staff . "_id 	='" . $creid . "'";
    $query_pic = wewebQueryDB($coreLanguageSQL, $sql_pic);
    $row_pic = wewebFetchArrayDB($coreLanguageSQL, $query_pic);
    $txt_pic_funtion = "../../upload/core/50/" . $row_pic[0];

    return $txt_pic_funtion;
}

############################################
    function loadEmailAdmin($mid){
############################################
global  $core_tb_staff,$coreLanguageSQL;
         $sql_cremember = "SELECT ".$core_tb_staff."_email FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_id='".$mid."'";
        $Query_cremember=wewebQueryDB($coreLanguageSQL,$sql_cremember);
        $Row_cremember=wewebFetchArrayDB($coreLanguageSQL,$Query_cremember);
        $cremembname=$Row_cremember[0];

        return $cremembname;
}

##########################################
function getNameMenu($myID) {
############################################
    global $core_db_name, $core_tb_menu, $core_session_language, $valSiteManage, $coreLanguageSQL;

    $sql = "SELECT " . $core_tb_menu . "_namethai, " . $core_tb_menu . "_nameeng FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_id='" . $myID . "'";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
    if ($RecordCount >= 1) {
        $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
        if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
            $txt_name_menu = $Row[0];
        } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
            $txt_name_menu = $Row[1];
        }
        $name_return = $txt_name_menu;
        return($name_return);
    }
}

####################################################

function txtReplaceHTML($data) {
####################################################
    $dataHTML = str_replace("\\", "", $data);
    return $dataHTML;
}

####################################################

function get_IconSize($LinkRelativePath) {
####################################################
    $filesize = @filesize($LinkRelativePath);
    if ($filesize < 10485) {
        $sizeFile = number_format($filesize / 1024, 2) . " Kb";
    } else {
        $sizeFile = number_format($filesize / (1024 * 1024), 2) . " Mb";
    }
    return($sizeFile);
}

####################################################

function get_Icon($DownloadFile) {
####################################################
    $ImageType = strstr($DownloadFile, '.');
    if ($ImageType == ".pdf") {
        $TypeImgFile = "../img/iconfile/1.png";
    } elseif ($ImageType == ".txt") {
        $TypeImgFile = "../img/iconfile/2.png";
    } elseif ($ImageType == ".xls" || $ImageType == ".xlsx") {
        $TypeImgFile = "../img/iconfile/3.png";
    } elseif ($ImageType == ".ppt" || $ImageType == ".pptx") {
        $TypeImgFile = "../img/iconfile/4.png";
    } elseif ($ImageType == ".rtf" || $ImageType == ".doc" || $ImageType == ".docx") {
        $TypeImgFile = "../img/iconfile/5.png";
    } elseif ($ImageType == ".rar") {
        $TypeImgFile = "../img/iconfile/6.png";
    } elseif ($ImageType == ".zip") {
        $TypeImgFile = "../img/iconfile/6.png";
    } elseif ($ImageType == ".jpg" || $ImageType == ".jpeg" || $ImageType == ".gif") {
        $TypeImgFile = "../img/iconfile/7.png";
    } else {
        $TypeImgFile = "../img/iconfile/8.png";
    }
    return($TypeImgFile);
}

############################################
function getSystemLang() {
############################################
    global $core_db_name, $core_tb_setting, $coreLanguageSQL;

    $sql = "SELECT " . $core_tb_setting . "_lang FROM " . $core_tb_setting . " WHERE " . $core_tb_setting . "_id>=1";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
    if ($RecordCount >= 1) {
        $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
        $txt_name_menu = $Row[0];

        $name_return = $txt_name_menu;
        return($name_return);
    }
}

############################################

function getSystemLangType() {
############################################
    global $core_db_name, $core_tb_setting, $coreLanguageSQL;

    $sql = "SELECT " . $core_tb_setting . "_type FROM " . $core_tb_setting . " WHERE " . $core_tb_setting . "_id>=1";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
    if ($RecordCount >= 1) {
        $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
        $txt_name_menu = $Row[0];

        $name_return = $txt_name_menu;
        return($name_return);
    }
}

############################################

function getSystemLangTxt($langVal, $thaiVal, $engVal) {
############################################
    global $core_db_name, $core_tb_setting;
    if ($langVal == "Thai") {
        $txt_name_lang = $thaiVal;
    } else {
        $txt_name_lang = $engVal;
    }
    return($txt_name_lang);
}

############################################

function chechNullVal($valCheck) {
############################################
    if (trim($valCheck) == "") {
        $txt_name_check = "-";
    } else {
        $txt_name_check = $valCheck;
    }
    return($txt_name_check);
}

############################################

function utf8_strlen($s) {
############################################
    $c = strlen($s);
    $l = 0;
    for ($i = 0; $i < $c; ++$i) {
        if ((ord($s[$i]) & 0xC0) != 0x80) {
            ++$l;
        }
    }
    return $l;
}

############################################

function txtLimit($s, $n) {
############################################
    $txtcount = utf8_strlen($s);
    if ($txtcount > $n){
        return iconv_substr($s, 0, $n, "UTF-8") . "..";
    }
    else{
        return $s;
    }
}


//#################################################
function DateFormatInsertCre($DateTime) {
//#################################################
    global $core_session_language;

    if ($DateTime == "") {
        $DateTime = "00-00-0000";
    }

    $Time = date('H:i:s');

    $DateArr = explode("-", $DateTime);
    if ($core_session_language == "Thai") {
        if ($DateArr[2] >= 1) {
            $dataYear = $DateArr[2] - 543;
        } else {
            $dataYear = "0000";
        }
    } else {
        $dataYear = $DateArr[2];
    }

    if ($DateArr[1] >= 1) {
        $dataM = $DateArr[1];
    } else {
        $dataM = "00";
    }

    if ($DateArr[0] >= 1) {
        $dataD = $DateArr[0];
    } else {
        $dataD = "00";
    }


    return $dataYear . "-" . $dataM . "-" . $dataD . " " . $Time;
}

//#################################################
function ADDSTAMP($add,$to,$msg,$count,$gid){
//#################################################
return $msg." ".$add." - ".$to." | ".$count." | ".$gid;
}

//#################################################
function DateFormatInsert($DateTime, $Hour = "00", $Minute = "00") {
//#################################################
    global $core_session_language;
    if ($DateTime == "") {
        $DateTime = "00-00-0000";
    }

    // $Time = "00:00:00";
    $Time = "";
    if ($Hour != "xx" && $Minute != "xx") {
        $Time = $Hour.":".$Minute;
    }else{
        $Time = Date('H:i');
    }

    // $Time .= ":".Date('s');
    $Time .= ":00";
    

    $DateArr = explode("-", $DateTime);
    if ($core_session_language == "Thai") {
        if ($DateArr[2] >= 1) {
            $dataYear = $DateArr[2] - 543;
        } else {
            $dataYear = "0000";
        }
    } else {
        $dataYear = $DateArr[2];
    }

    if ($DateArr[1] >= 1) {
        $dataM = $DateArr[1];
    } else {
        $dataM = "00";
    }

    if ($DateArr[0] >= 1) {
        $dataD = $DateArr[0];
    } else {
        $dataD = "00";
    }

	$valReturn = $dataYear . "-" . $dataM . "-" . $dataD . " " . $Time;
//	 if ($core_session_language != "Thai") {
//	 	$valReturn =  $DateTime;
//	 }
    return $valReturn;
}


//#################################################
function DateFormatInsertTimeSp($DateTime) {
//#################################################
    global $core_session_language;
    if ($DateTime == "") {
        $DateTime = "00-00-0000";
		$DateTimeSp = "";
    }else{
		$DateTimeSp = $DateTime;
	}

    $Time = "00:00:00";

    $DateArr = explode("-", $DateTime);
    if ($core_session_language == "Thai") {
        if ($DateArr[2] >= 1) {
            $dataYear = $DateArr[2] - 543;
        } else {
            $dataYear = "0000";
        }
    } else {
        $dataYear = $DateArr[2];
    }

    if ($DateArr[1] >= 1) {
        $dataM = $DateArr[1];
    } else {
        $dataM = "00";
    }

    if ($DateArr[0] >= 1) {
        $dataD = $DateArr[0];
    } else {
        $dataD = "00";
    }
	if ($DateTimeSp == "") {
	$valReturn ="NULL";
	}else{
	$valReturn = "'".$dataYear . "-" . $dataM . "-" . $dataD . " " . $Time."'";
	}
//	 if ($core_session_language != "Thai") {
//	 	$valReturn =  $DateTime;
//	 }
    return $valReturn;
}


//#################################################
function DateFormatInsertNoTime($DateTime) {
//#################################################
    global $core_session_language;
    if ($DateTime == "") {
        $DateTime = "00-00-0000";
    }

    $Time = "00:00:00";

    $DateArr = explode("-", $DateTime);
    if ($core_session_language == "Thai") {
        if ($DateArr[2] >= 1) {
            $dataYear = $DateArr[2] - 543;
        } else {
            $dataYear = "0000";
        }
    } else {
        $dataYear = $DateArr[2];
    }

    if ($DateArr[1] >= 1) {
        $dataM = $DateArr[1];
    } else {
        $dataM = "00";
    }

    if ($DateArr[0] >= 1) {
        $dataD = $DateArr[0];
    } else {
        $dataD = "00";
    }


    return $dataYear . "-" . $dataM . "-" . $dataD;
}

//#################################################
function DateFormatInsertRe($DateTime) {
//#################################################
    global $core_session_language;

    if ($DateTime != "") {
        $DateTimeArr = explode(" ", $DateTime);
        $Date = $DateTimeArr[0];
        $Time = "00:00:00";

        $DateArr = explode("-", $Date);
        if ($core_session_language == "Thai") {
            $dataYear = $DateArr[0] + 543;
        } else {
            $dataYear = $DateArr[0];
        }

        $valReturnData = $DateArr[2] . "-" . $DateArr[1] . "-" . $dataYear;
    } else {
        $valReturnData = "";
    }

    return $valReturnData;
}

//#################################################
function TimeHourFormatInsertRe($DateTime) {
//#################################################
    // global $core_session_language;

    if ($DateTime != "") {
        $DateTimeArr = explode(" ", $DateTime);
        $Date = $DateTimeArr[0];
        $Time = $DateTimeArr[1];

        $DateArr = explode(":", $Time);
            
        $valReturnData = $DateArr[0] ;
    } else {
        $valReturnData = "";
    }

    return $valReturnData;
}

//#################################################
function TimeMinFormatInsertRe($DateTime) {
//#################################################
    // global $core_session_language;

    if ($DateTime != "") {
        $DateTimeArr = explode(" ", $DateTime);
        $Date = $DateTimeArr[0];
        $Time = $DateTimeArr[1];

        $DateArr = explode(":", $Time);
            
        $valReturnData = $DateArr[1] ;
    } else {
        $valReturnData = "";
    }

    return $valReturnData;
}

//#################################################
function DateFormatInsertReDate($DateTime) {
//#################################################
    global $core_session_language;

    if ($DateTime != "") {
        $DateTimeArr = explode(" ", $DateTime);
        $Date = $DateTimeArr[0];
        $Time = "00:00:00";

        $DateArr = explode("-", $Date);
        if ($core_session_language == "Thai") {
            $dataYear = $DateArr[0] + 543;
        } else {
            $dataYear = $DateArr[0];
        }

        $valReturnData =  $dataYear. "-" . $DateArr[1] . "-" . $DateArr[2];
    } else {
        $valReturnData = "";
    }

    return $valReturnData;
}

####################################################

function txtReplaceDownload($data) {
####################################################
    $dataHTML = str_replace(" ", "_", $data);
    return $dataHTML;
}

####################################################

function strip_tags_content($text, $tags = '', $invert = FALSE) {
####################################################
    preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
    $tags = array_unique($tags[1]);

    if (is_array($tags) AND count($tags) > 0) {
        if ($invert == FALSE) {
            return preg_replace('@<(?!(?:' . implode('|', $tags) . ')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
        } else {
            return preg_replace('@<(' . implode('|', $tags) . ')\b.*?>.*?</\1>@si', '', $text);
        }
    } elseif ($invert == FALSE) {
        return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
    }
    return $text;
}


############################################

function checkValueContantBank($valContantData) { // หาชื่อ Region ของ Database
############################################
    if (trim($valContantData) == "") {
        $valReturnValue = "-";
    } else {
        $valReturnValue = $valContantData;
    }

    return $valReturnValue;
}

############################################

function checkValueDateBank($valContantData) { // หาชื่อ Region ของ Database
############################################
    if (trim($valContantData) == "0000-00-00 00:00:00" || $valContantData == "") {
        $valReturnValue = "-";
    } else {
        $valReturnValue = dateFormatReal($valContantData);
    }

    return $valReturnValue;
}

//#################################################
function DateDiff($strDate1, $strDate2) {
//#################################################

    $Date = (strtotime($strDate2) - strtotime($strDate1)) / ( 60 * 60 * 24 );  // 1 day = 60*60*24
    return $Date;
}


/* ########################### Start  Date ################################## */
$thai_day_arr = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
$thai_month_arr = array(
    "0" => "",
    "1" => "มกราคม",
    "2" => "กุมภาพันธ์",
    "3" => "มีนาคม",
    "4" => "เมษายน",
    "5" => "พฤษภาคม",
    "6" => "มิถุนายน",
    "7" => "กรกฎาคม",
    "8" => "สิงหาคม",
    "9" => "กันยายน",
    "10" => "ตุลาคม",
    "11" => "พฤศจิกายน",
    "12" => "ธันวาคม"
);

function thai_date($time) {
    global $thai_day_arr, $thai_month_arr;
    $time = strtotime($time);
    $thai_date_return = "" . $thai_day_arr[date("w", $time)];
    $thai_date_return.= " " . date("d", $time);
    $thai_date_return.=" " . $thai_month_arr[date("n", $time)];
    $thai_date_return.= " " . (date("Yํ", $time) + 543);
    //$thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}

function thai_dateShort($time) {
    global $thai_day_arr, $thai_month_arr;
    $time = strtotime($time);
    // $thai_date_return="".$thai_day_arr[date("w",$time)];
    $thai_date_return.= " " . date("d", $time);
    $thai_date_return.=" " . $thai_month_arr[date("n", $time)];
    $thai_date_return.= " " . (date("Yํ", $time) + 543);
    //$thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}


/* ############################################### */

function loadSendEmailTo($mailTo, $mailFrom, $subjectMail, $messageMail, $typeMail) {
    /* ############################################### */
    if ($typeMail == 1) {
        $subject = "=?utf-8?B?" . base64_encode($subjectMail) . "?=";
        $header = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=utf-8\r\n";
        $header .= "From: <" . $mailFrom . ">\r\n";
        $header .= "X-Mailer: PHP/picoHosting";
        $valSendMailStatus = @mail($mailTo, $subject, $messageMail, $header);
    } else {

        $core_smtp_host = "ssl://smtp.gmail.com";
        $core_smtp_port = "465";
        $core_smtp_username = "booking@siamorchardgroup.com";
        $core_smtp_password = "lpk,Booking2016";
        $core_send_email = $mailFrom;
        $core_smtp_title = "Info Siamorchardgroup";
        $core_smtp_charSet = "utf-8";


        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->IsHTML(true); //หากส่งในรูปแบบ html ถ้าส่งเป็น text ก็ลบบรรทัดนี้ออกได้
        $mail->CharSet = $core_smtp_charSet; //กำหนด charset ของภาษาในเมล์ให้ถูกต้อง เช่น tis-620 หรือ utf-8
        $mail->Host = $core_smtp_host; //กำหนดค่าเป็นที่ gmail ได้เลยครับ
        $mail->Port = $core_smtp_port; // 25 กำหนด port เป็น 465 ตามที่ google บอกครับ
        $mail->SMTPAuth = true; // กำหนดให้มีการตรวจสอบสิทธิ์การใช้งาน
        $mail->Username = $core_smtp_username; // ต้องมีเมล์ของ gmail ที่สมัครไว้ด้วยนะครับ
        $mail->Password = $core_smtp_password; // ใส่ password ที่เราจะใช้เข้าไปเช็คเมล์ที่ gmail ล่ะครับ
        $mail->From = $core_send_email; // ผู้รับจะเห็นอีเมล์นี้เป็น ผู้ส่งเมล์
        $mail->FromName = $core_smtp_title; // ผู้รับจะเห็นชื่อนี้เป็น ชื่อผู้ส่ง
        $mail->Subject = $subjectMail;
        $mail->ClearAddresses();
        $mail->AddAddress($mailTo);
        $mail->Body = $messageMail;
        $mail->Send();

        $valSendMailStatus = 1;
    }

    return $valSendMailStatus;
}

############################################
function dateCalAddDay($valDate, $valAdd) { // หาชื่อ Room ของ Database
############################################
    $valRealDayStrtime = strtotime($valDate);
    $valRealReturn = thai_dateShort(date("Y-m-d", strtotime($valAdd . ' day', $valRealDayStrtime)));

    return $valRealReturn;
}

####################################################

function ShowDateShortTh($myDate) {
####################################################
    $myDateArray = explode("-", $myDate);
    $myDay = sprintf("%d", $myDateArray[2]);
    switch ($myDateArray[1]) {
        case "01" : $myMonth = "มกราคม";
            break;
        case "02" : $myMonth = "กุมภาพันธ์";
            break;
        case "03" : $myMonth = "มีนาคม";
            break;
        case "04" : $myMonth = "เมษายน";
            break;
        case "05" : $myMonth = "พฤษภาคม";
            break;
        case "06" : $myMonth = "มิถุนายน";
            break;
        case "07" : $myMonth = "กรกฎาคม";
            break;
        case "08" : $myMonth = "สิงหาคม";
            break;
        case "09" : $myMonth = "กันยายน";
            break;
        case "10" : $myMonth = "ตุลาคม";
            break;
        case "11" : $myMonth = "พฤศจิกายน";
            break;
        case "12" : $myMonth = "ธันวาคม";
            break;
    }
    $myYear = sprintf("%d", $myDateArray[0]) + 543;
    return($myDay . " " . $myMonth . " " . $myYear);
}

function ShowTh2($myDate) {
####################################################
    $myDateArray = explode("-", $myDate);
    $myDay = sprintf("%d", $myDateArray[2]);
    switch ($myDateArray[1]) {
        case "01" : $myMonth = "ม.ค.";
            break;
        case "02" : $myMonth = "ก.พ.";
            break;
        case "03" : $myMonth = "มี.ค.";
            break;
        case "04" : $myMonth = "เม.ย.";
            break;
        case "05" : $myMonth = "พ.ค.";
            break;
        case "06" : $myMonth = "มิ.ย.";
            break;
        case "07" : $myMonth = "ก.ค.";
            break;
        case "08" : $myMonth = "ส.ค.";
            break;
        case "09" : $myMonth = "ก.ย.";
            break;
        case "10" : $myMonth = "ต.ค.";
            break;
        case "11" : $myMonth = "พ.ย.";
            break;
        case "12" : $myMonth = "ธ.ค.";
            break;
    }
    $myYear = sprintf("%d", $myDateArray[0]) + 543;
    return($myDay . " " . $myMonth . " " . $myYear);
}

############################################
function thainumDigit($valNum) {
############################################
    $valChgNumber = str_replace(array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'), array("o", "๑", "๒", "๓", "๔", "๕", "๖", "๗", "๘", "๙"), $valNum);

    return $valChgNumber;
}

;

####################################################

function ShowTimeShortTh($myDate) {
####################################################
    $myDateArray = explode(" ", $myDate);
    $myDateArray = explode(":", $myDateArray[1]);
    $myReturn = $myDateArray[0] . ":" . $myDateArray[1];
    return($myReturn);
}

############################################
function dateDiv($t1, $t2) { // ส่งวันที่ที่ต้องการเปรียบเทียบ ในรูปแบบ มาตรฐาน 2006-03-27 21:39:12
############################################
    $t1Arr = splitTime($t1);
    $t2Arr = splitTime($t2);

    $Time1 = mktime($t1Arr["h"], $t1Arr["m"], $t1Arr["s"], $t1Arr["M"], $t1Arr["D"], $t1Arr["Y"]);
    $Time2 = mktime($t2Arr["h"], $t2Arr["m"], $t2Arr["s"], $t2Arr["M"], $t2Arr["D"], $t2Arr["Y"]);
    $TimeDiv = abs($Time2 - $Time1);

    $Time["D"] = intval($TimeDiv / 86400); // จำนวนวัน
    $Time["H"] = intval(($TimeDiv % 86400) / 3600); // จำนวน ชั่วโมง
    $Time["M"] = intval((($TimeDiv % 86400) % 3600) / 60); // จำนวน นาที
    $Time["S"] = intval(((($TimeDiv % 86400) % 3600) % 60)); // จำนวน วินาที

    $valTimeReturn = (($Time["D"] * 24) + $Time["H"]);
    if ($valTimeReturn <= 0) {
        $valTimeReturn = "";
    }

    return $valTimeReturn;
}

############################################

function dateDivMin($t1, $t2) { // ส่งวันที่ที่ต้องการเปรียบเทียบ ในรูปแบบ มาตรฐาน 2006-03-27 21:39:12
############################################
    $t1Arr = splitTime($t1);
    $t2Arr = splitTime($t2);

    $Time1 = mktime($t1Arr["h"], $t1Arr["m"], $t1Arr["s"], $t1Arr["M"], $t1Arr["D"], $t1Arr["Y"]);
    $Time2 = mktime($t2Arr["h"], $t2Arr["m"], $t2Arr["s"], $t2Arr["M"], $t2Arr["D"], $t2Arr["Y"]);
    $TimeDiv = abs($Time2 - $Time1);

    $Time["D"] = intval($TimeDiv / 86400); // จำนวนวัน
    $Time["H"] = intval(($TimeDiv % 86400) / 3600); // จำนวน ชั่วโมง
    $Time["M"] = intval((($TimeDiv % 86400) % 3600) / 60); // จำนวน นาที
    $Time["S"] = intval(((($TimeDiv % 86400) % 3600) % 60)); // จำนวน วินาที

    $valTimeReturn = $Time["M"];
    if ($valTimeReturn <= 0) {
        $valTimeReturn = "";
    }

    return $valTimeReturn;
}

############################################

function splitTime($time) { // เวลาในรูปแบบ มาตรฐาน 2006-03-27 21:39:12
############################################
    $timeArr["Y"] = substr($time, 2, 2);
    $timeArr["M"] = substr($time, 5, 2);
    $timeArr["D"] = substr($time, 8, 2);
    $timeArr["h"] = substr($time, 11, 2);
    $timeArr["m"] = substr($time, 14, 2);
    $timeArr["s"] = substr($time, 17, 2);

    return $timeArr;
}

############################################
function getUserPositionNameThai($myUserID) {
############################################
    global $core_db_name, $core_tb_staff, $coreLanguageSQL;

    $sql = "SELECT " . $core_tb_staff . "_position  FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_id='" . $myUserID . "'";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
    if ($RecordCount >= 1) {
        $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
        $name_return = $Row[0];
    }
    return($name_return);
}

############################################
function getFileDirect($myMenuID) {
############################################
    global $core_db_name, $core_tb_menu, $coreLanguageSQL;

    $sql = "SELECT " . $core_tb_menu . "_linkpath  FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_id='" . $myMenuID . "'";
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    $RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
    if ($RecordCount >= 1) {
        $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
        $txtNameLinkpath = $Row[0];
        $txt_menu_modType = explode("/", $txtNameLinkpath);
        $txtPathMod = $txt_menu_modType[1];
        $txtPathModFile = $txt_menu_modType[2];
    }
    return($txtPathModFile);
}


## print pre ##########################################
function print_pre($var, $name = '') {

    $style = "background-color: #0d0d0d; padding: 8px 8px 8px 8px; border: 1px solid black; text-align: left;position:relative;z-index:9999;font-size:14px;font-weight: bold;";
    echo "<pre style='$style'>" .
    ($name != '' ? "$name : " : '') .
    _get_info_var($var, $name) .
    "</pre>";
}

function get($var, $name = '') {
    return ($name != '' ? "$name : " : '') . _get_info_var($var, $name);
}

function _get_info_var($var, $name = '', $indent = 0) {
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
                $out .= _get_info_var($var[$key], '', $indent + 1);
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
            $out .= _get_info_var($val, $name != '' ? $prop : '', $indent + 1);
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
## print pre ##
#69f
function print_pre2($expression, $return = false, $wrap = false) {
    $css = 'color:#f0f100;border:1px dashed #06f;background:#0d0d0d;padding:1em;text-align:left;z-index:99999;font-size:14px;position:relative;font-weight: bold;';
    if ($wrap) {
        $str = '<p style="' . $css . '"><tt>' . str_replace(
                        array('  ', "\n"), array('&nbsp; ', '<br />'), htmlspecialchars(print_r($expression, true))
                ) . '</tt></p>';
    } else {
        $str = '<pre style="' . $css . '">' . print_r($expression, true) . '</pre>';
    }
    if ($return) {
        if (is_string($return) && $fh = fopen($return, 'a')) {
            fwrite($fh, $str);
            fclose($fh);
        }
        return $str;
    } else
        echo $str;
}


//#################################################
function ranDomStr($length,$id){
//#################################################
	$str2ran = $id.'abcdefghijklmnpqrstuvwxyz123456789';
	$str_result = "";
	while(strlen($str_result)<$length){
			$str_result .= substr($str2ran,(rand()%strlen($str2ran)),1);
	}
	return($str_result);
}

//#################################################
function generateRandomString($length = 3) {
//#################################################
    $characters = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function checkpageText($modLang) {
    $page = basename($_SERVER['PHP_SELF']);
  //  print_pre($page);
    switch ($page) {

## contant ##
        case 'loadAddContant.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));

        case 'loadEditContant.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
            break;

        case 'viewContant.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("ข้อมูล", "ข้อมูล"));
            break;


## group ##

        case 'loadAddGroup.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
            break;


        case 'loadEditGroup.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
            break;


        case 'viewGroup.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("ข้อมูล", "ข้อมูล"));
            break;

## set ##

        case 'loadAddSet.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
            break;

        case 'loadEditSet.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
            break;

        case 'loadSet.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("ข้อมูล", "ข้อมูล"));
            break;


## ob ##

        case 'loadAddOb.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
            break;

        case 'loadEditOb.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
            break;

        case 'viewOb.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("ข้อมูล", "ข้อมูล"));
            break;

## mem ##

        case 'loadAddMem.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
            break;

        case 'loadEditMem.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
            break;

        case 'viewMem.php':
            return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("ข้อมูล", "ข้อมูล"));
            break;

  ## Task ##

          case 'loadAddTask.php':
              return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
              break;

          case 'loadEditTask.php':
              return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("กรุณากรอก", "กรุณาเลือก"));
              break;

          case 'viewTask.php':
              return rePTxt($modLang, array("ข้อมูล", "โปรดป้อน"), "De", array("ข้อมูล", "ข้อมูล"));
              break;


        default:
            return $modLang;
            break;
    }
}


function rePTxt($txt, $txtChange, $type = null, $txtTo)
{
    // edit at 27-02-2018 ereg_ -> str_
    $listChang = array("รูปภาพ", "ไฟล์", "วีดีโอ");
    $txtCheck = "^(" . implode("|", $txtChange) . ")";
    $newTxt = array();
    foreach ($txt as $key => $value) {
        if (!empty($type)) {
            if (preg_match($type . '$', $key)) {

                if (preg_match("(" . implode("|", $listChang) . ")", $value)) {
                    $txt = str_replace($txtCheck, $txtTo[1], $value);
                } else {
                    $txt = str_replace($txtCheck, $txtTo[0], $value);
                }

                if (preg_match("นี้คือ", $txt)) {
                    $txt = str_replace("นี้คือ", "", $txt);
                }

                $checkTxtSame = array();
                foreach ($txtChange as  $valueNew) {
                    $txt = str_replace("^" . $valueNew . $valueNew, $valueNew, $txt);
                    $txt = str_replace("^" . $valueNew . " ", $valueNew, $txt);
                }


                $newTxt[$key] = $txt;
            } else {
                $newTxt[$key] = $value;
            }
        } else {
            $newTxt[$key] = $value;
        }
    }
    return $newTxt;
}


function checkStartEnd($dbname, $namestart = "_sdate", $nameend = "_edate") {
    if (!empty($dbname)) {
        //   $sqlReturn = " and (( " . $dbname . "." . $dbname . "_sdate <= Now() and " . $dbname . "." . $dbname . "_edate >= Now() ) ";
        //   $sqlReturn .= " or ( " . $dbname . "." . $dbname . "_sdate Is Null and " . $dbname . "." . $dbname . "_edate Is Null )) ";

        $sqlReturn = " and ((" . $dbname . "" . $namestart . "='0000-00-00 00:00:00' AND " . $dbname . "" . $nameend . "='0000-00-00 00:00:00')  ";
        $sqlReturn .= " OR (" . $dbname . "" . $namestart . "='0000-00-00 00:00:00' AND TO_DAYS(" . $dbname . "" . $nameend . ")>=TO_DAYS(NOW()) )";
        $sqlReturn .= " OR (TO_DAYS(" . $dbname . "" . $namestart . ")<=TO_DAYS(NOW()) AND " . $dbname . "" . $nameend . "='0000-00-00 00:00:00' ) ";
        $sqlReturn .= " OR (TO_DAYS(" . $dbname . "" . $namestart . ")<=TO_DAYS(NOW()) AND  TO_DAYS(" . $dbname . "" . $nameend . ")>=TO_DAYS(NOW())  ))";



        return $sqlReturn;
    } else {
        return FALSE;
    }
}


function checkdateexpire($date) {
    //print_pre($date);
if(!empty($date) && $date != "0000-00-00 00:00:00"){
    $startdate = $date;
    $expire = strtotime($startdate);
    $today = strtotime("today midnight");

    if ($today >= $expire) {
        return "expire";
    } else {
        return "active";
    }
} else {
     return "active";
}

    //return $date;
}

function getip() {

    $ip = false;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = false;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i])) {
                if (version_compare(phpversion(), "5.0.0", ">=")) {
                    if (ip2long($ips[$i]) != false) {
                        $ip = $ips[$i];
                        break;
                    }
                } else {
                    if (ip2long($ips[$i]) != - 1) {
                        $ip = $ips[$i];
                        break;
                    }
                }
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

function getSqlFieldLang($valLangMain) {

	if($valLangMain=="Thai"){
		$valSqlField="";
	}else{
		$valSqlField="en";
	}
   return $valSqlField;
}

############################################
function loadGetURLMinisiteByMod($valTypeUrl,$valWebsite,$valMenuID,$valLang,$valFolder,$valID){ // หา ID Hotel ของ Webservices
############################################
		$valMinisite=loadMenuSiteFolder($valMenuID);
		if($valTypeUrl==1){
			if($valID==""){
				//$valWebsiteReturn =$valWebsite."/".$valMinisite."/".$valLang."/".$valFolder;
				$valWebsiteReturn =$valMinisite."/".$valLang."/".$valFolder;
			}else{
				//$valWebsiteReturn =$valWebsite."/".$valMinisite."/".$valLang."/".$valFolder."/".$valID;
				$valWebsiteReturn =$valMinisite."/".$valLang."/".$valFolder."/".$valID;
			}
		}else{
			$valWebsiteArray =explode("://", $valWebsite);
			if($valID==""){
				$valWebsiteReturn =$valWebsiteArray[0]."://".$valMinisite.".".$valWebsiteArray[1]."/".$valLang."/".$valFolder;
			}else{
				$valWebsiteReturn =$valWebsiteArray[0]."://".$valMinisite.".".$valWebsiteArray[1]."/".$valLang."/".$valFolder."/".$valID;
			}
		}

		return $valWebsiteReturn;
}


function exportReplaceSql($valSQL) {
		$valReplaceSQL = str_replace(" ", "|we|", $valSQL);
		return $valReplaceSQL;
}

function exportUnreplaceSql($valSQL) {
		$valReplaceSQL = str_replace("|we|", " ", $valSQL);
		$valReplaceSQL = str_replace("\'", "'", $valReplaceSQL);
		return $valReplaceSQL;
}

function randomNameUpdate($valType) {
    global $valSiteManage,$coreLanguageSQL;
		$core_session_id = $_SESSION[$valSiteManage . 'core_session_id'];
		if($valType==1){
			$valRandomName =date('Ydm')."".time()."_".rand(11111, 99999)."_".$core_session_id;
		}else{
			$valRandomName =date('Ydm')."".time()."_".rand(11111, 99999)."_".$core_session_id;
		}
		return $valRandomName;
}

############################################
function str_replaceExport($valSql,$typeReplaca){  
############################################
    $valReplaceBefore =" ";
    $valReplaceAfter ="|x|";
    if($typeReplaca>=1){
            $valReplacaReturn =str_replace($valReplaceBefore,$valReplaceAfter,$valSql);
    }else{
            $valReplacaReturn =str_replace($valReplaceAfter,$valReplaceBefore,$valSql);
            $valReplacaReturn =str_replace('\\','',$valReplacaReturn);
    }
    
    return $valReplacaReturn;  
}


###########################################
function loadGetURLByMod($valWebsite,$valLang,$valFolder,$valID,$valGID){ // หา ID Hotel ของ Webservices
    ############################################
    $valWebsiteArray =explode("://", $valWebsite);
    if($valID==""){
        $valWebsiteReturn =$valWebsiteArray[0]."://".$valWebsiteArray[1]."/".$valLang."/".$valFolder;
    }elseif(!empty($valGID)){
        $valWebsiteReturn =$valWebsiteArray[0]."://".$valWebsiteArray[1]."/".$valLang."/".$valFolder."/".$valGID."/".$valID;
    }else {
        $valWebsiteReturn =$valWebsiteArray[0]."://".$valWebsiteArray[1]."/".$valLang."/".$valFolder."/".$valID;
    }
    
    return $valWebsiteReturn;
    }

############################################
    ####################################################

function ShowDateLong($myDate) {
####################################################
    $myDateArray = explode("-", $myDate);
    $myDay = sprintf("%d", $myDateArray[2]);
    switch ($myDateArray[1]) {
        case "01" : $myMonth = "มกราคม";
            break;
        case "02" : $myMonth = "กุมภาพันธ์";
            break;
        case "03" : $myMonth = "มีนาคม";
            break;
        case "04" : $myMonth = "เมษายน";
            break;
        case "05" : $myMonth = "พฤษภาคม";
            break;
        case "06" : $myMonth = "มิถุนายน";
            break;
        case "07" : $myMonth = "กรกฎาคม";
            break;
        case "08" : $myMonth = "สิงหาคม";
            break;
        case "09" : $myMonth = "กันยายน";
            break;
        case "10" : $myMonth = "ตุลาคม";
            break;
        case "11" : $myMonth = "พฤศจิกายน";
            break;
        case "12" : $myMonth = "ธันวาคม";
            break;
    }
    $myYear = sprintf("%d", $myDateArray[0]) + 543;
    return($myDay . " " . $myMonth . " " . $myYear);
}




function getCheckPermissionData($value_crebyid = null){
	global  $_SESSION,$valSiteManage;
	
  if($_SESSION[$valSiteManage.'core_session_agency']>=1){
	  if($_SESSION[$valSiteManage . 'core_session_id']==$value_crebyid){
		$value_permissionData = "RW";
	  }else{
		$value_permissionData = "NA";
	  }
  }else{
		$value_permissionData = "RW";
  }

	
	return $value_permissionData;
}

function getFileNameReal($url){
	global  $_SESSION,$valSiteManage;
	$arrayPhp = explode(".php", $url);
	$arrayPath = explode("/", $arrayPhp[0]);
	$datareturn = $arrayPath[count($arrayPath) - 1];  
  
	
	return $datareturn;
}

function getPicAddressReal($valuNameFile,$valuSync,$valuFolder,$valuMasterkey){
	global  $_SESSION,$valSiteManage,$core_pathname_upload,$core_pathtransfer_url_upload,$core_pathtransfer_name_upload,$core_pathnew_name_upload;
	if($valuSync==1){
		switch ($valuFolder) {
		  case "office":
			$datareturn =$core_pathtransfer_url_upload."/".$valuMasterkey."/office/".$valuNameFile;
			break;
		  case "pictures":
			$datareturn =$core_pathtransfer_url_upload."/".$valuMasterkey."/pictures/".$valuNameFile;
			break;
		  case "real":
			$datareturn =$core_pathtransfer_url_upload."/".$valuMasterkey."/real/".$valuNameFile;
			break;
		  case "240":
			$datareturn =$core_pathtransfer_url_upload."/".$valuMasterkey."/240/".$valuNameFile;
			break;
		  case "file":
			$datareturn =$core_pathtransfer_name_upload."/".$valuMasterkey."/file/".$valuNameFile;
			break;
		  case "html":
			$datareturn =$core_pathtransfer_name_upload."/".$valuMasterkey."/html/".$valuNameFile;
			break;
		  case "vdo":
			$datareturn =$core_pathtransfer_url_upload."/".$valuMasterkey."/vdo/".$valuNameFile;
			break;
		  default:
			$datareturn =$core_pathtransfer_url_upload."/".$valuMasterkey."/real/".$valuNameFile;
			break;
		}
		
	}else{
		switch ($valuFolder) {
		  case "office":
			$datareturn =$core_pathname_upload."/".$valuMasterkey."/office/".$valuNameFile;
			break;
		  case "pictures":
			$datareturn =$core_pathname_upload."/".$valuMasterkey."/pictures/".$valuNameFile;
			break;
		  case "real":
			$datareturn =$core_pathname_upload."/".$valuMasterkey."/real/".$valuNameFile;
			break;
		  case "240":
			$datareturn =$core_pathname_upload."/".$valuMasterkey."/240/".$valuNameFile;
			break;
		  case "file":
			$datareturn =$core_pathnew_name_upload."/".$valuMasterkey."/file/".$valuNameFile;
			break;
		  case "html":
			$datareturn =$core_pathnew_name_upload."/".$valuMasterkey."/html/".$valuNameFile;
			break;
		  case "vdo":
			$datareturn =$core_pathname_upload."/".$valuMasterkey."/vdo/".$valuNameFile;
			break;
		  default:
			$datareturn =$core_pathname_upload."/".$valuMasterkey."/real/".$valuNameFile;
			break;
		}
	}
	if($valuFolder!="file" && $valuFolder!="html" && $valuFolder!="vdo")	{
	
		if(trim($valuNameFile)==""){
				$datareturn = "https://www.dmcr.go.th/weadmin/img/btn/nopic.jpg";
		}else{
			if(file_get_contents($datareturn)) {
				$datareturn = $datareturn;
			}else{
				$datareturn = "https://www.dmcr.go.th/weadmin/img/btn/nopic.jpg";
			}
		}
		
	}
	
	return $datareturn;
}

// edit by bonz 2022-09-07
//#################################################
function DateFormatInsertNoTimeAccpet($DateTime) {
//#################################################
    global $core_session_language;
    if ($DateTime == "") {
            $DateTime = "00-00-0000";
    }

    $Time = "00:00:00";
    $DateArr = explode("-", $DateTime);
    if ($core_session_language == "Thai") {
            if ($DateArr[2] >= 1) {
                    $dataYear = $DateArr[2]-543;
            } else {
                    $dataYear = "0000";
            }
    } else {
            $dataYear = $DateArr[0];
    }

    if ($DateArr[1] >= 1) {
            $dataM = $DateArr[1];
    } else {
            $dataM = "00";
    }

    if ($DateArr[0] >= 1) {
            $dataD = $DateArr[0];
    } else {
            $dataD = "00";
    }


    return $dataYear . "-" . $dataM . "-" . $dataD;
}


  //#################################################
  function txtFormatDateDotTh($DateTime) {
  //#################################################
  	global $System_Session_Language;

  	$DateTimeArr = explode(" ",$DateTime);
  	$Date = $DateTimeArr[0];
  	$Time = $DateTimeArr[1];

  	$DateArr = explode("-",$Date);

  	if ($System_Session_Language=="Thai") $DateArr[0] = $DateArr[0] ;

  	return $DateArr[2]."-".$DateArr[1]."-".($DateArr[0]+543);
  }

  function UpdateChat($urlsite){
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $urlsite.'/th/api/home',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_SSL_VERIFYPEER => FALSE,
	));

	$response = curl_exec($curl);

	curl_close($curl);
	// echo $response;
    }
?>