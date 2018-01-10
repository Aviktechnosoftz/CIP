<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<head>
    <title>jQuery UI Month Picker Plugin</title>
    <meta name="description" content="jQuery UI Month Picker Plugin : jQuery UI Month Picker Plugin">

   <!--  <link href="stylesheets/stylesheet.css" rel="stylesheet" type="text/css" /> -->
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />

    <link href="MonthPicker.min.css" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" type="text/css" href="examples.css" /> -->

    <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!--     <script src="https://cdn.rawgit.com/digitalBush/jquery.maskedinput/1.4.1/dist/jquery.maskedinput.min.js"></script> -->

    <script src="MonthPicker.min.js"></script>
<!--     <script src="examples.js"></script> -->
</head>
</head>
<body>
Hello
<h3>Default functionality</h3>
            <p>
                This demonstrates the plugin's default functionality.
                <br />
                <br />Choose a Month:
                <input id="IconDemo" class='Default' type="text" />
            </p>

            <h3>Button Demonstration</h3>
            <p>
                This demonstrates how you can customize every aspect of the open button. See the <a href='https://github.com/KidSysco/jquery-ui-month-picker/wiki/Button-Option'>Button documenation</a> for details on handeling internationalization.
                <br />
                <br />No button:
                <br />
                <input id="NoIconDemo" type="text" />
                <br />
                <br />Image button:
                <br />
                <input id="ImageButton" type="text" />
                <br />
                <br />Plain HTML button:
                <br />
                <input id="PlainButton" type="text" />
                <br />
                <br />jQuery UI button:
                <br />
                <input id="JQButton" type="text" />
            </p>

            <h3>MinMonth and MaxMonth Demonstration</h3>
            <p>
                This demonstrates how you can limit the user to chooseing months within a given interval.
                <br />
                <br />Future months only:
                <br />
                <input id="FutureDateDemo" type="text" />
                <br />
                <br />Past months only:
                <br />
                <input id="PastDateDemo" type="text" />
                <br />
                <br />18 months from today:
                <br />
                <input id="YearAndAHalfDeom" type="text" />
            </p>

</body>
</html>