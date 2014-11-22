<?php

//$con = mysql_connect("localhost",$username,$password);
 //mysql_select_db($dbname,$con);
 
 //..................................................................................................................

//echo  "aaaaaa";

// Find all images 
//foreach($html->find('img') as $element) 
//       echo $element->src . '<br>';

// Find all links 


 //..................................................................................................................

$html = new simple_html_dom();
$html = file_get_html('http://www.thehindu.com');

// Find all images 
//foreach($html->find('img') as $element) 
//       echo $element->src . '<br>';

$s='http://www.thehindu.com';
foreach($html->find('div[class=tab1 tab] a') as $element) 
       {
	  
	   
	   $str=$element->href ;
	   $pos = strrpos($str, "?");
	  if ($pos === false) { }
	  else
	  {$str = substr($str,0, $pos);}
	  
		if (strpos($str, 'photostory') !== false)
			continue;
		if($str[0]=='/')
		{$str=$s.$str;}
		
		$desc="";
		$html2 = new simple_html_dom();
        $html2 = file_get_html($str);
				//$e = $html2->find('div[class=Normal]')
				//echo $e->plaintext;
				foreach($html2->find('p[class=body]') as $pr) {
				$ret = $pr->plaintext;
					$desc=$desc.$ret;
				}
				//$desc = $pr->plaintext;
				$desc = ereg_replace("\"", "&quot;", $desc);
				//echo '<br><br>';
				//echo $str;
				//echo '<br>';
				//echo $desc;
	  $sql = 'INSERT INTO `two` VALUES ("'.$str.'", "'.$desc.'",2);';
	  $result=mysql_query($sql);
	  if (!$result) {
	  //echo '<br>';
		echo mysql_error();
}
	   //echo '<br>';
	   //echo $result;
	   //echo '<br>';
	   
	   }
	   
	   
/*
// Find all links 
foreach($html->find('a[pg*=latest]') as $element) 
      {  $str=$element->href ;
	  if (strpos($str, '=') !== false)
			continue;
		if (strpos($str, 'photostory') !== false)
			continue;
		if($str[0]=='/')
		{$str=$s.$str;}
		
		
		$html2 = new simple_html_dom();
        $html2 = file_get_html($str);
				//$e = $html2->find('div[class=Normal]')
				//echo $e->plaintext;
				foreach($html2->find('div[class=Normal]') as $pr) {}
				$desc = $pr->plaintext;
				$desc = ereg_replace("\"", "&quot;", $desc);
				echo '<br><br>';
				echo $str;
				echo '<br>';
				echo $desc;
	  $sql = 'INSERT INTO `two` VALUES ("'.$str.'", "'.$desc.'",1);';
	  $result=mysql_query($sql);
	  if (!$result) {
	  echo '<br>';
		echo mysql_error();
}
	   echo '<br>';
	   echo $result;
	   echo '<br>';}
foreach($html->find('a[pg*=ots]') as $element) 
        {  $str=$element->href ;
	  if (strpos($str, '=') !== false)
			continue;
		if (strpos($str, 'photostory') !== false)
			continue;
		if($str[0]=='/')
		{$str=$s.$str;}
		
		
		$html2 = new simple_html_dom();
        $html2 = file_get_html($str);
				//$e = $html2->find('div[class=Normal]')
				//echo $e->plaintext;
				foreach($html2->find('div[class=Normal]') as $pr) {}
				$desc = $pr->plaintext;
				$desc = ereg_replace("\"", "&quot;", $desc);
				echo '<br><br>';
				echo $str;
				echo '<br>';
				echo $desc;
	  $sql = 'INSERT INTO `two` VALUES ("'.$str.'", "'.$desc.'",1);';
	  $result=mysql_query($sql);
	  if (!$result) {
	  echo '<br>';
		echo mysql_error();
}
	   echo '<br>';
	   echo $result;
	   echo '<br>';}
foreach($html->find('a[pg*=donotmiss]') as $element) 
        {  $str=$element->href ;
	  if (strpos($str, '=') !== false)
			continue;
		if (strpos($str, 'photostory') !== false)
			continue;
		if($str[0]=='/')
		{$str=$s.$str;}
		
		
		$html2 = new simple_html_dom();
        $html2 = file_get_html($str);
				//$e = $html2->find('div[class=Normal]')
				//echo $e->plaintext;
				foreach($html2->find('div[class=Normal]') as $pr) {}
				$desc = $pr->plaintext;
				$desc = ereg_replace("\"", "&quot;", $desc);
				echo '<br><br>';
				echo $str;
				echo '<br>';
				echo $desc;
	  $sql = 'INSERT INTO `two` VALUES ("'.$str.'", "'.$desc.'",1);';
	  $result=mysql_query($sql);
	  if (!$result) {
	  echo '<br>';
		echo mysql_error();
}
	   echo '<br>';
	   echo $result;
	   echo '<br>';}

*/

?>