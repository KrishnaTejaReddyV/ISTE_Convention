<?php
		include_once('data_connect.php');
		$status=$_POST['status'];
		$trans=$_POST['Refno'];
		$tpsl=$_POST['tpsltranid'];
		$bank_ref=$_POST['bankrefno'];
		$date=$_POST['txndate'];
                
		$refcookie=$_COOKIE["ref"];
		$refecookie=$_COOKIE["refe"];

		$ref=substr($trans,4);

		$sql = "Select Email from pre_payment where ReferenceNumber='$ref'";
		$sql1 = "Select Mail from eve_payment where ReferenceNumber='$ref'";
		$sql2 = "Select Email from pre_payment where ReferenceNumber='$refcookie'";
		$sql3 = "Select Mail from eve_payment where ReferenceNumber='$refecookie'";
		
		$rows=mysql_num_rows(mysql_query($sql));
		$rows1=mysql_num_rows(mysql_query($sql1));
		$rows2=mysql_num_rows(mysql_query($sql2));
		$rows3=mysql_num_rows(mysql_query($sql3));
		
		$email;
		$name;
		$amount;
		
		if($rows)
		{
			if(!($tpsl===NULL))
			{
			$query1="select * from pre_payment where ReferenceNumber='$ref'";
			$res = mysql_query($query1);
			$row = mysql_fetch_row($res);
			$email=$row[8];
			$name=$row[0];
			$amount=$row[11];
			$query="INSERT INTO payment(Name,Gender,DOB,Branch,MemberID,Institute,Address,Mobile,Email,ReferentialCode,Category,Amount,ReferenceNumber,TSPL,BankRef,Date) 
			values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$ref','$tpsl','$bank_ref','$date')";
			mysql_query($query);
			}
			else if($tpsl===NULL)
			{
			$query="delete from pre_payment where ReferenceNumber='$ref'";
			mysql_query($query);
			}
		}
		else if($rows1)
		{
			if(!($tpsl===NULL))
			{
			$query1="select * from eve_payment where ReferenceNumber='$ref'";
			$res = mysql_query($query1);
			$row = mysql_fetch_row($res);
			$email=$row[1];
			$name=$row[0];
			$amount=$row[9];
			$query="INSERT INTO payment(Name,Mail,Paper,Poster,CAD,Expo,Code,Debate,Quiz,Amount,ReferenceNumber,TSPL,BankRef,Date) 
			values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$ref','$tpsl','$bank_ref','$date')";  
			mysql_query($query);
			}
			else if($tpsl===NULL)
			{
			$query="delete from eve_payment where ReferenceNumber='$ref'";
			mysql_query($query);
			}
		}
		else if($rows2)
		{
			if(!($tpsl===NULL))
			{
			$query1="select * from pre_payment where ReferenceNumber='$refcookie'";
			$res = mysql_query($query1);
			$row = mysql_fetch_row($res);
			$email=$row[8];
			$name=$row[0];
			$amount=$row[11];
			$query="INSERT INTO payment(Name,Gender,DOB,Branch,MemberID,Institute,Address,Mobile,Email,ReferentialCode,Category,Amount,ReferenceNumber,TSPL,BankRef,Date) 
			values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$ref','$tpsl','$bank_ref','$date')";
			mysql_query($query);
			}
			else if($tpsl===NULL)
			{
			$query="delete from pre_payment where ReferenceNumber='$refcookie'";
			mysql_query($query);
			}
		}
		else if($rows3)
		{
			if(!($tpsl===NULL))
			{
			$query1="select * from eve_payment where ReferenceNumber='$refecookie'";
			$res = mysql_query($query1);
			$row = mysql_fetch_row($res);
			$email=$row[1];
			$name=$row[0];
			$amount=$row[9];
			$query="INSERT INTO payment(Name,Mail,Paper,Poster,CAD,Expo,Code,Debate,Quiz,Amount,ReferenceNumber,TSPL,BankRef,Date) 
			values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$ref','$tpsl','$bank_ref','$date')";  
			mysql_query($query);
			}
			else if($tpsl===NULL)
			{
			$query="delete from eve_payment where ReferenceNumber='$refecookie'";
			mysql_query($query);
			}
		}
		
		
		/*if(mysql_num_rows(mysql_query($sql)))
		{
		if(!($tpsl===NULL))
		{
		$query1="select * from pre_payment where ReferenceNumber='$ref'";
		$res = mysql_query($query1);
		$row = mysql_fetch_row($res);
		$email=$row[8];
		$name=$row[0];
		$amount=$row[11];
		$query="INSERT INTO payment(Name,Gender,DOB,Branch,MemberID,Institute,Address,Mobile,Email,ReferentialCode,Category,Amount,ReferenceNumber,TSPL,BankRef,Date) 
		values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$ref','$tpsl','$bank_ref','$date')";
		mysql_query($query);
		}
		else if($tpsl===NULL)
		{
		$query="delete from pre_payment where ReferenceNumber='$ref'";
		mysql_query($query);
		}
		}
		
		if(mysql_num_rows(mysql_query($sql1)))
		{
		if(!($tpsl===NULL))
        {
		$query1="select * from eve_payment where ReferenceNumber='$ref'";
		$res = mysql_query($query1);
		$row = mysql_fetch_row($res);
		$email=$row[1];
		$name=$row[0];
		$amount=$row[9];
		$query="INSERT INTO payment(Name,Mail,Paper,Poster,CAD,Expo,Code,Debate,Quiz,Amount,ReferenceNumber,TSPL,BankRef,Date) 
		values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$ref','$tpsl','$bank_ref','$date')";  
		mysql_query($query);
		}
		else if($tpsl===NULL)
		{
		$query="delete from eve_payment where ReferenceNumber='$ref'";
		mysql_query($query);
		}
		}*/

	  
		
                                if(!(isset($status)&&isset($trans)&&isset($tpsl)&&isset($bank_ref)&&isset($date)))
                header('Location: index.html');


