<?php
/* Smarty version 3.1.30, created on 2023-12-13 16:21:53
  from "C:\xampp\htdocs\dev23-aeon\front\template\default\inc\inc-header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_657977b1c7dc07_31554307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '424ee4ca17ebaa874dcb7fef82aed787bb4d5c1e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-aeon\\front\\template\\default\\inc\\inc-header.tpl',
      1 => 1702459312,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657977b1c7dc07_31554307 (Smarty_Internal_Template $_smarty_tpl) {
?>
<header>
    <div class="nav-bar">
        <div class="row align-items-center">
            <div class="col">

                <a class="link" href="#">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/logo.png" alt="">
                        </div>
                        <div class="col-auto">
                            <div class="nav-title">
                                NEXT GEN
                            </div>
                        </div>
                    </div>
                </a>

            </div>

            <!-- <div class="col-auto">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        TH
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">TH</a>
                        <a class="dropdown-item" href="#">EN</a>
                    </div>
                </div>
            </div> -->

            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/<?php if ($_smarty_tpl->tpl_vars['langon']->value == 'th') {?>sss<?php } else { ?>eee<?php }?>.png" alt="">
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/lang/en">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/eee.png" alt="">
                    </a>
                    <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/lang/th">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/sss.png" alt="">
                    </a>
                </div>
            </div>
        </div>

    </div>
</header><?php }
}
