<?php
require("config.inc.php");
include_once('simple_html_dom.php');
$con = mysql_connect("localhost",$username,$password);
 mysql_select_db($dbname,$con);
 //$result = mysql_query("SELECT * FROM pizza_table");
 //$arr = array();
 
 if(!empty($_GET['id']))
 {$today = date("Y-m-d");
 $sql2 = 'select * from one where id='.$_GET['id'].';';
 $result=mysql_query($sql2);
 $row = mysql_fetch_assoc($result);
 $sqldate= $row['dt'];

 $sqldate=(string)$sqldate;
  //echo $sqldate;
 $today=(string)$today;
 if($sqldate===$today)
 {}
 else{
 if($_GET['id']==1){
	$sql2 = 'delete from two where id=1;';
 mysql_query($sql2);
 require 'scrap.php';
 $sql2 = 'update one set dt="'.$today.'" where id=1;';
 $result=mysql_query($sql2);
 if (!$result) {
	  
	echo mysql_error();
	echo '<br>';
 }
 }
 if($_GET['id']==2){
 
 $sql2 = 'delete from two where id=2;';
 mysql_query($sql2);
 include 'scrap2.php';
 $sql2 = 'update one set dt="'.$today.'" where id=2;';
 mysql_query($sql2);
 if (!$result) {
	  
	echo mysql_error();
	echo '<br>';
 }
 }
 }
 //$phpdate = strtotime( $row['dt'] );
 //echo $today;
///$mysqldate = date( 'Y-m-d', $today );
//echo $mysqldate;
}
	  //if (!$result) {
	  //echo '<br>';
		//echo mysql_error();
//}
//echo $result;
//$result=(string)$result;
//$today=(string)$today;
 //echo $result;
 //echo $today;
 //if($result==$today){
 
 $str2="";
 if (!empty($_GET['id'])) {
        $i=0;
		if($_GET['id']==1){
        $result = mysql_query("SELECT * FROM two WHERE id=1");
		$str2='[';
		echo $str2;
		while($record = mysql_fetch_array($result)){
		if($i==0){}
		else{echo ",";}
 $p['link'] = $record['link'];
 //$p['content'] = $record['content'];
 //$p['id'] = $record['id'];
 echo json_encode($p);
 if($i==11)
 break;
 $i=$i+1;}
 echo"]";
 }
 
 if($_GET['id']==2){
 //echo "HERE";
		$i=0;
        $result = mysql_query("SELECT * FROM two WHERE id=2");
	$str2='[';
		echo $str2;
		while($record = mysql_fetch_array($result)){
		if($i==0){}
		else{echo ",";}
 $p['link'] = $record['link'];
 //$p['content'] = $record['content'];
 //$p['id'] = $record['id'];
 echo json_encode($p);
 if($i==11)
 break;
 $i=$i+1;}
 echo"]";
 }
 
 
		
        // Create some data that will be the JSON response 
        //$response["success"] = 0;
        //$response["message"] = "Please Enter Both a Username and Password.";
        
        //die will kill the page and not execute any code below, it will also
        //display the parameter... in this case the JSON data our Android
        //app will parse
       // die(json_encode($response));
    }
 
 //.............
 
 
 //.............
 //!empty($_POST)
 //include 'scrap.php';
 //echo 123124;
 //}
 
 /*
 while($record = mysql_fetch_array($result)){
 $pizza_name = $record['pizza_name'];
 $pizza_price = $record['pizza_price'];
 }
 // createjson array here
 */
 //echo json_encode($arr);
if(!empty($_GET['link'])){

$sql='SELECT * FROM two WHERE link="'.$_GET['link'].'";';
 $result = mysql_query($sql);
  if (!$result) {
	  echo '<br>';
	echo mysql_error();
 }
 $str2='[';
 echo $str2;
		while($record = mysql_fetch_array($result)){
// $p['link'] = $record['link'];
 $p['content'] = $record['content'];
 //$p['id'] = $record['id'];
 echo json_encode($p);
}
$str2=']';
echo $str2;

}

//DELETE FROM table_name
//WHERE some_column=some_value;
?>