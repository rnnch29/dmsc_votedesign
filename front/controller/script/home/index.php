<?php
$menuActive = "home";
$lastModify = "?u=" . date("YdmHis");
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js'.$lastModify.'"></script>';
$listjs[] = '<script src="https://www.google.com/recaptcha/api.js?render='.$siteKey.'"></script>';
$HomePage = new HomePage;

$check_ip_value = 0;  // 1 = true , 0 = false

if($check_ip_value == 1) {

    $ip = getip();
    // Check num of IP 
    $sql_ip = "SELECT COUNT(" . $config['vote']['db'] . "_ip) AS count_result FROM ". $config['vote']['db'] . " WHERE " . $config['vote']['db'] . "_ip = '$ip'";
    // print_pre($sql_ip);
    $query_ip = $db->execute($sql_ip);
    
    $count_ip = $query_ip->fields[0];

} else {

    $count_ip = 0;

}


if(!empty($_POST)){

    
        if(empty($_POST['recaptcha'])){

            $result = array();
            $result['status'] = 'fail';
            $result['icon'] = 'error';
            $result['title'] = 'เกิดข้อผิดพลาดในการยืนยันตัวตนของคุณ';
            $result['msg'] = 'กรุณาลองอีกครั้ง เกิดปัญหาในการตรวจสอบตัวตนของคุณ';
        
            echo json_encode($result);
            exit();
        }

        //Check Question 1,2,3 is empty!
        if(empty($_POST['q1'] && $_POST['q2'] && $_POST['q3'])) {

            $result = array();
            $result['status'] = 'fail';
            $result['icon'] = 'warning';
            $result['title'] = 'คุณกรอกข้อมูลไม่ครบถ้วน';
            $result['msg'] = 'ไม่สามารถบันทึกข้อมูลได้ กรุณากรอกข้อมูลให้ครบถ้วน!';
        
            echo json_encode($result);
            exit(); 
        }

        //Check duplicate ip

        if($count_ip >= 1) {
            
            $result = array();
            $result['status'] = 'success';
            $result['icon'] = 'error';
            $result['title'] = 'บันทึกข้อมูลไม่สำเร็จ';
            $result['msg'] = 'ไม่สามารถบันทึกข้อมูลได้ เนื่องจาก IP นี้ถูกใช้งานแล้ว!';
        
            echo json_encode($result);
            exit(); 
        }

        //Successfully
        $data = array();
        $data[$config['vote']['db'] . "_masterkey"] = "'" . $config['vote']['masterkey'] . "'";
        $data[$config['vote']['db'] . "_q1"] = "'" . changeQuot($_POST["q1"]) . "'";
        $data[$config['vote']['db'] . "_q2"] = "'" . changeQuot($_POST["q2"]) . "'";
        $data[$config['vote']['db'] . "_q3"] = "'" . changeQuot($_POST["q3"]) . "'";
        $data[$config['vote']['db'] . "_suggest"] = "'" . changeQuot($_POST["suggest"]) . "'";
        $data[$config['vote']['db'] . "_ip"] = "'" . getip() . "'";
        $data[$config['vote']['db'] . "_credate"] = "NOW()";
        $sql = "INSERT INTO " . $config['vote']['db'] . "(" . implode(',', array_keys($data)) . ")VALUES(" . implode(',', array_values($data)) . ")";

        $insertDb = $db->execute($sql);

        $result = array();
        $result['status'] = 'success';
        $result['icon'] = 'success';
        $result['title'] = 'บันทึกข้อมูลสำเร็จ';
        $result['msg'] = 'ข้อมูลของคุณถูกบันทึกเรียบร้อยแล้ว!';
    
        echo json_encode($result);
        exit(); 
    
}

/*## Start SEO #####*/
$seo_desc = "";
$seo_title = $lang['menu']['home'];
$seo_keyword = "";
Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
/*## End SEO #####*/


$settingPage = array(
    "page" => $menuActive,
    "template" => "index.tpl",
    "display" => "page"
);

$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);




