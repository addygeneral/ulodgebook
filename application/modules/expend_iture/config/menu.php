<?php

// module name
$HmvcMenu["expend_iture"] = array(
    //set icon
    "icon"           => "<i class='ti-agenda'></i>
", 


                //group level name
                "categori_list" => array(
                    //menu name
                        "controller" => "expend_iture",
                        "method"     => "index",
                        "url"        => "expend_iture/expend-iture-list",
                        "permission" => "read"
                    
                ),
                "incomes_list" => array(
                    //menu name
                        "controller" => "incom_es",
                        "method"     => "index",
                        "url"        => "expend_iture/incom-es-list",
                        "permission" => "read"
                    
                ), 
                "expenses_list" => array(
                    //menu name
                        "controller" => "expen_ses",
                        "method"     => "index",
                        "url"        => "expend_iture/expen-ses-list",
                        "permission" => "read"
                    
                ), 
            );