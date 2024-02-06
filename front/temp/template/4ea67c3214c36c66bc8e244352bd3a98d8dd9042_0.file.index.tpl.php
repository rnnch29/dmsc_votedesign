<?php
/* Smarty version 3.1.30, created on 2024-02-06 16:33:13
  from "C:\xampp\htdocs\dmsc_votedesign\front\controller\script\home\template\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_65c1fcd903dce8_31106485',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ea67c3214c36c66bc8e244352bd3a98d8dd9042' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dmsc_votedesign\\front\\controller\\script\\home\\template\\index.tpl',
      1 => 1707211992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c1fcd903dce8_31106485 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="votedesign">
  <div class="vote-logo">
    <div class="thumb">
      <figure class="cover">
        <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/logo-dmsc.png" alt="">
      </figure>
    </div>
  </div>
  <div class="vote-title">
    <div class="title">
      <h1>DMSC VOTE DESIGN</h1>
    </div>
  </div>
  <section class="hero-banner">
    <ul>
      <li>
        <a href="">
          <div class="thumb">
            <figure class="cover">
              <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/demo-01.jpg" alt="">
            </figure>
          </div>
        </a>
      </li>
      <li>
        <a href="">
          <div class="thumb">
            <figure class="cover">
              <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/demo-02.jpg" alt="">
            </figure>
          </div>
        </a>
      </li>
      <li>
        <a href="">
          <div class="thumb">
            <figure class="cover">
              <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/demo-03.jpg" alt="">
            </figure>
          </div>
        </a>
      </li>
      <li>
        <a href="">
          <div class="thumb">
            <figure class="cover">
              <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/demo-04.jpg" alt="">
            </figure>
          </div>
        </a>
      </li>
    </ul>
  </section>

  <section class="general-theme">
    <form id="myForm" method="post">
      <p>Please select your favorite Web language:</p>

        <input type="radio" id="theme1" name="language" value="Theme1">
        <label for="theme1">theme1</label>

        <input type="radio" id="theme2" name="language" value="Theme2">
        <label for="theme2">theme2</label>

        <input type="radio" id="theme3" name="language" value="Theme3">
        <label for="theme3">theme3</label>

        <input type="radio" id="theme4" name="language" value="Theme4">
        <label for="theme4">theme4</label>

      <input type="submit" value="Submit">
    </form>
  </section>
  <section class="show-sequence">

  </section>
  <section class="service-theme">

  </section>
  <section class="suggestions">

  </section>
</div><?php }
}
