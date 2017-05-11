<?php
session_start();
//Network Settings
//IP Address
$grab_ip=exec("ip addr show eth0 | grep /24");
$grab_ip_from = "inet ";
$grab_ip_until = "/24";
$ip = getStringBetween($grab_ip,$grab_ip_from,$grab_ip_until);
function getStringBetween($grab_ip,$grab_ip_from,$grab_ip_until)
{
    $sub = substr($grab_ip, strpos($grab_ip,$grab_ip_from)+strlen($grab_ip_from),strlen($grab_ip));
    return substr($sub,0,strpos($sub,$grab_ip_until));
}
//IP Mask
$grab_mask=exec("ifconfig eth0 | grep Mask:");
$extract_mask = explode("Mask:",$grab_mask);
$ip_mask=$extract_mask[1];
//IP Gateway
$grab_gateway=exec("ip route | grep default");
$extract_gateway = explode(" ",$grab_gateway);
$ip_gateway=$extract_gateway[2];
//IP DNS
$grab_nameservers=exec("less /etc/resolv.conf|grep nameserver");
$extract_nameservers = explode(" ",$grab_nameservers);
$ip_dns1=$extract_nameservers[1];
$ip_dns2=$extract_nameservers[3];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Quadlogic Controls Corp. Serial to IP Server</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <!--  Scripts-->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
<!-- Start Front Page -->
<p align="left">
<table>
  <thead>
    <tr>
      <th data-field="logo"><a href="../index.php"><img src="../images/QLCLogo.jpg" height="30" width="150"><img src="../images/Right_Direction_Arrow.png" height="30"></a></th>
      <th>&nbsp;</th>
      <th data-field="Welcome"><div class="right-align"><?php echo date('l, F jS, Y'); ?></div></th>
    </tr>
  </thead>
</table> 
</p>
<!-- Start Second Raw -->
<div class="row">
<div class="col s12">
<div class="card small"><div class="card-content"><span class="card-title">Network Configuration Settings</span></div>
<table class="bordered">
<thead>
 <tr>
     <th data-field="port">IP Address</th>
     <th data-field="baudrate">Subnet Mask</th>
     <th data-field="databits">Gateway</th>
     <th data-field="parity">DNS 1</th>
     <th data-field="stopbits">DNS2</th>
 </tr>
</thead>
<tbody>
 <tr>
	<td><?php $_SESSION["IPAddress"]=$ip; echo $ip; ?></td>
	<td><?php $_SESSION["IPMask"]=$ip_mask; echo $ip_mask; ?></td>
	<td><?php $_SESSION["IPGateway"]=$ip_gateway; echo $ip_gateway; ?></td>
	<td><?php $_SESSION["IPDNS1"]=$ip_dns1; echo $ip_dns1; ?></td>
	<td><?php $_SESSION["IPDNS2"]=$ip_dns2; echo $ip_dns2; ?></td>
 </tr>
</tbody>
</table>
</div>
</div>
<!-- End Second Raw -->
<!-- Start Third Row -->
<div class="row">
<div class="col s12">
<div class="card small"><div class="card-content"><span class="card-title">VPN Settings</span></div>
<form action="vpnupload.php" method="post" enctype="multipart/form-data">
    <div class="file-field input-field">
      <div class="btn">
        <span>Select VPN Configuration</span>
        <input type="file" name="file_upload">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
      <div class="btn waves-effect waves-light">
        <input type="submit" value="Upload">
      </div>
    </div>
</form>
</div>
</div>
<!-- End Third Row -->
<div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red" href="reboot.php"><i class="material-icons">power_settings_new</i></a>Restart</li>
      <li><a class="btn-floating red" href="contact.php"><i class="material-icons">contact_phone</i></a>Contacts</li>
      <li><a class="btn-floating yellow darken-1" href="reports.php"><i class="material-icons">equalizer</i></a>Reports</li>
      <li><a class="btn-floating blue" href="secure/settings.php"><i class="material-icons">settings</i></a>Settings</li>
    </ul>
</div>
</body>
</html>
