<div class="votedesign">
  <div class="vote-logo">
    <div class="thumb">
      <figure class="cover">
        <img src="{$template}/assets/img/logo-dmsc-01.png" alt="">
      </figure>
    </div>
  </div>
  <div class="vote-info">
    <div class="title">
      กรมวิทยาศาสตร์การแพทย์ กระทรวงสาธารณสุข
      <br>
      <small>Department of Medical Sciences Ministry Ministry of Public Health</small>
    </div>
  </div>
  <div class="vote-title">
    <div class="title">
      <h1>แบบสอบถามความพึงพอใจ การออกแบบเว็บไซต์กรมวิยาศาสตร์การแพทย์</h1>
    </div>
  </div>

  {* <section class="hero-banner">
    <div class="container-fluid">
      <ul class="item-list">
        <li>
          <a href="">
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/demo-01.jpg" alt="">
              </figure>
            </div>
          </a>
        </li>
        <li>
          <a href="">
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/demo-02.jpg" alt="">
              </figure>
            </div>
          </a>
        </li>
        <li>
          <a href="">
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/demo-03.jpg" alt="">
              </figure>
            </div>
          </a>
        </li>
        <li>
          <a href="">
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/demo-04.jpg" alt="">
              </figure>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </section> *}

  <form id="myForm">
    <div class="container">
      <section class="general-theme">
        <div class="des">
          <strong>คำชี้แจง</strong> กรุณาเลือกช่องคำตอบตามความเป็นจริงหรือใกล้เคียงกับความคิดเห็นของท่านมากให้ที่สุด
        </div>
        <div class="heading">
          1. ท่านมีความชื่นชอบการออกแบบเว็บไซต์ของกรมวิทยาศาสตร์การแพทย์ในรูปแบบใดมากที่สุด
        </div>
        <div class="row">
          <div class="col-6">
            {* <div class="choice">
              <input class="choice-input" type="radio" id="q1_1" name="q1" value="1">
              <label class="control-label">รูปแบบที่ 1</label>
            </div> *}
            <div class="rdio rdio-primary radio-inline"> <input name="q1" value="1" id="q1_1" type="radio">
              <label for="q1_1">รูปแบบที่ 1</label>
            </div>
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/gr-1.png" alt="">
              </figure>
            </div>
          </div>
          <div class="col-6">
            {* <div class="choice">
              <input type="radio" id="q1_2" name="q1" value="2">
              <label>รูปแบบที่ 2</label>
            </div> *}
            <div class="rdio rdio-primary radio-inline"> <input name="q1" value="2" id="q1_2" type="radio">
              <label for="q1_2">รูปแบบที่ 2</label>
            </div>
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/gr-2.png" alt="">
              </figure>
            </div>
          </div>
          <div class="col-6">
            {* <div class="choice">
              <input type="radio" id="q1_3" name="q1" value="3">
              <label>รูปแบบที่ 3</label>
            </div> *}
            <div class="rdio rdio-primary radio-inline"> <input name="q1" value="3" id="q1_3" type="radio">
              <label for="q1_3">รูปแบบที่ 3</label>
            </div>
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/gr-3.png" alt="">
              </figure>
            </div>
          </div>
          <div class="col-6">
            {* <div class="choice">
              <input type="radio" id="q1_4" name="q1" value="4">
              <label>รูปแบบที่ 4</label>
            </div> *}
            <div class="rdio rdio-primary radio-inline"> <input name="q1" value="4" id="q1_4" type="radio">
              <label for="q1_4">รูปแบบที่ 4</label>
            </div>
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/gr-4.png" alt="">
              </figure>
            </div>
          </div>
        </div>
      </section>

      <section class="show-sequence">
        <div class="heading">
          2. ในความคิดเห็นของท่านการจัดลำดับหัวข้อในการแสดงผล ก่อน-หลัง ของหัวข้อบริการและงานวิจัยและนวัตกรรม
          ควรเป็นแบบใด
        </div>
        <div class="row">
          <div class="col">
            <div class="rdio rdio-primary radio-inline"> <input name="q2" value="1" id="q2_1" type="radio">
              <label for="q2_1">หัวข้อบริการ - หัวข้องานวิจัยและนวัตกรรม</label>
            </div>
            {* <div class="choice">
              <input type="radio" id="q2_1" name="q2" value="1">
              <label>หัวข้อบริการ - หัวข้องานวิจัยและนวัตกรรม</label>
            </div> *}
          </div>
          <div class="col">
            <div class="rdio rdio-primary radio-inline"> <input name="q2" value="2" id="q2_2" type="radio">
              <label for="q2_2">หัวข้องานวิจัยและนวัตกรรม - หัวข้อบริการ</label>
            </div>
            {* <div class="choice">
              <input type="radio" id="q2_2" name="q2" value="2">
              <label>หัวข้องานวิจัยและนวัตกรรม - หัวข้อบริการ</label>
            </div> *}
          </div>
        </div>
      </section>

      <section class="service-theme">
        <div class="heading">
          3. ท่านมีความชื่นชอบการออกแบบเว็บไซต์กรมวิทยาศาสตร์การแพทย์ หัวข้อบริการ ในรูปแบบใดมากที่สุด
        </div>
        <div class="row">
          <div class="col-6">
            <div class="rdio rdio-primary radio-inline"> <input name="q3" value="1" id="q3_1" type="radio">
              <label for="q3_1">หัวข้อบริการ - หัวข้องานวิจัยและนวัตกรรม</label>
            </div>
            {* <div class="choice">
              <input type="radio" id="q3_1" name="q3" value="1">
              <label>รูปแบบที่ 1</label>
            </div> *}
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/sv-1.png" alt="">
              </figure>
            </div>
          </div>
          <div class="col-6">
            <div class="rdio rdio-primary radio-inline"> <input name="q3" value="2" id="q3_2" type="radio">
              <label for="q3_2">หัวข้อบริการ - หัวข้องานวิจัยและนวัตกรรม</label>
            </div>
            {* <div class="choice">
              <input type="radio" id="q3_2" name="q3" value="2">
              <label>รูปแบบที่ 2</label>
            </div> *}
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/sv-2.png" alt="">
              </figure>
            </div>
          </div>
          <div class="col-6">
            <div class="rdio rdio-primary radio-inline"> <input name="q3" value="3" id="q3_3" type="radio">
              <label for="q3_3">หัวข้อบริการ - หัวข้องานวิจัยและนวัตกรรม</label>
            </div>
            {* <div class="choice">
              <input type="radio" id="q3_3" name="q3" value="3">
              <label>รูปแบบที่ 3</label>
            </div> *}
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/sv-3.png" alt="">
              </figure>
            </div>
          </div>
          <div class="col-6">
            <div class="rdio rdio-primary radio-inline"> <input name="q3" value="4" id="q3_4" type="radio">
              <label for="q3_4">หัวข้อบริการ - หัวข้องานวิจัยและนวัตกรรม</label>
            </div>
            {* <div class="choice">
              <input type="radio" id="q3_4" name="q3" value="4">
              <label>รูปแบบที่ 4</label>
            </div> *}
            <div class="thumb">
              <figure class="cover">
                <img src="{$template}/assets/img/sv-4.png" alt="">
              </figure>
            </div>
          </div>
        </div>
      </section>

      <section class="suggestions">
        <div class="form-group">
          <div class="heading" for="comment">4.
            ท่านมีข้อเสนอแนะเพิ่มเติมเกี่ยวกับการออกแบบเว็บไซต์กรมวิทยาศาสตร์การแพทย์หรือไม่</div>
          <textarea class="form-control" name="suggest" rows="5" id="comment" placeholder="กรอกข้อเสนอแนะ"></textarea>
        </div>
      </section>
      <input class="sending" type="submit" value="ส่งข้อมูล">
    </div>
  </form>
</div>