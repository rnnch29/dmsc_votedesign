<?php
/* Smarty version 3.1.30, created on 2024-02-07 23:29:28
  from "/var/www/html/dmsc_votedesign/front/controller/script/home_bk/template/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_65c3afe8899889_83010243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '410e2641d26b268cd4e973e0980c50d5c19a2c10' => 
    array (
      0 => '/var/www/html/dmsc_votedesign/front/controller/script/home_bk/template/index.tpl',
      1 => 1707323364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c3afe8899889_83010243 (Smarty_Internal_Template $_smarty_tpl) {
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

  <form id="myForm" >
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
            
            <div class="rdio rdio-primary radio-inline"> <input name="q1" value="1" id="q1_1" type="radio" checked>
              <label for="radio1">1</label>
            </div>
          </div>
          <div class="col-6">
            
            <div class="rdio rdio-primary radio-inline"> <input name="q1" value="1" id="q1_2" type="radio">
              <label for="radio2">2</label>
            </div>
          </div>
          <div class="col-6">

            
            <div class="rdio rdio-primary radio-inline"> <input name="q1" value="1" id="q1_3" type="radio">
              <label for="radio1">3</label>
            </div>
          </div>
          <div class="col-6">
            
            <div class="rdio rdio-primary radio-inline"> <input name="q1" value="1" id="q1_4" type="radio">
              <label for="radio1">4</label>
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
              <input type="radio" id="q2_1" name="q2" value="1">
              <label>หัวข้อบริการ - หัวข้องานวิจัยและนวัตกรรม</label>
            </div>
          </div>
          <div class="col">
            <div class="choice">
              <input type="radio" id="q2_2" name="q2" value="2">
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
              <input type="radio" id="q3_1" name="q3" value="1">
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
              <input type="radio" id="q3_2" name="q3" value="2">
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
              <input type="radio" id="q3_3" name="q3" value="3">
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
              <input type="radio" id="q3_4" name="q3" value="4">
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
          <div class="heading" for="comment">ข้อเสนอแนะ:</div>
          <textarea class="form-control" rows="5" id="comment" name="suggest" placeholder="กรอกข้อเสนอแนะ"></textarea>
        </div>
      </section>
      <input class="sending" type="submit" value="ส่งข้อมูล">
    </div>
  </form>
</div><?php }
}
