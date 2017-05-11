<?php
session_start();
//
$mem = new Memcached();
$memcached_host = '127.0.0.1';
$memcached_port = 11211;
$mem->addServer($memcached_host, $memcached_port);
//USB Port in use
//$usb_port = shell_exec("dmesg | grep 1-1. | tail -5 | sed  's/\[.*\]//g'");
$usb_port = shell_exec("ls /dev/ttySIP*");
//Verify USB port 1
$USB1="";
if(strpos($usb_port, '/dev/ttySIP1') === false) {
$USB1="USB 1 - not in use";
} else {
$USB1="USB 1 - Device connected";
$USB1Details=shell_exec("dmesg | grep 1-1.2 | tail -6 | sed  's/\[.*\] usb 1-1.2: //g' | sed 's/\[.*\] //g'");
}
//Verify USB port 2
$USB2="";
if(strpos($usb_port, '/dev/ttySIP2') === false) {
$USB2="USB 2 - not in use";
} else {
$USB2="USB 2 - Device connected";
$USB2Details=shell_exec("dmesg | grep 1-1.3 | tail -6 | sed  's/\[.*\] usb 1-1.3: //g' | sed 's/\[.*\] //g'");
}
//Verify USB port 3
$USB3="";
if(strpos($usb_port, '/dev/ttySIP3') === false) {
$USB3="USB 3 - not in use";
} else {
$USB3="USB 3 - Device connected";
$USB3Details=shell_exec("dmesg | grep 1-1.4 | tail -6 | sed  's/\[.*\] usb 1-1.4: //g' | sed 's/\[.*\] //g'");
}
//Verify USB port 4
$USB4="";
if(strpos($usb_port, '/dev/ttySIP4') === false) {
$USB4="USB 4 - not in use";
} else {
$USB4="USB 4 - Device connected";
$USB4Details=shell_exec("dmesg | grep 1-1.5 | tail -6 | sed  's/\[.*\] usb 1-1.5: //g' | sed 's/\[.*\] //g'");
}
//TCP/IP Port for Ser2Net
$port = shell_exec('ls /dev/ttySIP*');
//Find USB port in use:
$Port10001="";
if(strpos($port, 'ttySIP1') === false) {
	$TCP10001 = "not in use";
} else {
$TCP10001 = "configured and ready";
$TCP10001Details = shell_exec("less /etc/ser2net.conf | grep 10001 | sed  's/^...........................//g'");
}
$Port10002="";
if(strpos($port, 'ttySIP2') === false) {
        $TCP10002 = "not in use";
} else {
$TCP10002 = "configured and ready";
$TCP10002Details = shell_exec("less /etc/ser2net.conf | grep 10002 | sed  's/^...........................//g'");
}
$Port10003="";
if(strpos($port, 'ttySIP3') === false) {
        $TCP10003 = "not in use";
} else { 
$TCP10003 = "configured and ready";
$TCP10003Details = shell_exec("less /etc/ser2net.conf | grep 10003 | sed  's/^...........................//g'");
}
$Port10004="";
if(strpos($port, 'ttySIP4') === false) {
        $TCP10004 = "not in use";
} else {
$TCP10004 = "configured and ready";
$TCP10004Details = shell_exec("less /etc/ser2net.conf | grep 10004 | sed  's/^...........................//g'");
}
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
	  <div class="card-content"><span class="card-title">QuadPi Server</span></div>
	  <img src="images/Raspberry-Pi-USB.jpg" width="300px">
        </div>
      </td>
      <td>
      <div class="card large"><div class="card-content"><span class="card-title">Status USB Ports</span></div>
                <ul class="collapsible" data-collapsible="expandable">
                <li>
                <div class="collapsible-header"><span class="badge"><?php echo "$USB1"; ?></span></div>
                <div class="collapsible-body"><pre><?php echo $USB1Details; ?></pre></div>
                </li>
                <li>
                <div class="collapsible-header"><span class="badge"><?php echo "$USB2"; ?></span></div>
                <div class="collapsible-body"><pre><?php echo $USB2Details; ?></pre></div>
                </li>
                <li>
                <div class="collapsible-header"><span class="badge"><?php echo "$USB3"; ?></span></div>
                <div class="collapsible-body"><pre><?php echo $USB3Details; ?></pre></div>
                </li>
  		<li>
    		<div class="collapsible-header"><span class="badge"><?php echo "$USB4"; ?></span></div>
		<div class="collapsible-body"><pre><?php echo $USB4Details; ?></pre></div>
  		</li>
		</ul>
      </td>
      <td>
      <div class="card large"><div class="card-content"><span class="card-title">Access/Connection Information</span></div>
                <ul class="collapsible" data-collapsible="expandable">
                <li>
                <div class="collapsible-header"><span class="badge"><?php echo "Port 10001 $TCP10001"; ?></span></div>
                <div class="collapsible-body"><pre><a href="secure/settings.php"><i class="small material-icons">settings</i> <?php echo $TCP10001Details; ?></a></pre></div>
                </li>
                <li>
                <div class="collapsible-header"><span class="badge"><?php echo "Port 10002 $TCP10002"; ?></span></div>
                <div class="collapsible-body"><pre><a href="secure/settings.php"><i class="small material-icons">settings</i> <?php echo $TCP10002Details; ?></a></pre></div>
                </li>
                <li>
                <div class="collapsible-header"><span class="badge"><?php echo "Port 10003 $TCP10003"; ?></span></div>
                <div class="collapsible-body"><pre><a href="secure/settings.php"><i class="small material-icons">settings</i> <?php echo $TCP10003Details; ?></a></pre></div>
                </li>
                <li>
                <div class="collapsible-header"><span class="badge"><?php echo "Port 10004 $TCP10004"; ?></span></div>
                <div class="collapsible-body"><pre><a href="secure/settings.php"><i class="small material-icons">settings</i> <?php echo $TCP10004Details; ?></a></pre></div>
                </li>
                </ul>
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
