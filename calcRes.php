<?php

	for ($i=0 ; $i<10 ; $i++)
	{
		$strTest = "qstnString_".$i;
		$qstnArray[$i] = $_POST[$strTest];
		if ($qstnArray[$i]=="") 
		{
    
   			echo"Some Error occurred. Sorry for inconvenience.";			
     			echo "<a href=index.php>Take the quiz again!!</a>";
     			exit;
		}
	}
	
	for ($i=0 ; $i<10 ; $i++)
	{
		$strTest1 = "ansString_".$i;
		$corrOption[$i] = trim($_POST[$strTest1]);
		if ($corrOption[$i]=="") 
		{
    
   			echo"Some Error occurred. Sorry for inconvenience.";			
     			echo "<a href=index.php>Take the quiz again!!</a>";
     			exit;
		}
	}

	
	for ($i=1 ; $i<11 ; $i++)
	{
		$strTest2 = "ans".$i;
		$chosenOption[$i-1] = trim($_POST[$strTest2]);
		if ($chosenOption[$i-1]=="") 
		{
    
   			echo"Some Error occurred. Sorry for inconvenience.";			
     			echo "<a href=index.php>Take the quiz again!!</a>";
     			exit;
		}
	}
	

	$scoreCounter = 0;
	for ($i=0 ; $i<10 ; $i++)
	{
		if(0 == strcasecmp($chosenOption[$i],$corrOption[$i]))
		{
			$scoreCounter++;
			$ansIndArray[$i] = "C";			
		}
		else
		{
			$ansIndArray[$i] = "I";			
		}		
	}	
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Shabda - Vocab Quiz Results</title>
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
	a:link{ text-decoration: none;
	color: black;
	}
	
	a:visited{ text-decoration: none;
	color: black;
	}

	a:hover{ text-decoration: none;
	color: black;
	}
	-->
	</style>
	<script type="text/javascript">
            function fnFocus()
            {
                 document.getElementById('focusLnk').focus();
            }

            function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){
                FB.ui(
                {
                    method: 'stream.publish',
                    message: '',
                    attachment: {
                        name: name,
                        caption: '',
                        description: (description),
                        href: hrefLink
                    },
                    action_links: [
                        { text: hrefTitle, href: hrefLink }
                    ],
                    user_prompt_message: userPrompt
                },
                function(response) {

                });
            }
            function publishStream()
	     {
			streamPublish("Shabda-Vocabulary Quiz", 'I have just taken Vocabulary Quiz on Shabda.This is an awesome app with more than 5000 esoteric English words to be tested.You will be presented with new set of 10 questions everytime you take the test.', 'Checkout the Shabda Quiz', 'http://apps.facebook.com/shabda-vq/', "Shabda - The Vocabulary Quiz");
            }

	     function publishStream1()
	     {
			var scorePerc = document.forms[0].scoreInd.value * 10;
			var scoreString = 'I have just scored ' +  scorePerc  + '% on Shabda- Vocabulary Quiz.This is an awesome app with more than 5000 esoteric English words to be tested.You will be presented with new set of 10 questions everytime you take the test.';
			streamPublish("Shabda-Vocabulary Quiz", scoreString , 'Checkout the Shabda Quiz', 'http://apps.facebook.com/shabda-vq/', "Shabda - The Vocabulary Quiz");
            }                 
        </script>	
</head>

