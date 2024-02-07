<?php
/* Smarty version 3.1.30, created on 2024-02-07 14:19:46
  from "C:\xampp\htdocs\dmsc_votedesign\front\controller\script\home\template\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_65c32f12643058_10284361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ea67c3214c36c66bc8e244352bd3a98d8dd9042' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dmsc_votedesign\\front\\controller\\script\\home\\template\\index.tpl',
      1 => 1707290383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c32f12643058_10284361 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="votedesign">
  <div class="vote-logo">
    <div class="thumb">
      <figure class="cover">
        <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/logo-dmsc-01.png" alt="">
      </figure>
    </div>
  </div>
  <div class="vote-title">
    <div class="title">
      <h1>แบบสอบถามความพึงพอใจ การออกแบบเว็บไซต์กรมวิยาศาสตร์การแพทย์</h1>
    </div>
  </div>
  <section class="hero-banner">
    <div class="container-fluid">
      <ul class="item-list">
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
    </div>
  </section>

  <form id="myForm1" method="post">
    <div class="container">
      <section class="general-theme">
        <div class="des">
          <strong>คำชี้แจง</strong> กรุณาเลือกช่องคำตอบตามความเป็นจริงหรือใกล้เคียงกับความคิดเห็นของท่านมากที่สุด
        </div>
        <div class="heading">
          ข้อที่ 1 ท่านมีความชื่นชอบการออกแบบเว็บไซต์กรมวิทยาศาสตร์การแพทย์ในรูปแบบใด
        </div>
        <div class="row">
          <div class="col-6">
            <div class="choice">
              <input class="choice-input" type="radio" id="theme1" name="theme" value="1">
              <label class="control-label">รูปแบบที่ 1</label>
            </div>
          </div>
          <div class="col-6">
            <div class="choice">
              <input type="radio" id="theme2" name="theme" value="2">
              <label>รูปแบบที่ 2</label>
            </div>
          </div>
          <div class="col-6">

            <div class="choice">
              <input type="radio" id="theme3" name="theme" value="3">
              <label>รูปแบบที่ 3</label>
            </div>
          </div>
          <div class="col-6">
            <div class="choice">
              <input type="radio" id="theme4" name="theme" value="4">
              <label>รูปแบบที่ 4</label>
            </div>
          </div>
        </div>
      </section>

      <section class="show-sequence">
        <div class="heading">
          ข้อที่ 2 การจัดลำดับหัวข้อในการแสดงผล ก่อน-หลัง หัวข้อบริการและงานวิจัยและนวัตกรรม ควรเป็นแบบใด
        </div>
        <div class="row">
          <div class="col">
            <div class="choice">
              <input type="radio" id="sequence1" name="sequence" value="1">
              <label>หัวข้อบริการ - หัวข้องานวิจัยและนวัตกรรม</label>
            </div>
          </div>
          <div class="col">
            <div class="choice">
              <input type="radio" id="sequence2" name="sequence" value="2">
              <label>หัวข้องานวิจัยและนวัตกรรม - หัวข้อบริการ</label>
            </div>
          </div>
        </div>
      </section>

      <section class="service-theme">
        <div class="heading">
          ข้อที่ 3 ท่านมีความชื่นชอบการออกแบบเว็บไซต์กรมวิทยาศาสตร์การแพทย์ หัวข้อบริการ ในรูปแบบใดมากที่สุด
        </div>
        <div class="row">
          <div class="col-6">
            <div class="choice">
              <input type="radio" id="service1" name="service" value="1">
              <label>รูปแบบที่ 1</label>
            </div>
            <div class="thumb">
              <figure class="cover">
                <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/sv-01.png" alt="">
              </figure>
            </div>
          </div>
          <div class="col-6">
            <div class="choice">
              <input type="radio" id="service2" name="service" value="2">
              <label>รูปแบบที่ 2</label>
            </div>
            <div class="thumb">
              <figure class="cover">
                <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/sv-02.png" alt="">
              </figure>
            </div>
          </div>
          <div class="col-6">
            <div class="choice">
              <input type="radio" id="service3" name="service" value="3">
              <label>รูปแบบที่ 3</label>
            </div>
            <div class="thumb">
              <figure class="cover">
                <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/sv-03.png" alt="">
              </figure>
            </div>
          </div>
          <div class="col-6">
            <div class="choice">
              <input type="radio" id="service4" name="service" value="4">
              <label>รูปแบบที่ 4</label>
            </div>
            <div class="thumb">
              <figure class="cover">
                <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/sv-04.png" alt="">
              </figure>
            </div>
          </div>
        </div>
      </section>

      <section class="suggestions">
        <div class="form-group">
          <label class="heading" for="comment">ข้อเสนอแนะ:</label>
          <textarea class="form-control" rows="5" id="comment" placeholder="กรอกข้อเสนอแนะ"></textarea>
        </div>
      </section>
      <input class="sending" type="submit" value="ส่งข้อมูล">
    </div>
  </form>
</div><?php }
}
