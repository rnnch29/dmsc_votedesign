<?php
## date month ##
$strMonthCut['shot']['th'] = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
$strMonthCut['shot']['en'] = array("", 'Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sep.', 'Oct.', 'Nov.', 'Dec.');
$strMonthCut['shot2']['en'] = array("", 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

$strMonthCut['full']['th'] = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$strMonthCut['full']['en'] = array('', 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December', );

$weekDay['th'] = array('อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส');
$weekDay['en'] = array('Su', 'M', 'T', 'W', 'Th', 'F', 'Sa');

function print_pre($array)
{
  echo "<pre class='printPRE'>";
  echo "<textarea>";

  print_r($array);

  echo "</textarea>";
  echo "</pre>";
  echo "<style>.printPRE{ z-index:1000; position: relative;background: #000;color: red;}</style>";
}

//#################################################
function DateFormat($DateTime)
{
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


##############################################

function DateThai($strDate, $function = null, $lang = "th", $type = "shot")
{

  global $strMonthCut, $url;
  ##############################################
  $strYear = date("Y", strtotime($strDate)) + 543;
  $strYear2 = date("Y", strtotime($strDate));
  $strYear_mini = substr($strYear, 2, 4);
  $strYear_mini_en = substr($strYear2, 2, 4);
  $strMonth = date("n", strtotime($strDate));
  $strMonth_real = date("n", strtotime($strDate));
  $strMonth_full = date("n", strtotime($strDate));
  $strMonth_number = date("n", strtotime($strDate));
  $strDay = date("j", strtotime($strDate));
  $strHour = date("H", strtotime($strDate));
  $strMinute = date("i", strtotime($strDate));
  $strSeconds = date("s", strtotime($strDate));

  $strMonth = $strMonthCut[$type][$lang][$strMonth];
  $strMonth_full = $strMonthCut['full'][$lang][$strMonth_full];

  if (!empty($strDate)) {
    switch ($function) {
      case '1':
        $day = "$strDay $strMonth $strYear";
        break;
      case '2':
        $day = "$strDay $strMonth $strYear2";
        break;
    }
  } else {
    $day = "-";
  }
  return $day;
}

function txtReplaceHTML($data)
{
    ####################################################
    $dataHTML = str_replace("\\", "", $data);
    return $dataHTML;
}

function getNameMenu($myID)
{
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
        return ($name_return);
    }
}


############################################

function getUserThai($myUserID) {
  ############################################
      global $core_db_name, $core_tb_staff, $coreLanguageSQL;
  
      $sql = "SELECT " . $core_tb_staff . "_fnamethai," . $core_tb_staff . "_lnamethai  FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_id='" . $myUserID . "'";
      $Query = wewebQueryDB($coreLanguageSQL, $sql);
      $RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);
      if ($RecordCount >= 1) {
          $Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
          $name_return = $Row[0] . " " . $Row[1];
      }
      return($name_return);
  }
  
  ############################################