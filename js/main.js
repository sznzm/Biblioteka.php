$(document).ready(function(){
   $("#loginButton").on("click",function(){

   	    $.ajax({
               method: "POST",
               url: "Class/login.php",
               data: $("#loginForm").serialize(),
               success: function(response) {
               	var tempResponse = JSON.parse(response);
               	if(tempResponse.error) {
               		$("#msg").html(tempResponse.message);
               	} else {
               		$("#msg").html(tempResponse.message);
               		setTimeout(function () {
						   window.location.href = "landing.php";
               		}, 3000);
               	}
               },
               error: function(){
               	alert('greška');
               }
   	    });
   });
});