$(document).ready(function(){


		//basic register form submit
		$("#submit").click(function() {
		var name = $("#name").val();
		var gender = $("#gender").val();
		var dob = $("#dob").val();
		var branch = $("#branch").val();
		var mem = $("#mem").val();
		var inst = $("#inst").val();
		var address = $("#address").val();
		var mob = $("#mob").val();
		var email = $("#email").val();
		var ref = $("#ref").val();
		var cat = $("input[name=cat]:checked").val();
		var dataString = 'name='+ name + '&gender='+ gender + '&dob='+ dob + '&branch='+ branch + '&mem='+ mem + '&inst='+ inst + '&address='+ address + '&mob='+ mob + '&email='+ email + '&ref='+ ref + '&cat='+ cat;

		if(name=="" || gender=='' || dob=='' || branch=='' || address=='' || mob=='' || email=='' || cat=='' || inst=='')
		{
		alert("Please Fill All Fields");
		}
		else
		{
		/*$.ajax({
		type: "POST",
		url: "reg.php",
		data: dataString,
		success: function(){
		alert("Registration Successfull!!");
		},
		error: function(){
		alert("Registration Failed");
		}
		});*/
		$("#form").sumbit();
		}
		return false;
		});
		
		
		//events register form submit
		$("#submit2").click(function() {
		var mail = $("#mail").val();
		var dataString = '&mail='+ mail ;
		var paper=$("#paper");
		var poster=$("#poster");
		var cad=$("#cad");
		var expo=$("#expo");
		var code=$("#code");
		var debate=$("#debate");
		var quiz=$("#quiz");
		var papv= paper.val();
		var posv= poster.val();
		var cadv= cad.val();
		var expv= expo.val();
		var codv= code.val();
		var debv= debate.val();
		var quiv= quiz.val();
			if (paper.is(':checked') ) {
			papv=100;
			}
			else{
			papv=0;
			}
			//dataString = dataString + '&paper=' + papv;
			
			if (poster.is(':checked') ) {
			posv=100;
			}
			else{
			posv=0;
			}
			//dataString = dataString + '&poster=' + posv;
			
			if (cad.is(':checked') ) {
			cadv=100;
			}
			else{
			cadv=0;
			}
			//dataString = dataString + '&cad=' + cadv;
			
			if (expo.is(':checked') ) {
			expv=100;
			}
			else{
			expv=0;
			}
			//dataString = dataString + '&expo=' + expv;
			
			if (code.is(':checked') ) {
			codv=100;
			}
			else{
			codv=0;
			}
			//dataString = dataString + '&code=' + codv;
			
			if (debate.is(':checked') ) {
			debv=100;
			}
			else{
			debv=0;
			}
			//dataString = dataString + '&debate=' + debv;
			
			if (quiz.is(':checked') ) {
			quiv=100;
			}
			else{
			quiv=0;
			}
			//dataString = dataString + '&quiz=' + quiv;
			
		if(mail=='' || (quiv==0 && debv==0 && codv==0 && expv==0 && cadv==0 && posv==0 && papv==0))
		{
		alert("Please Fill All Fields");
		}
		else
		{
		$("#form2").submit();
		}
		return false;
		});		
		
		
		});