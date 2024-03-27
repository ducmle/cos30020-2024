<?php
      require("Sajax.php");
    
      function multiply($p, $q)
      {
          return $p * $q;
      }
    
      sajax_init();
      sajax_export("multiply");
      sajax_handle_client_request();
    
?>
<html>
<head>
	<title>Multiplier</title>
	<script>
	<?php
    sajax_show_javascript();
    ?>
	
	function show_results(r) {
		document.getElementById("r").value = r;
	}
	
	function do_multiply() {
		var p, q;
		
		p = document.getElementById("p").value;
		q = document.getElementById("q").value;
		x_multiply(p, q, show_results);
	}
	</script>
	
</head>
<body>
	<input type="text" name= "p" id= "p" value="2" size="3">
	*
	<input type="text" name= "q" id="q" value="3" size="3">
	=
	<input type="text" name= "r" id="r" value="" size="3">
	<input type="button" name="check" value="Calculate"
		onclick="do_multiply(); return false;">
</body>
</html>


 