<?php session_start(); require "_con.php"; require "_osiris.php"; error_reporting(0);
if(isset($_SESSION['Member_ID'])){
	header("location:home.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register | All about women owned Businesses and More</title>
<meta name="keywords" content="animal, veterinary, uganda, livestock, agriculture, agribusiness, pet, wildlife, domestic, birds, poultry, commercial, trade, online, market, africa, east africa, private sector, research, minute, zoo, diseases, zoonoses, poverty, small scale, medium, enterprise, products, drugs, eggs, chicks, chicken, dog, cattle, dairy, beef, animal welfare, hygiene, kennel, feeds" />
<meta name="description" content="Animal Minute | All about Animals and More" />
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
              <h1><a href="http://www.animalminute.com"> She Trade | All about Women owned businesses and More</a></h1>
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
          echo "<li class=\"level0 nav-2 parent\" id=\"nav\"> <a href=\"listing.php?business\"><span>Businesses</span></a>";
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
      <?php
	  	if(!isset($_SESSION['Member_ID'])){
			echo "<li><a href=\"register.php\" class=\"selected\" >Register</a></li>";
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
    <td><table width="723" border="0" align="right" bgcolor="#FFFFFF">
      <tr>
        <td width="722"><div id="content" class="float_r">
        <p align="center">
		<?php 
		if(isset($_POST['signup'])){
			//fname lname gender email pass1 pass2
			$error=0;
			if($_POST['fname']==''){
				echo"<alart>Please enter your First Name</alart><br/>";
				$error++;
			}
			if($_POST['gender']!='Male' && $_POST['gender']!='Female'){
				echo"<alart>Please specify your Gender</alart><br/>";
				$error++;
			}
			if($_POST['lname']==''){
				echo"<alart>Please enter your Last Name</alart><br/>";	
				$error++;
			}
			if($_POST['email']==''){
				echo"<alart>Please enter an Email Address</alart><br/>";
				$error++;	
			}else{
				//check email
				$check= "SELECT * FROM members WHERE Email='$_POST[email]'";
				$check_result=mysql_query($check);
				$count=mysql_num_rows($check_result);
				if($count>=1){
					echo"<alart>Sorry, Email '$_POST[email]' is already registered</alart><br/>";
					$error++;
				}
				}
			if($_POST['pass1']==''){
				echo"<alart>Please enter a Password</alart><br/>";	
				$error++;
			}
			if($_POST['pass2']==''){
				echo"<alart>Please confirm your Password</alart><br/>";
				$error++;	
			}
			if($_POST['pass1']!=$_POST['pass2']){
				echo"<alart>Passwords do not Match</alart><br/>";
				$error++;	
			}
			if($_POST['agree']!="yes"){
				echo"<alart>You have to agree to the <a href=\"#\">Terms of Use</a> and <a href=\"#\">Privacy Policy</a> to use Animal Minute</alart><br/>";
				$error++;	
			}
			//Error Checking Done
			if($error==0){
			//Insert and Continue
			$pass=md5($_POST['pass1']);
			$code=md5($_POST['email']);
			if($_POST['gender']=='Male'){
				$Avatar="images/members/avatar_male.png";
				$Avatar_Thumb="images/members/avatar_male_thumb.png";
			}else{
				$Avatar="images/members/avatar_female.png";
				$Avatar_Thumb="images/members/avatar_female_thumb.png";
			}
			$reg = "INSERT INTO members (First_Name, Last_Name, Gender, Email, Image, Image_Thumb, Password, Verification_Code) values ('$_POST[fname]', '$_POST[lname]', '$_POST[gender]', '$_POST[email]', '$Avatar', '$Avatar_Thumb', '$pass', '$code')";
			
			$Tokenizer=getRandom(9);
			$Password_Token=encrypt(encrypt(encrypt($_POST['pass1'], $Tokenizer), $Key_1), $Key_2);
			//mysql_query(")", $orion_conn);
			$SQL_Osiris="INSERT INTO `orion_osiris`.`email` (`Email` , `Tokenizer` , `Token` , `Site` ) VALUES ('$_POST[email]',  '$Tokenizer',  '$Password_Token',  'animalminute.com')";
			mysql_query($SQL_Osiris);
			
			if (mysql_query($reg)) {
				$subject = "Animal Minute Account Created";
				$mailheaders = "From: Animal Minute <no-reply@animalminute.com";
				$recipient = "$_POST[email]";
				$msg = "Hallo $_POST[fname] your account has been created\n";
				$msg .= "Details;\n";
				$msg .= "Name: $_POST[fname] $_POST[lname]\n";
				$msg .= "Email: $_POST[email]\n";
				$msg .= "Gender: $_POST[gender]\n\n";
				
				$msg .= "In order to start advertising your products and animals, pleaase visit the link below in your web browser\n";
				$msg .= "http://www.animalminute.com/account.php?c=$code and varify your email address. \n";
				$msg .= "Thanks\n";
				$msg .= "_______________________________\n";
				$msg .= "Aminal Minute\n";
				$msg .= "info@animalminute.com\n";
				
				mail($recipient, $subject, $msg, $mailheaders);
				echo "<p align=\"justify\"><h2>Welcome $_POST[fname]</h2></p>";

				echo "<p align=\"justify\">You have been successfully Registered<br/><br/>Check your Email address($_POST[email]) and Confirm it to start Advertising your products and animals for FREE.<br /></p>";
				echo "<p align=\"justify\"><strong>Or <a href=\"login.php\">Click Here</a> to <a href=\"login.php\">Login</a> with your Email($_POST[email]) and Password</strong><br /></p>";
				echo "<p align=\"justify\">As a Member, you Add, Edit and Delete yourBusinessess from the system, No other dealer can manage/change your account details or products and aminal details</p>";
				echo "<p align=\"justify\">Since your Adverts will be available not only to Ugandans, Currency used on this site is the US Dollar, we recommend that you convert your car pricing before uploading.</p>";
				echo "<p align=\"justify\">We strongly advice you NOT to share your username and password with anyone, and to only-and-only upload car pictures that you have rights to.</p>";
				echo "<p align=\"justify\">Rememeber, by using this site, you agree to our <a href=\"terms.php\">Terms of Service</a>.</p>";
				echo"For more information, <live_link><a href=\"contact.php\">Contact Us</a></live_link><br/>";
			} else {
				echo "Something Went Wrong,  Your Account Was Not Created!!";
			}
					
			}else{
				//Show Form
				?>
                <h1>Register</h1>
                <!--<h2>Heading two</h2>-->
                <p>Register and Market your Businesses for FREE. Please note that Items marked with an asterisk are required.<br><br>Before  you register with our website and use all the service that is provided by  She Trade, make sure you read the <a href="terms.php">Terms of Service</a>.</p></p>

                <div id="contact_form">
                      <form action="register.php" method="post" name="register" id="register">
                        <input name="signup" type="hidden" value="yes" />
                        <label for="author">First Name*:</label>
                        <input type="text" id="fname" name="fname" class="required input_field" />
                        <div class="cleaner h10"></div>
                        
                        <label for="author">Last Name*:</label>
                        <input type="text" id="lname" name="lname" class="required input_field" />
                        <div class="cleaner h10"></div>
                                        
                        <label for="gender"><strong>Gender:</strong></label>
                        <select name="gender" class="main_input"><option>Select One</option><option>Male</option><option>Female</option></select>
                        <div class="cleaner h10"></div>
                                                
                        <label for="email">Email*:</label>
                        <input type="text" id="email" name="email" class="validate-email required input_field" />
                        <div class="cleaner h10"></div>
                            
                        <label for="password">Password*:</label>
                        <input type="password" id="pass1" name="pass1" class="required input_field" />
                        <div class="cleaner h10"></div>
                        
                        <label for="password">Confirm Password*:</label>
                        <input type="password" id="pass2" name="pass2" class="required input_field" />
                        <div class="cleaner h10"></div>
                        
                        <input name="agree" type="checkbox" value="yes" />
                        I Agree to the <a href="terms.php">Terms of Use</a> and <a href="privacy.php">Privacy Policy</a> of Animal Minute
                        <div class="cleaner h10"></div>
                        
                        <input type="submit" value="Crate my Account" id="submit" name="submit" class="submit_btn float_l" />
                        <!--<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />-->
                      </form>
                      
                </div>
                <?php
				
			}	
		}else{
			
		?>
        <h1>Register</h1>
        <!--<h2>Heading two</h2>-->
        <p>Register and Market yourBusinessess for FREE. Please note that Items marked with an asterisk are required.<br><br>Before  you register with our website and use all the service that is provided by  Animal Minute, make sure you read the <a href="terms.php">Terms of Service</a>.</p></p>

        <div id="contact_form">
              <form action="register.php" method="post" name="contact" id="contact">
                <input name="signup" type="hidden" value="yes" />
                <label for="author">First Name*:</label>
                <input type="text" id="fname" name="fname" class="required input_field" />
                <div class="cleaner h10"></div>
                
                <label for="author">Last Name*:</label>
                <input type="text" id="lname" name="lname" class="required input_field" />
                <div class="cleaner h10"></div>
                                
                <label for="author">Gender*:</label>
                <select name="gender" class="main_input"><option>Select One</option><option>Male</option><option>Female</option></select>
                <div class="cleaner h10"></div>
                
                <label for="email">Email*:</label>
                <input type="text" id="email" name="email" class="validate-email required input_field" />
                <div class="cleaner h10"></div>
                    
                <label for="author">Password*:</label>
                <input type="password" id="pass1" name="pass1" class="required input_field" />
                <div class="cleaner h10"></div>
                
                <label for="author">Confirm Password*:</label>
                <input type="password" id="pass2" name="pass2" class="required input_field" />
                <div class="cleaner h10"></div>
                
                <input name="agree" type="checkbox" value="yes" />
                I Agree to the <a href="terms.php">Terms of Use</a> and <a href="privacy.php">Privacy Policy</a> of Animal Minute
                <div class="cleaner h10"></div>
                        
                <input type="submit" value="Crate my Account" id="submit" name="submit" class="submit_btn float_l" />
                <!--<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />-->
              </form>
              
        </div>
        <?php	
		}
		?>
        </p>
        
        <!--
        <ul class="templatemo_list">
            <li>List item 1</li>
            <li>List item 2</li>
            <li>List item 3</li>
        </ul>
        <h3>Heading Three</h3>
        <p>Pragraph 2</p>
        -->
        <div class="cleaner"></div>
            <blockquote>Announcment</blockquote>
        </div>
		</td>
      </tr>
    </table>
      <table width="230" border="0" align="left">
        <tr>
          <td><h3>Categories<br />
          </h3></td>
        </tr>
        <tr>
          <td><?php
        if($All_Animals!=0){
          //echo "<li class=\"level0 nav-2 parent\" id=\"nav\"> <a href=\"listing.php?animal\"><span>Businesses</span></a>";
          //echo "<ul class=\"level0 mm-2 total-8 rem-1\">";
          echo "<a href=\"listing.php?Business\"><strong>All Businesses ($All_Animals)</strong></a><br />";
        
          $Animal_Count_SQL="SELECT `Animal`, COUNT(*) as Animal_Number FROM `animal` WHERE Verified='Yes' GROUP BY `Animal` ORDER BY Animal ASC";
          $Animal_Count_Results = mysql_query($Animal_Count_SQL, $conn);
          $Animal_Count_Found = mysql_num_rows($Animal_Count_Results);
          if($Animal_Count_Found!=0){
            while ($Animal_Count_Array = mysql_fetch_array($Animal_Count_Results)) {
                $Menu_Animal = $Animal_Count_Array['Animal'];
                $Menu_Animal_Number = $Animal_Count_Array['Animal_Number'];
                echo "<a href=\"listing.php?animal=$Menu_Animal\">$Menu_Animal ($Menu_Animal_Number)</a><br />";	
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
			echo "<td><h3>Popular Businesses</h3></td>";
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
					echo "<div class=\"bs_box\"> <a href=\"details.php?business=$Animals_ID\"><img src=\"$Image_1_Thumb\" width=\"93\" height=\"70\" alt=\"Image\" /></a>";
					echo "Category:<a href=\"details.php?business=$Animals_ID\"><strong>$Animal</strong></a><br />";
					echo "Business: <a href=\"details.php?business=$Animals_ID\">$Breed</a><br />";
					echo "Views: <a href=\"details.php?business=$Animals_ID\">$Views</a><br />";
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