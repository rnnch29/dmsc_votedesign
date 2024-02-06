<?php
$menuActive = "home";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
$HomePage = new HomePage;

#Top graphic
$callTopGraphic  = $HomePage->callTopGraphic($config['tgp']['masterkey']);
$smarty->assign("callTopGraphic", $callTopGraphic);

#About
$callAbout  = $HomePage->callAbout($config['cms_about']['masterkey']);
$smarty->assign("callAbout", $callAbout);

#Benefit
$callBnf  = $HomePage->callBnf($config['cms_bnf']['masterkey']);
$smarty->assign("callBnf", $callBnf);


#ตอบสนองทุกความต้องการ
$callReg  = $HomePage->callReg($config['cms_reg']['masterkey']);
$smarty->assign("callReg", $callReg);

#Aeon Thai Mobile
$callMobile  = $HomePage->callMobile($config['cms_mbl']['masterkey']);
$smarty->assign("callMobile", $callMobile);

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
