<?php
	
	include_once '../facebook.php';
	include_once 'config.php';
 
	$facebook = new Facebook(array(
	    'appId'  => FACEBOOK_APP_ID,
	    'secret' => FACEBOOK_SECRET_KEY,
	    'cookie' => true,
	   ));
	$session = $facebook->getSession();
	if (!$session) {	 
		
		$url = $facebook->getLoginUrl(array(
		       'canvas' => 1,
		       'fbconnect' => 0,
			'req_perms' => 'publish_stream'		 
		   ));
	 
	   	echo "<script type='text/javascript'>top.location.href = '$url';</script>";		
	 
	} else {
	 	
	    try {
	 
		$uid = $facebook->getUser();
		$me = $facebook->api('/me');
		
		
		function findWrongOptions($qstnNum)
		{
			if((WORDCOUNT-$qstnNum) < ($qstnNum -1))
			{
				$upperLimit = WORDCOUNT;
				$lowerLimit = $qstnNum + 1; 
			}
			else
			{
				$lowerLimit = 1;
				$upperLimit = $qstnNum - 1;		
			}		
			$returnArray[0]= rand($lowerLimit,$upperLimit);
			$returnArray[1]= rand($lowerLimit,$upperLimit);
			$returnArray[2]= rand($lowerLimit,$upperLimit);
			return $returnArray;
		}

		for($i=0;$i<10;$i++)
		{
			$qstnArray[$i] = rand(1,WORDCOUNT);		
		}	
			
		$ansArray0[0] = $qstnArray[0];
		$wrongOptions = findWrongOptions($qstnArray[0]);
		$ansArray0[1] = $wrongOptions[0]; 
		$ansArray0[2] = $wrongOptions[1];
		$ansArray0[3] = $wrongOptions[2];

		$ansArray1[0] = $qstnArray[1];
		$wrongOptions = findWrongOptions($qstnArray[1]);
		$ansArray1[1] = $wrongOptions[0]; 
		$ansArray1[2] = $wrongOptions[1];
		$ansArray1[3] = $wrongOptions[2];

		$ansArray2[0] = $qstnArray[2];
		$wrongOptions = findWrongOptions($qstnArray[2]);
		$ansArray2[1] = $wrongOptions[0]; 
		$ansArray2[2] = $wrongOptions[1];
		$ansArray2[3] = $wrongOptions[2];

		$ansArray3[0] = $qstnArray[3];
		$wrongOptions = findWrongOptions($qstnArray[3]);
		$ansArray3[1] = $wrongOptions[0]; 
		$ansArray3[2] = $wrongOptions[1];
		$ansArray3[3] = $wrongOptions[2];

		$ansArray4[0] = $qstnArray[4];
		$wrongOptions = findWrongOptions($qstnArray[4]);
		$ansArray4[1] = $wrongOptions[0]; 
		$ansArray4[2] = $wrongOptions[1];
		$ansArray4[3] = $wrongOptions[2];

		$ansArray5[0] = $qstnArray[5];
		$wrongOptions = findWrongOptions($qstnArray[5]);
		$ansArray5[1] = $wrongOptions[0]; 
		$ansArray5[2] = $wrongOptions[1];
		$ansArray5[3] = $wrongOptions[2];

		$ansArray6[0] = $qstnArray[6];
		$wrongOptions = findWrongOptions($qstnArray[6]);
		$ansArray6[1] = $wrongOptions[0]; 
		$ansArray6[2] = $wrongOptions[1];
		$ansArray6[3] = $wrongOptions[2];

		$ansArray7[0] = $qstnArray[7];
		$wrongOptions = findWrongOptions($qstnArray[7]);
		$ansArray7[1] = $wrongOptions[0]; 
		$ansArray7[2] = $wrongOptions[1];
		$ansArray7[3] = $wrongOptions[2];

		$ansArray8[0] = $qstnArray[8];
		$wrongOptions = findWrongOptions($qstnArray[8]);
		$ansArray8[1] = $wrongOptions[0]; 
		$ansArray8[2] = $wrongOptions[1];
		$ansArray8[3] = $wrongOptions[2];

		$ansArray9[0] = $qstnArray[9];
		$wrongOptions = findWrongOptions($qstnArray[9]);
		$ansArray9[1] = $wrongOptions[0]; 
		$ansArray9[2] = $wrongOptions[1];
		$ansArray9[3] = $wrongOptions[2];

		$db_name = "swapniln_wordlist";
		$table_name = "wordlist";

		$connection = @mysql_connect("localhost",,) or die(mysql_error());

		$db = @mysql_select_db($db_name, $connection) or die(mysql_error());
		
		for($i=0;$i<10;$i++)
		{
			$sql = "SELECT word from $table_name WHERE $table_name.index = '$qstnArray[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['word']!= NULL)
				{
					$qstnStringArray[$i] = $row['word'];
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}			
			}
		}
		
		for($i=0;$i<4;$i++)
		{
			$sql = "SELECT meaning from $table_name WHERE $table_name.index = '$ansArray0[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['meaning']!= NULL)
				{
					$ansStringArray0[$i] = $row['meaning'];			
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}
			}
		}

		for($i=0;$i<4;$i++)
		{
			$sql = "SELECT meaning from $table_name WHERE $table_name.index = '$ansArray1[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['meaning']!= NULL)
				{
					$ansStringArray1[$i] = $row['meaning'];			
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}
				
			}
		}
		for($i=0;$i<4;$i++)
		{
			$sql = "SELECT meaning from $table_name WHERE $table_name.index = '$ansArray2[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['meaning']!= NULL)
				{
					$ansStringArray2[$i] = $row['meaning'];			
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}
				
			}
		}

		for($i=0;$i<4;$i++)
		{
			$sql = "SELECT meaning from $table_name WHERE $table_name.index = '$ansArray3[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['meaning']!= NULL)
				{
					$ansStringArray3[$i] = $row['meaning'];			
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}
				
			}
		}

		for($i=0;$i<4;$i++)
		{
			$sql = "SELECT meaning from $table_name WHERE $table_name.index = '$ansArray4[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['meaning']!= NULL)
				{
					$ansStringArray4[$i] = $row['meaning'];			
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}
				
			}
		}

		for($i=0;$i<4;$i++)
		{
			$sql = "SELECT meaning from $table_name WHERE $table_name.index = '$ansArray5[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['meaning']!= NULL)
				{
					$ansStringArray5[$i] = $row['meaning'];			
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}
				
			}
		}

		for($i=0;$i<4;$i++)
		{
			$sql = "SELECT meaning from $table_name WHERE $table_name.index = '$ansArray6[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['meaning']!= NULL)
				{
					$ansStringArray6[$i] = $row['meaning'];			
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}
				
			}
		}

		for($i=0;$i<4;$i++)
		{
			$sql = "SELECT meaning from $table_name WHERE $table_name.index = '$ansArray7[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['meaning']!= NULL)
				{
					$ansStringArray7[$i] = $row['meaning'];			
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}
				
			}
		}

		for($i=0;$i<4;$i++)
		{
			$sql = "SELECT meaning from $table_name WHERE $table_name.index = '$ansArray8[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['meaning']!= NULL)
				{
					$ansStringArray8[$i] = $row['meaning'];			
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}
		
			}
		}

		for($i=0;$i<4;$i++)
		{
			$sql = "SELECT meaning from $table_name WHERE $table_name.index = '$ansArray9[$i]'";
		
			$result = @mysql_query($sql,$connection) or die(mysql_error());
		
			while($row = mysql_fetch_array($result))
			{
				if($row['meaning']!= NULL)
				{
					$ansStringArray9[$i] = $row['meaning'];			
				}
				else
				{
					echo "Some error occurred ! Please refresh the page to reload the quiz.";
					exit;
				}
				
			}
		}
		
		mysql_close($connection);

		$permtArray = array (
						0	=> array(1,2,3,4),
						1 	=> array(1,2,4,3),
						2  	=> array(1,3,2,4),
						3	=> array(1,3,4,2),
						4	=> array(1,4,2,3),
						5	=> array(1,4,3,2),
						6	=> array(2,1,3,4),
						7 	=> array(2,1,4,3),
						8 	=> array(2,3,1,4),
						9	=> array(2,3,4,1),
						10	=> array(2,4,1,3),
						11	=> array(2,4,3,1),
						12  	=> array(3,1,2,4),
						13	=> array(3,1,4,2),
						14	=> array(3,2,1,4),
						15	=> array(3,2,4,1),
						16	=> array(3,4,1,2),
						17 	=> array(3,4,2,1),
						18 	=> array(4,1,2,3),
						19	=> array(4,1,3,2),
						20	=> array(4,2,1,3),
						21	=> array(4,2,3,1),
						22	=> array(4,3,1,2),
						23	=> array(4,3,2,1)
					);
		
		for($i=0;$i<10;$i++)
		{
			$randPermVal[$i] = rand(0,23);
		}		   
		      
	    } catch (FacebookApiException $e) {
	 
		echo "Error: Some error occurred! Please refresh the page to try again.";
	 
	    }
	}	
	
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Shabda - Vocab Quiz</title>
	<style type="text/css">
	<!--
	.style6 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
	.style7 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight: bold;
		color: #0066CC;
	}
	.style10 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
	.style11 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight: bold;
		color: #000000;
		line-height: 18px;
	}
	.style12 {
		font-size: 10px;
		font-style: italic;
	}
	-->
	</style>
	<script type="text/javascript">
		function submitform()
		{    			
			if((document.forms[0].ans1[0].checked==false)&&(document.forms[0].ans1[1].checked==false)&&(document.forms[0].ans1[2].checked==false)&&(document.forms[0].ans1[3].checked==false)) 	
			{ 
				alert('Please select answer for Q.1');
				document.forms[0].ans1[0].focus();
				return false; 
			}

			if((document.forms[0].ans2[0].checked==false)&&(document.forms[0].ans2[1].checked==false)&&(document.forms[0].ans2[2].checked==false)&&(document.forms[0].ans2[3].checked==false)) 	
			{ 
				alert('Please select answer for Q.2'); 
				document.forms[0].ans2[0].focus();
				return false; 
			}

			if((document.forms[0].ans3[0].checked==false)&&(document.forms[0].ans3[1].checked==false)&&(document.forms[0].ans3[2].checked==false)&&(document.forms[0].ans3[3].checked==false)) 	
			{ 
				alert('Please select answer for Q.3');
				document.forms[0].ans3[0].focus(); 
				return false; 
			}
			
			if((document.forms[0].ans4[0].checked==false)&&(document.forms[0].ans4[1].checked==false)&&(document.forms[0].ans4[2].checked==false)&&(document.forms[0].ans4[3].checked==false)) 	
			{ 
				alert('Please select answer for Q.4');
				document.forms[0].ans4[0].focus(); 
				return false; 
			}

			if((document.forms[0].ans5[0].checked==false)&&(document.forms[0].ans5[1].checked==false)&&(document.forms[0].ans5[2].checked==false)&&(document.forms[0].ans5[3].checked==false)) 	
			{ 
				alert('Please select answer for Q.5');
				document.forms[0].ans5[0].focus(); 
				return false; 
			}
			
			if((document.forms[0].ans6[0].checked==false)&&(document.forms[0].ans6[1].checked==false)&&(document.forms[0].ans6[2].checked==false)&&(document.forms[0].ans6[3].checked==false)) 	
			{ 
				alert('Please select answer for Q.6');			
				document.forms[0].ans6[0].focus();
				return false; 
			}
			
			if((document.forms[0].ans7[0].checked==false)&&(document.forms[0].ans7[1].checked==false)&&(document.forms[0].ans7[2].checked==false)&&(document.forms[0].ans7[3].checked==false)) 	
			{ 
				alert('Please select answer for Q.7');			
				document.forms[0].ans7[0].focus();
				return false; 
			}
			
			if((document.forms[0].ans8[0].checked==false)&&(document.forms[0].ans8[1].checked==false)&&(document.forms[0].ans8[2].checked==false)&&(document.forms[0].ans8[3].checked==false)) 	
			{ 
				alert('Please select answer for Q.8');			
				document.forms[0].ans8[0].focus();
				return false; 
			}
			
			if((document.forms[0].ans9[0].checked==false)&&(document.forms[0].ans9[1].checked==false)&&(document.forms[0].ans9[2].checked==false)&&(document.forms[0].ans9[3].checked==false)) 	
			{ 
				alert('Please select answer for Q.9');			
				document.forms[0].ans9[0].focus();
				return false; 
			}
			
			if((document.forms[0].ans10[0].checked==false)&&(document.forms[0].ans10[1].checked==false)&&(document.forms[0].ans10[2].checked==false)&&(document.forms[0].ans10[3].checked==false)) 	
			{ 
				alert('Please select answer for Q.10');			
				document.forms[0].ans10[0].focus();
				return false; 
			}		
			document.forms[0].submit();
		}
	
	</script>

