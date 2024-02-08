<?php
<<<<<<< HEAD
/* Smarty version 3.1.30, created on 2024-02-07 14:31:23
=======
/* Smarty version 3.1.30, created on 2024-02-07 17:41:08
>>>>>>> 6826e2de8758eaeb26650e5c7acd70575dff4fcc
  from "/var/www/html/dmsc_votedesign/front/template/default/page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
<<<<<<< HEAD
  'unifunc' => 'content_65c331cb4a7ef3_75822006',
=======
  'unifunc' => 'content_65c35e44bffc95_19366180',
>>>>>>> 6826e2de8758eaeb26650e5c7acd70575dff4fcc
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '360496bdf29df624bc4dd54e62fe30f76a11fbb9' => 
    array (
      0 => '/var/www/html/dmsc_votedesign/front/template/default/page.tpl',
<<<<<<< HEAD
      1 => 1707290847,
=======
      1 => 1707302113,
>>>>>>> 6826e2de8758eaeb26650e5c7acd70575dff4fcc
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
<<<<<<< HEAD
function content_65c331cb4a7ef3_75822006 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_65c35e44bffc95_19366180 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> 6826e2de8758eaeb26650e5c7acd70575dff4fcc
?>
<!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['langon']->value;?>
">

<head>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['incfile']->value['metatag']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['incfile']->value['loadstyle']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, true);
?>

</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['incfile']->value['header']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, true);
?>

    <?php ob_start();
echo templateInclude($_smarty_tpl->tpl_vars['fileInclude']->value);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'pageContent'), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['incfile']->value['loadscript']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['incfile']->value['footer']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, true);
?>

</body>

</html><?php }
}
