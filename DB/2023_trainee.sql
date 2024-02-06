SELECT
        md_tgp.md_tgp_id as id,
        md_tgp.md_tgp_masterkey as masterkey,
        md_tgp.md_tgp_subjecten as subject,
        md_tgp.md_tgp_titleen as title,
        md_tgp.md_tgp_picen as pic,
        md_tgp.md_tgp_filevdoen as filevdo,
        md_tgp.md_tgp_urlvdoen as urlvdo,
        md_tgp.md_tgp_type as type,
        md_tgp.md_tgp_urlen as url,
        md_tgp.md_tgp_target as target

    
        FROM
        md_tgp
        WHERE 
        md_tgp.md_tgp_masterkey = 'tg' AND
        md_tgp.md_tgp_status != 'Disable' AND
        ((md_tgp.md_tgp_sdate='0000-00-00 00:00:00' AND
        md_tgp.md_tgp_edate='0000-00-00 00:00:00')   OR
        (md_tgp.md_tgp_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(md_tgp.md_tgp_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(md_tgp.md_tgp_sdate)<=TO_DAYS(NOW()) AND
        md_tgp.md_tgp_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(md_tgp.md_tgp_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(md_tgp.md_tgp_edate)>=TO_DAYS(NOW())  ))
         ORDER  BY md_tgp.md_tgp_order DESC wwebplus_db