<body STYLE="margin: 0;font-family: sans-serif;font-style: normal;font-variant: normal;font-weight: normal;font-size: smaller; line-height: 200%; word-spacing: normal; letter-spacing: normal; text-decoration: none; text-transform: none; text-align: justify;text-indent: 0ex;" marginwidth="0" marginheight="0 leftmargin="0" topmargin="0" onload="fnFocus();">
	<div id="fb-root"></div>
  	 	<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
    	 	<script type="text/javascript">
     	 		FB.init({
         		appId  : '163454380334074',
         		status : true, // check login status
         		cookie : true, // enable cookies to allow the server to access the session
         		xfbml  : true  // parse XFBML
       		});
							
		
		FB.Canvas.setSize({ width: 760, height: 1400 });
		
     		</script>
   
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
		<tr><td>
			<font STYLE="font-family: sans-serif;font-style: normal;font-variant: normal;font-weight: normal;font-size: small; line-height: 200%; word-spacing: normal; letter-spacing: normal; text-decoration: none; text-transform: none; text-align: justify;text-indent: 0ex;">
			&nbsp;&nbsp;You have </font>
			<font STYLE="font-family: sans-serif;font-style: normal;font-variant: normal;font-weight: normal;font-size: large; line-height: 200%; word-spacing: normal; letter-spacing: normal; text-decoration: none; text-transform: none; text-align: justify;text-indent: 0ex;"> 
			<b><?php echo '' . $scoreCounter . ''; ?></b></font>
			<font STYLE="font-family: sans-serif;font-style: normal;font-variant: normal;font-weight: normal;font-size: small; line-height: 200%; word-spacing: normal; letter-spacing: normal; text-decoration: none; text-transform: none; text-align: justify;text-indent: 0ex;">
			question(s) right out of 10.</font>
			</td></tr>
			<table>
			<tr><td bgcolor="#F7F8FB">
			<a href="#" onclick="publishStream1(); return false;" border="0" title="Publish the score to your wall"><img src="images/publish.png" border="0" id="focusLnk" ></a> 
			</td><td bgcolor="#F7F8FB">
			<a href="#" onclick="publishStream(); return false;" border="0" title="Share this app with your friends"><img src="images/share.png" border="0"></a>
			</td><td bgcolor="#F7F8FB">
			<fb:like href="http://www.facebook.com/apps/application.php?id=163454380334074" layout="button_count" font="arial"></fb:like>
			</td></tr>
			<table>
		</table> </td>
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
			for($i=0; $i<10; $i++)
			{ 
				echo "<tr>";	
				$j = $i+1;
				if($ansIndArray[$i] == "C")
				{
					echo "<td border=\"0\"><img src=\"images/thums_up.png\" width=\"60\" height=\"60\" style=\"border-style: none\" border=\"0\">&nbsp;&nbsp;</td>";					
				}
				else
				{
					echo "<td border=\"0\"><img src=\"images/thums_down.png\" width=\"60\" height=\"60\" style=\"border-style: none\" border=\"0\">&nbsp;&nbsp;</td>";
				}
								
				echo "<td><font STYLE=\"font-size: small;\">"."<b>" .$j.". ". $qstnArray[$i] ."</font></b><br \>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;Correct Option"." : &nbsp;&nbsp;". $corrOption[$i] ."<br \>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;You chose"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp : &nbsp;&nbsp;". $chosenOption[$i] ."<br \></td>";
				echo "</tr>";
				if($i != 9)
				{
					echo "<tr width=\"100%\"><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td><td bgcolor=\"#FFFFFF\" height=\"3\"><SPACER TYPE=\"block\" HEIGHT=\"1\" WIDTH=\"1\"></td></tr>";
				}
			}
		?>
		
		</table> </td>
		<td width="24" background="images/cen_rig.gif"><img src="images/cen_rig.gif" width="24" height="11"></td>
	    </tr>
	    <tr>
	      <td width="16" height="16"><img src="images/bot_lef.gif" width="16" height="16"></td>
	      <td height="16" background="images/bot_mid.gif"><img src="images/bot_mid.gif" width="16" height="16"></td>
	      <td width="24" height="16"><img src="images/bot_rig.gif" width="24" height="16"></td>
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
		  <td align="center" valign="middle" bgcolor="#F7F8FB" class="style11" style="cursor: hand;" onMouseOver="this.style.backgroundColor = '#9999CC'" onMouseOut="this.style.backgroundColor = '#F7F8FB'"><a href="index.php" style="text-decoration: none;">&nbsp;Try Again&nbsp;</a> </td>
		  <td width="24" background="images/cen_rig.gif"><img src="images/cen_rig.gif" width="24" height="11"></td>
		</tr>
		<tr>
		  <td width="16" height="16"><img src="images/bot_lef.gif" width="16" height="16"></td>
		  <td height="16" background="images/bot_mid.gif"><img src="images/bot_mid.gif" width="16" height="16"></td>
		  <td width="24" height="16"><img src="images/bot_rig.gif" width="24" height="16"></td>
		</tr>
	  </table>
	<form action="#">
		<input type="hidden" id="scoreInd" name="scoreInd" value="<?php echo '' . $scoreCounter . ''; ?>">
	</form>

	</body>
</html>