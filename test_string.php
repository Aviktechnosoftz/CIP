
<!-- 
$string= ; -->
<?
$html = 'Device Name:</b> 08423<br> <strong>Equipment Type:</strong> Mobile Substation<br> <strong>Equipment Detail:</strong> <br> <strong>Unit #:</strong> 17A<br> <strong>Voltage:</strong> 110<br> <strong>MVA:</strong> 30.0<br><strong>Last Event: </strong>Moving <strong>Status: </strong> Inactive<br> <strong>Work Group:</strong> Workgroup 1<br> <strong>Last Location:</strong> 01-25-2017 09:48 AM<br>


<input type="button" name="manage" id="manage" value="Manage" style="margin-bottom:1vh;" onclick=edit_tracker_map("270113184309336860")><img id="manage_spin" src='.image/spinner.gif.' width='.'15px'.' style=';

$start = strpos($html, '<input="') + 5;
$length = strpos($html, '"></iframe') - $start;
$src = substr($html, $start, $length);

echo $src;


?>