<?php

ob_start();
session_cache_expire(1280);
$cache_expire = session_cache_expire();
@session_start();

$valSiteManage = "mnrehub" . "_";

// Convert Variable Array To Variable
foreach( $_GET as $xVarName => $xVarvalue ) {
     ${$xVarName} = $xVarvalue;
}
 
foreach( $_POST as $xVarName => $xVarvalue ) {
     ${$xVarName} = $xVarvalue;
}

foreach( $_SESSION as $xVarName => $xVarvalue ) {
     ${$xVarName} = $xVarvalue;
}

foreach( $_COOKIE as $xVarName => $xVarvalue ) {
     ${$xVarName} = $xVarvalue;
}

foreach( $_FILES as $xVarName => $xVarvalue ) {
     ${$xVarName."_name"} = $xVarvalue['name'];
     ${$xVarName."_type"} = $xVarvalue['type'];
     ${$xVarName."_size"} = $xVarvalue['size'];
     ${$xVarName."_error"} = $xVarvalue['error'];
     ${$xVarName} = $xVarvalue['tmp_name'];
}


// Session Handle Current User Information ------------------
if (!isset($_SESSION[$valSiteManage . 'core_session_id'])) {
    $_SESSION[$valSiteManage . 'core_session_id'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_name'])) {
    $_SESSION[$valSiteManage . 'core_session_name'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_level'])) {
    $_SESSION[$valSiteManage . 'core_session_level'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_groupid'])) {
    $_SESSION[$valSiteManage . 'core_session_groupid'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_permission'])) {
    $_SESSION[$valSiteManage . 'core_session_permission'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_language'])) {
    $_SESSION[$valSiteManage . 'core_session_language'] = "Thai";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_logout'])) {
    $_SESSION[$valSiteManage . 'core_session_logout'] = "";
}

if (!isset($_SESSION[$valSiteManage . 'core_session_languageT'])) {
    $_SESSION[$valSiteManage . 'core_session_languageT'] = 1;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_usrcar'])) {
    $_SESSION[$valSiteManage . 'core_session_usrcar'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_typeproblem'])) {
    $_SESSION[$valSiteManage . 'core_session_typeproblem'] = 0;
}

if (!isset($_SESSION[$valSiteManage . 'core_session_storeid'])) {
    $_SESSION[$valSiteManage . 'core_session_storeid'] = 0;
}


## Core Cketitor #############################################
$_SESSION["myBackOfficeSession"] = "/ckeditor/upload/files/id" . $_SESSION[$valSiteManage . 'core_session_id'];
$valFolderCkEditor = "/ckeditor/upload/files/id" . $_SESSION[$valSiteManage . 'core_session_id'];

if (!empty($_SESSION[$valSiteManage . "core_session_id"])) {

    if ($_SESSION[$valSiteManage . "core_session_id"] >= 1) {
	
        if (!is_dir("../../" . $valFolderCkEditor)) {
            mkdir("../../" .$valFolderCkEditor, 0777, true);
        }
    }
}

################## Wewebplus Connect DB ##########################
function wewebConnect($valCoreDB, $valHost, $valUser, $valPass, $valDatabaseName) {
################## Set Up Function ###############################
    global $dbConnect;

    $dbConnect->Connect($valHost, $valUser, $valPass, $valDatabaseName);
    $dbConnect->charSet = 'SET NAMES utf8';

    $dbConnect->Execute("SET character_set_results=utf8");
    $dbConnect->Execute("SET collation_connection=utf8_general_ci");
    $dbConnect->Execute("SET NAMES 'utf8'");

    //$dbConnect->SetFetchMode(ADODB_FETCH_ASSOC);
    $dbConnect->cacheSecs = 3600 * 12;

    return $dbConnect;
}

################## Wewebplus Query DB ##########################

function wewebQueryDB($valCoreDB = null, $valSqlQuery = null) {
################## Set Up Function ###############################
    global $dbConnect;
    $valQueryDB = $dbConnect->execute($valSqlQuery);
    return $valQueryDB;
}

################## Wewebplus Num Rows DB ##########################

function wewebNumRowsDB($valCoreDB = null, $valQueryDB = null) {
################## Set Up Function ###############################
    return $valQueryDB->_numOfRows;
}

################## Wewebplus Fetch Array DB ##########################

function wewebFetchArrayDB($valCoreDB = null, $valQueryDB = null) {
//################## Set Up Function ###############################
    return $valQueryDB->FetchRow();
}

################## Wewebplus Now DB ##########################

function wewebNow($valCoreDB) {
################## Set Up Function ###############################
    if ($valCoreDB == "mssql") {
        $valNowDB = "GETDATE()";
    } else {
        $valNowDB = "NOW()";
    }
    return $valNowDB;
}

################## Wewebplus Insert Last ID DB ##########################

function wewebInsertID($valCoreDB = null, $valTable  = null, $valTableF  = null) {
    global $dbConnect;
################## Set Up Function ###############################
    if ($valCoreDB == "mssql") {
        $valNowDB = wewebMssqlInsertID($valTable, $valTableF);
    } else {
        
      //  $valNowDB = mysqli_insert_id();

        if(empty($valNowDB)){
            $valNowDB = $dbConnect->insert_Id();
        }

    }
    return $valNowDB;
}

################## Wewebplus Disconnect DB ##########################

function wewebDisconnect($valCoreDB) {
    global $dbConnect,$valResultDisconnect;
################## Set Up Function ##################################
    if ($valCoreDB == "mssql") {
        $valResultDisconnect = mssql_close();
    } else {
        // $valResultDisconnect = mysqli_close();
		$valResultDisconnect = $dbConnect->close();
		//if ($con) {  $valResultDisconnect = mysqli_close ($con); } 
    }

    return $valResultDisconnect;
}

################## Wewebplus escape DB ##########################

function wewebEscape($valCoreDB = null, $valDate = null) {
################## Set Up Function ##################################
    if ($valCoreDB == "mssql") {
        $valResultEscape = ms_escape_string($valDate);
    } else {
        // $valResultEscape = mysqli_real_escape_string($valDate);
	   $valResultEscape =ms_escape_string($valDate);
    }
// print_pre($valResultEscape);
    return $valResultEscape;
}

###################### Escape SQL  ######################

function ms_escape_string($data) {
###################### Set Up Function ######################
    if (!isset($data) or empty($data))
        return '';
    if (is_numeric($data))
        return $data;

    $non_displayables = array(
        '/%0[0-8bcef]/', // url encoded 00-08, 11, 12, 14, 15
        '/%1[0-9a-f]/', // url encoded 16-31
        '/[\x00-\x08]/', // 00-08
        '/\x0b/', // 11
        '/\x0c/', // 12
        '/[\x0e-\x1f]/'             // 14-31
    );
    foreach ($non_displayables as $regex)
        $data = preg_replace($regex, '', $data);
    $data = str_replace("'", "''", $data);
    return $data;
}

###################### Max ID SQL  ######################

function wewebMssqlInsertID($valTable = null, $valTableF = null) {

###################### Set Up Function ######################
    // $sql = "SELECT MAX(" . $valTableF . ") FROM " . $valTable;
    // $Query = mysqli_query($sql);
    // list($fileId) = mysqli_fetch_row($Query);
    // return $fileId;
    global $coreLanguageSQL;

    $sql = "SELECT MAX(" . $valTableF . ") FROM " . $valTable;
    $Query = wewebQueryDB($coreLanguageSQL, $sql);
    list($fileId) = wewebFetchArrayDB($coreLanguageSQL,$Query);
    return $fileId;
}
?>
