$(document).ready(function () {
	document.getElementById('table1').style.display = 'none';
	document.getElementById('table2').style.display = 'none';
	
});

function show(nr) {
	document.getElementById("table1").style.display="none";
	document.getElementById("table2").style.display="none";
    	document.getElementById("table"+nr).style.display="block";
 
}

