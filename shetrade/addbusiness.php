<?php session_start(); require "_con.php"; require "_functions.php"; error_reporting(0); 
if(!isset($_SESSION['Member_ID'])){
	header("location:login.php?member");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Business | All about Women owned Businesses  and More</title>
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
              <h1><a href="http://www.mediaminute.net/shetrade">She Trade | All about all Women owned Businesses and More</a></h1>
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
          echo "<li class=\"level0 nav-2 parent\" id=\"nav\"> <a href=\"listing.php?business\"><span>Animals</span></a>";
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
        <td width="722"><div id="content" class="float_r">
        <h1>Add Business</h1>
        Click here to <a href="addproduct.php">Add Business </a>
        <br /><br />
        <!--<h2>Heading two</h2>-->
        <center>
        <?php 
		if(isset($_POST['add'])){
			//Form is Submited
			$errors=0;
			if($_POST['animal']=="Select Animal"){
				echo "<alart>Please specify which <em><strong>Category</strong></em> you are adding</alart><br /><br />";
				$errors++;
			}
			// if($_POST['price']==""){
			// 	echo "<alart>Please specify which <em><strong>Price</strong></em> of the Animal/Bird you are adding</alart><br /><br />";
			// 	$errors++;
			// }
			$Image_1 = $_FILES['image_1']['name'];
			$Image_2 = $_FILES['image_2']['name'];
			$Image_3 = $_FILES['image_3']['name'];
			if($Image_1=="" && $Image_2=="" && $Image_3==""){
				echo "<alart>Please upload altleast <em><strong>One(1) Picture</strong></em> of the Busine  you are adding</alart><br /><br />";
				$errors++;
			}
			if($errors==0){
				//Upload Image, Rename Image and Insert into Database
				$image_number=0;
				// Configuration
				$allowed_filetypes = array('.jpg','.gif','.bmp','.png', '.JPG','.GIF','.BMP','.PNG'); // These will be the types of file that will pass the validation.
				$max_filesize = 20971520; // Maximum filesize in BYTES (currently 20MB).
				//$upload_path = '../images/cars/'; // The place the files will be uploaded to (currently a 'files' directory).
				$upload_path='images/animals/';
				$storage_link='images/animals/';
				//$storage_link='http://images.ugautos.com/';
				$Member_ID= $_SESSION['Member_ID'];
				$Member_Type= $_SESSION['Type'];
				
				$Get_Uploads="SELECT Animals_Added FROM members WHERE Member_ID=$Member_ID";
				$result=mysql_query($Get_Uploads);
				$newArray = mysql_fetch_array($result);
				$Animals_Added=$newArray['Animals_Added'] + 1;
				
				$image_name=$Member_ID."_".$Animals_Added;
				
				echo "<div class=\"scroll\">";
				//image 1
				$filename = $_FILES['image_1']['name']; // Get the name of the file (including file extension).
				
				
				if($filename==""){
				   echo "Image 1 is Missing<br>";
				   $image_name1=$upload_path ."no_image.jpg";
				   $image1_db=$storage_link."no_image.jpg";
				   $image1_thumb=$storage_link . "no_thumb.jpg";
				   }
				else{
				   $image_number++;
				   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
				   
				   //Rename Image to "D<DelaerID>C<CarsUploaded+1>IMG1.Ext"
					$image1_name=$image_name."_1".$ext;
					
				   // Check if the filetype is allowed, if not DIE and inform the user.
				   if(!in_array($ext,$allowed_filetypes)){
					  die('Type for First Image is not allowed.');}
				 
				   // Now check the filesize, if it is too large then DIE and inform the user.
				   if(filesize($_FILES['image_1']['tmp_name']) > $max_filesize){
					  die('First Image is too large.');}
				 
				   // We'll start handling the upload in the next ste
				   //move_uploaded_file($_FILES['img1']['tmp_name'],$path_two. $image1_name);
				   if(move_uploaded_file($_FILES['image_1']['tmp_name'],$upload_path . $image1_name)){
						
						$target_file = "images/animals/$image1_name";
						$resized_file = "images/animals/Image_$image1_name";
						$wmax = 300;
						$hmax = 300;
						img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
						unlink($target_file);
						
						$image_name1=$upload_path . $image1_name;
						$image1_db=$storage_link . "Image_".$image1_name;
						
						//Create Thum
						$target_file = "images/animals/Image_$image1_name";
						$thumbnail = "images/animals/Thumb_$image1_name";
						$wthumb = 150;
						$hthumb = 150;
						img_resize($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
						$image1_thumb=$storage_link . "Thumb_".$image1_name;
						
						 echo "<a href=\" $image1_thumb \"><img src=\" $image1_thumb\" alt=\"Image 1\" width=\"100\" height=\"70\" /></a>";
						 } // It worked.
					  else{
						 echo 'There was an error during the First Image upload.  Please try again.<br>';} // It failed
					 }
					 
				//image 2
				$filename2 = $_FILES['image_2']['name']; // Get the name of the file (including file extension).
				//$image_id2=2;
				if($filename2==""){
				   echo "Image 2 is Missing<br>";
				   $image_name2=$upload_path ."no_image.jpg";
				   $image2_db=$storage_link."no_image.jpg";
				   $image2_thumb=$storage_link . "no_thumb.jpg";
				   }
				else{
				   $image_number++;
				   $ext2 = substr($filename2, strpos($filename2,'.'), strlen($filename2)-1); // Get the extension from the filename.
				   
				   //Rename Image to "D<DelaerID>C<CarsUploaded+1>IMG2.Ext"
					$image2_name=$image_name."_2".$ext2;
				 
				   // Check if the filetype is allowed, if not DIE and inform the user.
				   if(!in_array($ext2,$allowed_filetypes)){
					  die('Type for Second Image is not allowed.');}
				 
				   // Now check the filesize, if it is too large then DIE and inform the user.
				   if(filesize($_FILES['image_2']['tmp_name']) > $max_filesize){
					  die('Second Image is too large.');}
				 
				   // We'll start handling the upload in the next ste
				   if(move_uploaded_file($_FILES['image_2']['tmp_name'],$upload_path . $image2_name)){
					   
					   	$target_file = "images/animals/$image2_name";
						$resized_file = "images/animals/Image_$image2_name";
						$wmax = 640;
						$hmax = 480;
						img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
						unlink($target_file);
						
						$image_name2=$upload_path . $image2_name;
						$image2_db=$storage_link . "Image_".$image2_name;
						
						//Create Thum
						$target_file = "images/animals/Image_$image2_name";
						$thumbnail = "images/animals/Thumb_$image2_name";
						$wthumb = 100;
						$hthumb = 70;
						img_resize($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
						$image2_thumb=$storage_link . "Thumb_".$image2_name;
						
						
						 echo "<a href=\" $image2_thumb \"><img src=\" $image2_thumb\" alt=\"Image 2\" width=\"100\" height=\"70\" /></a>";
						 } // It worked.
					  else{
						 echo 'There was an error during the Second Image upload.  Please try again.<br>';} // It failed
					 }
				
				//image 3
				$filename3 = $_FILES['image_3']['name']; // Get the name of the file (including file extension).
				//$image_id=3;
				if($filename3==""){
				   echo "Image 3 is Missing<br>";
				   $image_name3=$upload_path ."no_image.jpg";
				   $image3_db=$storage_link."no_image.jpg";
				   $image3_thumb=$storage_link . "no_thumb.jpg";
				   }
				else{
				   $image_number++;
				   $ext3 = substr($filename3, strpos($filename3,'.'), strlen($filename3)-1); // Get the extension from the filename.
				   //Rename Image to "D<DelaerID>C<CarsUploaded+1>IMG3.Ext"
					$image3_name=$image_name."_3".$ext3;
				 
				   // Check if the filetype is allowed, if not DIE and inform the user.
				   if(!in_array($ext3,$allowed_filetypes)){
					  die('Type for Third Image is not allowed.');}
				 
				   // Now check the filesize, if it is too large then DIE and inform the user.
				   if(filesize($_FILES['image_3']['tmp_name']) > $max_filesize){
					  die('Third Image is too large.');}
				 
				   // We'll start handling the upload in the next ste
				   if(move_uploaded_file($_FILES['image_3']['tmp_name'],$upload_path . $image3_name)){
					   
					   	$target_file = "images/animals/$image3_name";
						$resized_file = "images/animals/Image_$image3_name";
						$wmax = 640;
						$hmax = 480;
						img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
						unlink($target_file);
						
						$image_name3=$upload_path . $image3_name;
						$image3_db=$storage_link . "Image_".$image3_name;
						
						//Create Thum
						$target_file = "images/animals/Image_$image3_name";
						$thumbnail = "images/animals/Thumb_$image3_name";
						$wthumb = 100;
						$hthumb = 70;
						img_resize($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
						$image3_thumb=$storage_link . "Thumb_".$image3_name;
						
						 echo "<a href=\" $image3_thumb \"><img src=\" $image3_thumb\" alt=\"Image 3\" width=\"100\" height=\"70\" /></a>";
						 } // It worked.
					  else{
						 echo 'There was an error during the Third Image upload.  Please try again.<br>';} // It failed
					 }
				
				echo "</div>";
				//Insert into DB
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
				$AnimalDOB=$_POST['year']."-".$_POST['month']."-".$_POST['day'];   
				$Insert_Sql = "INSERT INTO animal (Animal, Breed, Date_of_Birth, Parentage, Color, Vaccinated, Registered, Trained, Weight, Purpose, Location, Country, Price, Sale_Type, Description, Image_1, Image_1_Thumb, Image_2, Image_2_Thumb, Image_3, Image_3_Thumb, Added_By, Member_Type) VALUES ('$_POST[animal]', '$_POST[breed]', '$AnimalDOB', '$_POST[parentage]', '$AnimalColor', '$_POST[vaccinated]', '$_POST[registered]', '$_POST[trained]', '$AnimalWeight', '$_POST[purpose]', '$_POST[location]', '$_POST[country]', '$AnimalPrice', '$_POST[negotiable]', '$_POST[description]', '$image1_db', '$image1_thumb', '$image2_db', '$image2_thumb', '$image3_db', '$image3_thumb', '$Member_ID', '$Member_Type')";  
				if (mysql_query($Insert_Sql)) {
					//Update User Added Animals
				   	$Added_Animals_Update_Sql = "UPDATE members SET Animals_Added=Animals_Added+1 WHERE Member_ID=$Member_ID";
					if (mysql_query($Added_Animals_Update_Sql)) {
						echo "Animal ".$Animals_Added." Was Successfully Added<br>";
						echo "<br><a href=\"addbusiness.php\" title=\"Add Animal\">Add Another Business</a> or Go to your <a href=\"home.php\" title=\"Member Home\">Home Page</a><br><br>";
					}
				}else {
					echo "<alart>Something Went Wrong, The Animal Has not been Added</alart>";
					}
			//echo "Done... :)";
			}
		}
		//echo "<alart>Notication</alart><br /><br />";
		?>
        </center>
        <p align="justify">Fill in the Form below to add your business, You will get an email notification when your advert goes live.  As soon as it passes our quality check.<br />Please note that <strong>Business</strong> and <strong>Atleast One Picture</strong> are Required<br /><br /></p>
        <p>
        <div id="contact_form">
          <form action="addbusiness.php" method="post" name="addaminal" target="_self" id="addaminal" enctype="multipart/form-data">
            <input name="add" type="hidden" value="yes" />
            <!--
            <label for="author">First Name*:</label>
            <input type="text" id="fname" name="fname" class="required input_field" />
            <div class="cleaner h10"></div>
            
            <label for="author">Last Name*:</label>
            <input type="text" id="lname" name="lname" class="required input_field" />
            <div class="cleaner h10"></div>
            -->           
            <label for="animal"><strong>Business*:</strong></label>
            <select name="animal" class="main_input" onchange="setAnimalBreed(this)"><option>Select Business Category</option><option>Art and Crafts</option><option>Farm produce</option><option>Fashion</option><option>Beauty</option><option>Home and Appliances</option><option>Services</option><option>Other</option></select>
            <div class="cleaner h10"></div>
            
            <label for="breed"><strong>Name:</strong></label>
            <input type="text" name="breed" class="main_input" />
            <!-- <select name="breed" class="main_input"><option>Select Breed</option></select> -->
            <div class="cleaner h10"></div>
            
            <label for="dob"><strong>Date od start:</strong></label>
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
            
            <!-- <label for="parentage"><strong>Parentage:</strong></label>
            <select name="parentage" class="main_input"><option>Not Aware</option><option>Artificial Insemination</option><option>Natural</option></select>
            <div class="cleaner h10"></div>
                        
            <label for="color"><strong>Color(s)</strong>:</label>
            <table width="100" border="0">
              <tr>
                <td>White:</td>
                <td><input name="white" type="checkbox" value="White" /></td>
              </tr>
              <tr>
                <td>Black:</td>
                <td><input name="black" type="checkbox" value="Black" /></td>
              </tr>
              <tr>
                <td>Brown:</td>
                <td><input name="brown" type="checkbox" value="Brown" /></td>
              </tr>
              <tr>
                <td>Grey:</td>
                <td><input name="grey" type="checkbox" value="Grey" /></td>
              </tr>
              <tr>
                <td>Other:</td>
                <td><input name="other" type="checkbox" value="Other" /></td>
              </tr>
            </table>
            <div class="cleaner h10"></div> -->
                
            <!-- <label for="vaccinated"><strong>Vaccinated:</strong></label>
            <select name="vaccinated" class="main_input"><option>Not Aware</option><option>Yes</option><option>No</option></select>
            <div class="cleaner h10"></div> -->
            
            <label for="registered"><strong>Registered:</strong></label>
            <select name="registered" class="main_input"><option>Not Aware</option><option>Yes</option><option>No</option></select>
            <div class="cleaner h10"></div>
            
           <!--  <label for="trained"><strong>Trained:</strong></label>
            <select name="trained" class="main_input"><option>Not Aware</option><option>Yes</option><option>No</option></select>
            <div class="cleaner h10"></div> -->
            
            <!-- <label for="weight"><strong>Weight(Kgs):</strong></label>
            <input type="text" name="weight" class="required input_field" />
            <div class="cleaner h10"></div> -->
            
            <label for="purpose"><strong>Mission Statement :</strong></label>
            <textarea name="purpose" cols="" rows="3"></textarea>
            <div class="cleaner h10"></div>
            
            <label for="location"><strong>Location:</strong></label>
            <input type="text" name="location" class="required input_field" />
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
            
            <!-- <label for="price"><strong>Price($/USD)*:</strong></label>
            <input type="text" name="price" class="required input_field" />
            <div class="cleaner h10"></div> -->
            
            <!-- <label for="negotiable"><strong>Sale Type:</strong></label>
            <select name="negotiable" class="main_input"><option>Fixed Price</option><option>Negotiable</option></select>
            <div class="cleaner h10"></div> -->
            
            <label for="description"><strong>Describe your business :</strong></label>
            <textarea name="description" cols="" rows=""></textarea>
            <div class="cleaner h10"></div>
            
            <label for="price"><strong>Business Images:</strong></label>
           	<strong> Image 1*:</strong> <input name="image_1" type="file" class="required input_field" />
            <strong> Image 2:</strong> <input name="image_2" type="file" class="required input_field" />
            <strong> Image 3:</strong> <input name="image_3" type="file" class="required input_field" />
            <div class="cleaner h10"></div>
            <!--
            <input name="agree" type="checkbox" value="yes" />
            I Agree to the <a href="terms.php">Terms of Use</a> and <a href="privacy.php">Privacy Policy</a> of Animal Minute
            <div class="cleaner h10"></div>
            -->
            <input type="submit" value="Add Business" id="submit" name="submit" class="submit_btn float_l" />
            <!--<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />-->
          </form>
    	</div>
        <br />
        </p>
        <!--
        <h3>Heading Three</h3>
        <p>Pragraph 2</p>
        -->
        <div class="cleaner"></div>
            <blockquote>Before your Business is verified, it will be accessed(only by you) under the <a href="notverified.php?animal">Not Yet Verified Business List</a></blockquote>
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
        <td>
        <a href="home.php"><strong>Home</strong></a><br />
        <a href="addbusiness.php"><strong>Add Business</strong></a><br />
        <a href="addproduct.php"><strong>Add Product</strong></a><br />
        <a href="mylisting.php?view=businesses"><strong>Business List</strong></a><br />
        <a href="mylisting.php?view=products"><strong>Product List</strong></a><br />
        <a href="notverified.php?view=businesses"><strong>Not Yet Verified Businessess</strong></a><br />
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
      <div class="fb-like-box" data-href="http://www.facebook.com/animalminute" data-width="230" data-height="335" data-show-faces="true" data-stream="false" data-header="false"></div>
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