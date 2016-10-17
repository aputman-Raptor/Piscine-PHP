<?php include("tcreate.php"); ?>
<br/>
<br />
<a href="index.php?page=trade"><div style="position:absolute;margin-top:14.9px;margin-left:355px;"><img src="images/al.png" style="width:30px;height:30px;" /></div></a>
	 <a href="index.php?page=newpw"><div style="position:absolute;margin-top:19.9px;margin-left:520px;"><img src="images/ar.png" style="width:20px;height:20px;" /></div></a>
<div style="border-width:1px;border-style:solid;border-color:black;width:400px;margin:0 auto;">

<br />
<div style="display:inline:block;font-family: Dayrom, serif;" align="center">INFORMATION</div>
<br />
	 <div style="margin-left:80px;display:inline-block;">Login:</div><div style="display:inline-block;margin-left:92px;"><?php echo $_SESSION["login"]; ?></div><br/>
	 <div style="margin-left:80px;display:inline-block;">Solde:</div><div style="display:inline-block;margin-left:92px"><?php echo $_SESSION["solde"]." &euro;"; ?></div><br />
<div style="margin-left:80px;display:inline-block;">Date D'inscription:&nbsp;</div><div style="display:inline-block;"><?php echo $_SESSION["time"]; ?></div>

<br />
<br />
</div>
<br/>
<br />
