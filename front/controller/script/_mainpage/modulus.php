<?php
$callSetWebsite = new settingWebsite();
// $infoSetting = $callSetWebsite->callSetting();
$smarty->assign("typeMember", $typeMember);

#function assign seo & title page
Seo();
function Seo($title = '', $desc = '', $keyword = '')
{
    global $smarty, $infoSetting;
    $list = array();
    if (!empty($title)) {
        if (!empty($infoSetting->fields['metatitle'])) {
            $list_last = $infoSetting->fields['metatitle'];
        } elseif (!empty($infoSetting->fields['subject'])) {
            $list_last = $infoSetting->fields['subject'];
        } else {
            $list_last = 'Template Website';
        }

        $list['title'] = trim($title) . " - " . $list_last;
    } else {
        if (!empty($infoSetting->fields['metatitle'])) {
            $list['title'] = $infoSetting->fields['metatitle'];
        } elseif (!empty($infoSetting->fields['subject'])) {
            $list['title'] = $infoSetting->fields['subject'];
        } else {
            $list['title'] = 'Template Website';
        }
    }

    if (!empty($desc)) {
        $list['desc'] = trim($desc);
    } else {
        $list['desc'] = $infoSetting->fields['description'];
    }

    if (!empty($keyword)) {
        $list['keyword'] = trim($keyword);
    } else {
        $list['keyword'] = $infoSetting->fields['keywords'];
    }
    $smarty->assign("seo", $list);

}



function callCheckMember($session = null, $namefb = null)
{
    global $config, $db, $url;

    $namefb = str_replace(".", " ", $namefb);
    if ($session == $namefb) {
        $status = 1;
    } else {
        $status = 0;
    }
    return $status;
}

function callProfileMember($masterkey = 'member', $id = 0)
{
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    // print_pre($url);
    $sql = "SELECT
    " . $config['member']['db'] . "." . $config['member']['db'] . "_id as id,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey as masterkey,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_fname as name,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_lname as lname,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_email as email,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_cover as cover,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_facebook as facebook,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_status as status,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_type as type,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_logindate as logindate,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_tel as tel,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_lineid as lineid,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_address as address,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_pic as pic,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_pointtotal as pointtotal,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_credit_shoping as credit_shoping,
    " . $config['member']['db'] . "." . $config['member']['db'] . "_credit_delivery as credit_delivery
    FROM
    " . $config['member']['db'] . "
    WHERE
    " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey = '$masterkey' 
    ";

    if (!empty($id)) {
        $sql .= " and " . $config['member']['db'] . "." . $config['member']['db'] . "_id = $id ";
    }

    $result = $db->execute($sql);
    return $result;
}

#### SETTING
$settingWeb = array();
$settingWeb['id'] = $infoSetting->fields['id'];
$settingWeb['masterkey'] = $infoSetting->fields['masterkey'];
$settingWeb['subject'] = $infoSetting->fields['subject'];
$settingWeb['subjectoffice'] = $infoSetting->fields['subjectoffice'];
$settingWeb['description'] = $infoSetting->fields['description'];
$settingWeb['keywords'] = $infoSetting->fields['keywords'];
$settingWeb['metatitle'] = $infoSetting->fields['metatitle'];
$settingWeb['contact'] = unserialize($infoSetting->fields['config']);
$settingWeb['social'] = unserialize($infoSetting->fields['social']);
$settingWeb['addresspic'] = $infoSetting->fields['addresspic'];
$settingWeb['qr'] = $infoSetting->fields['qr'];
$settingWeb['picbank'] = $infoSetting->fields['picbank'];
// print_pre($settingWeb);
$smarty->assign("settingWeb", $settingWeb);


class settingWebsite
{
    function callSetting()
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        // print_pre($url);
        $sql = "SELECT
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_id as id,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_masterkey as masterkey,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_subject as subject,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_subjectoffice as subjectoffice,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_description as description,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_keywords as keywords,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_metatitle as metatitle,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_social as social,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_config as config,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_addresspic  as addresspic,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_qr as qr,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_picbank as picbank

        
      
        FROM
        " . $config['setting']['db'] . "
        WHERE
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_masterkey = '" . $config['setting']['masterkey'] . "' 
        ";




        $result = $db->execute($sql);
        return $result;
    }

    function Call_Album($id, $table, $lang = null)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];

        $sql = "SELECT 
            " . $table . "." . $table . "_id                AS id,
            " . $table . "." . $table . "_contantid         AS contantid,
            " . $table . "." . $table . "_filename          AS filename,
            " . $table . "." . $table . "_name              AS name,
            " . $table . "." . $table . "_download          AS download
            FROM " . $table . "  
            WHERE 1=1 AND
            " . $table . "." . $table . "_contantid = '" . $id . "'
            ";

        $sql .= " ORDER BY " . $table . "." . $table . "_seq ASC ";
        $result = $db->execute($sql);
        return $result;
    }

    function Call_File($id, $keyfile = null)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        $langFull = $url->pagelang[4];

        $sql = "SELECT 
            " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_id                AS id,
            " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_contantid         AS contantid,
            " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_filename          AS filename,
            " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_name              AS name,
            " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_download          AS download
            FROM " . $config['cmf']['db']['main'] . "  
            WHERE 1=1 
            AND " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_contantid = '" . $id . "'
            ";

        if (!empty($keyfile)) {
            $sql .= "
        AND " . $config['product']['category'] . "." . $config['product']['category'] . "_id = '" . $id . "'
        ";
        }

        $sql .= " ORDER BY " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_id ASC ";
        $result = $db->execute($sql);
        return $result;
    }

    function updateView($id, $masterkey, $table)
    {
        global $config, $db, $url;

        $sql = "SELECT
        " . $table . "." . $table . "_view
        FROM
        " . $table . "
        WHERE
        " . $table . "." . $table . "_masterkey = '$masterkey' 
        AND
        " . $table . "." . $table . "_id = '$id' 
        ";
        $result = $db->execute($sql);
        $view = $result->fields[0] + 1;

        $listView[$table . '_view'] = $view;
        $updateView = sqlupdate($listView, $table, $table . "_id", "'" . $id . "'");

        return $updateView;
    }
}
