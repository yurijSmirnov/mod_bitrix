<?php
class cMainIE {
    static $MODULE_ID="resetpass";
     
        static function OnAfterRegisterModuleHandler($arFields){
        
        // Активная деятельность
		// создаем тип почтового события
	    $obEventType = new CEventType;
        $obEventType->Add(array(
        "EVENT_NAME"    => "New_password_user",
        "NAME"          => "Отправить новый пароль пользователю",
        "LID"       => "ru",
        "DESCRIPTION"   => "
        #LOGIN# - Имя пользователя
        #PASSWORD# - новый пароль
		#EMAIL# - E-mail"
        ));	
		// создаем почтовый шаблон 
	    $shablon = new CEventMessage;
        $shablon->Add(array(
	    "ACTIVE"  => "Y",
        "EVENT_NAME"  => "New_password_user",
        "LID"  => "s1",
        "EMAIL_FROM"  => "#DEFAULT_EMAIL_FROM#",
        "EMAIL_TO"  => "#EMAIL_TO#",
        "BCC" => "#BCC#",
        "SUBJECT"  => "добавлен новый пароль",
        "BODY_TYPE" => "text",
        "MESSAGE"  => "
         Текст сообщения
	    #LOGIN# - Имя пользователя
        #PASSWORD# - новый пароль
        #EMAIL# - E-mail"
        ));
     
        }
}
	?>