<?php
/* Smarty version 3.1.30, created on 2023-12-15 15:34:57
  from "C:\xampp\htdocs\dev23-aeon\front\controller\script\home\template\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_657c0fb123cc70_65309358',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0bd8730a7bd530eba521ed36b659905651dbeef2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-aeon\\front\\controller\\script\\home\\template\\index.tpl',
      1 => 1702629285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657c0fb123cc70_65309358 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="layout-container overflow-hidden">
    <?php if ($_smarty_tpl->tpl_vars['callTopGraphic']->value->_numOfRows >= 1) {?>
        <div class="hero-banner">
            <div class="slider">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callTopGraphic']->value, 'valuecallTopGraphic', false, 'keycallTopGraphic');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keycallTopGraphic']->value => $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value) {
?>

                
                <?php if ($_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['type'] == "pic") {?>

                    <div class="item">
                        <div class="cover">
                    
                
                                <a href="<?php if ($_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['url'] != '' && $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value != "#") {
echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['url'];
} else { ?>javascript:void(0);<?php }?>" target="<?php if ($_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['target'] == 2) {?>_blank<?php } else { ?>_self<?php }?>">
                                    <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['masterkey'];
$_prefixVariable1=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['pic'],"pictures",$_prefixVariable1,"link");?>
" alt="<?php echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['subject'];?>
">
                                </a>
                        </div>
                    </div>
                <?php }?>

                
                <?php if ($_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['type'] == "vdo") {?>

                    <div class="item vdo">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item" autoplay muted loop>
                        <source src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['masterkey'];
$_prefixVariable2=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['filevdo'],"vdo",$_prefixVariable2,"link");?>
" type="<?php echo $_smarty_tpl->tpl_vars['valuecallTopGraphic']->value['mime'];?>
">
                        </video>
                    </div>
                </div>

                <?php }?>

                

                


                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                
            </div>
        </div>
    <?php }?>
        


        



        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callAbout']->value, 'valuecallAbout', false, 'keycallAbout');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keycallAbout']->value => $_smarty_tpl->tpl_vars['valuecallAbout']->value) {
?>
            <?php echo callHtml(fileinclude($_smarty_tpl->tpl_vars['valuecallAbout']->value['htmlfilename'],"html",$_smarty_tpl->tpl_vars['valuecallAbout']->value['masterkey']));?>


        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    
        


    





    <div class="section -II">
        <div class="block-benefits-slider">
        
            <div class="row justify-content-center">
                <div class="col-auto text-center mb-5">
                    <h1>NEXT GEN</h1>
                    <h3> <b>Benefits</b> </h3>
                </div>
            </div>
            
            <div class="slider mt-5">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callBnf']->value, 'valuecallBnf', false, 'keycallBnf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keycallBnf']->value => $_smarty_tpl->tpl_vars['valuecallBnf']->value) {
?>
                    <div class="item">
                        <div class="wrapper">
                            <div class="icon">
                                <img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['valuecallBnf']->value['masterkey'];
$_prefixVariable3=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valuecallBnf']->value['pic'],"pictures",$_prefixVariable3,"link");?>
" alt="">
                            </div>
                            <div class="title"><?php echo $_smarty_tpl->tpl_vars['valuecallBnf']->value['subject'];?>
</div>
                            <div class="desc">
                            <?php echo $_smarty_tpl->tpl_vars['valuecallBnf']->value['title'];?>

                            </div>
                            <a href="" class="link" data-toggle="modal" data-target="#myModals<?php echo $_smarty_tpl->tpl_vars['valuecallBnf']->value['id'];?>
">
                                <?php echo $_smarty_tpl->tpl_vars['lang']->value['viewdetail'];?>

                            </a>
                        </div>
                    </div>
                    
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </div>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callBnf']->value, 'valuecallBnf', false, 'keycallBnf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keycallBnf']->value => $_smarty_tpl->tpl_vars['valuecallBnf']->value) {
?>
                
                    <div class="modal fade" class="modal" id="myModals<?php echo $_smarty_tpl->tpl_vars['valuecallBnf']->value['id'];?>
">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['valuecallBnf']->value['subject'];?>
</h4>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <?php echo callHtml(fileinclude($_smarty_tpl->tpl_vars['valuecallBnf']->value['htmlfilename'],"html",$_smarty_tpl->tpl_vars['valuecallBnf']->value['masterkey']));?>
        
                                </div>
                            </div>
                        </div>
                    </div>            
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                
        </div>
        
    </div>



    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callReg']->value, 'valuecallReg', false, 'keycallReg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keycallReg']->value => $_smarty_tpl->tpl_vars['valuecallReg']->value) {
?>
        <?php echo callHtml(fileinclude($_smarty_tpl->tpl_vars['valuecallReg']->value['htmlfilename'],"html",$_smarty_tpl->tpl_vars['valuecallReg']->value['masterkey']));?>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    


    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callMobile']->value, 'valuecallMobile', false, 'keycallMobile');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keycallMobile']->value => $_smarty_tpl->tpl_vars['valuecallMobile']->value) {
?>
        <?php echo callHtml(fileinclude($_smarty_tpl->tpl_vars['valuecallMobile']->value['htmlfilename'],"html",$_smarty_tpl->tpl_vars['valuecallMobile']->value['masterkey']));?>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    

    <div class="section -V">
        <div class="container" style="padding: 300px 0px;">
            <div class="how-to">
                <div class="row no-gutters">
                    <div class="col-auto">
                        <div class="slider">
                            <?php echo '<?php ';?>for ($i = 1; $i <= 7; $i++) { <?php echo '?>';?>
                            <div class="item">
                                <div class="cover">
                                    <a href="">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/how-to.png" alt="aeontop">
                                    </a>
                                </div>
                            </div>
                            <?php echo '<?php ';?>} <?php echo '?>';?>
                        </div>
                    </div>
                    <div class="col-auto">

                    </div>
                </div>
            </div>
        </div>
    </div>



    

    <div class="section -VI">
        
    </div>

    

</section><?php }
}
