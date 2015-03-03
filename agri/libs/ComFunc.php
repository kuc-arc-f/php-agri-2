<?php
//------------------------------------
// @calling
// @purpose : Zero Str, max=10 char
// @date
// @argment
// @return
//------------------------------------
function CM001_getZeroStr( $src, $num ){
	if($num > 10){
		return "";
	}
	
	
	$buff="0000000000";

	$buff = $buff . $src;
	$i_len = strlen($buff);
	$ret = substr($buff, $i_len - $num, $num);
	
	return $ret;
}
//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_getMcDat($db, $sid){
	$ret=NULL;
	
	//$db     =new ComMysql();
	$dat = array();
	$sql = "select id, mc_name ,moi_num ";
	$sql = $sql ." , kai_num_1, vnum_1";
	$sql = $sql ." , kai_num_2, vnum_2";
	$sql = $sql ." , kai_num_3, vnum_3";
	$sql = $sql ." , kai_num_4, vnum_4";
	$sql = $sql ." , ck_num, created";
	$sql = $sql . " from m_mcs where id="  . $sid .  " limit 1;";

	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$dat[0] = $row;
	}
	$ret = $dat;
		
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveSensor($db, $getDat, $datMc ){
	$ret=FALSE;
//	$db     =new ComMysql();
	if($datMc["vnum_1"] == OK_CODE){
		$sql="";
		$sql= $sql . "INSERT INTO t_sensors (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", snum";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",1";
		$sql= $sql . "," . $getDat["snum_1"];
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_2"] == OK_CODE){
		$sql= "";
		$sql= $sql . "INSERT INTO t_sensors (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", snum";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",2";
		$sql= $sql . "," . $getDat["snum_2"];
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_3"] == OK_CODE){
		$sql= "";
		$sql= $sql . "INSERT INTO t_sensors (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", snum";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",3";
		$sql= $sql . "," . $getDat["snum_3"];
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_4"] == OK_CODE){
		$sql= "";
		$sql= $sql . "INSERT INTO t_sensors (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", snum";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",4";
		$sql= $sql . "," . $getDat["snum_4"];
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}	
	
	$ret = TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return TRUE: nothing.dat
//------------------------------------
function com_Is_addSensor($db, $mc_id, $sSec ){
		$ret=FALSE;
		$dat = array();
		$sql = "select id, mc_id, DATE_FORMAT(created,'%Y-%m-%d %H:%i:%s') as creat_dt";
		$sql = $sql ." from t_sensors where mc_id =" . $mc_id;
		$sql = $sql ." ORDER BY created desc limit 1";
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$dat[0] = $row;
		}
		if($dat==NULL){
//			var_dump("NULL: com_Is_addSensor" . "id=" . $mc_id);
		  return TRUE;
		
		}
		$datSec = array();
		$sql="SELECT  TIMESTAMPDIFF(SECOND, '" . $dat[0]["creat_dt"] . "', now()) as sec_num;";
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$datSec[0] = $row;
		}
		$iSec= $datSec[0]["sec_num"];
// var_dump("sec_num=" . $datSec[0]["sec_num"]);
		if($iSec > $sSec){
		  return TRUE;
		}
		return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return TRUE: nothing.dat
//------------------------------------
function com_Is_addValve($db, $mc_id, $sSec ){
		$ret=FALSE;
		$dat = array();
		$sql = "select id, mc_id, DATE_FORMAT(created,'%Y-%m-%d %H:%i:%s') as creat_dt";
		$sql = $sql ." from t_vitems where mc_id =" . $mc_id;
		$sql = $sql ." ORDER BY created desc limit 1";
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$dat[0] = $row;
		}
		if($dat==NULL){
		  return TRUE;
		
		}
		$datSec = array();
		$sql="SELECT  TIMESTAMPDIFF(SECOND, '" . $dat[0]["creat_dt"] . "', now()) as sec_num;";
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$datSec[0] = $row;
		}
		$iSec= $datSec[0]["sec_num"];
