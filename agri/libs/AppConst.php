<?php
define("OK_CODE" ,  1 );
define("NG_CODE" ,  0 );

define("ANQ_DB_HOST", "localhost");
define("ANQ_DB_NAME", "agri_db");
define("ANQ_DB_USER", "agri_user");
define("ANQ_DB_PASS", "password");

//CODE
define("ER_STAT_000" , "000" ); //zero
define("ER_STAT_101" , "101" ); //DB-Error
define("ER_STAT_102" , "102" ); //Nothing ,mc-ID
define("ER_STAT_103" , "103" ); //給水なし、ＭＣ有り
 
define("ROOT_DIR"   , $_SERVER['DOCUMENT_ROOT'] . "/..");
define("BM_ROOT_DIR", $_SERVER['DOCUMENT_ROOT'] . "/agri" );


define("BM_ROOT_URL",  "/agri");
define("PUBLIC_DIR"  , ROOT_DIR ."/public");
define("PUBLIC_URL"  , BM_ROOT_URL ."/public");

define("LOG_FLG"     , true);
define("LOG_FNAME"   , BM_ROOT_DIR . "/log/error_php.log");				// エラー用ログファイルパス

//URL
define("YT_SERVER_NAME", $_SERVER['SERVER_NAME']);

// Cook
$i_cook_exp = 3600 * 24 * 360;

define("BM_COOK_EXPR",  $i_cook_exp);
define("BM_COOK_USER" ,"bm_user_id");
define("BM_COOK_PASS" ,"bm_user_pass");

define("YT_LIMIT_DAY_NUM" , $i_cook_exp);
define("YT_LIMIT_REG_NUM" , 5);
define("YT_LIMIT_REG_USER_NUM" , 100);
define("YT_LIMIT_REG_TR_NUM"   , 1000 );

define("BM_FORM_TYP_NEW"    , 1 );
define("BM_FORM_TYP_EDIT"   , 2 );


//Message
define("MSG_001"   , "Copyright 2009-2015 ,Inc. All right reserved. ");
define("MSG_002"   , "Copyright KUC architect fukuoka Inc.");

define("MSG_YT_ERROR_01"   , "。");
?>