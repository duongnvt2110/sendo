$(document).ready(function(){

	// var request_Code;
	// var text;
	// get();
	// function getCode()
	// {
	// 	var xhttp = new XMLHttpRequest();
	// 	xhttp.onreadystatechange = function() {
	// 		if (this.readyState == 4 && this.status == 200) 
	// 		{
	// 			text=  xhttp.responseText;
	// 			text=text.split('value="');
	// 			text=text[2].split('"');
	// 			return callback(text[0]);
	// 		}
	// 		xhttp.open("GET", "https://ban.sendo.vn/mo-shop", false);
	// 		xhttp.send("");
	// 	};

	// }
	var txt;
	$.ajax({
		url:'https://ban.sendo.vn/mo-shop',
		type:'get',
		contentType:'text',
		success:function(result){
			txt=result;
		},
		async:false
	});
	console.log(txt);

});