<?php
include "init.php";
include "config_db.php";
include "config.php";

$u_session=$_SESSION['user'];
if($_GET['do']=='entity_In')
{
	$entityIn=$_GET['Entity_In'];
	
	$qry="INSERT INTO time_tap (user_uniq,entity_in) values('".$u_session."','".time()."')";
	$exec_sql=mysql_query($qry);
	
	if($exec_sql){
	$sqlIn="SELECT * FROM time_tap where entity_in!='' AND entity_out='' AND user_uniq='$u_session' AND fault='0' AND archive='0'";
	$exec_sqlIn=mysql_query($sqlIn);
	$count=mysql_num_rows($exec_sqlIn);
	
	$Sql_count=mysql_query("SELECT * FROM time_tap WHERE entity_in!='' AND entity_out!='' AND user_uniq='$u_session' AND fault='0' AND archive='0'");
	$count1=mysql_num_rows($Sql_count);
	
	$message[0]=$count;
	$message[1]=$count1;
	$message_arr = implode(',', $message);
   echo $message_arr;
	
	}
}
if($_GET['do']=='entity_Out')
{
	$entityOut=$_GET['Entity_Out'];
	$sql1="SELECT * FROM time_tap WHERE entity_out='' AND  entity_in!='' AND user_uniq='$u_session' AND fault='0' AND archive='0'";
	$exec_sql1=mysql_query($sql1);
	$res_exec_sql1=mysql_fetch_assoc($exec_sql1);
	$res_exec_sql1['id'];
	$count_entity_out=mysql_num_rows($exec_sql1);
	
		$update="UPDATE time_tap SET entity_out='".time()."' where id='".$res_exec_sql1['id']."'";
		$exec_update=mysql_query($update);
		if($exec_update)
		{
			$Sql_count=mysql_query("SELECT * FROM time_tap WHERE entity_in!='' AND entity_out!='' AND user_uniq='$u_session' AND fault='0' AND archive='0'");
			$count1=mysql_num_rows($Sql_count);
			$i=0;
			while($res=mysql_fetch_array($Sql_count))
			{
				$IN=date('Y-m-d h:i:s',$res['entity_in']);
				$OUT=date('Y-m-d h:i:s',$res['entity_out']);
				//$entity[]=array('entity_in'=>$res['entity_in'],'entity_out'=>$res['entity_out']);
				$entity[]=array('entity_in'=>$IN,'entity_out'=>$OUT);
				$i++;
			}
			$entity;
			$total=0;
			$count=0;
			foreach ($entity as $timestamp)
			{
				 //$diff = $timestamp['entity_out'] - $timestamp['entity_in'];
				 $diff = strtotime($timestamp['entity_out']) - strtotime($timestamp['entity_in']);
				 $total += $diff;
    			 $count++;
			}
			$avarge =$total / $count;
			//$avarge =date('h:i:s',$avarge_time);
			$sqlIn="SELECT * FROM time_tap where entity_in!='' AND entity_out='' AND user_uniq='$u_session' AND fault='0' AND archive='0'";
			$exec_sqlIn=mysql_query($sqlIn);
			$count=mysql_num_rows($exec_sqlIn);
			$message[0]=$count1;
			$message[1]=$count;
			$message[2]=$avarge;
			$message_arr = implode(',', $message);
		   echo $message_arr;
		}
}
if($_GET['do']=='fault')
{
	$Fault=$_GET['Fault'];
	//$faultOut=$_POST['faultOut'];
	$sqlIn="SELECT * FROM time_tap where entity_in!='' AND entity_out='' AND user_uniq='$u_session' AND fault='0' AND archive='0'";
	$exec_sqlIn=mysql_query($sqlIn);
	$count=mysql_num_rows($exec_sqlIn);
	while($result=mysql_fetch_array($exec_sqlIn))
	{
		$ff[]=$result['id'];
	}
	$last_id=end(array_values($ff));
	
	
	$updatefault="UPDATE time_tap SET fault='".time()."',archive='1' where id='".$last_id."'";
	$exec_updatefault=mysql_query($updatefault);
	if($exec_updatefault)
	{
	$sql_query="SELECT * FROM time_tap where entity_in!='' AND entity_out='' AND user_uniq='$u_session' AND fault='' and archive='0'";
	$exec_sql_query=mysql_query($sql_query);
	$count=mysql_num_rows($exec_sql_query);
	
	$Sql_count=mysql_query("SELECT * FROM time_tap WHERE entity_in!='' AND entity_out!='' AND user_uniq='$u_session'");
	$count1=mysql_num_rows($Sql_count);
	
	$Sql_fault=mysql_query("SELECT * FROM time_tap where entity_in!='' AND entity_out='' AND user_uniq='$u_session' AND fault!='' and archive='1'");
	$count2=mysql_num_rows($Sql_fault);
	
	$message[0]=$count;
	$message[1]=$count1;
	$message[2]=$count2;
	$message_arr = implode(',', $message);
   echo $message_arr;
	}
}
?>