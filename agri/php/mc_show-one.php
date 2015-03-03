<?php
/*
function get_beforeArray( ){
[date]
SELECT  DATE_FORMAT(date_add(current_date, interval -1 day),'%m%d')
[where]
select id , mc_id, vnum,  substr(DATE_FORMAT(created,'%H%i') ,4 ,4), created,DATE_FORMAT(created,'%H%i') as ct_str ,DATE_FORMAT(now(),'%m%d')  from t_sensors
 where mc_id=13
 and vnum=1 and DATE_FORMAT(created,'%m%d') >= '0224'
 and substr(DATE_FORMAT(created,'%H%i') ,4 ,4) ='0'
 order  by created DESC
}

function get_timeArray( $dat ){
	$ret= array();
	$iCt=0;
	foreach ($dat as &$value) {
			$item= array();
			$tm = $value["ct_str"];
			$len = strlen($tm);
			if($len >=4 ){
				$mm  =substr($tm, 3,1);
				if($mm =="0"){
					$item["ct_str"] = $tm;
					$item["snum"]   = $value["snum"];
					$ret[$iCt] = $item;
					$iCt++;
				}
			}
	}
	return $ret;
}	
*/
	
//------------------------------------
// @calling
// @purpose : 
// @date
// @argment
// @return
//------------------------------------
//Smartyクラスの呼び出し
include_once("../libs/AppCom.php");

	$clsConst = new AppConst();
	// セッション開始
	session_start();
	
	$db     =new ComMysql();
	if(isset($_GET["id"])){
	  if(isset($_GET["mmdd"])){
		$i_ct =0;
		$dat = array();
		$sql = "select id , snum, created,DATE_FORMAT(created,'%H%i') as ct_str ,DATE_FORMAT(now(),'%m%d')  from t_sensors";
		$sql = $sql ."  where mc_id=" . $_GET["id"];
		$sql = $sql ."  and vnum=1 and DATE_FORMAT(created,'%m%d')='" . $_GET["mmdd"] . "'";
		$sql = $sql . " and substr(DATE_FORMAT(created,'%H%i') ,4 ,4) ='0'";
		$sql = $sql . "  order  by created ASC;";
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$dat[$i_ct] = $row;
			$i_ct += 1;
		}
		//テンプレートの表示
		include( "../rep1.htm");	  	  
	  }
	}
?>