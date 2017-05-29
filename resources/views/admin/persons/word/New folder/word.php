<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=test.doc");
?>
<html style="border : 3px solid black;">
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
<body style="font-family : B Nazanin ; ">
<center><b>بسمه تعالی</b></center>
<p style="direction : rtl ;">این یک فایل برای تست فعالیت ساخت ورد می باشد که برای آقای <b><?php echo $_POST['name'] ; echo" "; echo $_POST['family']; ?></b> با مدرک <b><?php echo $_POST['degree']; ?></b> تولید شده است</p>
</body>
</html>