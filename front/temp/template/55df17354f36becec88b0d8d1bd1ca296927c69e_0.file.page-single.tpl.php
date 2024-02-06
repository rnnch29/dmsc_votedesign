<?php
/* Smarty version 3.1.30, created on 2023-12-11 10:18:31
  from "/var/www/html/front_template/front/template/default/page-single.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_65767f87875027_36167657',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55df17354f36becec88b0d8d1bd1ca296927c69e' => 
    array (
      0 => '/var/www/html/front_template/front/template/default/page-single.tpl',
      1 => 1701065238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65767f87875027_36167657 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ((($tmp = @$_smarty_tpl->tpl_vars['fileInclude']->value)===null||$tmp==='' ? null : $tmp)) {?>
   <?php ob_start();
echo templateInclude($_smarty_tpl->tpl_vars['fileInclude']->value,$_smarty_tpl->tpl_vars['settemplate']->value);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'pageContent'), 0, true);
?>

<?php }?>

<?php }
}
