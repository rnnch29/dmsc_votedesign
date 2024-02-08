<?php
$menuActive = "home";
$lastModify = "?u=" . date("YdmHis");
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js'.$lastModify.'"></script>';
$HomePage = new HomePage;



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
