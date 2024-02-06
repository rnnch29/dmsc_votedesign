<?php
/* Smarty version 3.1.30, created on 2023-12-11 10:12:54
  from "/var/www/html/front_template/front/template/default/inc/inc-metatag.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_65767e3672e4a0_11693340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a96f7aa9338d6d1050dd53c3421050db6c3a0085' => 
    array (
      0 => '/var/www/html/front_template/front/template/default/inc/inc-metatag.tpl',
      1 => 1702264373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65767e3672e4a0_11693340 (Smarty_Internal_Template $_smarty_tpl) {
?>
<base href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
">
<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['seo']->value['title'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settingWeb']->value['metatitle'] : $tmp);?>
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['seo']->value['keyword'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settingWeb']->value['keywords'] : $tmp);?>
">
<meta name="description" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['seo']->value['desc'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settingWeb']->value['description'] : $tmp);?>
">
<meta name="author" content="">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">

<?php $_smarty_tpl->_assignInScope('valLinkImgSeo', ((string)$_smarty_tpl->tpl_vars['base']->value).((string)$_smarty_tpl->tpl_vars['template']->value)."/assets/img/logo.png");
?>
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:title" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['valSeoTitle']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settingWeb']->value['metatitle'] : $tmp);?>
">
<meta property="og:description" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['valSeoDescription']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['settingWeb']->value['description'] : $tmp);?>
">
<meta property="og:image" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['valSeoImages']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['valLinkImgSeo']->value : $tmp);?>
">
<meta property="og:site_name" content="">
<meta property="og:locale" content="">
<meta property="og:locale:alternate" content="">

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/favicon//apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/favicon//favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/favicon//favicon-16x16.png">
<link rel="manifest" href="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/favicon//site.webmanifest">
<link rel="mask-icon" href="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/favicon//safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#0f6939">
<meta name="theme-color" content="#ffffff">

<?php ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['assigncss']->value)===null||$tmp==='' ? null : $tmp);
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assigncss']->value, 'addAssetCss');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['addAssetCss']->value) {
echo $_smarty_tpl->tpl_vars['addAssetCss']->value;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
}
