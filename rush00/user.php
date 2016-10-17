<br/>
<br />
<a href="index.php?page=create_product"><div style="position:absolute;margin-top:14.9px;margin-left:355px;"><img src="images/al.png" style="width:30px;height:30px;" /></div></a>
	 <a href="index.php?page=product"><div style="position:absolute;margin-top:19.9px;margin-left:520px;"><img src="images/ar.png" style="width:20px;height:20px;" /></div></a>
<div style="border-width:1px;border-style:solid;border-color:black;width:600px;margin:0 auto;">

<br />
<div style="display:inline:block;font-family: Dayrom, serif;" align="center">USER</div>
<br />
<center><table cellspacing="1" cellpadding="0" style="border:solid 1px black; font-family:verdana; font-size:12px;"> 
  <thead> 
    <tr style="background-color:lightgrey; height:20px;"> 
      <th style="width:120px;">NOM 1</th> 
      <th style="width:120px;">DATE INSCRIPTION </th> 
	  <th style="width:40px;">LVL</th> 
	  <th style="width:120px;">MODIFICATION</th> 
    </tr> 
  </head> 
  <tbody> 
    <tr> 
 <td colspan="5"> 
        <div style="height:96px; overflow:auto; border-top:solid 0px black; border-bottom:solid 0px black;"> 
          <table cellspacing="0" cellpadding="0" style="color:midnightblue; font-family:verdana; font-size:12px; text-align:center;"> 
	 <?php
	 include("uedit.php");
		 include("adelete.php");
		 include("affuser.php"); ?>
            
          </table> 
        </div> 
      </td> 
    </tr> 
  </tbody> 
</table> </center>
<br/>
</div>
<script>
	 function cf2() {
	return  confirm("Confirmer la suppression du compte.");
 }
</script>
<br/>
<br />
