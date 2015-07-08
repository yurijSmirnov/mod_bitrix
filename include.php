<?php
CModule::IncludeModule("resetpass");
global $DBType;

$arClasses=array(
    'cMainRP'=>'classes/general/cMainRP.php',
	'cMainIE'=>'classes/general/cMainIE.php',
	//'cMainUE'=>'classes/general/cMainUE.php'
);

CModule::AddAutoloadClasses("resetpass",$arClasses);
