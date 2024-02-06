<?php
/* Smarty version 3.1.30, created on 2024-02-06 14:00:25
  from "/var/www/html/dmsc_votedesign/front/controller/script/home/template/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_65c1d909a0bfc3_19092917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bed6bfba06cacdac98e3426dac74855be2a04bd7' => 
    array (
      0 => '/var/www/html/dmsc_votedesign/front/controller/script/home/template/index.tpl',
      1 => 1707202822,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c1d909a0bfc3_19092917 (Smarty_Internal_Template $_smarty_tpl) {
?>
<center>
<img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/dmsc-logo.png"> 
<h1>DMSC VOTE DESIGN</h1>


<form id="myForm" method="post">
  <p>Please select your favorite Web language:</p>
  <input type="radio" id="html" name="language" value="HTML">
  <label for="html">HTML</label><br>
  <input type="radio" id="css" name="language" value="CSS">
  <label for="css">CSS</label><br>
  <input type="radio" id="javascript" name="language" value="JavaScript">
  <label for="javascript">JavaScript</label>

  <br>  

  <p>Please select your age:</p>
  <input type="radio" id="age1" name="age" value="30">
  <label for="age1">0 - 30</label><br>
  <input type="radio" id="age2" name="age" value="60">
  <label for="age2">31 - 60</label><br>  
  <input type="radio" id="age3" name="age" value="100">
  <label for="age3">61 - 100</label>
  
  <br><br>

  <input type="submit" value="Submit">
</form>


</center>
<?php }
}
