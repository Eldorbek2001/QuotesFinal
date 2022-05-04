<!-- 
This is the home page for Final Project, Quotation Service. 
It is a PHP file because later on you will add PHP code to this file.

File name quotes.php 
    
Authors: Rick Mercer and Ali Elbekov
-->

<!DOCTYPE html>
<html>
<head>
<title>Quotation Service</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body onload="showQuotes()">

<h1>Quotation Service</h1>

<?php 
session_start ();
 echo '&nbsp; <a href="./register.php" ><button>Register</button></a>';
?>
<?php 
 echo '&nbsp; <a href="./login.php" ><button>Log in</button></a>';
?>
<?php 
 echo '&nbsp; <a href="./addQuote.html" ><button>Add Quote</button></a>';
?>
<br>
<h2>
Welcome
<?php
if( isset($_SESSION ['user']))
  echo $_SESSION ['user'];
?>
!
</h2>
<br>
<div id="quotes"></div>

<script>
var element = document.getElementById("quotes");
function showQuotes() {
    // TODO 5: 
    // Complete this function using an AJAX call to controller.php
  	// You will need query parameter ?todo=getQuotes.
  	// Echo back one big string to here that has all styled quotations.
  	// Write all of the complex code to layout the array of quotes 
  	// inside function getQuotesAsHTML inside controller.php
  	var ajax = new XMLHttpRequest();
    ajax.open('GET', 'controller.php?todo='+'getQuotes', true);
    ajax.send();
    ajax.onreadystatechange = function(){
      if(ajax.readyState ===4 && ajax.status ===200){
        var data = JSON.parse(ajax.responseText);
        var dataArea = document.getElementById("quotes");
        dataArea.innerHTML = data;
  }
 }

} 

</script>

</body>
</html>