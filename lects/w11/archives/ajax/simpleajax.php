<?php
    require("Sajax.php");
    
    function concatenate($p, $q)
    {
        return $p." : ".$q;
    }
    
    sajax_init();
    sajax_export("concatenate");
    sajax_handle_client_request();
    
?>
<html>
<head>
	<title>Simple Ajax Test</title>
	<script>
	<?php
    sajax_show_javascript();
    ?>

	function show_results(r) {
		document.getElementById("Results").value = r;
	}
	
	function do_concatenate() {
		var name, password;
		name = document.getElementById("Name").value;
		password = document.getElementById("Password").value;
		x_concatenate(name, password, show_results);
	}
	</script>
</head>
<body>
	<input type="text" name="Name" id="Name" value="" size="12">
	
	<input type="text" name="Password" id="Password" value="" size="6">
	
	<input type="button" name="check" value="Get Results" 
              onclick="do_concatenate(); return false;">
	
   <input type="text" name="Results" id="Results" value="" size="21">
</body>
</html>
