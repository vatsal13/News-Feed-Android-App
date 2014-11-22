<?php

//$con = mysql_connect("localhost",$username,$password);
 //mysql_select_db($dbname,$con);
 
 

$html = new simple_html_dom();
$html = file_get_html('http://timesofindia.indiatimes.com/home');

// Find all images 
//foreach($html->find('img') as $element) 
//       echo $element->src . '<br>';

$s='http://timesofindia.indiatimes.com';

// Find all links 
foreach($html->find('a[pg*=latest]') as $element) 
      {  $str=$element->href ;
	  if (strpos($str, '=') !== false)
			continue;
		if (strpos($str, 'photostory') !== false)
			continue;
		if($str[0]=='/')
		{$str=$s.$str;}
		
		//echo $str;
		$html2 = new simple_html_dom();
        $html2 = file_get_html($str);
				//$e = $html2->find('div[class=Normal]')
				//echo $e->plaintext;
				foreach($html2->find('div[class=Normal]') as $pr) {}
				$desc = $pr->plaintext;
				$desc = ereg_replace("\"", "&quot;", $desc);
			//	echo '<br><br>';
				//echo $str;
				//echo '<br>';
				//echo $desc;
	  $sql = 'INSERT INTO `two` VALUES ("'.$str.'", "'.$desc.'",1);';
	  $result=mysql_query($sql);
	  if (!$result) {
	  //echo '<br>';
		echo mysql_error();
}
	   //echo '<br>';
	   //echo $result;
	   //echo '<br>';
	   }
foreach($html->find('a[pg*=ots]') as $element) 
        {  $str=$element->href ;
	  if (strpos($str, '=') !== false)
			continue;
		if (strpos($str, 'photostory') !== false)
			continue;
		if($str[0]=='/')
		{$str=$s.$str;}
		
		//echo $str;
		$html2 = new simple_html_dom();
        $html2 = file_get_html($str);
				//$e = $html2->find('div[class=Normal]')
				//echo $e->plaintext;
				foreach($html2->find('div[class=Normal]') as $pr) {}
				$desc = $pr->plaintext;
				$desc = ereg_replace("\"", "&quot;", $desc);
		//		echo '<br><br>';
			//	echo $str;
				//echo '<br>';
				//echo $desc;
	  $sql = 'INSERT INTO `two` VALUES ("'.$str.'", "'.$desc.'",1);';
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
foreach($html->find('a[pg*=donotmiss]') as $element) 
        {  $str=$element->href ;
	  if (strpos($str, '=') !== false)
			continue;
		if (strpos($str, 'photostory') !== false)
			continue;
		if($str[0]=='/')
		{$str=$s.$str;}
		
		echo $str;
		
		$html2 = new simple_html_dom();
        $html2 = file_get_html($str);
				//$e = $html2->find('div[class=Normal]')
				//echo $e->plaintext;
				foreach($html2->find('div[class=Normal]') as $pr) {}
				$desc = $pr->plaintext;
				$desc = ereg_replace("\"", "&quot;", $desc);
		//		echo '<br><br>';
			//	echo $str;
				//echo '<br>';
				//echo $desc;
	  $sql = 'INSERT INTO `two` VALUES ("'.$str.'", "'.$desc.'",1);';
	  $result=mysql_query($sql);
	  if (!$result) {
	  //echo '<br>';
		echo mysql_error();
}
	   //echo '<br>';
	   //echo $result;
	   //echo '<br>';
	   }
*/

?>