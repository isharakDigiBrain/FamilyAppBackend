<?php

 // constant path definitions
 defined('DS') ? null          : define('DS', DIRECTORY_SEPARATOR);
 defined('WS') ? null          : define('WS', "/"); // Web Directory Separator
 defined('SITE_ROOT') ? null   : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].WS.'Fm');    
//  defined('LIB_PATH') ? null    : define('LIB_PATH', SITE_ROOT.DS.'Includes');
 //date_default_timezone_set('Asia/Dubai');

 // SITE ROUTES

 defined('SITE_ROOT_TEMPLATE') ? null    : define('SITE_ROOT_TEMPLATE',SITE_ROOT. WS . 'Template' . WS );
 defined('SITE_ROOT_ROLE') ? null    : define('SITE_ROOT_ROLE',SITE_ROOT. WS . 'Role' . WS );
 defined('SITE_ROOT_MODEL') ? null    : define('SITE_ROOT_MODEL',SITE_ROOT. WS . 'model' . WS );

 function siteURL()
 {
     $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443  ) ? "https://" : "http://";
    //  if($protocol == "http://"){
    //    //  header('Location: https://'.$_SERVER['SERVER_NAME'].'/');
    //      exit();
    //  }
     $domainName =  $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].WS.'Fm'.WS;
     return $protocol.$domainName;
 }


 defined('WEB_ROOT') ? null    : define('WEB_ROOT',siteURL());


 defined('WEB_ROOT_TEMPLATE') ? null    : define('WEB_ROOT_TEMPLATE',WEB_ROOT. WS . 'Template' . WS );
 defined('WEB_ROOT_ROLE') ? null    : define('WEB_ROOT_ROLE',WEB_ROOT. WS . 'Role' . WS );
 defined('WEB_ROOT_MODEL') ? null    : define('WEB_ROOT_MODEL',WEB_ROOT. WS . 'model' . WS );

 //
 