//var_dump("sec_num=" . $datSec[0]["sec_num"]);
		if($iSec > $sSec){
		  return TRUE;
		}
		return $ret;
}	

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return TRUE: opne-Valve
//------------------------------------
function Is_validValve($iSen, $iMoi ){
	$ret=NG_CODE;
	
	if($iMoi > $iSen){
		$ret =OK_CODE;
	}
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveValve($db, $getDat, $datMc ){
	$ret=FALSE;
//var_dump($datMc["moi_num"]);
//$getDat["snum_1"]
	$k_flg_1 =Is_validValve($getDat["snum_1"], $datMc["moi_num"] );
	$k_flg_2 =Is_validValve($getDat["snum_2"], $datMc["moi_num"] );
	$k_flg_3 =Is_validValve($getDat["snum_3"], $datMc["moi_num"] );
	$k_flg_4 =Is_validValve($getDat["snum_4"], $datMc["moi_num"] );
var_dump($k_flg_1);
	if($datMc["vnum_1"] == OK_CODE){
		$sql="";
		$sql= $sql . "INSERT INTO t_vitems (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", k_flg";
		$sql= $sql . ", k_kbn";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",1";
		$sql= $sql . "," . $k_flg_1;
		$sql= $sql . ",1";
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_2"] == OK_CODE){
		$sql="";
		$sql= $sql . "INSERT INTO t_vitems (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", k_flg";
		$sql= $sql . ", k_kbn";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",2";
		$sql= $sql . "," . $k_flg_2;
		$sql= $sql . ",1";
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_3"] == OK_CODE){
		$sql="";
		$sql= $sql . "INSERT INTO t_vitems (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", k_flg";
		$sql= $sql . ", k_kbn";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",3";
		$sql= $sql . "," . $k_flg_3;
		$sql= $sql . ",1";
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_4"] == OK_CODE){
		$sql="";
		$sql= $sql . "INSERT INTO t_vitems (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", k_flg";
		$sql= $sql . ", k_kbn";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",4";
		$sql= $sql . "," . $k_flg_4;
		$sql= $sql . ",1";
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	$ret=TRUE;
	return $ret;
}
//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveLog($db, $getDat, $datMc ){
	$ret=FALSE;
	
	$s_log ="";
	$s_log ="MC-ID=" . $getDat["mc_id"];
	$s_log = $s_log . " ,SNUM-1=" . $getDat["snum_1"];
	$s_log = $s_log . " ,SNUM-2=" . $getDat["snum_2"];
	$s_log = $s_log . " ,SNUM-3=" . $getDat["snum_3"];
	$s_log = $s_log . " ,SNUM-4=" . $getDat["snum_4"];	
	
	$sql="";
	$sql= $sql . "INSERT INTO t_mlogs (";
	$sql= $sql . " mc_id";
	$sql= $sql . ",txt_log";
	$sql= $sql . ", created";
	$sql= $sql . ") values (";
	$sql= $sql . $getDat["mc_id"];
	$sql= $sql . ",'" . $s_log . "'";
	$sql= $sql . ",now()";
	$sql= $sql . ");";
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	
	$ret=TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_getResponse(  $getDat, $datMc ){
	$ret ="000000000000000000000000";
	$ret2="";
	$k_flg_1 =Is_validValve($getDat["snum_1"], $datMc["moi_num"] );
	$k_flg_2 =Is_validValve($getDat["snum_2"], $datMc["moi_num"] );
	$k_flg_3 =Is_validValve($getDat["snum_3"], $datMc["moi_num"] );
	$k_flg_4 =Is_validValve($getDat["snum_4"], $datMc["moi_num"] );	
	   
	$ret2  = OK_CODE;
	$ret2 = $ret2 . ER_STAT_000;
	$ret2 = $ret2 . CM001_getZeroStr($datMc['moi_num'] ,4);
	if($datMc["vnum_1"]== OK_CODE){
		$ret2 = $ret2 . $k_flg_1;
	}else{
		$ret2 = $ret2 . NG_CODE;
	}
	if($datMc["vnum_2"]== OK_CODE){
		$ret2 = $ret2 . $k_flg_2;
	}else{
		$ret2 = $ret2 . NG_CODE;
	}
	if($datMc["vnum_3"]== OK_CODE){
		$ret2 = $ret2 . $k_flg_3;
	}else{
		$ret2 = $ret2 . NG_CODE;
	}
	if($datMc["vnum_4"]== OK_CODE){
		$ret2 = $ret2 . $k_flg_4;
	}else{
		$ret2 = $ret2 . NG_CODE;
	}
	$ret2 = $ret2 . CM001_getZeroStr($datMc['kai_num_1'] ,3);
	$ret2 = $ret2 . CM001_getZeroStr($datMc['kai_num_2'] ,3);
	$ret2 = $ret2 . CM001_getZeroStr($datMc['kai_num_3'] ,3);
	$ret2 = $ret2 . CM001_getZeroStr($datMc['kai_num_4'] ,3);
	$ret  = substr($ret2, 0, 24);
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function _get_element( $pElement, $pSource ) {
   $_data = null;
   $pElement = strtolower( $pElement );
   $_start = strpos( strtolower( $pSource ), chr(60) . $pElement, 0 );
   $_start = strpos( $pSource, chr(62), $_start ) + 1;
   $_stop = strpos( strtolower( $pSource ), "</" . $pElement .    chr(62), $_start );
   if( $_start > strlen( $pElement ) && $_stop > $_start ) {
      $_data = trim( substr( $pSource, $_start, $_stop - $_start ) );
   }
   return( $_data );
}

//------------------------------------
// @calling : 時間(int)の差分時間を求める。
// @purpose :
// @date
// @argment : 
// @return  : 差分時間(分)
//------------------------------------
function CM001_getDiff_mm($start_hh, $start_mm ,$end_hh, $end_mm){

	$st_dt   = mktime($start_hh    , $start_mm    , 0, 1, 1, 2000 );
	$end_dt  = mktime($end_hh      , $end_mm      , 0, 1, 1, 2000 );
	$diff_mm = $end_dt - $st_dt;
    $diff_mm = $diff_mm / 60;

return $diff_mm;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return : bool
//------------------------------------
function Com_checkAgent(){
	$clsConst = new AppConst();
	
	$s_buf = $_SERVER["HTTP_USER_AGENT"];

	$i_pos = strpos($s_buf , "MSIE");
	if( $i_pos != false){
	  $_SESSION["CM001"]["HTTP_USER_AGENT"]= $clsConst->VAL014_WEB_IE ;
	  return true;
	}
//var_dump($i_pos);
// exit;

	$i_pos_ch = strpos($s_buf , "Chrome");
	if (($i_pos == false) && ($i_pos_ch == false)) {
		return false;
	}
	
	return true;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function Com_logWrite($msg){
	$s_time = date("Y/m/d H:i:s");
	
	if(LOG_FLG==true){
		error_log($s_time  . " ". $msg . "\r\n" ,3, LOG_FNAME);
	//	error_log($s_time  . " ". $msg . "\n" ,3, LOG_FNAME);
	}
}
//
function init() {
	//MySmartyクラスの読み込み
	require_once($_SERVER["DOCUMENT_ROOT"]. "/../libs/MySmarty.class.php");
	
	//セッションを開始する
	session_start();
	session_regenerate_id(true);

}


?>