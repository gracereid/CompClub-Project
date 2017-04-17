$(document).ready(function () {
	document.getElementById('t1').style.display = 'none';
	document.getElementById('t2').style.display = 'none';
	document.getElementById('t3').style.display = 'none';
});

function show(nr) {
	document.getElementById("t1").style.display="none";
	document.getElementById("t3").style.display="none";
	document.getElementById('t2').style.display = 'none';
	document.getElementById("t"+nr).style.display="block";
 
}
