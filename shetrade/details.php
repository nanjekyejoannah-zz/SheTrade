i<?php session_start(); require "_con.php"; error_reporting(0); 
if(isset($_GET['animal'])){
	//Check if Animal Exist, And Show
	$Animal_Result=mysql_query("SELECT * FROM animal WHERE Animals_ID='$_GET[animal]'", $conn);
	$Animal_Details = mysql_fetch_array($Animal_Result);
	$This_Animal=mysql_num_rows($Animal_Result);
	if($This_Animal==1){
		$Animals_ID=$Animal_Details['Animals_ID'];
		$Animal = $Animal_Details['Animal'];
		$Breed = $Animal_Details['Breed'];
		$Date_of_Birth = $Animal_Details['Date_of_Birth'];
		$Parentage = $Animal_Details['Parentage'];
		$Color = $Animal_Details['Color'];
		$Vaccinated = $Animal_Details['Vaccinated'];
		$Registered = $Animal_Details['Registered'];
		$Trained = $Animal_Details['Trained'];
		$Weight = $Animal_Details['Weight'];
		$Purpose = $Animal_Details['Purpose'];
		$Location = $Animal_Details['Location'];
		$Country = $Animal_Details['Country'];
		$Price = number_format($Animal_Details['Price'], 0);
		//$Price = $Animal_Details['Price'];
		$Sale_Type = $Animal_Details['Sale_Type'];
		$Description = $Animal_Details['Description'];
		$Image_1=$Animal_Details['Image_1'];
		$Image_1_Thumb = $Animal_Details['Image_1_Thumb'];
		$Image_2=$Animal_Details['Image_2'];
		$Image_2_Thumb = $Animal_Details['Image_2_Thumb'];
		$Image_3=$Animal_Details['Image_3'];
		$Image_3_Thumb = $Animal_Details['Image_3_Thumb'];
		$Views = $Animal_Details['Views'];
		$Verified = $Animal_Details['Verified'];
		$Added_By = $Animal_Details['Added_By'];
		$Member_Type = $Animal_Details['Member_Type'];
		
		$Page_Title=$Animal." - ".$Breed;
		//Get User Details
		$Member_Name_Result=mysql_query("SELECT Title, First_Name, Last_Name, Email FROM members WHERE Member_ID='$Added_By'", $conn);
		$Member_Details = mysql_fetch_array($Member_Name_Result);
		$Title=$Member_Details['Title'];
		$First_Name = $Member_Details['First_Name'];
		$Last_Name = $Member_Details['Last_Name'];
		$Email = $Member_Details['Email'];
		
		
		//Create View
		if($Verified=="Yes"){
			if(!isset($_SESSION['Last_Viewed_Animal'])){
				$_SESSION['Last_Viewed_Animal']=$_GET['animal'];//
				$View_Animal_Sql = "UPDATE animal SET Views=Views+1 WHERE Animals_ID=$_GET[animal]";
				mysql_query($View_Animal_Sql);
			}else{
				if($_SESSION['Last_Viewed_Animal']!=$_GET['animal']){
					$_SESSION['Last_Viewed_Animal']=$_GET['animal'];
					$View_Animal_Sql = "UPDATE animal SET Views=Views+1 WHERE Animals_ID=$_GET[animal]";
					mysql_query($View_Animal_Sql);
				}
			}
		}
		//End Of View
		if(isset($_SESSION['Member_ID'])){
		//Like 
		if(isset($_GET['like'])){
			if($_GET['like']=="animal"){
				$Check_Like_SQL="SELECT Like_ID FROM `animal_likes` WHERE `Member_ID` = '$_SESSION[Member_ID]' AND `Animal_ID` = '$_GET[animal]'";
				$Check_Like_Results=mysql_query($Check_Like_SQL);
				$Like_Count=mysql_num_rows($Check_Like_Results);
				if($Like_Count==0){
					$Like_SQL = "INSERT INTO `animal_minute`.`animal_likes` (`Member_ID`, `Animal_ID`) VALUES ('$_SESSION[Member_ID]', '$_GET[animal]');";
					mysql_query($Like_SQL);
					//Notification
					if($Added_By!=$_SESSION['Member_ID']){
						//Create Mail Notification
						//Notifcation Created
					}
				}
			}
		}
		//End Of Like
		//UnLike
		if(isset($_GET['unlike'])){
			if($_GET['unlike']=="animal"){
				$Unlike_SQL = "DELETE FROM `animal_minute`.`animal_likes` WHERE `Animal_ID`='$_GET[animal]' AND `Member_ID`='$_SESSION[Member_ID]'";
				mysql_query($Unlike_SQL);
			}
		}
		//End Of Unlike
		//Comment Remove
		if(isset($_GET['remove'])){
			$Remove_Comment_SQL = "DELETE FROM `animal_minute`.`animal_comments` WHERE `Comment_ID`='$_GET[remove]' AND `Member_ID`='$_SESSION[Member_ID]'";
			mysql_query($Remove_Comment_SQL);
		}
		//End of Comment Remove
		
		
		//Comment
		if(isset($_POST['comment'])){
		$Comment=addslashes($_POST['animalcomment']);
		if($Comment!=""){
			$Comment_SQL = "INSERT INTO `animal_minute`.`animal_comments` (`Member_ID`, `Animal_ID`, `Comment`) VALUES ('$_SESSION[Member_ID]', '$_GET[animal]', '$Comment');";
			mysql_query($Comment_SQL);
			//Notification for Others
			$Participants_SQL="SELECT DISTINCT `Member_ID` FROM `animal_comments` WHERE `Animal_ID` = '$_GET[animal]' AND `Member_ID` != '$Added_By'";
			$Participants_Results = mysql_query($Participants_SQL, $conn);
			$Participants_Found = mysql_num_rows($Participants_Results);
			if($Participants_Found!=0){
				while ($Participants_Array = mysql_fetch_array($Participants_Results)) {
					$Participant = $Participants_Array['Member_ID'];
					if($Participant!=$_SESSION['Member_ID']){
						$Perticipant_Details_Result=mysql_query("SELECT Title, First_Name, Last_Name, Email FROM members WHERE Member_ID='$Added_By'", $conn);
						$Perticipant_Details = mysql_fetch_array($Perticipant_Details_Result);
						$Title=$Perticipant_Details['Title'];
						$Perticipant_First_Name = $Perticipant_Details['First_Name'];
						$Perticipant_Last_Name = $Perticipant_Details['Last_Name'];
						$Perticipant_Email = $Perticipant_Details['Email'];
						
						$subject = "$_SESSION[Full_Name] commented on $Animal - $Breed";
						$mailheaders = "From: She Trade  <no-reply@mediaminute.net";
						
						$msg = "Hallo $Perticipant_First_Name.\n";
						$msg .= "$_SESSION[Full_Name] commented on $Animal $Breed;\n";
						$msg .= "$_SESSION[First_Name] wrote \"$_POST[animalcomment]\"\n\n";
						
						$msg .= "To Post your comment, click on the link below\n";
						$msg .= "http://www.mediaminute.net/shetrade/details.php?animal=$_GET[animal]\n\n";
						$msg .= "Thanks\n";
						$msg .= "_______________________________\n";
						$msg .= "she trade \n";
						$msg .= "info@animalminute.com\n";
						
						$recipient = "$Perticipant_Email";
						mail($recipient, $subject, $msg, $mailheaders);
						
					}
				}
			}
			//Notification for Owner
			$subject = "$_SESSION[Full_Name] commented on Your Animal";
			$mailheaders = "From: Animal Minute <no-reply@animalminute.com";
			
			$msg = "Hallo $Perticipant_First_Name.\n";
			$msg .= "$_SESSION[Full_Name] commented on $Animal $Breed;\n";
			$msg .= "$_SESSION[First_Name] wrote \"$_POST[animalcomment]\"\n\n";
			
			$msg .= "To Post your comment, click on the link below\n";
			$msg .= "http://www.animalminute.com/details.php?animal=$_GET[animal]\n\n";
			$msg .= "Thanks\n";
			$msg .= "_______________________________\n";
			$msg .= "Aminal Minute\n";
			$msg .= "info@animalminute.com\n";
			
			$recipient = "$Email";
			mail($recipient, $subject, $msg, $mailheaders);
				
			/*			
			$Notification_Text=addslashes("<a href=\"./$_SESSION[Loged_In_Screen_Name]\">$_SESSION[Full_Name]</a> commented on your song(<a href=\"song.php?sid=$_GET[sid]\">$Title</a>)");
			$Others_Notification_Text=addslashes("<a href=\"./$_SESSION[Loged_In_Screen_Name]\">$_SESSION[Full_Name]</a> also commented on <a href=\"./$Artist_Screen_Name\">$Artist_Full_Name</a>'s song(<a href=\"song.php?sid=$_GET[sid]\">$Title</a>)");
			$Notification_Link=addslashes("song.php?sid=$_GET[sid]");
			//Notification To $From
			if($Artist_Screen_Name!=$_SESSION['Loged_In_Screen_Name']){
				$Notification_SQL="INSERT INTO `orion_socail`.`notifications` (`Notifications_ID`, `User_Screen_Name`, `Notification`, `Link`, `Type`, `Seen`, `Date_Created`) VALUES (NULL, '$Artist_Screen_Name', '$Notification_Text', '$Notification_Link', '7', 'No', '$Server_Date_Time')";
				mysql_query($Notification_SQL);
				//Notifcation Created
			}
			//Notification To Other Perticipants
			$Participants_SQL="SELECT DISTINCT `User_Screen_Name` FROM `music_comments` WHERE `Song_ID` = '$_GET[sid]' AND `User_Screen_Name` != '$Artist_Screen_Name'";
			$Participants_Results = mysql_query($Participants_SQL, $conn);
			$Participants_Found = mysql_num_rows($Participants_Results);
			if($Participants_Found!=0){
				while ($Participants_Array = mysql_fetch_array($Participants_Results)) {
					$Participant = $Participants_Array['User_Screen_Name'];
					if($Participant!=$_SESSION['Loged_In_Screen_Name']){
						$Notification_SQL="INSERT INTO `orion_socail`.`notifications` (`Notifications_ID`, `User_Screen_Name`, `Notification`, `Link`, `Type`, `Seen`, `Date_Created`) VALUES (NULL, '$Participant', '$Others_Notification_Text', '$Notification_Link', '18', 'No', '$Server_Date_Time')";
						mysql_query($Notification_SQL);
						//Notifcation Created
					}
				}
			}
			
			*/
			
			
		}
		
		}
		//End of Comment

		
		
		
		}
	}else{
		header("location:index.php");
		exit;
	}
	
}elseif(isset($_GET['product'])){
	//Check if Product Exist, And Show
	$Product_Result=mysql_query("SELECT * FROM product WHERE Product_ID='$_GET[product]'", $conn);
	$Product_Details = mysql_fetch_array($Product_Result);
	$This_Product=mysql_num_rows($Product_Result);
	if($This_Product==1){
		$Product_ID=$Product_Details['Product_ID'];
		$Animal = $Product_Details['Animal'];
		$Product = $Product_Details['Product'];
		$Price = number_format($Product_Details['Price'], 0);
		//$Price = $Animal_Details['Price']; 
		$Sale_Type = $Product_Details['Sale_Type'];
		$Quantity = $Product_Details['Quantity'];
		$Description = $Product_Details['Description'];
		$Image = $Product_Details['Image'];
		$Image_Thumb = $Product_Details['Image_Thumb'];
		$Views = $Product_Details['Views'];
		$Added_By = $Product_Details['Added_By'];
		$Member_Type = $Product_Details['Member_Type'];
		$Verified = $Product_Details['Verified'];
		
		$Page_Title=$Animal." - ".$Product;
		//Get User Details
		$Member_Name_Result=mysql_query("SELECT Title, First_Name, Last_Name FROM members WHERE Member_ID='$Added_By'", $conn);
		$Member_Details = mysql_fetch_array($Member_Name_Result);
		$Title=$Member_Details['Title'];
		$First_Name = $Member_Details['First_Name'];
		$Last_Name = $Member_Details['Last_Name'];
		
		//Create View
		if($Verified=="Yes"){
			if(!isset($_SESSION['Last_Viewed_Product'])){
				$_SESSION['Last_Viewed_Product']=$_GET['product'];//
				$View_Animal_Sql = "UPDATE product SET Views=Views+1 WHERE Product_ID=$_GET[product]";
				mysql_query($View_Animal_Sql);
			}else{
				if($_SESSION['Last_Viewed_Product']!=$_GET['product']){
					$_SESSION['Last_Viewed_Product']=$_GET['product'];
					$View_Animal_Sql = "UPDATE product SET Views=Views+1 WHERE Product_ID=$_GET[product]";
					mysql_query($View_Animal_Sql);
				}
			}
		}
		//End Of View
		
		if(isset($_SESSION['Member_ID'])){
		//Like 
		if(isset($_GET['like'])){
			if($_GET['like']=="product"){
				$Check_Like_SQL="SELECT Like_ID FROM `product_likes` WHERE `Member_ID` = '$_SESSION[Member_ID]' AND `Product_ID` = '$_GET[product]'";
				$Check_Like_Results=mysql_query($Check_Like_SQL);
				$Like_Count=mysql_num_rows($Check_Like_Results);
				if($Like_Count==0){
					$Like_SQL = "INSERT INTO `animal_minute`.`product_likes` (`Member_ID`, `Product_ID`) VALUES ('$_SESSION[Member_ID]', '$_GET[product]');";
					mysql_query($Like_SQL);
					//Notification
					if($Added_By!=$_SESSION['Member_ID']){
						//Create Mail Notification
						//Notifcation Created
					}
				}
			}
		}
		//End Of Like
		//UnLike
		if(isset($_GET['unlike'])){
			if($_GET['unlike']=="product"){
				$Unlike_SQL = "DELETE FROM `animal_minute`.`product_likes` WHERE `Product_ID`='$_GET[product]' AND `Member_ID`='$_SESSION[Member_ID]'";
				mysql_query($Unlike_SQL);
			}
		}
		//End Of Unlike
		//Comment Remove
		if(isset($_GET['remove'])){
			$Remove_Comment_SQL = "DELETE FROM `animal_minute`.`product_comments` WHERE `Comment_ID`='$_GET[remove]' AND `Member_ID`='$_SESSION[Member_ID]'";
			mysql_query($Remove_Comment_SQL);
		}
		//End of Comment Remove
		
		
		//Comment
		if(isset($_POST['comment'])){
		$Comment=addslashes($_POST['productcomment']);
		if($Comment!=""){
			$Comment_SQL = "INSERT INTO `animal_minute`.`product_comments` (`Member_ID`, `Product_ID`, `Comment`) VALUES ('$_SESSION[Member_ID]', '$_GET[product]', '$Comment');";
			mysql_query($Comment_SQL);
			
			//Notification for Others
			$Participants_SQL="SELECT DISTINCT `Member_ID` FROM `product_comments` WHERE `Product_ID` = '$_GET[product]' AND `Member_ID` != '$Added_By'";
			$Participants_Results = mysql_query($Participants_SQL, $conn);
			$Participants_Found = mysql_num_rows($Participants_Results);
			if($Participants_Found!=0){
				while ($Participants_Array = mysql_fetch_array($Participants_Results)) {
					$Participant = $Participants_Array['Member_ID'];
					if($Participant!=$_SESSION['Member_ID']){
						$Perticipant_Details_Result=mysql_query("SELECT Title, First_Name, Last_Name, Email FROM members WHERE Member_ID='$Added_By'", $conn);
						$Perticipant_Details = mysql_fetch_array($Perticipant_Details_Result);
						$Title=$Perticipant_Details['Title'];
						$Perticipant_First_Name = $Perticipant_Details['First_Name'];
						$Perticipant_Last_Name = $Perticipant_Details['Last_Name'];
						$Perticipant_Email = $Perticipant_Details['Email'];
						
						$subject = "$_SESSION[Full_Name] commented on $Animal - $Breed";
						$mailheaders = "From: Animal Minute <no-reply@animalminute.com";
						
						$msg = "Hallo $Perticipant_First_Name.\n";
						$msg .= "$_SESSION[Full_Name] commented on $Animal $Product;\n";
						$msg .= "$_SESSION[First_Name] wrote \"$_POST[productcomment]\"\n\n";
						
						$msg .= "To Post your comment, click on the link below\n";
						$msg .= "http://www.animalminute.com/details.php?product=$_GET[product]\n\n";
						$msg .= "Thanks\n";
						$msg .= "_______________________________\n";
						$msg .= "Aminal Minute\n";
						$msg .= "info@animalminute.com\n";
						
						$recipient = "$Perticipant_Email";
						mail($recipient, $subject, $msg, $mailheaders);
						
					}
				}
			}
			//Notification for Owner
			$subject = "$_SESSION[Full_Name] commented on Your Animal";
			$mailheaders = "From: Animal Minute <no-reply@animalminute.com";
			
			$msg = "Hallo $Perticipant_First_Name.\n";
			$msg .= "$_SESSION[Full_Name] commented on $Animal $Product;\n";
			$msg .= "$_SESSION[First_Name] wrote \"$_POST[productcomment]\"\n\n";
			
			$msg .= "To Post your comment, click on the link below\n";
			$msg .= "http://www.animalminute.com/details.php?product=$_GET[product]\n\n";
			$msg .= "Thanks\n";
			$msg .= "_______________________________\n";
			$msg .= "Aminal Minute\n";
			$msg .= "info@animalminute.com\n";
			
			$recipient = "$Email";
			mail($recipient, $subject, $msg, $mailheaders);
			
			
		}
		
		}
		//End of Comment
		
		
		
		}
	}else{
		header("location:index.php");
		exit;
	}
}elseif(isset($_GET['member'])){
	//Check if Member Exist, And Show
	$Member_Result=mysql_query("SELECT * FROM members WHERE Member_ID='$_GET[member]'", $conn);
	$Member_Details = mysql_fetch_array($Member_Result);
	$This_Member=mysql_num_rows($Member_Result);
	if($This_Member==1){
		//					
		$Member_ID=$Member_Details['Member_ID'];
		$Title = $Member_Details['Title'];
		$First_Name = $Member_Details['First_Name'];
		$Last_Name = $Member_Details['Last_Name'];
		$Gender = $Member_Details['Gender'];
		$Date_Of_Birth = date("F d", strtotime($Member_Details['Date_Of_Birth']));
		//$Date_Of_Birth = $Member_Details['Date_Of_Birth'];
		$Email = $Member_Details['Email'];
		$Phone = $Member_Details['Phone'];
		$Website = $Member_Details['Website'];
		$Image = $Member_Details['Image'];
		$Image_Thumb = $Member_Details['Image_Thumb'];
		$Organisation = $Member_Details['Organisation'];
		$City = $Member_Details['City'];
		$Country = $Member_Details['Country'];
		$Animals_Added = $Member_Details['Animals_Added'];
		$Animal_Products = $Member_Details['Animal_Products'];
		$Type = $Member_Details['Type'];
		//$Make = $Member_Details['Make'];
		
		$Page_Title=$First_Name." ".$Last_Name;
	}else{
		header("location:index.php");
		exit;
	}
	
}elseif(isset($_GET['resource'])){
	//Check if Member Exist, And Show
	$Resource_Result=mysql_query("SELECT * FROM resource WHERE Resource_ID='$_GET[resource]'", $conn);
	$Resource_Details = mysql_fetch_array($Resource_Result);
	$This_Resource=mysql_num_rows($Resource_Result);
	if($This_Resource==1){
		//					
		$Resource_ID=$Resource_Details['Resource_ID'];
		$Category = $Resource_Details['Category'];
		$Resource = $Resource_Details['Resource'];
		$Description = $Resource_Details['Description'];
		$Link = $Resource_Details['Link'];
		//$Make = $Member_Details['Make'];
		
		$Page_Title=$Category;
	}else{
		header("location:index.php");
		exit;
	}
	
}else{
	header("location:index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "57a3ced2-c642-4a84-80e6-74ba835f7678"});</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $Page_Title; ?> | SHE Trade | All Women Owned Businesses</title>
<meta name="keywords" content="animal, veterinary, uganda, livestock, agriculture, agribusiness, pet, wildlife, domestic, birds, poultry, commercial, trade, online, market, africa, east africa, private sector, research, minute, zoo, diseases, zoonoses, poverty, small scale, medium, enterprise, products, drugs, eggs, chicks, chicken, dog, cattle, dairy, beef, animal welfare, hygiene, kennel, feeds" />
<meta name="description" content="SHE Trade | All Women Owned Businesses" />
	<link rel="shortcut icon" type="image/ico" href="images/favicon.gif" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<!--<link href="css/black/style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/piroBox.1_2.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/piroBox.1_2_min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$().piroBox({
		my_speed: 600, 
		bg_alpha: 0.5, 
		radius: 4, 
		scrollImage:false,
		pirobox_next: 'piro_next',
		pirobox_prev:'piro_prev',
		close_all: '.piro_close',
		slideShow: 'slideshow',
		slideSpeed: 4});
	});
