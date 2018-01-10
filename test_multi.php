<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head> 
	<? include 'header.php' ?>
		<title>jQuery MultiSelect Demo</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquery.bgiframe.min.js" type="text/javascript"></script>
		<script src="js/jquery.multiSelect.js" type="text/javascript"></script>

		<link href="js/multiSelect.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript">
			
			$(document).ready( function() {
				
				// Default options
				$("#control_1, #control_3, #control_4, #control_5").multiSelect();
				
				// With callback
				$("#control_6").multiSelect( null, function(el) {
					$("#callbackResult").show().fadeOut();
				});
				
				// Options displayed in comma-separated list
				$("#control_7").multiSelect({ oneOrMoreSelected: '*' });
				
				// 'Select All' text changed
				$("#control_8").multiSelect({ selectAllText: 'Pick &lsquo;em all!' });
				
				// Show test data
				$("FORM").submit( function() {
					$.post('result.php', $(this).serialize(), function(r) {
						alert(r);
					});
					return false;
				});
				
			});
			
		</script>
		
		<style type="text/css">
			HTML {
				font-family: Arial, Helvetica, sans-serif;
				font-size: 12px;
			}
			
			H2 {
				font-size: 14px;
				font-weight: bold;
				margin: 1em 0em .25em 0em;
			}
			
			P {
				margin: 1em 0em;
			}
		</style>
	</head>
	
	<body>
		
		<form action="" method="post">
			
			<h1>jQuery MultiSelect</h1>

			<p>
				Feel free to view the source code of this page to see how the MultiSelect controls are being implemented.
			</p>
			
			<p>
				<strong>Tip: </strong> try navigating the menu using the keyboard: down, up, tab, enter, space, esc
			</p>
			
			<p>
				<a href="http://abeautifulsite.net/2008/04/jquery-multiselect/">Back to the project page</a>

			</p>
			
			<h2>Control 1: Default options</h2>
			<p>
				<select id="control_1" name="control_1[]" multiple="multiple" size="5">
					<option value=""></option>
					<optgroup label="Optgroup 1">
						<option value="option_1">Option 1</option>
						<option value="option_2">Option 2</option>
					</optgroup>
					<optgroup label="Optgroup 2">
						<option value="option_3">Option 3</option>
						<option value="option_4">Option 4</option>
						<option value="option_5">Option 5</option>
						<option value="option_6">Option 6</option>
						<option value="option_7">Option 7</option>
						<option value="option_8">Option 8</option>
					</optgroup>

					<optgroup label="Optgroup 3">
						<option value="option_9">Option 9</option>
						<option value="option_10">Option 10</option>
						<option value="option_11">Option 11</option>
						<option value="option_12">Option 12</option>
					</optgroup>
				</select>
			</p>
			
			<h2>Control 2: IE6 Layering Bug Test</h2>

			<p>
				<select id="control_2" name="control_2[]">
					<option value="option_1">IE6 TEST</option>
					<option value="option_2">IE6 TEST</option>
					<option value="option_3">IE6 TEST</option>
					<option value="option_4">IE6 TEST</option>
					<option value="option_5">IE6 TEST</option>

					<option value="option_6">IE6 TEST</option>
					<option value="option_7">IE6 TEST</option>
					<option value="option_8">IE6 TEST</option>
					<option value="option_9">IE6 TEST</option>
					<option value="option_10">IE6 TEST</option>
				</select>

			</p>
			
			<h2>Control 3, 4, 5: Pre-selected options</h2>
			<p>
				<select id="control_3" name="control_3[]" multiple="multiple" size="5">
					<option value=""></option>
					<option value="option_1" selected="selected">Option 1</option>
					<option value="option_2">Option 2</option>

					<option value="option_3">Option 3</option>
					<option value="option_4">Option 4</option>
					<option value="option_5">Option 5</option>
					<option value="option_6">Option 6</option>
					<option value="option_7">Option 7</option>
				</select>

				
				<select id="control_4" name="control_4[]" multiple="multiple" size="5">
					<option value=""></option>
					<option value="option_1" selected="selected">Option 1</option>
					<option value="option_2" selected="selected">Option 2</option>
					<option value="option_3">Option 3</option>
					<option value="option_4">Option 4</option>
					<option value="option_5">Option 5</option>

					<option value="option_6">Option 6</option>
					<option value="option_7">Option 7</option>
				</select>
				
				<select id="control_5" name="control_5[]" multiple="multiple" size="5">
					<option value=""></option>
					<option value="option_1" selected="selected">Option 1</option>
					<option value="option_2" selected="selected">Option 2</option>

					<option value="option_3" selected="selected">Option 3</option>
					<option value="option_4">Option 4</option>
					<option value="option_5">Option 5</option>
					<option value="option_6">Option 6</option>
					<option value="option_7">Option 7</option>
				</select>

			</p>
			
			<h2>Control 6: With callback</h2>
			<p>
				<span id="callbackResult" style="display: none;">Callback triggered!</span><br />
				<select id="control_6" name="control_6[]" multiple="multiple" size="5">
					<option value=""></option>
					<option value="option_1">Option 1</option>

					<option value="option_2">Option 2</option>
					<option value="option_3">Option 3</option>
					<option value="option_4">Option 4</option>
					<option value="option_5">Option 5</option>
					<option value="option_6">Option 6</option>
					<option value="option_7">Option 7</option>

				</select>
			</p>
			
			<h2>Control 7: Options displayed in comma-separated list</h2>
			<p>
				<select id="control_7" name="control_7[]" multiple="multiple" size="5">
					<option value=""></option>
					<option value="option_1">Option 1</option>
					<option value="option_2">Option 2</option>

					<option value="option_3">Option 3</option>
					<option value="option_4">Option 4</option>
					<option value="option_5">Option 5</option>
					<option value="option_6">Option 6</option>
					<option value="option_7">Option 7</option>
				</select>

			</p>			
			
			<h2>Control 8: &ldquo;Select All&rdquo; text changed</h2>
			<p>
				<select id="control_8" name="control_8[]" multiple="multiple" size="5">
					<option value=""></option>
					<option value="option_1">Option 1</option>
					<option value="option_2">Option 2</option>
					<option value="option_3">Option 3</option>
					<option value="option_4">Option 4</option>
					<option value="option_5">Option 5</option>
					<option value="option_6">Option 6</option>
					<option value="option_7">Option 7</option>
				</select>

			</p>
			
			<p>
				<input type="submit" value="Show Results" />
			</p>
			
		</form>
		
	</body>
</html>