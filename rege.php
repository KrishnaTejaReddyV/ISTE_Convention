<?php
		include_once('data_connect.php');
		$mail=$_POST['mail'];
		if(isset($_POST['paper']))
		$paper=100;
		else
		$paper=0;
		if(isset($_POST['poster']))
		$poster=100;
		else
		$poster=0;
		if(isset($_POST['cad']))
		$cad=100;
		else
		$cad=0;
		if(isset($_POST['expo']))
		$expo=1;
		else
		$expo=0;
		if(isset($_POST['code']))
		$code=100;
		else
		$code=0;
		if(isset($_POST['debate']))
		$debate=100;
		else
		$debate=0;
		if(isset($_POST['quiz']))
		$quiz=100;
		else
		$quiz=0;
		
		$amount=$paper+$poster+$cad+$code+$debate+$quiz;
		$sql = "Select * from payment where Email='$mail';";
		
		if(mysql_num_rows(mysql_query($sql)))
		{
		$query="select Name from payment where Email='$mail';";
		$res = mysql_query($query);
		$row = mysql_fetch_row($res);
		$name = $row[0];
		
		$sql = "Select max(ReferenceNumber) from payment;";
		$res = mysql_query($sql);
		$row = mysql_fetch_row($res);
                $ref1 = $row[0];

                $sql = "Select Count from payment where ReferenceNumber='$ref1';";
		$res = mysql_query($sql);
		$row = mysql_fetch_row($res);
                $count = $row[0] + 1;

                $query="update payment set Count='$count' where ReferenceNumber='$ref1';";
		mysql_query($query);

		$refno = $ref1 + $count;
		$tran= "ISTE".$refno;

                setcookie("refe",$refno, time() + (86400 * 1), "/");

		$sql="INSERT INTO eve_payment values('$name','$mail','$paper','$poster','$cad','$expo','$code','$debate','$quiz','$amount','$refno')";
		$res=mysql_query($sql);
		$tran= "ISTE".$refno;
		
		echo '<form id="pay" method="POST" action="https://academics.vit.ac.in/online_application2/onlinepayment/Online_pay_request1.asp">';
		echo'	
		<input type="hidden" name="id_trans" value="'.$tran.'">
		<input type="hidden" name="id_name" value="'.$name.'">
		<input type="hidden" name="id_event" value="28">
		<input type="hidden" name="amt_event" value="'.$amount.'">
		<input type="hidden" name="id_merchant" value="1027">
		<input type="hidden" name="id_password" value="lkujjsdljf@67B/sa16">';
		echo '</form>'; 
?>


<html>
<script type="text/javascript" src="static1/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
         $("#pay").submit();
    });
</script>
</html>
<?php
		}
		
		else{
		echo "<script type='text/javascript'>alert('Email Id Not Registered. Try Again');
		window.location.href='index.html';
		</script>";
		}
			
?>