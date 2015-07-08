<?
Class resetpass extends CModule
{
    var $MODULE_ID = "resetpass";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function resetpass()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");
        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }
        $this->MODULE_NAME = "Восстановление пароля";
        $this->MODULE_DESCRIPTION = "Модуль генерирует новый пароль и высылает его вместо стандартного уведомления";
    }

    function DoInstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        // Install events
		RegisterModuleDependences("main","OnAfterRegisterModule","resetpass","cMainIE","OnAfterRegisterModuleHandler");
		//RegisterModuleDependences("main","OnAfterUnRegisterModule","resetpass","cMainUE","OnAfterUnRegisterModuleHandler");
        RegisterModuleDependences("main","OnBeforeUserSendPassword","resetpass","cMainRP","OnBeforeUserSendPasswordHandler");
        RegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile("Установка модуля resetpass", $DOCUMENT_ROOT."/bitrix/modules/resetpass/install/step.php");
        return true;
    }

    function DoUninstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
		UnRegisterModuleDependences("main","OnAfterRegisterModule","resetpass","cMainIE","OnAfterRegisterModuleHandler");
		//UnRegisterModuleDependences("main","OnAfterUnRegisterModule","resetpass","cMainUE","OnAfterUnRegisterModuleHandler");
        UnRegisterModuleDependences("main","OnBeforeUserSendPassword","resetpass","cMainRP","OnBeforeUserSendPasswordHandler");
        UnRegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile("Деинсталляция модуля resetpass", $DOCUMENT_ROOT."/bitrix/modules/resetpass/install/unstep.php");
        return true;
    }

  
    //Добавляем почтовые события
       
     
    public function InstallEvents() {		 
         return true;
    }
 
    
     // Удаляем почтовые события
          
    public function UnInstallEvents() {
        return true;
    }
}
	?>