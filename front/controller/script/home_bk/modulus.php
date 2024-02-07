<?php
class HomePage {
    function callTopGraphic($masterkey){
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        $langOption = $url->pagelang[2];
       
        $sql = "SELECT
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_id as id,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey as masterkey,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_subject" . $lang . " as subject,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_title" . $lang . " as title,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_pic" . $lang . " as pic,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_filevdo" . $lang . " as filevdo,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_urlvdo" . $lang . " as urlvdo,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_type as type,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_url" . $lang . " as url,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_target as target

    
        FROM
        " . $config['tgp']['db'] . "
        WHERE 
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey = '".$masterkey."' AND
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_status != 'Disable' AND
        ((" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00')   OR
        (" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW())  ))
        ";
    
        $sql .= " ORDER  BY " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_order DESC ";
        $result = $db->execute($sql);
        return $result;
    }

    // Section 2 : About 
    function callAbout($masterkey){
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        $langOption = $url->pagelang[2];
       
        $sql = "SELECT
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject" . $lang . " as subject,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title" . $lang . " as title,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_htmlfilename" . $lang . " as htmlfilename

    
        FROM
        " . $config['cms']['db'] . "
        WHERE 
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$masterkey."' AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable' AND
        ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
        (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))
        ";
    
        $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
        $result = $db->execute($sql);
        return $result;
    }

    // Section : Benefit
    function callBnf($masterkey){
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        $langOption = $url->pagelang[2];
       
        $sql = "SELECT
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject" . $lang . " as subject,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title" . $lang . " as title,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_htmlfilename" . $lang . " as htmlfilename,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic" . $lang . " as pic

    
        FROM
        " . $config['cms']['db'] . "
        WHERE 
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$masterkey."' AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable' AND
        ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
        (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))
        ";
    
        $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
        $result = $db->execute($sql);
        return $result;
    }


    // Section : ตอบสนองทุกความต้องการ
    function callReg($masterkey){
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        $langOption = $url->pagelang[2];
       
        $sql = "SELECT
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject" . $lang . " as subject,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title" . $lang . " as title,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_htmlfilename" . $lang . " as htmlfilename

    
        FROM
        " . $config['cms']['db'] . "
        WHERE 
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$masterkey."' AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable' AND
        ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
        (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))
        ";
    
        $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
        $result = $db->execute($sql);
        return $result;
    }
    

    // Section : Aeon Thai Mobile
    function callMobile($masterkey){
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        $langOption = $url->pagelang[2];
       
        $sql = "SELECT
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject" . $lang . " as subject,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title" . $lang . " as title,
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_htmlfilename" . $lang . " as htmlfilename

    
        FROM
        " . $config['cms']['db'] . "
        WHERE 
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$masterkey."' AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable' AND
        ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
        (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))
        ";
    
        $sql .= " ORDER  BY " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
        $result = $db->execute($sql);
        return $result;
    }
    

}
   