</head>

<body STYLE="margin: 0;font-family: sans-serif;font-style: normal;font-variant: normal;font-weight: normal;font-size: smaller; line-height: 200%; word-spacing: normal; letter-spacing: normal; text-decoration: none; text-transform: none; text-align: justify;text-indent: 0ex;" marginwidth="0" marginheight="0 leftmargin="0" topmargin="0">
	<div id="fb-root"></div>
  	 	<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
    	 	<script type="text/javascript">
     	 		FB.init({
         		appId  : '163454380334074',
         		status : true, // check login status
         		cookie : true, // enable cookies to allow the server to access the session
         		xfbml  : true  // parse XFBML
       		});
			FB.Canvas.setSize({ width: 760, height: 1800});
			FB.Arbiter.inform('setSize', { height: 1800 });	
					
		</script>
   


	<form action="calcRes.php" method="POST">
	<table  border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
	  <tr>
	    <td width="16"><img src="images/top_lef.gif" width="16" height="16"></td>
	    <td height="16" background="images/top_mid.gif"><img src="images/top_mid.gif" width="16" height="16"></td>
	    <td width="24"><img src="images/top_rig.gif" width="24" height="16"></td>
	  </tr>
	  <tr>
	    <td width="16" background="images/cen_lef.gif"><img src="images/cen_lef.gif" width="16" height="11"></td>
	    <td align="center" valign="middle" bgcolor="#FFFFFF">
	    <object width="100%">
		<param name="movie" value="header.swf">
			<embed src="header.swf" border="1" width="100%">
			</embed>
	   </object>

	   </td>
	    <td width="24" background="images/cen_rig.gif"><img src="images/cen_rig.gif" width="24" height="11"></td>
	   </tr>
	   <tr>
	    <td width="16" height="16"><img src="images/bot_lef.gif" width="16" height="16"></td>
	    <td height="16" background="images/bot_mid.gif"><img src="images/bot_mid.gif" width="16" height="16"></td>
	    <td width="24" height="16"><img src="images/bot_rig.gif" width="24" height="16"></td>
	  </tr>
	</table>
	
	<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
	    <tr>
	      <td width="16"><img src="images/top_lef.gif" width="16" height="16"></td>
	      <td height="16" background="images/top_mid.gif"><img src="images/top_mid.gif" width="16" height="16"></td>
	      <td width="24"><img src="images/top_rig.gif" width="24" height="16"></td>
	    </tr>
	    <tr>
	      <td width="16" background="images/cen_lef.gif"><img src="images/cen_lef.gif" width="16" height="11"></td>
	      <td bgcolor="#F7F8FB">
		<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="3">
		
		<?php
		echo "<tr><td>"."<b>" ."1. ". $qstnStringArray[0]."</b><br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans1\" value=\"" . $ansStringArray0[$permtArray[$randPermVal[0]][0]-1] . "\" id=\"ans11\"/>&nbsp;".$ansStringArray0[$permtArray[$randPermVal[0]][0]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans1\" value=\"" . $ansStringArray0[$permtArray[$randPermVal[0]][1]-1] . "\" id=\"ans12\"/>&nbsp;".$ansStringArray0[$permtArray[$randPermVal[0]][1]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans1\" value=\"" . $ansStringArray0[$permtArray[$randPermVal[0]][2]-1] . "\" id=\"ans13\"/>&nbsp;".$ansStringArray0[$permtArray[$randPermVal[0]][2]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans1\" value=\"" . $ansStringArray0[$permtArray[$randPermVal[0]][3]-1] . "\" id=\"ans14\"/>&nbsp;".$ansStringArray0[$permtArray[$randPermVal[0]][3]-1]."<br \></td></tr>";
		echo "<tr width=\"100%\"><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td></tr>";
		
		echo "<tr><td>"."<b>" ."2. ". $qstnStringArray[1]."</b><br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans2\" value=\"" . $ansStringArray1[$permtArray[$randPermVal[1]][0]-1] . "\" id=\"ans21\"/>&nbsp;".$ansStringArray1[$permtArray[$randPermVal[1]][0]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans2\" value=\"" . $ansStringArray1[$permtArray[$randPermVal[1]][1]-1] . "\" id=\"ans22\"/>&nbsp;".$ansStringArray1[$permtArray[$randPermVal[1]][1]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans2\" value=\"" . $ansStringArray1[$permtArray[$randPermVal[1]][2]-1] . "\" id=\"ans23\"/>&nbsp;".$ansStringArray1[$permtArray[$randPermVal[1]][2]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans2\" value=\"" . $ansStringArray1[$permtArray[$randPermVal[1]][3]-1] . "\" id=\"ans24\"/>&nbsp;".$ansStringArray1[$permtArray[$randPermVal[1]][3]-1]."<br \></td></tr>";
		echo "<tr width=\"100%\"><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td></tr>";

		echo "<tr><td>"."<b>" ."3. ".$qstnStringArray[2]."</b><br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans3\" value=\"" . $ansStringArray2[$permtArray[$randPermVal[2]][0]-1] . "\" id=\"ans31\"/>&nbsp;".$ansStringArray2[$permtArray[$randPermVal[2]][0]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans3\" value=\"" . $ansStringArray2[$permtArray[$randPermVal[2]][1]-1] . "\" id=\"ans32\"/>&nbsp;".$ansStringArray2[$permtArray[$randPermVal[2]][1]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans3\" value=\"" . $ansStringArray2[$permtArray[$randPermVal[2]][2]-1] . "\" id=\"ans33\"/>&nbsp;".$ansStringArray2[$permtArray[$randPermVal[2]][2]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans3\" value=\"" . $ansStringArray2[$permtArray[$randPermVal[2]][3]-1] . "\" id=\"ans34\"/>&nbsp;".$ansStringArray2[$permtArray[$randPermVal[2]][3]-1]."<br \></td></tr>";
		echo "<tr width=\"100%\"><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td></tr>";


		echo "<tr><td>"."<b>" ."4. ".$qstnStringArray[3]."</b><br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans4\" value=\"" . $ansStringArray3[$permtArray[$randPermVal[3]][0]-1] . "\" id=\"ans41\"/>&nbsp;".$ansStringArray3[$permtArray[$randPermVal[3]][0]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans4\" value=\"" . $ansStringArray3[$permtArray[$randPermVal[3]][1]-1] . "\" id=\"ans42\"/>&nbsp;".$ansStringArray3[$permtArray[$randPermVal[3]][1]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans4\" value=\"" . $ansStringArray3[$permtArray[$randPermVal[3]][2]-1] . "\" id=\"ans43\"/>&nbsp;".$ansStringArray3[$permtArray[$randPermVal[3]][2]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans4\" value=\"" . $ansStringArray3[$permtArray[$randPermVal[3]][3]-1] . "\" id=\"ans44\"/>&nbsp;".$ansStringArray3[$permtArray[$randPermVal[3]][3]-1]."<br \></td></tr>";
		echo "<tr width=\"100%\"><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td></tr>";

		echo "<tr><td>"."<b>" ."5. ".$qstnStringArray[4]."</b><br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans5\" value=\"" . $ansStringArray4[$permtArray[$randPermVal[4]][0]-1] . "\" id=\"ans51\"/>&nbsp;".$ansStringArray4[$permtArray[$randPermVal[4]][0]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans5\" value=\"" . $ansStringArray4[$permtArray[$randPermVal[4]][1]-1] . "\" id=\"ans52\"/>&nbsp;".$ansStringArray4[$permtArray[$randPermVal[4]][1]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans5\" value=\"" . $ansStringArray4[$permtArray[$randPermVal[4]][2]-1] . "\" id=\"ans53\"/>&nbsp;".$ansStringArray4[$permtArray[$randPermVal[4]][2]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans5\" value=\"" . $ansStringArray4[$permtArray[$randPermVal[4]][3]-1] . "\" id=\"ans54\"/>&nbsp;".$ansStringArray4[$permtArray[$randPermVal[4]][3]-1]."<br \></td></tr>";
		echo "<tr width=\"100%\"><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td></tr>";


		echo "<tr><td>"."<b>" ."6. ".$qstnStringArray[5]."</b><br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans6\" value=\"" . $ansStringArray5[$permtArray[$randPermVal[5]][0]-1] . "\" id=\"ans61\"/>&nbsp;".$ansStringArray5[$permtArray[$randPermVal[5]][0]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans6\" value=\"" . $ansStringArray5[$permtArray[$randPermVal[5]][1]-1] . "\" id=\"ans62\"/>&nbsp;".$ansStringArray5[$permtArray[$randPermVal[5]][1]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans6\" value=\"" . $ansStringArray5[$permtArray[$randPermVal[5]][2]-1] . "\" id=\"ans63\"/>&nbsp;".$ansStringArray5[$permtArray[$randPermVal[5]][2]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans6\" value=\"" . $ansStringArray5[$permtArray[$randPermVal[5]][3]-1] . "\" id=\"ans64\"/>&nbsp;".$ansStringArray5[$permtArray[$randPermVal[5]][3]-1]."<br \></td></tr>";
		echo "<tr width=\"100%\"><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td></tr>";
	
		
		echo "<tr><td>"."<b>" ."7. ".$qstnStringArray[6]."</b><br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans7\" value=\"" . $ansStringArray6[$permtArray[$randPermVal[6]][0]-1] . "\" id=\"ans71\"/>&nbsp;".$ansStringArray6[$permtArray[$randPermVal[6]][0]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans7\" value=\"" . $ansStringArray6[$permtArray[$randPermVal[6]][1]-1] . "\" id=\"ans72\"/>&nbsp;".$ansStringArray6[$permtArray[$randPermVal[6]][1]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans7\" value=\"" . $ansStringArray6[$permtArray[$randPermVal[6]][2]-1] . "\" id=\"ans73\"/>&nbsp;".$ansStringArray6[$permtArray[$randPermVal[6]][2]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans7\" value=\"" . $ansStringArray6[$permtArray[$randPermVal[6]][3]-1] . "\" id=\"ans74\"/>&nbsp;".$ansStringArray6[$permtArray[$randPermVal[6]][3]-1]."<br \></td></tr>";
		echo "<tr width=\"100%\"><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td></tr>";


		echo "<tr><td>"."<b>" ."8. ".$qstnStringArray[7]."</b><br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans8\" value=\"" . $ansStringArray7[$permtArray[$randPermVal[7]][0]-1] . "\" id=\"ans81\"/>&nbsp;".$ansStringArray7[$permtArray[$randPermVal[7]][0]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans8\" value=\"" . $ansStringArray7[$permtArray[$randPermVal[7]][1]-1] . "\" id=\"ans82\"/>&nbsp;".$ansStringArray7[$permtArray[$randPermVal[7]][1]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans8\" value=\"" . $ansStringArray7[$permtArray[$randPermVal[7]][2]-1] . "\" id=\"ans83\"/>&nbsp;".$ansStringArray7[$permtArray[$randPermVal[7]][2]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans8\" value=\"" . $ansStringArray7[$permtArray[$randPermVal[7]][3]-1] . "\" id=\"ans84\"/>&nbsp;".$ansStringArray7[$permtArray[$randPermVal[7]][3]-1]."<br \></td></tr>";
		echo "<tr width=\"100%\"><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td></tr>";

		
		echo "<tr><td>"."<b>" ."9. ".$qstnStringArray[8]."</b><br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans9\" value=\"" . $ansStringArray8[$permtArray[$randPermVal[8]][0]-1] . "\" id=\"ans91\"/>&nbsp;".$ansStringArray8[$permtArray[$randPermVal[8]][0]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans9\" value=\"" . $ansStringArray8[$permtArray[$randPermVal[8]][1]-1] . "\" id=\"ans92\"/>&nbsp;".$ansStringArray8[$permtArray[$randPermVal[8]][1]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans9\" value=\"" . $ansStringArray8[$permtArray[$randPermVal[8]][2]-1] . "\" id=\"ans93\"/>&nbsp;".$ansStringArray8[$permtArray[$randPermVal[8]][2]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans9\" value=\"" . $ansStringArray8[$permtArray[$randPermVal[8]][3]-1] . "\" id=\"ans94\"/>&nbsp;".$ansStringArray8[$permtArray[$randPermVal[8]][3]-1]."<br \></td></tr>";
		echo "<tr width=\"100%\"><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td></tr>";


		echo "<tr><td>"."<b>" ."10. ".$qstnStringArray[9]."</b><br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans10\" value=\"" . $ansStringArray9[$permtArray[$randPermVal[9]][0]-1] . "\" id=\"ans101\"/>&nbsp;".$ansStringArray9[$permtArray[$randPermVal[9]][0]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans10\" value=\"" . $ansStringArray9[$permtArray[$randPermVal[9]][1]-1] . "\" id=\"ans102\"/>&nbsp;".$ansStringArray9[$permtArray[$randPermVal[9]][1]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans10\" value=\"" . $ansStringArray9[$permtArray[$randPermVal[9]][2]-1] . "\" id=\"ans103\"/>&nbsp;".$ansStringArray9[$permtArray[$randPermVal[9]][2]-1]."<br \>";
		echo "&nbsp;&nbsp;<input type=\"radio\" name=\"ans10\" value=\"" . $ansStringArray9[$permtArray[$randPermVal[9]][3]-1] . "\" id=\"ans104\"/>&nbsp;".$ansStringArray9[$permtArray[$randPermVal[9]][3]-1]."<br \></td></tr>";
   		?>
		
		</table> </td>
		
		<input type="hidden" id="qstnString_0" name="qstnString_0" value="<?php echo '' . $qstnStringArray[0] . ''; ?>">
		<input type="hidden" id="qstnString_1" name="qstnString_1" value="<?php echo '' . $qstnStringArray[1] . ''; ?>">
		<input type="hidden" id="qstnString_2" name="qstnString_2" value="<?php echo '' . $qstnStringArray[2] . ''; ?>">
		<input type="hidden" id="qstnString_3" name="qstnString_3" value="<?php echo '' . $qstnStringArray[3] . ''; ?>">
		<input type="hidden" id="qstnString_4" name="qstnString_4" value="<?php echo '' . $qstnStringArray[4] . ''; ?>">
		<input type="hidden" id="qstnString_5" name="qstnString_5" value="<?php echo '' . $qstnStringArray[5] . ''; ?>">
		<input type="hidden" id="qstnString_6" name="qstnString_6" value="<?php echo '' . $qstnStringArray[6] . ''; ?>">
		<input type="hidden" id="qstnString_7" name="qstnString_7" value="<?php echo '' . $qstnStringArray[7] . ''; ?>">
		<input type="hidden" id="qstnString_8" name="qstnString_8" value="<?php echo '' . $qstnStringArray[8] . ''; ?>">
		<input type="hidden" id="qstnString_9" name="qstnString_9" value="<?php echo '' . $qstnStringArray[9] . ''; ?>">
		
		<input type="hidden" id="ansString_0" name="ansString_0" value="<?php echo '' . $ansStringArray0[0] . ''; ?>">
		<input type="hidden" id="ansString_1" name="ansString_1" value="<?php echo '' . $ansStringArray1[0] . ''; ?>">
		<input type="hidden" id="ansString_2" name="ansString_2" value="<?php echo '' . $ansStringArray2[0] . ''; ?>">
		<input type="hidden" id="ansString_3" name="ansString_3" value="<?php echo '' . $ansStringArray3[0] . ''; ?>">
		<input type="hidden" id="ansString_4" name="ansString_4" value="<?php echo '' . $ansStringArray4[0] . ''; ?>">
		<input type="hidden" id="ansString_5" name="ansString_5" value="<?php echo '' . $ansStringArray5[0] . ''; ?>">
		<input type="hidden" id="ansString_6" name="ansString_6" value="<?php echo '' . $ansStringArray6[0] . ''; ?>">
		<input type="hidden" id="ansString_7" name="ansString_7" value="<?php echo '' . $ansStringArray7[0] . ''; ?>">
		<input type="hidden" id="ansString_8" name="ansString_8" value="<?php echo '' . $ansStringArray8[0] . ''; ?>">
		<input type="hidden" id="ansString_9" name="ansString_9" value="<?php echo '' . $ansStringArray9[0] . ''; ?>">

		<td width="24" background="images/cen_rig.gif"><img src="images/cen_rig.gif" width="24" height="11"></td>
	    </tr>
	    <tr>
	      <td width="16" height="16"><img src="images/bot_lef.gif" width="16" height="16"></td>
	      <td height="16" background="images/bot_mid.gif"><img src="images/bot_mid.gif" width="16" height="16"></td>
	      <td width="24" height="16"><img src="images/bot_rig.gif" width="24" height="16"></td>
	    </tr>	  	
	</table>
	<table  border="0" align="left" cellpadding="10" cellspacing="0">
		<tr>
		  <td><font><a STYLE="color: #000000;text-decoration: none;" href="http://www.facebook.com/profile.php?id=100001030775916" target="_blank">Designed and Developed by : <b>Swapnil Nawale</b></font></a></td>
   		  <td><a STYLE="color: #000000;text-decoration: none;" href="http://www.facebook.com/profile.php?id=100001030775916" target="_blank"><img src="images/viewprofile.png" border="0"></a></td>
		</tr>
	  </table>

	
	<table  border="0" align="right" cellpadding="0" cellspacing="0">
		<tr>
		  <td width="16"><img src="images/top_lef.gif" width="16" height="16"></td>
		  <td height="16" background="images/top_mid.gif"><img src="images/top_mid.gif" width="16" height="16"></td>
		  <td width="24"><img src="images/top_rig.gif" width="24" height="16"></td>
		</tr>
		<tr>
		  <td width="16" background="images/cen_lef.gif"><img src="images/cen_lef.gif" width="16" height="11"></td>
		  <td align="center" valign="middle" bgcolor="#F7F8FB" class="style11" style="cursor=hand" onClick="javascript: submitform();"  onMouseOver="this.style.backgroundColor = '#9999CC'" onMouseOut="this.style.backgroundColor = '#F7F8FB'">&nbsp;View Results&nbsp; </td>
		  <td width="24" background="images/cen_rig.gif"><img src="images/cen_rig.gif" width="24" height="11"></td>
		</tr>
		<tr>
		  <td width="16" height="16"><img src="images/bot_lef.gif" width="16" height="16"></td>
		  <td height="16" background="images/bot_mid.gif"><img src="images/bot_mid.gif" width="16" height="16"></td>
		  <td width="24" height="16"><img src="images/bot_rig.gif" width="24" height="16"></td>
		</tr>
	  </table>	
</form>
 	
</body>
</html>