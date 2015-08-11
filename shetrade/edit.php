<?php session_start(); require "_con.php"; error_reporting(0); 
if(!isset($_SESSION['Member_ID'])){
	header("location:login.php?member");
	exit;
}
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
		$Day_of_Birth=date("d", strtotime($Animal_Details['Date_of_Birth']));
		$Month_of_Birth=date("F", strtotime($Animal_Details['Date_of_Birth']));
		$Year_of_Birth=date("Y", strtotime($Animal_Details['Date_of_Birth']));
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
		
		//Get User Details
		$Member_Name_Result=mysql_query("SELECT Title, First_Name, Last_Name FROM members WHERE Member_ID='$Added_By'", $conn);
		$Member_Details = mysql_fetch_array($Member_Name_Result);
		$Title=$Member_Details['Title'];
		$First_Name = $Member_Details['First_Name'];
		$Last_Name = $Member_Details['Last_Name'];
		
	}else{
		header("location:home.php");
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
		
		//Get User Details
		$Member_Name_Result=mysql_query("SELECT Title, First_Name, Last_Name FROM members WHERE Member_ID='$Added_By'", $conn);
		$Member_Details = mysql_fetch_array($Member_Name_Result);
		$Title=$Member_Details['Title'];
		$First_Name = $Member_Details['First_Name'];
		$Last_Name = $Member_Details['Last_Name'];
	}else{
		header("location:home.php");
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
		$Day_of_Birth=date("d", strtotime($Member_Details['Date_Of_Birth']));
		$Month_of_Birth=date("F", strtotime($Member_Details['Date_Of_Birth']));
		$Year_of_Birth=date("Y", strtotime($Member_Details['Date_Of_Birth']));
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
	}else{
		header("location:home.php");
		exit;
	}
	
}else{
	header("location:home.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit | SHE Trade | All Women Owned Businesses</title>
<meta name="keywords" content="animal, veterinary, uganda, livestock, agriculture, agribusiness, pet, wildlife, domestic, birds, poultry, commercial, trade, online, market, africa, east africa, private sector, research, minute, zoo, diseases, zoonoses, poverty, small scale, medium, enterprise, products, drugs, eggs, chicks, chicken, dog, cattle, dairy, beef, animal welfare, hygiene, kennel, feeds" />
<meta name="description" content="SHE Trade | All Women Owned Businesses" />
	<link rel="shortcut icon" type="image/ico" href="images/favicon.gif" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/anilib.js"></script>
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
     
      <li><a href="booking.php">Make an Order</a>
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
    <td>
    
        <?php
		if(isset($_GET['animal'])){
		
		?>
		<table width="723" border="0" align="right" bgcolor="#FFFFFF">
		  <tr>
			<td width="722"><div id="content" class="float_r">
			  <h1>Edit <?php echo $Animal ?> - <?php echo $Breed ?>?</h1>
				<div id="contact_form">
                  <form action="edit.php?animal=<?php echo $_GET['animal'];?>" method="post" name="editaminal" target="_self" id="addaminal" enctype="multipart/form-data">
                    <label for="animal"><strong>Animal*:</strong></label>
                    <select name="animal" class="main_input" onchange="setAnimalBreed(this)" onfocus="setAnimalBreed(this)" onblur="setAnimalBreed(this)">
                    <?php
					if($Animal=="Cat"){echo "<option selected=\"selected\">Cat</option>";}else{echo "<option>Cat</option>";}
					if($Animal=="Cattle"){echo "<option selected=\"selected\">Cattle</option>";}else{echo "<option>Cattle</option>";}
					if($Animal=="Dog"){echo "<option selected=\"selected\">Dog</option>";}else{echo "<option>Dog</option>";}
					if($Animal=="Goat"){echo "<option selected=\"selected\">Goat</option>";}else{echo "<option>Goat</option>";}
					if($Animal=="Horse"){echo "<option selected=\"selected\">Horse</option>";}else{echo "<option>Horse</option>";}
					if($Animal=="Pig"){echo "<option selected=\"selected\">Pig</option>";}else{echo "<option>Pig</option>";}
					if($Animal=="Poultry"){echo "<option selected=\"selected\">Poultry</option>";}else{echo "<option>Poultry</option>";}
					if($Animal=="Sheep"){echo "<option selected=\"selected\">Sheep</option>";}else{echo "<option>Sheep</option>";}
					if($Animal=="Other"){echo "<option selected=\"selected\">Other</option>";}else{echo "<option>Other</option>";}
					?>
                    </select>
                    <div class="cleaner h10"></div>
                    
                    <label for="breed"><strong>Breed:</strong></label>
                    <select name="breed" class="main_input"><option>Not Applicable</option></select>
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
                    $count=0; $thisyear=date('Y'); $min_age_year=$thisyear; while($count<52){ $newyear=$min_age_year-$count; if($Year_of_Birth==$newyear){echo "<option selected=\"selected\">$newyear</option>";}else{echo "<option>$newyear</option>";}$count++; }
                    ?>
                    </select>
                    <div class="cleaner h10"></div>

                    <label for="parentage"><strong>Parentage:</strong></label>
                    <select name="parentage" class="main_input">
                    <?php
					/*
					$Color = $Animal_Details['Color'];
					*/
                    if($Parentage=="Not Aware"){echo "<option selected=\"selected\">Not Aware</option>";}else{echo "<option>Not Aware</option>";}
					if($Parentage=="Artificial Insemination"){echo "<option selected=\"selected\">Artificial Insemination</option>";}else{echo "<option>Artificial Insemination</option>";}
					if($Parentage=="Natural"){echo "<option selected=\"selected\">Natural</option>";}else{echo "<option>Natural</option>";}
					?>
                    </select>
                    <div class="cleaner h10"></div>
                                
                    <label for="color"><strong>Color(s)</strong>:</label>
                    <table width="100" border="0">
                    <!--$Color-->
                      <tr>
                        <td>White:</td>
                        <td><input name="white" type="checkbox" value="White" <?php if (strstr($Color, "White")) { echo "checked=\"checked\"";}?> /></td>
                      </tr>
                      <tr>
                        <td>Black:</td>
                        <td><input name="black" type="checkbox" value="Black" <?php if (strstr($Color, "Black")) { echo "checked=\"checked\"";}?> /></td>
                      </tr>
                      <tr>
                        <td>Brown:</td>
                        <td><input name="brown" type="checkbox" value="Brown" <?php if (strstr($Color, "Brown")) { echo "checked=\"checked\"";}?> /></td>
                      </tr>
                      <tr>
                        <td>Grey:</td>
                        <td><input name="grey" type="checkbox" value="Grey" <?php if (strstr($Color, "Grey")) { echo "checked=\"checked\"";}?> /></td>
                      </tr>
                      <tr>
                        <td>Other:</td>
                        <td><input name="other" type="checkbox" value="Other" /></td>
                      </tr>
                    </table>
                    <div class="cleaner h10"></div>
                        
                    <label for="vaccinated"><strong>Vaccinated:</strong></label>
                    <select name="vaccinated" class="main_input">
                    <?php
                    if($Vaccinated=="Not Aware"){echo "<option selected=\"selected\">Not Aware</option>";}else{echo "<option>Not Aware</option>";}
					if($Vaccinated=="Yes"){echo "<option selected=\"selected\">Yes</option>";}else{echo "<option>Yes</option>";}
					if($Vaccinated=="No"){echo "<option selected=\"selected\">No</option>";}else{echo "<option>No</option>";}
					?>
                    </select>
                    <div class="cleaner h10"></div>
                    
                    <label for="registered"><strong>Registered:</strong></label>
                    <select name="registered" class="main_input">
                    <?php
                    if($Registered=="Not Aware"){echo "<option selected=\"selected\">Not Aware</option>";}else{echo "<option>Not Aware</option>";}
					if($Registered=="Yes"){echo "<option selected=\"selected\">Yes</option>";}else{echo "<option>Yes</option>";}
					if($Registered=="No"){echo "<option selected=\"selected\">No</option>";}else{echo "<option>No</option>";}
					?>
                    </select>
                    <div class="cleaner h10"></div>
                    
                    <label for="trained"><strong>Trained:</strong></label>
                    <select name="trained" class="main_input">
                    <?php
                    if($Trained=="Not Aware"){echo "<option selected=\"selected\">Not Aware</option>";}else{echo "<option>Not Aware</option>";}
					if($Trained=="Yes"){echo "<option selected=\"selected\">Yes</option>";}else{echo "<option>Yes</option>";}
					if($Trained=="No"){echo "<option selected=\"selected\">No</option>";}else{echo "<option>No</option>";}
					?>
                    </select>
                    <div class="cleaner h10"></div>
                    
                    <label for="weight"><strong>Weight(Kgs):</strong></label>
                    <input type="text" name="weight" class="required input_field" value="<?php echo $Weight;?>" />
                    <div class="cleaner h10"></div>
                    
                    <label for="purpose"><strong>Purpose:</strong></label>
                    <textarea name="purpose" cols="" rows="3"><?php echo $Purpose;?></textarea>
                    <div class="cleaner h10"></div>
                    
                    <label for="location"><strong>Location:</strong></label>
                    <input type="text" name="location" class="required input_field" value="<?php echo $Location;?>" />
                    <div class="cleaner h10"></div>
                    
                    <label for="country"><strong>Country:</strong></label>
                    <select name="country" class="main_input">
                    <?php
                        $Country_Result=mysql_query("SELECT * FROM country ORDER BY Country ASC", $conn);
                        //$Member_Details= mysql_fetch_array($Member_Result);
                        while ($Country_Array = mysql_fetch_array($Country_Result)) {
                            $Country_DB=$Country_Array['Country'];
                            if("Uganda"==$Country_DB){echo "<option selected=\"selected\">$Country_DB</option>";}else{echo "<option>$Country_DB</option>";}
                        }
                    ?>
                    </select>
                    <div class="cleaner h10"></div>
                    
                    <label for="price"><strong>Price($/USD)*:</strong></label>
                    <input type="text" name="price" class="required input_field" value="<?php echo $Price;?>" />
                    <div class="cleaner h10"></div>
                    
                    <label for="negotiable"><strong>Sale Type:</strong></label>
                    <select name="negotiable" class="main_input">
                    <?php
					if($Sale_Type=="Fixed Price"){echo "<option selected=\"selected\">Fixed Price</option>";}else{echo "<option>Fixed Price</option>";}
					if($Sale_Type=="Negotiable"){echo "<option selected=\"selected\">Negotiable</option>";}else{echo "<option>Negotiable</option>";}
					?>
                    </select>
                    <div class="cleaner h10"></div>
                    
                    <label for="description"><strong>Description:</strong></label>
                    <textarea name="description" cols="" rows=""><?php echo $Description; ?></textarea>
                    <div class="cleaner h10"></div>
                    <!--
                    <input name="agree" type="checkbox" value="yes" />
                    I Agree to the <a href="terms.php">Terms of Use</a> and <a href="privacy.php">Privacy Policy</a> of Animal Minute
                    <div class="cleaner h10"></div>
                    -->
                    <?php
					//Check if Can Delete
					if($_SESSION['Type']=="Admin"){
						$Can_Edit="Yes";
					}elseif($_SESSION['Type']=="Orion"){
						$Can_Edit="Yes";
					}else{
						//SELECT *  FROM `animal` WHERE `Animals_ID` = 1 AND `Added_By` = 1
						$sql="SELECT Animals_ID FROM `animal` WHERE `Animals_ID` = $_GET[animal] AND `Added_By` = $_SESSION[Member_ID]";
						$result=mysql_query($sql);
						// Mysql_num_row is counting table row
						$count=mysql_num_rows($result);
						// If result matched $myusername and $mypassword, table row must be 1 row
						if($count==1){
							$Can_Edit="Yes";
						}else{
							$Can_Edit="No";
						}
					}
					if(!isset($_POST['updateanimal'])){
						if($Can_Edit=="Yes"){
							//echo "<h3>Are you sure you want to Delete?</h3>";
							?>
                            <input name="updateanimal" type="hidden" value="yes" />
							<input type="submit" value="Update Animal" id="submit" name="submit" class="submit_btn float_l" />
                    		<!--<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />-->
							<?php
						}else{
							echo "<h3>You Cant Edit This Animal!!</h3>Only Adminstrator(s) and the One who Added this animal($Title $First_Name $Last_Name) can edit it";
						}
					}else{
						//Delete Script + Notification
						$AnimalPrice=str_replace(",", "", $_POST['price']);
						$AnimalWeight=str_replace(",", "", $_POST['weight']);
						$AnimalColor="";
						if($_POST['white']=="White"){
							$AnimalColor=$AnimalColor."White, ";
						}
						if($_POST['black']=="Black"){
							$AnimalColor=$AnimalColor."Black, ";
						}
						if($_POST['brown']=="Brown"){
							$AnimalColor=$AnimalColor."Brown, ";
						}
						if($_POST['grey']=="Grey"){
							$AnimalColor=$AnimalColor."Grey, ";
						}
						if($_POST['other']=="Other"){
							$AnimalColor=$AnimalColor."Other.";
						}
						$AnimalDOB=$_POST['year']."-".$_POST['month']."-".$_POST['day']; // ', '', '$AnimalDOB', '', '$AnimalColor',                                                                                             '', '$_POST[registered]', '$_POST[trained]', '$AnimalWeight',                                                                                      '$_POST[purpose]', '$_POST[location]', '$_POST[country]', '$AnimalPrice', '$_POST[negotiable]', '$_POST[description]',
						$Update_Animal=mysql_query("UPDATE `animal_minute`.`animal` SET `Animal` = '$_POST[animal]', `Breed` = '$_POST[breed]', `Date_of_Birth` = '$AnimalDOB', `Parentage` = '$_POST[parentage]', `Color` = '$AnimalColor', `Vaccinated` = '$_POST[vaccinated]', `Registered` = '$_POST[registered]', `Trained` = '$_POST[trained]', `Weight` = '$AnimalWeight', `Purpose` = '$_POST[purpose]', `Location` = '$_POST[location]', `Country` = '$_POST[country]', `Price` = '$AnimalPrice', `Sale_Type` = '$_POST[negotiable]', `Description` = '$_POST[description]' WHERE `animal`.`Animals_ID` = $_GET[animal]", $conn);
						echo "<h3>Animal Updated Succesfully!!</h3>Click <a href=\"edit.php?animal=$_GET[animal]\">Here</a> to make more changes";
	
					}
					//echo "$Can_Delete";
					?>
                    
                  </form>
                </div>
			  <div class="cleaner h30"></div>
			  	
			</div></td>
		  </tr>
		</table>
		<?php
		}elseif(isset($_GET['product'])){
		  ?>
		  <table width="723" border="0" align="right" bgcolor="#FFFFFF">
		  <tr>
			<td width="722"><div id="content" class="float_r">
			  <h1>Edit <?php echo $Product; ?>?</h1>
			  <div id="contact_form">
              <form action="edit.php?product=<?php echo $_GET['product'];?>" method="post" name="editproduct" target="_self" id="editproduct" enctype="multipart/form-data">
                <input name="add" type="hidden" value="yes" />
    
                <label for="animal"><strong>Animal:</strong></label>
                <select name="animal" class="main_input" >
                <?php
				//<option></option>
				if($Animal=="Cat"){echo "<option selected=\"selected\">Cat</option>";}else{echo "<option>Cat</option>";}
				if($Animal=="Cattle"){echo "<option selected=\"selected\">Cattle</option>";}else{echo "<option>Cattle</option>";}
				if($Animal=="Dog"){echo "<option selected=\"selected\">Dog</option>";}else{echo "<option>Dog</option>";}
				if($Animal=="Goat"){echo "<option selected=\"selected\">Goat</option>";}else{echo "<option>Goat</option>";}
				if($Animal=="Horse"){echo "<option selected=\"selected\">Horse</option>";}else{echo "<option>Horse</option>";}
				if($Animal=="Pig"){echo "<option selected=\"selected\">Pig</option>";}else{echo "<option>Pig</option>";}
				if($Animal=="Poultry"){echo "<option selected=\"selected\">Poultry</option>";}else{echo "<option>Poultry</option>";}
				if($Animal=="Sheep"){echo "<option selected=\"selected\">Sheep</option>";}else{echo "<option>Sheep</option>";}
				if($Animal=="Other"){echo "<option selected=\"selected\">Other</option>";}else{echo "<option>Other</option>";}
				?>
                </select>
                <div class="cleaner h10"></div>
                            
                <label for="product"><strong>Product Name:</strong></label>
                <input type="text" name="product" class="required input_field" value="<?php echo $Product;?>" />
                <div class="cleaner h10"></div>
                
                <label for="price"><strong>Price($/USD)*:</strong></label>
                <input type="text" name="price" class="required input_field" value="<?php echo $Price;?>" />
                <div class="cleaner h10"></div>

                <label for="negotiable"><strong>Sale Type:</strong></label>
                <select name="negotiable" class="main_input">
                <?php
				if($Sale_Type=="Fixed Price"){echo "<option selected=\"selected\">Fixed Price</option>";}else{echo "<option>Fixed Price</option>";}
				if($Sale_Type=="Negotiable"){echo "<option selected=\"selected\">Negotiable</option>";}else{echo "<option>Negotiable</option>";}
				?>
                </select>
                <div class="cleaner h10"></div>
                
                <label for="quantity"><strong>Quantity:</strong></label>
                <input type="text" name="quantity" class="required input_field" value="<?php echo $Quantity;?>" />
                <div class="cleaner h10"></div>
                                       
                <label for="description"><strong>Description:</strong></label>
                <textarea name="description" cols="" rows=""><?php echo $Description;?></textarea>
                <div class="cleaner h10"></div>
                
                
              
			  
			  <div class="cleaner h30"></div>
			  <?php 
			  	//Check if Can Delete
			  	if($_SESSION['Type']=="Admin"){
					$Can_Edit="Yes";
				}elseif($_SESSION['Type']=="Orion"){
					$Can_Edit="Yes";
				}else{
					//SELECT *  FROM `animal` WHERE `Animals_ID` = 1 AND `Added_By` = 1
					$sql="SELECT Product_ID FROM `product` WHERE `Product_ID` = $_GET[product] AND `Added_By` = $_SESSION[Member_ID]";
					$result=mysql_query($sql);
					// Mysql_num_row is counting table row
					$count=mysql_num_rows($result);
					// If result matched $myusername and $mypassword, table row must be 1 row
					if($count==1){
						$Can_Edit="Yes";
					}else{
						$Can_Edit="No";
					}
				}
				if(!isset($_POST['updateproduct'])){
					if($Can_Edit=="Yes"){
						//echo "<h3>Are you sure you want to Delete?</h3>";
						?>
                        <input name="updateproduct" type="hidden" value="yes" />
                        <input type="submit" value="Update Product" id="submit" name="submit" class="submit_btn float_l" />
                		<!--<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />-->
						<?php
					}else{
						echo "<h3>You Cant Edit This Product!!</h3>Only Adminstrator(s) and the One who Added this Product($Title $First_Name $Last_Name) can Edit it";
					}
				}else{
					$Update_Product=mysql_query("UPDATE `animal_minute`.`product` SET `Animal` = '$_POST[animal]', `Product` = '$_POST[product]', `Price` = '$_POST[price]', `Sale_Type` = '$_POST[negotiable]', `Quantity` = '$_POST[quantity]', `Description` = '$_POST[description]' WHERE `product`.`Product_ID` = $_GET[product]", $conn);
					echo "<h3>Product was Succesfully Updated!!</h3>Click <a href=\"edit.php?product=$_GET[product]\">Here</a> to make more changes";

				}
			  	//echo "$Can_Delete";
			  ?>	
              </form>
            </div>
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
			  <h1>Delete <?php echo $Title." ".$First_Name." ".$Last_Name;	?>?</h1>
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
			  	//Check if Can Delete
			  	if($_SESSION['Type']=="Admin"){
					$Can_Delete="Yes";
				}elseif($_SESSION['Type']=="Orion"){
					$Can_Delete="Yes";
				}else{
					$Can_Delete="No";
				}
				if(!isset($_POST['detelemember'])){
					if($Can_Delete=="Yes"){
						echo "<h3>Are you sure you want to Delete?</h3>";
						?>
                        <div id="contact_form">
						<form action="delete.php?member=<?php echo $_GET['member'];?>" method="post" enctype="multipart/form-data">
						<input name="detelemember" type="hidden" value="yes" />
                        <table width="70%" border="0">
                          <tr>
                            <td><input type="submit" value="Yes" id="submit" name="submit" class="submit_btn float_l" /></td>
                            <td><input name="" type="reset" value="No" class="submit_btn float_l"/></td>
                          </tr>
                        </table>
						</form>
                        </div>
						<?php
					}else{
						echo "<h3>You Cant Delete a Member!!</h3>Only Adminstrator(s) can delete members from the site";
					}
				}else{
					//Delete Script + Notification
					//;
					//If result matched $myusername and $mypassword, table row must be 1 row
					if($Type=="Orion"){
						echo "<h3>General Delete Error!!</h3>You cant delete this User";
					}elseif($Type=="Admin"){
						echo "<h3>Delete Failed!!</h3>You Cant Delete and Administrator of the Site";
					}else{
						$Delete_Member=mysql_query("DELETE FROM `animal_minute`.`members` WHERE `members`.`Member_ID` = $_GET[member]", $conn);
						echo "<h3>Member was Succesfully Deleted!!</h3>Please note that this action cannot be reverted";
					}
					

				}
			  	//echo "$Can_Delete";
			  ?>						
			</div></td>
		  </tr>
		</table>
		<?php
		}
		?>

    
      <table width="230" border="0" align="left">
      <tr>
        <td><h3>Member<br />
        </h3></td>
      </tr>
      <tr>
        <td>
        <a href="home.php"><strong>Home</strong></a><br />
        <a href="addanimal.php"><strong>Add Animal</strong></a><br />
        <a href="addproduct.php"><strong>Add Product</strong></a><br />
        <a href="mylisting.php?view=animals"><strong>Animal List</strong></a><br />
        <a href="mylisting.php?view=products"><strong>Product List</strong></a><br />
        <a href="notverified.php?view=animals"><strong>Not Yet Verified Animals</strong></a><br />
        <a href="notverified.php?view=products"><strong>Not Yet Verified Products</strong></a><br />
        <br />
        <a href="login.php?logout"><strong><alart>Logout</alart></strong></a>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
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
      <tr>
      <td>
      <div class="fb-like-box" data-href="http://www.facebook.com/dwfoundationafrica" data-width="230" data-height="335" data-show-faces="true" data-stream="false" data-header="false"></div>
      </td>
      </tr>	
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