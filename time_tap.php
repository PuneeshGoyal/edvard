<?php
include "init.php";
include "config_db.php";
include "config.php"; 

//$_SESSION['user'];
$u_session=$_SESSION['user'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php $site_name; ?></title>
<?php include("include/head.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#Entity_In').click(function(){
		var Entity_In=$('#Entity_In').val();
		$.ajax({
			type: "GET",
			url: "ajaxTimeTap.php?do=entity_In&Entity_In="+Entity_In,
			
			success:function(msg)
				{	
					//alert(msg)
					//document.write(msg);
					response_array_t = msg.split(',');
					$('#entityIn').val(response_array_t[0]);
					$('#entityOut').val(response_array_t[1]);
					
				}	
			});
	})
	$('#Entity_Out').click(function (){
		var Entity_Out=$('#Entity_Out').val();
		$.ajax({
			type: "GET",
			url: "ajaxTimeTap.php?do=entity_Out&Entity_Out="+Entity_Out,
			
			success:function(msg)
				{	
					//alert(msg)
					//document.write(msg);
					
					response_array_t = msg.split(',');
					$('#entityOut').val(response_array_t[0]);
					$('#entityIn').val(response_array_t[1]);
					$('#avarage').val(response_array_t[2]);
					
				}	
			});
		});
		$('#Fault').click(function(){
			var Fault=$('#Fault').val();
			$.ajax({
				type:"GET",
				url:"ajaxTimeTap.php?do=fault&Fault="+Fault,
				
				success:function(msg)
				{	
					//alert(msg)
					response_array_t = msg.split(',');
					$('#entityIn').val(response_array_t[0]);
					$('#entityOut').val(response_array_t[1]);
					$('#fault_show').val(response_array_t[2]);
					
				}	
				});
			});
	});
</script>
</head>

<body>
 <div align="center">
 <div class="sub_container">
 <div class="time_txt">
 	<?php 
	if(isset($_SESSION['user'])){
		$_SESSION['user'];
		$sql="select * from users where uniq='".$_SESSION['user']."'";
		$exec=mysql_query($sql);
		$res=mysql_fetch_assoc($exec);?>
    	<input type="text"  class="user_txt" value="<?php echo $res['first_name']. ' ' .$res['last_name']?>"/>
    <?php }
    else {?>
     <input type="text" placeholder="Username" class="user_txt"/>
	<?php }?>
    <a href="logout.php"><input type="button" class="signout_btn" value="Signout" /></a>
  </div>
  <div class="strip"></div>
  
  <div class="mid_area_1 new_area_1">
  	<div class="customer-inline">
    <form name="EntityIn" id="EntityIn" action="<?php echo $PHP_SELF;?>" method="post">
  		<div class="customer queue">
    		<div class="in_queue">Customer In Queue:</div>
        	<input type="text" class="customer_txtbox" name="entityIn" id="entityIn" value="" readonly="readonly"/>
            <input type="button" class="btn_n margin_btn" id="Entity_In" name="Entity_In" value="Entity In">
    	</div>
    
    <div class="clear"></div>
    	<div class="customer serv_new">
    		<div class="in_queue">Customer Served:</div>
        	<input type="text" class="customer_txtbox mar_l" name="entityOut" id="entityOut" value="" readonly="readonly"/>
        	<input type="button" class="btn_n margin_btn" name="Entity_Out" id="Entity_Out" value="Entity Out"/>
    	</div>
    </div>
   
    <div class="clear"></div>
    <div class="customer serv_new">
    	<div class="in_queue">Avarage Wait Time (sec):</div>
      	<input type="text" class="customer_txtbox" name="avarage" id="avarage" value="" readonly="readonly">
   	</div>
    
    </form>
    <div class="clear"></div>
    </div>
    
    <div class="defect_ryt">
    <input type="button"  class="faulty"  name="Fault" id="Fault" value="Defect"/>
  <div class="clear"></div>
   <input type="text" class="customer_txtbox mar_l" id="fault_show" value="" readonly="readonly"/>
   <div class="clear"></div>
    <div class="in_queue_txt">Defect Count</div>
   </div>
     
  <div class="clear"></div>
  </div>
 </div>
</body>
</html>
