<?php
class cMainUE {
    static $MODULE_ID="resetpass";
         
         static function OnAfterUnRegisterModuleHandler($arFields){
       	 $delet = new CEventType;
         $delet->Delete(array(  
		 "ID" => "#ID#",
         "EVENT_NAME" => "New_password_user",
         "NAME" => "Отправить новый пароль пользователю",
		 "LID"=> "ru",
		 "DESCRIPTION"   => "
        #LOGIN# - Имя пользователя
        #PASSWORD# - новый пароль
		#EMAIL# - E-mail"
        ));
         

	}
}
	?>