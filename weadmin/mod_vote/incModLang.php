<?php
if($_SESSION[$valSiteManage."core_session_language"]=="Eng"){

}else{
		$langMod["txt:titleadd"] = "สร้างข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleedit"] = "แก้ไขข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleview"] = "แสดงผลข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:sortpermis"] = "จัดเรียงข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:subject"] = "ข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:subjectDe"] = "โปรดป้อนชื่อ เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

		// $langMod["txt:subjectDe2"] = "ชื่อเพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["txt:subjectDe2"] = "แสดงผลรายละเอียดของ".getNameMenu($_REQUEST["menukeyid"]);


		$langMod["txt:title"] = "ข้อมูลรายละเอียด".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleDe"] = "โปรดป้อนรายละเอียด เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["txt:pic"] = "รูปภาพ";
		$langMod["txt:vdo"] = "วิดีโอ";
		$langMod["txt:picvdo"] = "รูปภาพ หรือ วิดีโอ";
		$langMod["txt:picDe"] = "ข้อมูลรูปภาพ หรือ วิดีโอประกอบ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";

		$langMod["txt:seo"] = "กำหนดวันที่ในการแสดงผล";
		$langMod["txt:seoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่ในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		
		
		$langMod["inp:notedate"] ="หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";

		$langMod["edit:linknote"] ="หมายเหตุ :<br> - กรุณาใส่ URL นำหน้าด้วย \"http://\" เช่น http://www.wewebplus.com เป็นต้น <br> - กรณีไม่ต้องการใส่ URL ให้ใช้เครื่องหมาย # แทน";

		// $langMod["inp:album"] ="เลือกรูปภาพ";
		$langMod["tit:subject"] ="ชื่อ".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["tit:sdate"] ="วันเริ่มต้น";
		$langMod["tit:edate"] ="วันสิ้นสุด";
		$langMod["file:type"] ="ประเภท";
		$langMod["file:size"] ="ขนาด";
		$langMod["file:download"] ="ดาวน์โหลด";
		$langMod["tit:link"] ="ลิงค์ URL";
		$langMod["tit:linkvdo"] ="ลิงค์ youtube";
		$langMod["home:detail"] ="อ่านรายละเอียด";
		$langMod["tit:typevdo"] ="การแสดงผล";
		$langMod["inp:notepic"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthReal."x".$sizeHeightReal." พิกเซล";
		
		$langMod["tit:selectg"] ="เลือกบริษัทรถยนต์มือสอง";
		$langMod["tit:selectgn"] ="บริษัทรถยนต์มือสอง";
		
		$langMod["tit:selecttn"] ="รุ่นศูนย์บริการ";
		$langMod["tit:selectt"] ="เลือกรุ่นศูนย์บริการ";
		
		$langMod["tit:inpName"] = "ชื่อ".getNameMenu($_REQUEST["menukeyid"]);

		$langMod["txt:video"] = "ข้อมูลวิดีโอ";
		$langMod["txt:videoDe"] = "ข้อมูลวิดีโอ เพื่อใช้ในการแสดงผลวิดีโอของเนื้อหานี้ ในรูปแบบเครื่องเล่นวิดีโอบนเว็บไซต์ของคุณ";
		$langMod["inp:album"] ="เลือกรูปภาพ";
		$langMod["inp:vdo"] ="เลือกวิดีโอ";
		$langMod["inp:chfile"] ="เปลี่ยนชื่อเอกสารแนบ";
		$langMod["inp:sefile"] ="เลือกเอกสารแนบ";
		$langMod["inp:notefile"] ="หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์";
		$langMod["inp:notedate"] ="หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";
		$langMod["inp:notepic"] ="หมายเหตุ : การอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif , ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthReal."x".$sizeHeightReal." พิกเซล";
		$langMod["inp:notealbum"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthAlbum."x".$sizeHeightAlbum." พิกเซล";
		$langMod["tit:uploadvdo"] ="อัพโหลดไฟล์";

		$langMod["tit:linkvdonote"] = "หมายเหตุ : เฉพาะชื่อ URL youtube.com เท่านั้น";
		$langMod["tit:uploadvdonote"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .mp4 และขนาดไม่เกิน 10 Mb เท่านั้น";



		$langMod["txt:id"] = "ID";
		$langMod["txt:ip"] = "IP Address";
		$langMod["txt:detail"] = "ดูรายละเอียด";

		// Question
		$langMod["txt:q1short"] = "ข้อที่ 1";
		$langMod["txt:q2short"] = "ข้อที่ 2";
		$langMod["txt:q3short"] = "ข้อที่ 3";
		$langMod["txt:q4short"] = "ข้อที่ 4";

		$langMod["txt:q1"] = "1. ความชื่นชอบการออกแบบเว็บไซต์";
		$langMod["txt:q2"] = "2. การจัดลำดับหัวข้อในการแสดงผล ก่อน - หลัง";
		$langMod["txt:q3"] = "3. ความชื่นชอบการออกแบบเว็บไซต์ หัวข้อบริการ";
		$langMod["txt:suggest"] = "ข้อเสนอแนะ";

		//Ans Q1
		$langMod["q1:a1"] = "รูปแบบที่ 1";
		$langMod["q1:a2"] = "รูปแบบที่ 2";
		$langMod["q1:a3"] = "รูปแบบที่ 3";
		$langMod["q1:a4"] = "รูปแบบที่ 4";

		//Ans Q2
		$langMod["q2:a1"] = "บริการ - งานวิจัยและนวัตกรรม";
		$langMod["q2:a2"] = "งานวิจัยและนวัตกรรม - บริการ";

		//Ans Q3
		$langMod["q3:a1"] = "รูปแบบที่ 1";
		$langMod["q3:a2"] = "รูปแบบที่ 2";
		$langMod["q3:a3"] = "รูปแบบที่ 3";
		$langMod["q3:a4"] = "รูปแบบที่ 4";


}
?>
