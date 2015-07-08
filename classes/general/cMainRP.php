<?php
class cMainRP {
    static $MODULE_ID="resetpass";

    static function OnBeforeUserSendPasswordHandler($arFields){
        
        // Активная деятельность
		 //генерируем пароль
		$new_password_length = rand(7,10);
		$new_password = '';
		$allowed_symbols = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*-+=1234567890';
		for($i=0;$i<$new_password_length;$i++){
			$symbol_number =rand(0,strlen($allowed_symbols));
			$new_password .= $allowed_symbols[$symbol_number];		
		}
		// проверяем какое поле заполнил пользователь
		if ($arFields['LOGIN']) {
			$filter = Array("LOGIN" => $arFields['LOGIN']);
		} elseif ($arFields['EMAIL']) {
			$filter = Array("EMAIL" => $arFields['EMAIL']);
		}	
        // находим ID пользователя		
		$sql = CUser::GetList(($by="id"), ($order="desc"), $filter);
		$result = $sql->Fetch();
		$id_user = $result[ID];
				
		$user = new CUser;
		$fields = Array(
		  "PASSWORD"          => $new_password,
		  "CONFIRM_PASSWORD"  => $new_password,		 
		 );
		$result = $user->Update($id_user, $fields);
		$strError .= $user->LAST_ERROR;
		
		$fp = fopen($_SERVER["DOCUMENT_ROOT"].'/bitrix/tmp/temp.log', 'w');
		foreach ($arFields as $key => $value){
          fputs($fp, "$key => $value ") ;
		};
			
		foreach ($arUser as $key => $value){
			fputs($fp, "$key => $value  ") ;
		}
		fputs($fp,$new_password) ;
		fputs($fp,"<br/>$id_user");        
        fclose($fp);
				
        
    }
}