<?php
/* Smarty version 3.1.30, created on 2023-12-12 09:18:42
  from "C:\xampp\htdocs\dev23-aeon\front\template\default\inc\inc-loadscript.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6577c302623a54_76993058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7097fdeb4a0065a578f37240ef83da0f3582950' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-aeon\\front\\template\\default\\inc\\inc-loadscript.tpl',
      1 => 1702347355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6577c302623a54_76993058 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Core -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/jquery-3.6.0.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/jquery-ui.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/jquery.easing.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/jquery.mCustomScrollbar.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"><?php echo '</script'; ?>
> -->

<!-- Lazy -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/jquery.lazy.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/jquery.lazy.av.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/jquery.lazy.youtube.min.js"><?php echo '</script'; ?>
>

<!-- <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/bootstrap.min.js"><?php echo '</script'; ?>
> -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/modernizr.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/validator.min.js"><?php echo '</script'; ?>
>

<!-- AOS -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/aos.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/sweetalert2@11.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/swiper-bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/select2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/jquery.fancybox.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/clipboard.min.js"><?php echo '</script'; ?>
>

<!-- plugin -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/slick.min.js"><?php echo '</script'; ?>
>


<!-- bootstrap 4 -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"><?php echo '</script'; ?>
>

<!-- Custom -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/main.js<?php echo $_smarty_tpl->tpl_vars['lastModify']->value;?>
"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
    var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
<?php echo '</script'; ?>
>

<?php ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['assignjs']->value)===null||$tmp==='' ? null : $tmp);
$_prefixVariable4=ob_get_clean();
if ($_prefixVariable4) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assignjs']->value, 'addAssetScript');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['addAssetScript']->value) {
echo $_smarty_tpl->tpl_vars['addAssetScript']->value;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
}
