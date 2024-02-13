<?php
// module directory name
$HmvcConfig['expend_iture']["_title"]     = "Expenditure";
$HmvcConfig['expend_iture']["_description"] = "Expenditure contains all incomes and expenses";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['expend_iture']['_database'] = true;
$HmvcConfig['expend_iture']["_tables"] = array( 
	'expenditureytype',
	'expensesmesurement',
	'incomesmesurement',
	'expeniturey_ref_accomodation'
);
