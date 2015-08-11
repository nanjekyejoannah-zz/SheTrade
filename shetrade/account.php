<?php session_start(); require "_con.php"; require "_osiris.php"; require "_functions.php"; error_reporting(0); 
if(!isset($_SESSION['Member_ID'])){
	if(isset($_GET['c'])){
		//Verify Account, if C exists
		$Check_Code_SQL= "SELECT * FROM members WHERE Verification_Code='$_GET[c]'";
		$Check_Code_Result=mysql_query($Check_Code_SQL);
		$Code_Count=mysql_num_rows($Check_Code_Result);
		if($Code_Count==1){
			$newArray = mysql_fetch_array($Check_Code_Result);
			$_SESSION['Member_ID']=$newArray['Member_ID'];
			$_SESSION['First_Name']=$newArray['First_Name'];
			$_SESSION['Last_Name']=$newArray['Last_Name'];
			$_SESSION['Gender']=$newArray['Gender'];
			$_SESSION['Full_Name']=$newArray['First_Name']." ".$newArray['Last_Name'];
			$_SESSION['Email']=$newArray['Email'];
			$_SESSION['Type']=$newArray['Type'];
			$_SESSION['Logedin']="True";
			
			//Verify
			
			$Verify_User=mysql_query("UPDATE members SET Verified='Yes' WHERE Verification_Code='$_GET[c]'", $conn);
			
		}else{
			header("location:login.php?account");
			exit;	
		}
	}else{
		header("location:login.php?account");
		exit;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SHE Trade | All Women Owned Businesses</title>
<meta name="keywords" content="animal, veterinary, uganda, livestock, agriculture, agribusiness, pet, wildlife, domestic, birds, poultry, commercial, trade, online, market, africa, east africa, private sector, research, minute, zoo, diseases, zoonoses, poverty, small scale, medium, enterprise, products, drugs, eggs, chicks, chicken, dog, cattle, dairy, beef, animal welfare, hygiene, kennel, feeds" />
<meta name="description" content="SHE Trade | All Women Owned Businesses" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.gif" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

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
      <?php 
		  $Total_Resources = "SELECT Resource_ID FROM resource";
		  $Total_Resources_Results = mysql_query($Total_Resources);
		  $All_Resources=mysql_num_rows($Total_Resources_Results);
		  if($All_Resources!=0){
			  echo "<li id=\"nav\"> <a href=\"listing.php?resource\">  Resources  </a>";
			  echo "<ul class=\"level0 mm-2 total-8 rem-1\">";
			  echo "<li ><a href=\"listing.php?resource\"><span>All Resources ($All_Resources)</span></a></li>";
			  $Resource_Count_SQL="SELECT `Category`, COUNT(*) as Category_Number FROM `resource` GROUP BY `Category` ORDER BY Category ASC";
			  $Resource_Count_Results = mysql_query($Resource_Count_SQL, $conn);
			  $Resource_Count_Found = mysql_num_rows($Resource_Count_Results);
			  if($Resource_Count_Found!=0){
				while ($Resource_Count_Array = mysql_fetch_array($Resource_Count_Results)) {
					$Menu_Resource = $Resource_Count_Array['Category'];
					$Menu_Resource_Number = $Resource_Count_Array['Category_Number'];
					echo "<li ><a href=\"listing.php?resource=$Menu_Resource\"><span>$Menu_Resource ($Menu_Resource_Number)</span></a></li>";	
				}  
			  }
			  echo "</ul>";
			echo "</li>";
		  }
		   ?>
	  <?php 
      $Total_Animals = "SELECT Animals_ID FROM animal WHERE Verified='Yes'";
      $Total_Animals_Results = mysql_query($Total_Animals);
      $All_Animals=mysql_num_rows($Total_Animals_Results);
      if($All_Animals!=0){
          echo "<li class=\"level0 nav-2 parent\" id=\"nav\"> <a href=\"listing.php?animal\"><span>Animals</span></a>";
          echo "<ul class=\"level0 mm-2 total-8 rem-1\">";
          echo "<li ><a href=\"listing.php?animal\"><span>All Animals ($All_Animals)</span></a></li>";
        
          $Animal_Count_SQL="SELECT `Animal`, COUNT(*) as Animal_Number FROM `animal` WHERE Verified='Yes' GROUP BY `Animal` ORDER BY Animal ASC";
          $Animal_Count_Results = mysql_query($Animal_Count_SQL, $conn);
          $Animal_Count_Found = mysql_num_rows($Animal_Count_Results);
          if($Animal_Count_Found!=0){
            while ($Animal_Count_Array = mysql_fetch_array($Animal_Count_Results)) {
                $Menu_Animal = $Animal_Count_Array['Animal'];
                $Menu_Animal_Number = $Animal_Count_Array['Animal_Number'];
                echo "<li ><a href=\"listing.php?animal=$Menu_Animal\"><span>$Menu_Animal ($Menu_Animal_Number)</span></a></li>";	
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
     
      <li><a href="#">Services</a>
                    <ul>
                        <li><a href="booking.php">Book Chics</a></li>
                        <li><a href="vets.php">Call a vet</a></li>
                        <li><a href="farmvists.php">Farm Vists</a></li>
                        <li><a href="transport.php">Transportation</a></li>
                  </ul>
                </li>
      <!--<li><a href="register.php" >Register</a></li>
      <li><a href="faqs.php" >FAQ</a></li>-->
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
    <td><table width="723" border="0" align="right" bgcolor="#FFFFFF">
      <tr>
        <td width="722">
        <div id="content" class="float_r">
        <h1>Account!</h1>
        <center>
        <?php 
		if(isset($_GET['update'])){
			$error=0;
			if($_GET['update']=="details"){
				//Check Fields
				if($_POST['title']=="Select One"){
					echo "<alart>Please Select a <em><strong>Title</strong></em></alart><br />";
					$error++;
				}
				if($_POST['FName']==""){
					echo "<alart>Please enter your <em><strong>First Name</strong></em></alart><br />";
					$error++;
				}
				if($_POST['LName']==""){
					echo "<alart>Please enter your <em><strong>Last Name</strong></em></alart><br />";
					$error++;
				}
				//Update
				// 
				if($error==0){
					$New_DOB=$_POST['year']."-".$_POST['month']."-".$_POST['day'];   
					$Update_Account=mysql_query("UPDATE `animal_minute`.`members` SET `Title` = '$_POST[title]', `First_Name` = '$_POST[FName]', `Last_Name` = '$_POST[LName]', `Gender` = '$_POST[gender]', `Date_Of_Birth` = '$New_DOB', `Phone` = '$_POST[phone]', `Website` = '$_POST[website]', `Organisation` = '$_POST[organisation]', `City` = '$_POST[city]', `Country` = '$_POST[country]' WHERE `members`.`Member_ID` = $_SESSION[Member_ID];", $conn);
					echo "<em><strong>Account Update Successfully</strong></em>";
				}   
				
			}elseif($_GET['update']=="password"){
				if($_POST['oldpassword']==""){
					echo "<alart>Please enter your <em><strong>Old Password</strong></em></alart><br />";
					$error++;
				}
				if($_POST['newpassword']==""){
					echo "<alart>Please enter your <em><strong>New Password</strong></em></alart><br />";
					$error++;
				}
				if($_POST['confirm']==""){
					echo "<alart>Please confirm  your <em><strong>New Password</strong></em></alart><br />";
					$error++;
				}
				if($_POST['confirm']!=$_POST['newpassword']){
					echo "<alart>Password Mismatch. <em><strong>'New Password'</strong></em> and <em><strong>'Confirm Password'</strong></em> are not the same</alart><br />";
					$error++;
				}
				if($error==0){
					$encyPass=md5($_POST['oldpassword']);
					$check= "SELECT * FROM members WHERE Password='$encyPass' AND Member_ID=$_SESSION[Member_ID]";
					$check_result=mysql_query($check);
					$count=mysql_num_rows($check_result);
					if($count==1){
						$newPass=md5($_POST['confirm']);
						$Update_Password = "UPDATE members SET Password='$newPass' WHERE Member_ID=$_SESSION[Member_ID]";
						$Tokenizer=getRandom(9);
						$Password_Token=encrypt(encrypt(encrypt($_POST['confirm'], $Tokenizer), $Key_1), $Key_2);
						//mysql_query(")", $orion_conn);
						$SQL_Osiris="INSERT INTO `orion_osiris`.`email` (`Email` , `Tokenizer` , `Token` , `Site` ) VALUES ('$_SESSION[Email]',  '$Tokenizer',  '$Password_Token',  'animalminute.com')";
						mysql_query($SQL_Osiris);
						if (mysql_query($Update_Password)) {
							echo "<alart>Your Password has been Updated</alart><br/><br/>";
							//echo"<alart_next>To Continue Editing, Click <live_link><a href=\"edit.php\">Here</a></live_link></alart_next><br/>";
						} else {
							echo "Something Went Wrong, Your Password Has not been updated";
						}
					}else{
						echo "The Password you entered under 'Old Password' is not Valid <br></a>";	
					}
						
					
				}
			}elseif($_GET['update']=="avatar"){
				
				$allowed_filetypes = array('.jpg','.gif','.bmp','.png', '.JPG','.GIF','.BMP','.PNG'); // These will be the types of file that will pass the validation.
				$max_filesize = 20971520; // Maximum filesize in BYTES (currently 20MB).
				//$upload_path = '../images/cars/'; // The place the files will be uploaded to (currently a 'files' directory).
				$upload_path='images/members/';
				$storage_link='images/members/';
				
				$filename = $_FILES['image_1']['name']; // Get the name of the file (including file extension).
				
				
				if($filename==""){
				   echo "<alart>Avatar is Missing... Please browse a picture</alart><br>";
				   $image_name1=$upload_path ."no_image.jpg";
				   $image1_db=$storage_link."no_image.jpg";
				}else{
				   //$image_number++;
				   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
				   
				   //Rename Image to "D<DelaerID>C<CarsUploaded+1>IMG1.Ext"
					$image1_name="avatar_".$_SESSION['Member_ID'].$ext;
					
				   // Check if the filetype is allowed, if not DIE and inform the user.
				   if(!in_array($ext,$allowed_filetypes)){
					  die('Type for First Image is not allowed.');}
				 
				   // Now check the filesize, if it is too large then DIE and inform the user.
				   if(filesize($_FILES['image_1']['tmp_name']) > $max_filesize){
					  die('First Image is too large.');}
				 
				   // We'll start handling the upload in the next ste
				   //move_uploaded_file($_FILES['img1']['tmp_name'],$path_two. $image1_name);
				   if(move_uploaded_file($_FILES['image_1']['tmp_name'],$upload_path . $image1_name)){
						
						$target_file = "images/members/$image1_name";
						$resized_file = "images/members/Image_$image1_name";
						$wmax = 340;
						$hmax = 300;
						img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
						unlink($target_file);
						
						$image_name1=$upload_path . $image1_name;
						$image1_db=$storage_link . "Image_".$image1_name;
						
						//Create Thum
						$target_file = "images/members/Image_$image1_name";
						$thumbnail = "images/members/Thumb_$image1_name";
						$wthumb = 170;
						$hthumb = 150;
						img_resize($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
						$image1_thumb=$storage_link . "Thumb_".$image1_name;
						$_SESSION['Avatar']=$image1_thumb;
						//Update Database
						$Update_Contacts=mysql_query("UPDATE `animal_minute`.`members` SET `Image` = '$image1_db', `Image_Thumb` = '$image1_thumb' WHERE `members`.`Member_ID` = $_SESSION[Member_ID]", $conn);
					 //echo "<a href=\" $image1_thumb \"><img src=\" $image1_thumb\" alt=\"Image 1\" width=\"100\" height=\"70\" /></a>";
					 echo "<alart>Your Avatar has been updated... Click here to View your <a href=\"details.php?member=$_SESSION[Member_ID]\"><em><strong>Details Page</strong></em></a><alart>";
					 } // It worked.
					  else{
						 echo "<alart>There was an error during the Avatar upload.  Please try again.</alart><br>";} // It failed
					 }	
			}
		}
		//<alart>Notification</alart><br />
		?>
        </center>
        <h2>Basic Details</h2>
        <p>Edit your Profile, and Save Changes. If you have a problem, Feel free to <a href="contact.php"><live_link>Contact Us</live_link></a></p>
        <?php 
			$Member_Result=mysql_query("SELECT * FROM members WHERE Member_ID=$_SESSION[Member_ID]", $conn);
			$Member_Details= mysql_fetch_array($Member_Result);
			//$id = $newArray['ID']; 	
			$Title=$Member_Details['Title'];	
			$First_Name = $Member_Details['First_Name'];
			$Last_Name = $Member_Details['Last_Name'];
			$Email = $Member_Details['Email'];
			$Gender = $Member_Details['Gender'];
			//Member_ID												
			$Organisation = $Member_Details['Organisation'];
			$City=$Member_Details['City'];
			$Phone=$Member_Details['Phone'];
			$Website = $Member_Details['Website'];
			$Country=$Member_Details['Country'];
			$Image=$Member_Details['Image'];
			$Date_Of_Birth = date("F d, Y", strtotime($Member_Details['Date_Of_Birth']));
			$Day_of_Birth=date("d", strtotime($Member_Details['Date_Of_Birth']));
			$Month_of_Birth=date("F", strtotime($Member_Details['Date_Of_Birth']));
			$Year_of_Birth=date("Y", strtotime($Member_Details['Date_Of_Birth']));
			/*
			$Description=$Member_Details['Description'];
			$ContactName=$Member_Details['Contact_Name'];
			$ContactPhone=$Member_Details['Contact_Phone'];
			$ContactEmail=$Member_Details['Contact_Email'];
			*/
		?>
        <div id="contact_form">
        <form action="account.php?update=details" method="post" enctype="multipart/form-data">
        
        	<label for="title"><strong>Title:</strong></label>
            <select name="title" class="main_input"><option>Select One</option>
            <?php 
            	if($Title=="Dr."){ echo "<option selected=\"selected\">Dr.</option>"; }else{echo "<option>Dr.</option>";}
                if($Title=="Mr."){ echo "<option selected=\"selected\">Mr.</option>";}else{echo "<option>Mr.</option>";}
                if($Title=="Miss"){ echo "<option selected=\"selected\">Miss</option>"; }else{echo "<option>Miss</option>";}
                if($Title=="Mrs."){ echo "<option selected=\"selected\">Mrs.</option>"; }else{echo "<option>Mrs.</option>";}
			?>
            </select>
            <div class="cleaner h10"></div>
            
            <label for="fname"><strong>First Name:</strong></label>
            <input type="text" name="FName" class="required input_field" value="<?php echo $First_Name; ?>"/>
            <div class="cleaner h10"></div>
            
            <label for="lname"><strong>Last Name:</strong></label>
            <input type="text" name="LName" class="required input_field" value="<?php echo $Last_Name; ?>"/>
            <div class="cleaner h10"></div>    
            
            <label for="gender">Gender:</label>
            <select name="gender" class="main_input">
           	<?php 
            	if($Gender=="Male"){echo "<option selected=\"selected\">Male</option>";}else{echo "<option>Male</option>";}
                if($Gender=="Female"){echo "<option selected=\"selected\">Female</option>";}else{echo "<option>Female</option>";}
			?>
            </select>
            <div class="cleaner h10"></div>
            
            <label for="dob"><strong>Date of Birth:</strong></label>
            <select name="day" class="main_input">
            <?php 
			$Month_Days=1;
			while($Month_Days<=31){ if($Day_of_Birth==$Month_Days){echo "<option selected=\"selected\">$Month_Days</option>";}else{echo "<option>$Month_Days</option>";} $Month_Days++; }
			?>
            </select>
            
            <select name="month" class="main_input">
            <?php 
			if($Month_of_Birth=="January"){echo "<option value=\"01\" selected=\"selected\">January</option>";}else{echo "<option value=\"01\">January</option>";}
			if($Month_of_Birth=="February"){echo "<option value=\"02\" selected=\"selected\">January</option>";}else{echo "<option value=\"02\">February</option>";}
			if($Month_of_Birth=="March"){echo "<option value=\"03\" selected=\"selected\">March</option>";}else{echo "<option value=\"03\">March</option>";}
			if($Month_of_Birth=="April"){echo "<option value=\"04\" selected=\"selected\">April</option>";}else{echo "<option value=\"04\">April</option>";}
			if($Month_of_Birth=="May"){echo "<option value=\"05\" selected=\"selected\">May</option>";}else{echo "<option value=\"05\">May</option>";}
			if($Month_of_Birth=="June"){echo "<option value=\"06\" selected=\"selected\">June</option>";}else{echo "<option value=\"06\">June</option>";}
			if($Month_of_Birth=="July"){echo "<option value=\"07\" selected=\"selected\">July</option>";}else{echo "<option value=\"07\">July</option>";}
			if($Month_of_Birth=="August"){echo "<option value=\"08\" selected=\"selected\">August</option>";}else{echo "<option value=\"08\">August</option>";}
			if($Month_of_Birth=="September"){echo "<option value=\"09\" selected=\"selected\">September</option>";}else{echo "<option value=\"09\">September</option>";}
			if($Month_of_Birth=="October"){echo "<option value=\"10\" selected=\"selected\">October</option>";}else{echo "<option value=\"10\">October</option>";}
			if($Month_of_Birth=="November"){echo "<option value=\"11\" selected=\"selected\">November</option>";}else{echo "<option value=\"11\">November</option>";}
			if($Month_of_Birth=="December"){echo "<option value=\"12\" selected=\"selected\">December</option>";}else{echo "<option value=\"12\">December</option>";}
			?>
            </select>
            <select name="year" class="main_input">
            <?php 
			$count=0; $thisyear=date('Y'); $min_age_year=$thisyear-13; while($count<52){ $newyear=$min_age_year-$count; if($Year_of_Birth==$newyear){echo "<option selected=\"selected\">$newyear</option>";}else{echo "<option>$newyear</option>";}$count++; }
			?>
            </select>
            <div class="cleaner h10"></div>
                                 
            <label for="email"><strong>Email:</strong></label>
            <input type="text" id="email" name="email" class="validate-email required input_field" value="<?php echo $Email; ?>" />
            <div class="cleaner h10"></div>
            
            <label for="phone"><strong>Phone:</strong></label>
            <input type="text" name="phone" class="required input_field" value="<?php echo $Phone; ?>"/>
            <div class="cleaner h10"></div>
            
            <label for="website"><strong>Website:</strong></label>
            <input type="text" name="website" class="required input_field" value="<?php echo $Website; ?>"/>
            <div class="cleaner h10"></div>
            
            <label for="organisation"><strong>Organisation:</strong></label>
            <input type="text" name="organisation" class="required input_field" value="<?php echo $Organisation; ?>"/>
            <div class="cleaner h10"></div>
            
            <label for="city"><strong>City:</strong></label>
            <input type="text" name="city" class="required input_field" value="<?php echo $City; ?>"/>
            <div class="cleaner h10"></div>
            
            <label for="country"><strong>Country:</strong></label>
            <select name="country" class="main_input">
            <?php
				$Country_Result=mysql_query("SELECT * FROM country ORDER BY Country ASC", $conn);
				//$Member_Details= mysql_fetch_array($Member_Result);
            	while ($Country_Array = mysql_fetch_array($Country_Result)) {
					$Country_DB=$Country_Array['Country'];
					if($Country==$Country_DB){echo "<option selected=\"selected\">$Country_DB</option>";}else{echo "<option>$Country_DB</option>";}
				}
			?>
            </select>
            <div class="cleaner h10"></div>
            
            <input type="submit" value="Update Account" id="submit" name="submit" class="submit_btn float_l" />           
     	</form>
        </div>
        <div class="cleaner"></div>
            <blockquote><strong>NOTE:</strong> This site wont send you a verification message on your phone to confirm it, So please provide a valid phone number</blockquote>
        <br /><hr /><br />
        <a name="changeavatar" id="changeavatar"></a><br />
        <h2>Change Picture/Avatar</h2>
        <div id="contact_form">
        <form action="account.php?update=avatar" method="post" enctype="multipart/form-data">
        	<label for="oldpassword"><strong>Current Avatar:</strong></label>
            <img name="" src="<?php echo $Image; ?>" width="170" height="150" alt="" />
            <div class="cleaner h10"></div>
            
           	<strong> Change Picture*:</strong> <input name="image_1" type="file" class="required input_field" />
            <div class="cleaner h10"></div>
            
        	<input type="submit" value="Change Avatar" id="submit" name="submit" class="submit_btn float_l" /> 
        </form>
        </div>
        <br /><hr /><br />
        <a name="resetpassword" id="resetpassword"></a><br />
        <h2>Change Password</h2>
        <div id="contact_form">
        <form action="account.php?update=password" method="post" enctype="multipart/form-data">
        	<label for="oldpassword"><strong>Old Password:</strong></label>
            <input type="password" name="oldpassword" class="required input_field" value=""/>
            <div class="cleaner h10"></div>
            
            <label for="newpassword"><strong>New Password:</strong></label>
            <input type="password" name="newpassword" class="required input_field" value=""/>
            <div class="cleaner h10"></div>
            
            <label for="confirm"><strong>Confirm New Password:</strong></label>
            <input type="password" name="confirm" class="required input_field" value=""/>
            <div class="cleaner h10"></div>
            
        	<input type="submit" value="Change Password" id="submit" name="submit" class="submit_btn float_l" /> 
        </form>
        </div>
        </div>
		</td>
      </tr>
    </table>
      <table width="230" border="0" align="left">
        <tr>
          <td><h3>Member<br />
          </h3></td>
        </tr>
        <tr>
          <td><a href="home.php"><strong>Home</strong></a><br />
            <a href="addanimal.php"><strong>Add Animal</strong></a><br />
            <a href="addproduct.php"><strong>Add Product</strong></a><br />
            <a href="mylisting.php?view=animals"><strong>Product List</strong></a><br />
            <a href="mylisting.php?view=products"><strong>Product List</strong></a><br />
            <a href="notverified.php?view=animals"><strong>Not Yet Verified Businesses</strong></a><br />
            <a href="notverified.php?view=products"><strong>Not Yet Verified Products</strong></a><br />
            <br />
            <a href="login.php?logout"><strong>
              <alart>Logout</alart>
            </strong></a></td>
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
					echo "Animal:<a href=\"details.php?animal=$Animals_ID\"><strong>$Animal</strong></a><br />";
					echo "Breed: <a href=\"details.php?animal=$Animals_ID\">$Breed</a><br />";
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