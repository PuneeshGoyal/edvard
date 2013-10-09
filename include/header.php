<?php
	$sql_vid = "select * from content where status='1' AND id='5'";
	$exec_vid = mysql_query($sql_vid);
	$fetch_vid = mysql_fetch_assoc($exec_vid);
	
	$sql_video = "select * from content where status='1' AND id='26'";
	$exec_video = mysql_query($sql_video);
	$fetch_video = mysql_fetch_assoc($exec_video);
	
	// for banner product
	$sql_bp = "select * from banner_product where status='1' AND id='2'";
	$exec_bp = mysql_query($sql_bp);
	$fetch_bp = mysql_fetch_assoc($exec_bp);
	
	
?>
    <div class="header">
      <div class="inner_header">
        <div class="sub_container">
          <div class="upar_header">
            <div class="left_header"> <a href="index.php"><img src="<?php echo 'pics/'.$fetch_head['image'];?>" height="128" width="285" alt="logo" /> </a> </div>
            <div class="right_header">
              <div class="ryt_header"><?php echo $fetch_head['title']; ?> .</div>
            </div>
            <div class="clear"></div>
            <div class="cart"><div class="quan"><?php echo $cart_num; ?></div><div class="cart_img"><img src="images/cart.png" alt="cart" /></div></div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="sub_container">
        <div class="below_header">
          <ul class="nav">
            <li><a href="index.php">Home </a> </li>
            <li><img src="images/nav_icon.png" height="10" width="25" alt="nav" /> </li>
            <li><a href="testimonials.php">Testimonials </a> </li>
            <li><img src="images/nav_icon.png" height="10" width="25" alt="nav" /> </li>
            <li><a href="ingredients_nutricap.php"> Ingredients</a> </li>
            <li><img src="images/nav_icon.png" height="10" width="25" alt="nav" /> </li>
            <li><a href="faq_nutricap.php">FAQ </a> </li>
            <li><img src="images/nav_icon.png" height="10" width="25" alt="nav" /> </li>
            <li><a href="my_cart.php"> My Cart(<?php echo $cart_num; ?>) </a> </li>
            <!--<li><a href="order_now_nutricap.php">Order Now </a> </li>-->
          </ul>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <div class="sub_container">
      <div class="banner">
        <div class="banner_left"><iframe width="577" height="345" src="http://www.youtube.com/embed/<?php echo $fetch_video['title']; ?>" frameborder="0" allowfullscreen></iframe> <!--<img src="<?php if($fetch_head['image'] != ''){ echo 'pics/'.$fetch_head['image'];} else{ ?>images/MAN.jpg<?php } ?>" height="345" width="574" alt="pic" />--> </div>
        <div class="banner_ryt">
          <!--<div class="textbn"><?php /*?><?php echo strlen(nl2br($fetch_head['description'])) > 500 ? substr(nl2br($fetch_head['description']), 0,500)."..." :  nl2br($fetch_head['description']); ?><<?php */?>/div>
          <div > <a href="read_more.php" class="read">Read More </a></div>-->
          <a href="product_detail.php?id=<?php echo $fetch_bp['product']; ?>"><img src="images/order_now_ryt.jpg" height="345" /></a>
          <div class="clear"></div>
        </div>
      </div>
      <div class="banner_shadow"> </div>
      <div class="clear"></div>
    </div>
