<?php
// $path_root = ""; #ถ้า root อยู่ public
$path_root = "/dmsc_votedesign"; #ถ้า root ไม่ได้อยู่ public

define("_http", "http");

// function shapeSpace_check_https() {
//     if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
//         return true; 
//     }
//     return false;
// }

// $shapeSpace_check_https = shapeSpace_check_https();
// if (!$shapeSpace_check_https) {
//     $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//    header('HTTP/1.1 301 Moved Permanently');
//    header('Location: ' . $redirect);
//    exit();
// }

define("_DIR", str_replace("\\", '/', dirname(__FILE__)));
define("_URI", basename($_SERVER["REQUEST_URI"]));
define("_URL", _http . "://" . $_SERVER['HTTP_HOST'] . $path_root . "/");
define("_FullUrl", _http . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
define("_Domain", _http . "://" . $_SERVER['HTTP_HOST']);
define("_URLPagination", _http . "://" . $_SERVER['HTTP_HOST'] . $path_root . "");

require_once _DIR . '/front/libs/config.php'; #load config
require_once _DIR . '/front/libs/setting.php'; #load setting
require_once _DIR . '/front/libs/function.php'; #load function
require_once _DIR . '/front/libs/url.php'; #load url

## call page ##
$url = new url;
// print_pre($url);die();
$linklang = configlang($url->pagelang[2]);
if (empty($url->segment[0])) {
    header("Location:" . $linklang . "/" . $url_show_default);
    exit();
}

$smarty->assign("ul", $linklang);
$smarty->assign("langon", $url->pagelang[2]);

if (!empty($url->uri['terms'])) {
    header("Location:" . $linklang . "/terms/" . $url->uri['terms']);
    exit();
}

$page = pagepagination($url);
$smarty->assign("page", $page);

##  lang ##
$lang = array();
require_once _DIR . '/front/libs/lang/' . $lang_default . '.php'; #load url
if ($lang_default != $url->pagelang[2]) {
    require_once _DIR . '/front/libs/lang/' . $url->pagelang[2] . '.php'; #load url
}

## addon page ##
$loadcate = $url->loadmodulus(array("_mainpage"));
foreach ($loadcate as $loadmodulus) {
    include_once $loadmodulus;
}

## load page ##
$pageload = $url->page();
foreach ($pageload['load'] as $loadpage) {
    include_once $loadpage;
}

# assign active menu
if (empty($menuActive)) {
    $menuActive = "home";
}
$smarty->assign("navactive", $menuActive);
$smarty->assign("lastModify", $lastModify);
$smarty->assign("home", $url_show_default);
$smarty->assign("lang", $lang);
$smarty->assign("assigncss", $listcss);
$smarty->assign("assignjs", $listjs);
$smarty->assign("template", _URL . $path_template[$templateweb][0]);
$smarty->assign("base", _URL);
$smarty->assign("fullurl", _FullUrl);
$smarty->assign("Domain", _Domain);
$smarty->assign("urlPagination", _URLPagination);

####  inc-file
$smarty->assign("incfile", $incfile);

if (!empty($settingPage)) {
    $smarty->display($settingPage['display'] . ".tpl");
}


$db->Close();
#==============================================================##
