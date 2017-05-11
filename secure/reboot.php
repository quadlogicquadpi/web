<html>
<head>
<meta http-equiv="refresh" content="20;url=index.php">
<title>Please wait...</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="col-lg-6 col-lg-offset-3" id="mydiv">
        <div class="mydiv_inhalt">
            <h2>Rebooting...</h2>
            <p>This can take up to 1 minute...</p>
            <center>
                <div class="waiting" id="waiting" style="margin-top:30px; margin-left: 0px;">
                    <center><img class="loading_table" src="http://www.securenet.com/sites/default/files/spinner.gif" alt="spinner gif"></center>
                </div>
            </center>
        </div>
    </div>
</body>
</html>
<?php exec("sudo /sbin/reboot"); ?>
