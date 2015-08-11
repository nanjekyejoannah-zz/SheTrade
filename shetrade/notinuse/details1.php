<?php session_start(); require "_con.php"; error_reporting(0); 
if(isset($_GET['animal'])){
	//Check if Animal Exist, And Show
}elseif(isset($_GET['product'])){
	//Check if Product Exist, And Show
}elseif(isset($_GET['member'])){
	//Check if Product Exist, And Show
}else{
	header("location:index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Animal Minute | All about Animals and More</title>
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
      <li id="nav"> <a href="#category-one">  Resources  </a>
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
      </li>
      <li class="level0 nav-2 parent" id="nav"> <a href="#category-two"><span>Categories</span></a>
        <ul class="level0 mm-2 total-8 rem-1">
          <li> <a href="#category-two/a"><span>Pets (cats & Dogs)</span></a></li>
          <li > <a href="#category-two/b"><span>Cattle </span></a></li>
          <li > <a href="#category-two/c"><span>Poultry / Birds</span></a></li>
          <li > <a href="#category-two/d"><span>Goats</span></a></li>
          <li > <a href="#category-two/e"><span>Sheep</span></a></li>
          <li > <a href="#category-two/f"><span>Fish </span></a></li>
          <li > <a href="#category-two/f"><span>Apiary</span></a></li>
          <li > <a href="#category-two/f"><span>Pigs</span></a></li>
          
        </ul>
      </li>
     
      <li><a href="products.php">Services</a>
                    <ul>
                        <li><a href="booking.php">Book Chics</a></li>
                        <li><a href="vets.php">Call a vet</a></li>
                        <li><a href="farmvists.php">Farm Vists</a></li>
                        <li><a href="transport.php">Transportation</a></li>
                  </ul>
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
    <table width="723" border="0" align="right" bgcolor="#FFFFFF">
      <tr>
        <td width="722"><div id="content" class="float_r">
          <h1>Animal - Breed</h1>
          <div class="content_half float_l"> 
            <p align="center"><a  rel="lightbox[portfolio]" href="images/product/10_l.jpg"><img src="images/product/10.jpg" alt="Image 01" width="340" /></a> </p>
            <table width="340" border="0">
              <tr>
                <td align="center"><img name="" src="" width="93" height="70" alt="" /></td>
                <td align="center"><img name="" src="" width="93" height="70" alt="" /></td>
                <td align="center"><img name="" src="" width="93" height="70" alt="" /></td>
              </tr>
            </table>
            <p>&nbsp;</p>
          </div>
          <div class="content_half float_r">
            <table border="0" width="100%">
              <tr>
                <td height="30" width="30%"><strong>Price:</strong></td>
                <td>$100 (Sale Type)</td>
              </tr>
              <tr>
                <td height="30"><strong>Color(s):</strong></td>
                <td>Color, Color</td>
              </tr>
              <tr>
                <td height="30"><strong>Parentage:</strong></td>
                <td>Product 14</td>
              </tr>
              <tr>
                <td height="30"><strong>Vaccinated:</strong></td>
                <td>Apple</td>
              </tr>
              <tr>
                <td height="30"><strong>Registered:</strong></td>
                <td>##</td>
              </tr>
              <tr>
                <td height="30"><strong>Trained:</strong></td>
                <td>##</td>
              </tr>
              <tr>
                <td height="30"><strong>Weight:</strong></td>
                <td>##</td>
              </tr>
              <tr>
                <td height="30"><strong>Location:</strong></td>
                <td>##</td>
              </tr>
              <tr>
                <td height="30"><strong>Posted By</strong></td>
                <td><a href="#">Name(Phone/Email)</a></td>
              </tr>
            </table>
            <div class="cleaner h20"></div>
            </div>
          <div class="cleaner h30"></div>
          <h5><strong>Product Description</strong></h5>
          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec varius sapien fringilla velit sodales consectetur. Nam nibh lacus, tempor at ornare eu, condimentum a ligula. Mauris pellentesque tincidunt ipsum vitae eleifend. Sed condimentum nisl sed orci ullamcorper fermentum. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>
          <h5><strong>Purpose</strong></h5>
          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec varius sapien fringilla velit sodales consectetur. Nam nibh lacus, tempor at ornare eu, condimentum a ligula. Mauris pellentesque tincidunt ipsum vitae eleifend. Sed condimentum nisl sed orci ullamcorper fermentum. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>
          <div class="cleaner h50"></div>
          Facebook Like + Comments
         <!--
          <h4>Related Products</h4>
          <div class="product_box"> <a href="productdetail.html"><img src="images/product/01.jpg" alt="Image 01" /></a>
            <h3>Ut eu feugiat</h3>
            <p class="product_price">$ 100</p>
            <a href="shoppingcart.html" class="add_to_card">Add to Cart</a> <a href="productdetail.html" class="detail">Detail</a> </div>
          <div class="product_box"> <a href="productdetail.html"><img src="images/product/02.jpg" alt="Image 02" /></a>
            <h3>Curabitur et turpis</h3>
            <p class="product_price">$ 200</p>
            <a href="shoppingcart.html" class="add_to_card">Add to Cart</a> <a href="productdetail.html" class="detail">Detail</a> </div>
          <div class="product_box no_margin_right"> <a href="productdetail.html"><img src="images/product/03.jpg" alt="Image 03" /></a>
            <h3>Mauris consectetur</h3>
            <p class="product_price">$ 120</p>
            <a href="shoppingcart.html" class="add_to_card">Add to Cart</a> <a href="productdetail.html" class="detail">Detail</a> </div>
            
         -->
        </div></td>
      </tr>
    </table>
      <table width="230" border="0" align="left">
      <tr>
        <td><h3>Categories<br />
        </h3></td>
      </tr>
      <tr>
        <td><a href="#"><strong>Pets (Cats &amp; Dogs)</strong></a><br />
          <a href="#"><strong>Cattle (Beef &amp; Diary)</strong></a><br />
          <a href="#"><strong>Poultry ( Hens, Ducks, Pigeons &amp; Egss)</strong></a><br />
          <a href="#"><strong>Goats</strong></a><br />
          <a href="#"><strong>Sheep</strong></a><br />
          <a href="#"><strong>Pigs</strong></a><br />
          <a href="#"><strong>Fish</strong></a><br />
          <a href="#"><strong>Apiary (Bees &amp; Honey)</strong></a><br />
          <a href="#"><strong>Zoo Animals</strong></a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><h3>Popular Animals</h3></td>
      </tr>
      <tr>
        <td><div class="bs_box"> <a href="#"><img src="images/templatemo_image_01.jpg" alt="Image 01" /></a>
          <h4><a href="#">Cute little Parrot</a></h4>
          <p class="price">Posted By <a href="#">Peshnc</a></p>
          <div class="cleaner"></div>
        </div></td>
      </tr>
      <tr>
        <td><div class="bs_box"> <a href="#"><img src="images/templatemo_image_01.jpg" alt="Image 01" /></a>
          <h4><a href="#">Cute little Parrot</a></h4>
          <p class="price">Posted By <a href="#">Peshnc</a></p>
          <div class="cleaner"></div>
        </div></td>
      </tr>
      <tr>
        <td><div class="bs_box"> <a href="#"><img src="images/templatemo_image_01.jpg" alt="Image 01" /></a>
          <h4><a href="#">Cute little Parrot</a></h4>
          <p class="price">Posted By <a href="#">Peshnc</a></p>
          <div class="cleaner"></div>
        </div></td>
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
        <div class="col one_fourth">
          <h4>Quick Contact</h4>
          <div class="toolfree_area">
            <div class="call_free"><span class="callus">Call Us</span> <span class="callno">+256702678067</span></div>
            <div class="bookmark">Email Us <a href="mailto: info@animalminute.com">info@animalminute.com</a></div>
            <div class="facing"></div>
            </div>
          </div>
        <div class="col one_fourth no_margin_right">
          <h4>Follow Us</h4>
          <div class="footer_social_button"> <a href="#"><img src="images/facebook.png" title="facebook" alt="Facebook" /></a> <a href="#"><img src="images/flickr.png" title="flickr" alt="flickr" /></a> <a href="#"><img src="images/twitter.png" title="twitter" alt="Twitter" /></a> <a href="#"><img src="images/youtube.png" title="youtube" alt="Youtube" /></a> <a href="#"><img src="images/feed.png" title="rss" alt="RSS" /></a></div>
          </div>
        <div class="cleaner"></div>
        </div>
      <p>&nbsp; </p>
      <p><a href="index.php">Home</a> | <a href="products.php">Products</a> | <a href="about.php">About</a> | <a href="terms.php">Terms of Use</a> | <a href="privacy.php">Privacy Policy</a> | <a href="contact.php">Contact</a> </p>
      Copyright © 2012 <a href="http://animalminute.com">Animal Minute</a> | Designed by <a href="http://www.orion.co.ug" target="_parent">Orion Corp</a> &amp; <a href="http://www.mediaminuteug.com">Media Minute</a></div></td>
  </tr>
</table><!-- END of templatemo_header --><!-- END of templatemo_menu --><!-- END of templatemo_middle -->
    
<div id="templatemo_main">
  <div class="cleaner"></div>
  </div> 
    
    <!-- END of templatemo_main --><!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->

</body>
</html>