</script>
-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="application/javascript">
jQuery(document).ready(function() {
	//clean up the row of the mega menu. add css class to each element on bottom row.
	//only if more than 7 elements. if more than 16, mm-3
	jQuery('#nav li ul').each(function(ulindex, ulele){
		$total = jQuery(this).children('li').size();
		if ($total <= 7) {
			jQuery(this).addClass('mm-1');
		}
		else {
			$cols = Math.floor(($total) / 8) + 1;
			$remainder = $total % $cols;
			jQuery(this).addClass('mm-' + $cols + ' total-' + $total + ' rem-'+$remainder );
			
			jQuery(this).children().each(function(liindex, liele){
				//alert("total: "+$total+", remainder: "+ $mod+", ulindex: "+ulindex+", liindex: "+liindex);	
				if( liindex + $remainder >= $total || $remainder == 0 && liindex + $cols >= $total ){
					//alert("total: "+$total+", remainder: "+ $remainder+", index: "+liindex);
					jQuery(this).addClass('last');
				}
			});
		}
	});	
	
});
</script>
<style type="text/css">

#nav {
	
	
}

/* All Levels */
#nav li { text-align:centre; position:relative; }
#nav li.over { z-index:999; }
#nav li.parent {}
#nav li a { display:block; text-decoration:none; }
#nav li a:hover { text-decoration:none; }


