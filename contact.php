<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Quadlogic Controls Corp. Serial to IP Server</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
<!-- Start Front Page -->
<p align="left">
<table>
  <thead>
    <tr>
      <th data-field="logo"><a href="index.php"><img src="images/QLCLogo.jpg" height="30" width="150"><img src="images/Right_Direction_Arrow.png" height="30"></a></th>
      <th>&nbsp;</th>
      <th data-field="Welcome"><div class="right-align"><?php echo date('l, F jS, Y'); ?></div></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
	<div class="card large">
	  <div class="card-content"><span class="card-title">Serial2IP Server</span></div>
	  <img src="images/Raspberry-Pi-USB.jpg" width="300px">
        </div>
      </td>
      <td>
      <div class="card large"><div class="card-content"><span class="card-title">Contact Info:</span></div>
      <pre>3300 Northern Blvd, Long Island City, NY 11101, USA</pre>
      <pre>+1-212-930-9300</pre>
      <pre><a href="http://www.quadlogic.com/">http://www.quadlogic.com</a></pre>

      </td>
      <td>
      <div class="card large"><div class="card-content"><span class="card-title">Main Office Location</span></div>
<center>
<div class="mapouter"><div class="gmap_canvas"><iframe width="400" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=3300 Northern Boulevard, LIC, NY, United States, &t=&z=14&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><script src="http://www.embedgooglemap.net/mapscript.js"></script><br>embed google map by <a href="http://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{overflow:hidden;height:300px;width:400px;}.gmap_canvas {background:none!important;height:300px;width:400px;}</style></div>
</center>
      </td>
    </tr>
  </tbody>
</table> 
</p>
<!-- End First Row -->
<div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red" href="secure/reboot.php"><i class="material-icons">power_settings_new</i></a>Restart</li>
      <li><a class="btn-floating red" href="contact.php"><i class="material-icons">contact_phone</i></a>Contacts</li>
      <li><a class="btn-floating yellow darken-1" href="reports.php"><i class="material-icons">equalizer</i></a>Reports</li>
      <li><a class="btn-floating blue" href="secure/settings.php"><i class="material-icons">settings</i></a>Settings</li>
    </ul>
</div>
</body>
</html>
