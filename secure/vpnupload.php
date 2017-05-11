<html>
<head>
<title>Uploaded VPN File</title>
</head>
<body>
<?php
session_start();
//print_r($_FILES);

// Check for errors
if($_FILES['file_upload']['error'] > 0){
    die('An error ocurred when uploading.');
}
// Check filesize
if($_FILES['file_upload']['size'] > 500000){
    die('File uploaded exceeds maximum upload size.');
}
// Upload file
if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], '/etc/openvpn/client.conf')){
    die('Error uploading file - check destination is writeable.');
}
die('File uploaded successfully.');
?>
</body>
</html>