/* 1st Level */
#nav li { float:left; }
#nav li a { float:left; padding:1px 5px; font-weight:normal;}
#nav li a:hover {
	color: #093;
}
#nav li.over a,
#nav li.active a { color:#fff; }

/* 2nd Level */
#nav ul { position:absolute; width:15em;}
#nav ul div.col { float:left; width: 15em; }


#nav ul li.over > a  { font-weight:normal; color:#fff !important; }
#nav ul.mm-1 { width: 15em; }
#nav ul.mm-2 { width: 30em; }
#nav ul.mm-3 { width: 45em; }
#nav ul.mm-4 { width: 40em; }
/* 3rd+ leven */
#nav ul ul { top:-6px; }

/* Show Menu - uses built-in magento menu hovering */
#nav li.over > ul { left:0; }
#nav li.over > ul li.over > ul { left:14em; }
#nav li.over ul ul { left:-10000px; }

/* Show Menu - uses css only, not fully across all browsers but, for the purpose of the demo is fine by me */
#nav li:hover > ul { left:0; z-index: 100; }
#nav li:hover > ul li:hover > ul { left:14em; z-index: 200; }
#nav li:hover ul ul { left:-10000px; }

/********** Navigation > */
/* ======================================================================================= */
</style>


</head>

<body>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="templatemo_wrapper">
<table width="974" border="0" bgcolor="#FFFFFF">
  <tr>
    <td width="188"><div id="templatemo_header">
      <div class="cleaner">
        <table width="954" border="0" align="left">
          <tr>
            <td width="6">&nbsp;</td>
            <td width="915"><div id="site_title">
              <h1><a href="http://www.animalminute.com">Animal Minute | All about Animals and More</a></h1>
            </div></td>
            <td width="915"><table width="439" border="0" align="right">
              <tr>
                <td width="387"><div id="header_right"><a href="home.php">My Home</a>&nbsp;|&nbsp;<a href="account.php">My Account</a>&nbsp;|&nbsp;<?php if(isset($_SESSION['Member_ID'])){echo "<a href=\"login.php?logout\">Log Out</a>";}else{echo "<a href=\"login.php\">Log In</a>";}?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div id="templatemo_search">
                  <form action="#" method="get">
                    <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                    <input type="submit" name="Search" value=" Search " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                  </form>
                </div></td>
              </tr>
            </table></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      </div>
    </div></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><div  id="templatemo_menu">
      <div id="top_nav" class="ddsmoothmenu">
          
          <ul >
          <li><a href="index.php">Home</a></li>
           <li><a href="about.php" >About</a></li>
      <!--<li id="nav"> <a href="#category-one">  Resources  </a>
        <ul class="level0 mm-3 total-23 rem-2">
          <li> <a href="#"><span><strong>About Animals</strong></span></a></li>
          <li> <a href="#"><span><strong>Stake Holders</strong></span></a></li>
          <li> <a href="#"><span><strong>Others</strong></span></a></li>
          <li> <a href="breeds.php"><span>Breeds</span></a></li>
          <li> <a href="ministries.php"><span>Animal ministries</span></a></li>
          <li> <a href="training.php"><span>Training</span></a></li>
          <li> <a href="diseases.php"><span>Common Diseases</span></a></li>
          <li> <a href="ngos.php"><span>NGOs</span></a></li>
          <li> <a href="products.php"><span>Animals for Sale</span></a></li>
          <li> <a href="animalcare.php"><span>Animal Care</span></a></li>
          <li> <a href="research.php"><span>Research Centres</span></a></li>
          <li> <a href="bellapets.php"><span>Bella Pets</span></a></li>
          <li> <a href="petmgt.php"><span>Pet Management</span></a></li>
          <li> <a href="profiles.php"><span>Farmer Profiles</span></a></li>
          <li> <a href="zoo.php"><span>Zoo</span></a></li>
        </ul>
      </li>-->
	  <?php 
      $Total_Animals = "SELECT Animals_ID FROM animal WHERE Verified='Yes'";
      $Total_Animals_Results = mysql_query($Total_Animals);
      $All_Animals=mysql_num_rows($Total_Animals_Results);
      if($All_Animals!=0){
          echo "<li class=\"level0 nav-2 parent\" id=\"nav\"> <a href=\"listing.php?business\"><span>Animals</span></a>";
          echo "<ul class=\"level0 mm-2 total-8 rem-1\">";
          echo "<li ><a href=\"listing.php?business\"><span>All Businesses ($All_Animals)</span></a></li>";
        
          $Animal_Count_SQL="SELECT `Animal`, COUNT(*) as Animal_Number FROM `animal` WHERE Verified='Yes' GROUP BY `Animal` ORDER BY Animal ASC";
          $Animal_Count_Results = mysql_query($Animal_Count_SQL, $conn);
          $Animal_Count_Found = mysql_num_rows($Animal_Count_Results);
          if($Animal_Count_Found!=0){
            while ($Animal_Count_Array = mysql_fetch_array($Animal_Count_Results)) {
                $Menu_Animal = $Animal_Count_Array['Animal'];
                $Menu_Animal_Number = $Animal_Count_Array['Animal_Number'];
                echo "<li ><a href=\"listing.php?business=$Menu_Animal\"><span>$Menu_Animal ($Menu_Animal_Number)</span></a></li>";	
            }  
          }
          echo "</ul>";
        echo "</li>";
      }

      $Total_Products = "SELECT Product_ID FROM product WHERE Verified='Yes'";
      $Total_Products_Results = mysql_query($Total_Products);
      $All_Products=mysql_num_rows($Total_Products_Results);
      if($All_Products){
        echo "<li class=\"level0 nav-2 parent\" id=\"nav\"> <a href=\"listing.php?product\"><span>Products</span></a>";
        echo "<ul class=\"level0 mm-2 total-8 rem-1\">"; 
        echo "<li ><a href=\"listing.php?product\"><span>All Products ($All_Products)</span></a></li>";
        
      $Product_Count_SQL="SELECT `Product`, COUNT(*) as Product_Number FROM `product` WHERE Verified='Yes' GROUP BY `Product` ORDER BY Animal ASC";
      $Product_Count_Results = mysql_query($Product_Count_SQL, $conn);
      $Product_Count_Found = mysql_num_rows($Product_Count_Results);
      if($Product_Count_Found!=0){
        while ($Product_Count_Array = mysql_fetch_array($Product_Count_Results)) {
            $Menu_Product = $Product_Count_Array['Product'];
            $Menu_Product_Number = $Product_Count_Array['Product_Number'];
            echo "<li ><a href=\"listing.php?product=$Menu_Product\"><span>$Menu_Product ($Menu_Product_Number)</span></a></li>";	
        }  
      }
        
        echo "</ul>";
        echo "</li>";
      }
		  
	  ?>
     
      <li><a href="booking.php">Make an Order</a>
                </li>
      <?php
	  	if(!isset($_SESSION['Member_ID'])){
			echo "<li><a href=\"register.php\" >Register</a></li>";
		} 
      ?>
      <!--<li><a href="faqs.php" >FAQ</a></li>-->
      <li><a href="contact.php" >Contact</a><br style="clear: left" />
      </li>
          </ul>
      </div>
      <!-- end of ddsmoothmenu --><br />
      <div id="menu_second_bar">
        <div class="cleaner"></div>
      </div>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <?php
    if(isset($_GET['animal'])){
	
	?>
	<table width="723" border="0" align="right" bgcolor="#FFFFFF">
      <tr>
        <td width="722"><div id="content" class="float_r">
          <h1><?php echo $Animal ?> - <?php echo $Breed ?></h1>
          <div class="content_half float_l"> 
            <p align="center"><a  href="<?php echo $Image_1; ?>" class="pirobox"><img src="<?php echo $Image_1; ?>" alt="Image 01" width="340" /></a> </p>
            <table width="340" border="0">
              <tr>
              <!--echo "<a href=\"$img2\" class=\"pirobox\" title=\"Image 2\"><img name=\"\" src=\"$img2\" width=\"100\" height=\"70\" alt=\"\" /></a> ";-->
                <td align="center"><a href="<?php echo $Image_1; ?>" class="pirobox" title="Image 1"><img name="" src="<?php echo $Image_1_Thumb; ?>" width="93" height="70" alt="" /></a></td>
                <td align="center"><a href="#"><img name="" src="<?php echo $Image_2_Thumb; ?>" width="93" height="70" alt="" /></a></td>
                <td align="center"><a href="#"><img name="" src="<?php echo $Image_3_Thumb; ?>" width="93" height="70" alt="" /></a></td>
              </tr>
            </table>
            <p>&nbsp;</p>
          </div>
          <div class="content_half float_r">
            <table border="0" width="100%">
             <!--  <tr>
                <td height="30" width="30%"><strong>Price:</strong></td>
                <td><?php echo "$ $Price ($Sale_Type)"; ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Color(s):</strong></td>
                <td><?php echo $Color ?></td>
              </tr> -->
              <!-- Date_of_Birth Purpose Description	 -->
              <!-- <tr>
                <td height="30"><strong>Parentage:</strong></td>
                <td><?php echo $Parentage ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Vaccinated:</strong></td>
                <td><?php echo $Vaccinated ?></td>
              </tr> -->
              <tr>
                <td height="30"><strong>Registered:</strong></td>
                <td><?php echo $Registered ?></td>
              </tr>
              <!-- <tr>
                <td height="30"><strong>Trained:</strong></td>
                <td><?php echo $Trained ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Weight:</strong></td>
                <td><?php echo $Weight ?></td>
              </tr> -->
              <tr>
                <td height="30"><strong>Location:</strong></td>
                <td><?php echo $Location." ".$Country ?></td>
              </tr>
              <!-- <tr>
                <td height="30"><strong>Booking:</strong></td>
                <td><a href="booking.php?animal=<?php echo $_GET['animal']; ?>&member=<?php echo $Added_By; ?>&name=<?php echo $Animal."-".$Breed; ?>">Book this Animal</a></td>
              </tr> -->
              <tr>
                <td height="30"><strong>Posted By</strong></td>
                <td><a href="details.php?member=<?php echo $Added_By; ?>"><?php echo $Title." ".$First_Name." ".$Last_Name ?></a></td>
              </tr>
            </table>
            <div class="cleaner h20"></div>
            </div>
          <div class="cleaner h30"></div>
          <?php
          if($Description!=""){
			  echo "<h5><strong>Description</strong></h5>";
			  echo "<p>$Description</p>";
          }
		  if($Purpose!=""){
			  echo "<h5><strong>Purpose</strong></h5>";
			  echo "<p>$Purpose</p>";
          }
          ?>
          	<span class='st_facebook_vcount' displayText='Facebook'></span>
            <span class='st_twitter_vcount' displayText='Tweet'></span>
            <span class='st_email_vcount' displayText='Email'></span>
          <?php 
		  	if(isset($_SESSION['Logedin'])=="True"){
			$Check_Like_SQL="SELECT Like_ID FROM `animal_likes` WHERE `Member_ID` = '$_SESSION[Member_ID]' AND `Animal_ID` = '$_GET[animal]'";
			$Check_Like_Results=mysql_query($Check_Like_SQL);
			$Like_Count=mysql_num_rows($Check_Like_Results);
			if($Like_Count==0){
				$Like_Action="Like";
				$Like_Link="details.php?animal=$_GET[animal]&like=animal";
				}else{
				$Like_Action="Unlike";
				$Like_Link="details.php?animal=$_GET[animal]&unlike=animal";	
				}
			}else{
				$Like_Action="Like";
				$Like_Link="details.php?animal=$_GET[animal]&like=animal";
			}
			$Likes_SQL="SELECT Like_ID FROM `animal_likes` WHERE `Animal_ID` = '$_GET[animal]'";
			$Likes_Results=mysql_query($Likes_SQL);
			$Likes_Count=mysql_num_rows($Likes_Results);
			echo "<p>";
			echo "<a href=\"$Like_Link\">$Like_Action</a>";
			if($Likes_Count!=0){
				echo "(<a href=\"likes.php?animal=$_GET[animal]\">$Likes_Count</a>)";
			}
			echo "&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;";
			$Get_Comments_SQL="SELECT * FROM `animal_comments` WHERE `Animal_ID` = '$_GET[animal]'";
			$Get_Comments_Results=mysql_query($Get_Comments_SQL);
			$Comments_Count=mysql_num_rows($Get_Comments_Results);
			if($Comments_Count==0){
				echo "<a href=\"#\">Comment</a></p>";
			}else{
				echo "<a href=\"#\">Comment($Comments_Count)</a></p>";
			}
			
			//Comment Section
			echo "<div id=\"steps\">";
			echo "<form id=\"formElem\" name=\"formElem\" action=\"details.php?animal=$_GET[animal]\" method=\"post\">";
			echo "<input name=\"comment\" type=\"hidden\" value=\"yes\" />";
			echo "<table width=\"100%\" border=\"0\">";
			//Comments Section
			if($Comments_Count!=0){
				while ($Get_Comments_Array = mysql_fetch_array($Get_Comments_Results)) {
					$Comment_ID = $Get_Comments_Array['Comment_ID'];
					$Commenter = $Get_Comments_Array['Member_ID'];
					$Comment = nl2br(stripslashes($Get_Comments_Array['Comment']));
					
					$Commenter_Details_SQL = "SELECT Title, First_Name, Last_Name, Image_Thumb FROM members WHERE Member_ID='$Commenter'";
					$Commenter_Details_Results = mysql_query($Commenter_Details_SQL, $conn) or die(mysql_error());
					$Commenter_Details_Array = mysql_fetch_array($Commenter_Details_Results);
					$Commenter_First_Name = stripslashes($Commenter_Details_Array['First_Name']);
					$Commenter_Last_Name = stripslashes($Commenter_Details_Array['Last_Name']);
					$Commenter_Title = stripslashes($Commenter_Details_Array['Title']);
					$Commenter_Full_Name=$Commenter_Title." ".$Commenter_First_Name." ".$Commenter_Last_Name;
					$Commenter_Avatar = $Commenter_Details_Array['Image_Thumb'];
					
					echo "<tr>";
					echo "<td width=\"33\" valign=\"top\"><a href=\"#\"><img name=\"\" src=\"$Commenter_Avatar\" width=\"35\" height=\"35\" alt=\"\" /></a></td>";
					echo "<td><a href=\"#\"><strong>$Commenter_Full_Name</strong></a>&nbsp;$Comment";
					/*
					if(isset($_SESSION['Logedin'])=="True"){
					$Check_Like_SQL="SELECT *  FROM `music_comments_likes` WHERE `User_Screen_Name` = '$_SESSION[Loged_In_Screen_Name]' AND `Comment_ID` = '$Comment_ID'";
					$Check_Like_Results=mysql_query($Check_Like_SQL);
					$Like_Count=mysql_num_rows($Check_Like_Results);
					if($Like_Count==0){
						$Like_Action="Like";
						$Like_Link="song.php?sid=$_GET[sid]&like=$Comment_ID";
						}else{
						$Like_Action="Unlike";
						$Like_Link="song.php?sid=$_GET[sid]&unlike=$Comment_ID";	
						}
					}else{
						$Like_Action="Like";
						$Like_Link="song.php?sid=$_GET[sid]&like=$Comment_ID";
					}
					$Likes_SQL="SELECT *  FROM `music_comments_likes` WHERE `Comment_ID` = '$Comment_ID'";
					$Likes_Results=mysql_query($Likes_SQL);
					$Likes_Count=mysql_num_rows($Likes_Results);
					if($Likes_Count==0){
						echo "<a href=\"$Like_Link\">$Like_Action</a>";
						}else{
						echo "<a href=\"$Like_Link\">$Like_Action</a>(<a href=\"likes.php?type=8&id=$Comment_ID\">$Likes_Count</a>)";
						}
					*/
					if(isset($_SESSION['Logedin'])=="True"){
						if($Commenter==$_SESSION['Member_ID']){
							echo "&nbsp;.&nbsp;<a href=\"details.php?animal=$_GET[animal]&remove=$Comment_ID\">Remove</a>";
						}
					}
					echo "</td></tr>";
				}
			}
						//End Of comment Section
			if(isset($_SESSION['Logedin'])=="True"){
				echo "<tr>";
				echo "<td width=\"33\" valign=\"top\"><a href=\"#\"><img name=\"\" src=\"$_SESSION[Avatar]\" width=\"35\" height=\"35\" alt=\"\" /></a></td>";
				echo "<td><textarea name=\"animalcomment\" cols=\"120%\" rows=\"2\" wrap=\"physical\" placeholder=\"Comment...\" style=\"font-size:11px; font-family:'Comic Sans MS', cursive;\"></textarea></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td width=\"33\">&nbsp;</td>";
				echo "<td align=\"right\"><input name=\"\" class=\"download\" type=\"submit\" value=\"Comment\" /></td>";
				echo "</tr>";
			}else{
				echo "<tr>";
				echo "<td>&nbsp;</td>";
				echo "<td><br/><a href=\"login.php\">Login</a> or <a href=\"register.php\">Create your Free Account</a> to Post your Comment</td>";
				echo "</tr>";
			}
			echo "<tr>";
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			echo "</tr>";
			echo "</table>";
			echo "</form>";
			echo "</div>";
		  ?>
        </div></td>
      </tr>
    </table>
	<?php
    }elseif(isset($_GET['product'])){
      ?>
	  <table width="723" border="0" align="right" bgcolor="#FFFFFF">
      <tr>
        <td width="722"><div id="content" class="float_r">
          <h1><?php echo $Product; ?></h1>
          <div class="content_half float_l"> 
            <p align="center"><a  rel="lightbox[portfolio]" href="images/product/10_l.jpg"><img src="<?php echo $Image; ?>" alt="Image 01" width="340" /></a> </p>
            <p>&nbsp;</p>
          </div>
          <div class="content_half float_r">
            <table border="0" width="100%">
              <tr>
                <td height="30" width="30%"><strong>Business:</strong></td>
                <td><?php echo $Animal; ?></td>
              </tr>
             <!--  <tr>
                <td height="30"><strong>Price:</strong></td>
                <td><?php echo "$ $Price ($Sale_Type)"; ?> </td>
              </tr>
              <tr>
                <td height="30"><strong>Quantity:</strong></td>
                <td><?php echo $Quantity; ?></td>
              </tr> -->
              <tr>
                <td height="30" valign="top"><strong>Description:</strong></td>
                <td valign="top"><?php echo $Description; ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Booking:</strong></td>
                <td><a href="booking.php?product=<?php echo $_GET['product']; ?>&member=<?php echo $Added_By; ?>&name=<?php echo $Animal."-".$Product; ?>">Book this Product</a></td>
              </tr>
              <tr>
                <td height="30"><strong>Posted By</strong></td>
                <td><a href="details.php?member=<?php echo $Added_By; ?>"><?php echo $Title." ".$First_Name." ".$Last_Name ?></a></td>
              </tr>
            </table>
            <div class="cleaner h20"></div>
            </div>
            <span class='st_facebook_vcount' displayText='Facebook'></span>
            <span class='st_twitter_vcount' displayText='Tweet'></span>
            <span class='st_email_vcount' displayText='Email'></span>
          <div class="cleaner h30"></div>
          <?php 
		  	if(isset($_SESSION['Logedin'])=="True"){
			$Check_Like_SQL="SELECT Like_ID FROM `product_likes` WHERE `Member_ID` = '$_SESSION[Member_ID]' AND `Product_ID` = '$_GET[product]'";
			$Check_Like_Results=mysql_query($Check_Like_SQL);
			$Like_Count=mysql_num_rows($Check_Like_Results);
			if($Like_Count==0){
				$Like_Action="Like";
				$Like_Link="details.php?product=$_GET[product]&like=product";
				}else{
				$Like_Action="Unlike";
				$Like_Link="details.php?product=$_GET[product]&unlike=product";	
				}
			}else{
				$Like_Action="Like";
				$Like_Link="details.php?product=$_GET[product]&like=product";
			}
			$Likes_SQL="SELECT Like_ID FROM `product_likes` WHERE `Product_ID` = '$_GET[product]'";
			$Likes_Results=mysql_query($Likes_SQL);
			$Likes_Count=mysql_num_rows($Likes_Results);
			echo "<p>";
			echo "<a href=\"$Like_Link\">$Like_Action</a>";
			if($Likes_Count!=0){
				echo "(<a href=\"likes.php?product=$_GET[product]\">$Likes_Count</a>)";
			}
			echo "&nbsp;&nbsp;&nbsp;.&nbsp;&nbsp;&nbsp;";
			$Get_Comments_SQL="SELECT * FROM `product_comments` WHERE `Product_ID` = '$_GET[product]'";
			$Get_Comments_Results=mysql_query($Get_Comments_SQL);
			$Comments_Count=mysql_num_rows($Get_Comments_Results);
			if($Comments_Count==0){
				echo "<a href=\"#\">Comment</a></p>";
			}else{
				echo "<a href=\"#\">Comment($Comments_Count)</a></p>";
			}
			echo "<div id=\"steps\">";
			echo "<form id=\"formElem\" name=\"formElem\" action=\"details.php?product=$_GET[product]\" method=\"post\">";
			echo "<input name=\"comment\" type=\"hidden\" value=\"yes\" />";
			echo "<table width=\"100%\" border=\"0\">";
			if($Comments_Count!=0){
				while ($Get_Comments_Array = mysql_fetch_array($Get_Comments_Results)) {
					$Comment_ID = $Get_Comments_Array['Comment_ID'];
					$Commenter = $Get_Comments_Array['Member_ID'];
					$Comment = nl2br(stripslashes($Get_Comments_Array['Comment']));
					
					$Commenter_Details_SQL = "SELECT Title, First_Name, Last_Name, Image_Thumb FROM members WHERE Member_ID='$Commenter'";
					$Commenter_Details_Results = mysql_query($Commenter_Details_SQL, $conn) or die(mysql_error());
					$Commenter_Details_Array = mysql_fetch_array($Commenter_Details_Results);
					$Commenter_First_Name = stripslashes($Commenter_Details_Array['First_Name']);
					$Commenter_Last_Name = stripslashes($Commenter_Details_Array['Last_Name']);
					$Commenter_Title = stripslashes($Commenter_Details_Array['Title']);
					$Commenter_Full_Name=$Commenter_Title." ".$Commenter_First_Name." ".$Commenter_Last_Name;
					$Commenter_Avatar = $Commenter_Details_Array['Image_Thumb'];
					
					echo "<tr>";
					echo "<td width=\"33\" valign=\"top\"><a href=\"#\"><img name=\"\" src=\"$Commenter_Avatar\" width=\"35\" height=\"35\" alt=\"\" /></a></td>";
					echo "<td><a href=\"#\"><strong>$Commenter_Full_Name</strong></a>&nbsp;$Comment";
					/*
					if(isset($_SESSION['Logedin'])=="True"){
					$Check_Like_SQL="SELECT *  FROM `music_comments_likes` WHERE `User_Screen_Name` = '$_SESSION[Loged_In_Screen_Name]' AND `Comment_ID` = '$Comment_ID'";
					$Check_Like_Results=mysql_query($Check_Like_SQL);
					$Like_Count=mysql_num_rows($Check_Like_Results);
					if($Like_Count==0){
						$Like_Action="Like";
						$Like_Link="song.php?sid=$_GET[sid]&like=$Comment_ID";
						}else{
						$Like_Action="Unlike";
						$Like_Link="song.php?sid=$_GET[sid]&unlike=$Comment_ID";	
						}
					}else{
						$Like_Action="Like";
						$Like_Link="song.php?sid=$_GET[sid]&like=$Comment_ID";
					}
					$Likes_SQL="SELECT *  FROM `music_comments_likes` WHERE `Comment_ID` = '$Comment_ID'";
					$Likes_Results=mysql_query($Likes_SQL);
					$Likes_Count=mysql_num_rows($Likes_Results);
					if($Likes_Count==0){
						echo "<a href=\"$Like_Link\">$Like_Action</a>";
						}else{
						echo "<a href=\"$Like_Link\">$Like_Action</a>(<a href=\"likes.php?type=8&id=$Comment_ID\">$Likes_Count</a>)";
						}
					*/
					if(isset($_SESSION['Logedin'])=="True"){
						if($Commenter==$_SESSION['Member_ID']){
							echo "&nbsp;.&nbsp;<a href=\"details.php?product=$_GET[product]&remove=$Comment_ID\">Remove</a>";
						}
					}
					echo "</td></tr>";
				}
			}
						//End Of comment Section
			if(isset($_SESSION['Logedin'])=="True"){
				echo "<tr>";
				echo "<td width=\"33\" valign=\"top\"><a href=\"#\"><img name=\"\" src=\"$_SESSION[Avatar]\" width=\"35\" height=\"35\" alt=\"\" /></a></td>";
				echo "<td><textarea name=\"productcomment\" cols=\"120%\" rows=\"2\" wrap=\"physical\" placeholder=\"Comment...\" style=\"font-size:11px; font-family:'Comic Sans MS', cursive;\"></textarea></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td width=\"33\">&nbsp;</td>";
				echo "<td align=\"right\"><input name=\"\" class=\"download\" type=\"submit\" value=\"Comment\" /></td>";
				echo "</tr>";
			}else{
				echo "<tr>";
				echo "<td>&nbsp;</td>";
				echo "<td><br/><a href=\"login.php\">Login</a> or <a href=\"register.php\">Create your Free Account</a> to Post your Comment</td>";
				echo "</tr>";
			}
			echo "<tr>";
			echo "<td>&nbsp;</td>";
			echo "<td>&nbsp;</td>";
			echo "</tr>";
			echo "</table>";
			echo "</form>";
			echo "</div>";
		  ?>
        </div></td>
      </tr>
    </table>
	<?php
    }elseif(isset($_GET['member'])){
	//	Member_ID	Title	First_Name	Last_Name	
	//Gender				
	//		Image_Thumb		
	//		Animals_Added	Animal_Products	Type
	?>	
      <table width="723" border="0" align="right" bgcolor="#FFFFFF">
      <tr>
        <td width="722"><div id="content" class="float_r">
          <h1><?php echo $Title." ".$First_Name." ".$Last_Name;	?></h1>
          <div class="content_half float_l"> 
            <p align="center"><a  rel="lightbox[portfolio]" href="<?php echo $Image; ?>"><img src="<?php echo $Image; ?>" alt="Image 01" width="300" height="300" /></a></p>
          </div>
          <div class="content_half float_r">
            <table border="0" width="100%">
              <tr>
                <td height="30" width="30%"><strong>First Name:</strong></td>
                <td><?php echo $First_Name; ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Last Name:</strong></td>
                <td><?php echo $Last_Name; ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Gender:</strong></td>
                <td><?php echo $Gender; ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Date of Birth</strong></td>
                <td><?php echo $Date_Of_Birth; ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Email:</strong></td>
                <td><?php echo $Email; ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Phone:</strong></td>
                <td><?php echo $Phone; ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Website:</strong></td>
                <td><?php echo $Website; ?></td>
              </tr>
              <tr>
                <td height="30"><strong>Organisation:</strong></td>
                <td><?php echo $Organisation; ?></td>
              </tr>
              <tr>
                <td height="30"><strong>City, Country</strong></td>
                <td><?php echo $City." ".$Country; ?></td>
              </tr>
            </table>
            <div class="cleaner h20"></div>
            </div>
          <div class="cleaner h30"></div>
          <?php 
			$This_Page_SQL = "SELECT Animals_ID, Animal, Breed, Price, Image_1, Views FROM animal WHERE Verified='Yes' AND Added_By=$_GET[member] ORDER BY Animals_ID DESC LIMIT 0, 6";
			$result = mysql_query($This_Page_SQL, $conn) or die(mysql_error());
			$Most_Recent_6=mysql_num_rows($result);
			if($Most_Recent_6>0){
				echo "<h1>Animals Added by $First_Name</h1>";
				while ($newArray = mysql_fetch_array($result)) {
							//$id = $newArray['ID'];
							$Animals_ID=$newArray['Animals_ID'];
							$Animal = $newArray['Animal'];
							$Breed = $newArray['Breed'];
							$Price = number_format($newArray['Price'], 0);
							$Image_1 = $newArray['Image_1'];
							$Views = $newArray['Views'];
												
				if ($Animals_ID!=""){
					
					echo "<div class=\"product_box\"> <a href=\"details.php?animal=$Animals_ID\"><img src=\"$Image_1\" alt=\"Image 01\" width=\"200\" height=\"120\"/></a>";
					echo "<h3>$Animal / $Breed</h3>";
					echo "<p class=\"product_price\">$ $Price</p>";
					echo "<a href=\"details.php?animal=$Animals_ID\" class=\"add_to_card\">View Details</a> <a href=\"#\" class=\"detail\">$Views Views</a> </div>";
				}
				//$posision++;
			
				}
			}
			echo "<div class=\"cleaner h20\"></div>";
			$This_Page_SQL = "SELECT Product_ID, Animal, Product, Price, Image, Views FROM product WHERE Verified='Yes' AND Added_By=$_GET[member] ORDER BY Product_ID DESC LIMIT 0, 6";
			$result = mysql_query($This_Page_SQL, $conn) or die(mysql_error());
			$Most_Recent_6=mysql_num_rows($result);
			if($Most_Recent_6>0){
				echo "<h1>Products Added by $First_Name</h1>";
				while ($newArray = mysql_fetch_array($result)) {
							//$id = $newArray['ID'];
							$Product_ID=$newArray['Product_ID'];
							$Animal = $newArray['Animal'];
							$Product = $newArray['Product'];
							$Price = number_format($newArray['Price'], 0);
							$Image = $newArray['Image'];
							$Views = $newArray['Views'];
					
				if ($Product_ID!=""){
					
					echo "<div class=\"product_box\"> <a href=\"details.php?product=$Product_ID\"><img src=\"$Image\" alt=\"Image 01\" width=\"200\" height=\"120\"/></a>";
					echo "<h3>$Animal / $Product</h3>";
					echo "<p class=\"product_price\">$ $Price</p>";
					echo "<a href=\"details.php?product=$Product_ID\" class=\"add_to_card\">View Details</a> <a href=\"#\" class=\"detail\">$Views Views</a> </div>";
				}		
				}
			}
			?>
        </div></td>
      </tr>
    </table>
	<?php
    }elseif(isset($_GET['resource'])){
		/*
		
		$Resource_ID=$Member_Details['Resource_ID'];
		$Category = $Member_Details['Category'];
		$Resource = $Member_Details['Resource'];
		$Description = $Member_Details['Description'];
		$Link = $Member_Details['Link'];
		*/
	?>
    <table width="723" border="0" align="right" bgcolor="#FFFFFF">
      <tr>
        <td width="722"><div id="content" class="float_r">
        <h1><?php echo $Resource; ?></h1>
        <p><?php echo $Description; ?></p>
        <p>
        <table width="100%" border="0">
          <tr>
            <td width="10%"><strong>Category:</strong></td>
            <td><?php echo $Category; ?></td>
          </tr>
          <tr>
            <td><strong>Link:</strong></td>
            <td><?php echo $Link; ?></td>
          </tr>
        </table>

        
        
        </p>
        <div class="cleaner"></div>
        <blockquote>Announcment</blockquote>
        </div></td>
      </tr>
    </table>
    <?php	
	}
	?>
     
    
      <table width="230" border="0" align="left">
        <tr>
          <td><h3>Categories<br />
          </h3></td>
        </tr>
        <tr>
          <td><?php
        if($All_Animals!=0){
          //echo "<li class=\"level0 nav-2 parent\" id=\"nav\"> <a href=\"listing.php?business\"><span>Animals</span></a>";
          //echo "<ul class=\"level0 mm-2 total-8 rem-1\">";
          echo "<a href=\"listing.php?Business\"><strong>All Businesses ($All_Animals)</strong></a><br />";
        
          $Animal_Count_SQL="SELECT `Animal`, COUNT(*) as Animal_Number FROM `animal` WHERE Verified='Yes' GROUP BY `Animal` ORDER BY Animal ASC";
          $Animal_Count_Results = mysql_query($Animal_Count_SQL, $conn);
          $Animal_Count_Found = mysql_num_rows($Animal_Count_Results);
          if($Animal_Count_Found!=0){
            while ($Animal_Count_Array = mysql_fetch_array($Animal_Count_Results)) {
                $Menu_Animal = $Animal_Count_Array['Animal'];
                $Menu_Animal_Number = $Animal_Count_Array['Animal_Number'];
                echo "<a href=\"listing.php?business=$Menu_Animal\">$Menu_Animal ($Menu_Animal_Number)</a><br />";	
				//<a href="#"><strong>Pets (Cats &amp; Dogs)</strong></a><br />
            }  
          }
      	}
		echo "<br />";
		if($All_Products){
			//echo "<li class=\"level0 nav-2 parent\" id=\"nav\"> <a href=\"listing.php?product\"><span>Products</span></a>";
			//echo "<ul class=\"level0 mm-2 total-8 rem-1\">"; 
			echo "<a href=\"listing.php?product\"><strong>All Products ($All_Products)</strong></a><br />";
        
		  	$Product_Count_SQL="SELECT `Product`, COUNT(*) as Product_Number FROM `product` WHERE Verified='Yes' GROUP BY `Product` ORDER BY Animal ASC";
		  	$Product_Count_Results = mysql_query($Product_Count_SQL, $conn);
		  	$Product_Count_Found = mysql_num_rows($Product_Count_Results);
			if($Product_Count_Found!=0){
			while ($Product_Count_Array = mysql_fetch_array($Product_Count_Results)) {
				$Menu_Product = $Product_Count_Array['Product'];
				$Menu_Product_Number = $Product_Count_Array['Product_Number'];
				echo "<a href=\"listing.php?product=$Menu_Product\">$Menu_Product ($Menu_Product_Number)</a><br />";	
			}  
		  	}
		}
		?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div class="fb-like-box" data-href="http://www.facebook.com/dwfoundationafrica" data-width="230" data-height="335" data-show-faces="true" data-stream="false" data-header="false"></div></td>
        </tr>
      <?php
      	$Popular_SQL = "SELECT Animals_ID, Animal, Breed, Price, Image_1_Thumb, Views FROM animal WHERE Verified='Yes' ORDER BY Views DESC LIMIT 0, 3";
        $Popular_Result = mysql_query($Popular_SQL, $conn) or die(mysql_error());
        $Popular_3=mysql_num_rows($Popular_Result);
        if($Popular_3>0){
			echo "<tr>";
			echo "<td><h3>Popular Animals</h3></td>";
			echo "</tr>";
            while ($newArray = mysql_fetch_array($Popular_Result)) {
                        //$id = $newArray['ID'];
                        $Animals_ID=$newArray['Animals_ID'];
                        $Animal = $newArray['Animal'];
                        $Breed = $newArray['Breed'];
                        $Price = number_format($newArray['Price'], 0);
                        $Image_1_Thumb = $newArray['Image_1_Thumb'];
                        $Views = $newArray['Views'];
                                            
				if ($Animals_ID!=""){
					echo "<tr>";
					echo "<td>";
					echo "<div class=\"bs_box\"> <a href=\"details.php?animal=$Animals_ID\"><img src=\"$Image_1_Thumb\" width=\"93\" height=\"70\" alt=\"Image\" /></a>";
					echo "Category:<a href=\"details.php?animal=$Animals_ID\"><strong>$Animal</strong></a><br />";
					echo "Business : <a href=\"details.php?animal=$Animals_ID\">$Breed</a><br />";
					echo "Views: <a href=\"details.php?animal=$Animals_ID\">$Views</a><br />";
					echo "<div class=\"cleaner\"></div>";
					echo "</div>";
					echo "</td>";
					echo "</tr>";
				}        
            }
        }
        ?>
      </table></td>
  </tr>
  <tr>
    <td><div id="templatemo_footer">
      <div id="templatemo_footer2">
        <div class="col one_fourth">
          <h4>Powered By</h4>
          <p><img src="images/greentagcolor.png" alt="Green Tag Africa" width="92" height="72" class="imgage-with-frame" /></p>
        </div>
        <!--
        <div class="col one_fourth">
          <table width="227" border="0" align="left">
            <tr>
              <td width="221">Facebook</td>
              </tr>
            <tr>
              <td><div class="fb-like" data-href="http://www.facebook.com/animalminute" data-send="true" data-width="220" data-show-faces="true"></div></td>
              </tr>
            </table>
          <h4>&nbsp;</h4>
          </div>
          -->
        <div class="col one_fourth">
          <h4>Quick Contact</h4>
          <?php 
            $Contact_Sql = "SELECT Email, Phone FROM contacts WHERE Contacts_ID=1";
            $result = mysql_query($Contact_Sql, $conn) or die(mysql_error());
            $newArray = mysql_fetch_array($result);
            $Phone = $newArray['Phone'];
            $Email = $newArray['Email'];
            
            ?>
          <div class="toolfree_area">
            <div class="call_free"><span class="callus">Call Us: </span> <span class="callno"><?php echo $Phone; ?></span></div>
            <div class="bookmark">Email Us: <a href="mailto: <?php echo $Email; ?>"><?php echo $Email; ?></a></div>
            <div class="facing"></div>
          </div>
        </div>
        <div class="col one_fourth no_margin_right">
          <h4>Follow Us</h4>
          <div class="footer_social_button"> <a href="http://www.facebook.com/animalminute"><img src="images/facebook.png" title="facebook" alt="Facebook" /></a> <a href="#"><img src="images/flickr.png" title="flickr" alt="flickr" /></a> <a href="#"><img src="images/twitter.png" title="twitter" alt="Twitter" /></a> <a href="#"><img src="images/youtube.png" title="youtube" alt="Youtube" /></a></div>
        </div>
        <div class="cleaner"></div>
      </div>
      <p>&nbsp; </p>
      <p><a href="index.php">Home</a> | <a href="listing.php">Listing</a> | <a href="about.php">About</a> | <a href="terms.php">Terms of Use</a> | <a href="privacy.php">Privacy Policy</a> | <a href="contact.php">Contact</a></p>
      Copyright © 2015 <a href="#">SHE Trade</a></div></td>
  </tr>
</table><!-- END of templatemo_header --><!-- END of templatemo_menu --><!-- END of templatemo_middle -->
    
<div id="templatemo_main">
  <div class="cleaner"></div>
  </div> 
    
    <!-- END of templatemo_main --><!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->

</body>
</html>