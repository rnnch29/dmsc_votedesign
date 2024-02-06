<?php
/* Smarty version 3.1.30, created on 2023-12-11 10:25:45
  from "/var/www/html/front_template/front/template/default/inc/inc-header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6576813996d241_09144887',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fba24cb7af3df6d40686383f073362b6e6f40e9' => 
    array (
      0 => '/var/www/html/front_template/front/template/default/inc/inc-header.tpl',
      1 => 1702265136,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6576813996d241_09144887 (Smarty_Internal_Template $_smarty_tpl) {
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
/assets/img/icon/sss.png" alt="">
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/eee.png" alt="">
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/sss.png" alt="">
                    </a>
                </div>
            </div>
        </div>

    </div>
</header><?php }
}