?>
<html>
<head>
	<meta name="language" content="en-us"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="ISTE VIT Vellore is a student run chapter that aims at providing students of VIT Vellore with opportunities to enhance their technical skills." />
	<meta name="keywords" content="ISTE, VIT, VITU, Vellore, Indian Society for Technical Education, Technology, Robotix, Human Foosball, Code-a-thon, Horizon" />
	<meta name="publisher" content="ISTE VIT Vellore, iste@vit.ac.in" />
	<meta name="copyright" content="ISTE VIT Vellore"/>
	<meta name="distribution" content="Global" />
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="1 days"/>
	<link rel="shortcut icon" type="image/x-icon" href="static1/pics/favicon.ico" />
	<title>
		19th ISTE Convention
	</title>
</head>
<!--Initialising css folders-->
<link rel="stylesheet" href="static1/css/materialize.min.css">

<!--Initialising javascript folders-->
<script type="text/javascript" src="static1/js/jquery-2.1.1.min.js"></script>
<script src="static1/js/materialize.min.1.js"></script>
<script src="static1/js/materialize.min.js"></script>


<body>
<div id="details">
<h2 align="center" style='padding-top:50;'>Transaction Details</h2>
<table style='width:100%;' class="centered striped">
		<thead>
		<tr>
			<th>Reference no.</th>
			<th>Name</th>
			<th>Email Id</th>
			<th>Amount</th>
			<th>TPSL Transaction ID</th>
			<th>Bank Reference No.</th>
			<th>Transaction Date</th>
		</tr>
		</thead>
		
		<tbody>
		<tr>
			<td align="center"><?php print $ref;?></td>
			<td align="center"><?php print $name;?></td>
			<td align="center"><?php echo $email;?></td>
			<td align="center"><?php echo $amount;?></td>
			<td align="center"><?php echo $tpsl;?></td>
			<td align="center"><?php echo $bank_ref;?></td>
			<td align="center"><?php echo $date;?></td>
		</tr>
		</tbody>
</table>

</div>

		<div class="row" style="text-align:center;padding:80">

<h6 align="center"><b>* Kindly take a screenshot of the page or note down the details as a proof of your registration.</b></h6>

<button class="btn col l2 m2 s4 white-text black lighten-1" style="position: absolute;transform:translateX(-50%)" name="action"><a href="http://www.istevitu.in/convention" class="white-text">Home</a></button>
		
</div>
		

</body>
</html>