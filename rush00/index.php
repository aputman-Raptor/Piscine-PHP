<?php
session_start();
ob_start();
include("create.php");
include("auth.php");
include("modif.php");
include("solde.php");
include("udelete.php");

if ($_GET["auth"] == 1)
{
	$_SESSION["login"] = NULL;
	$_SESSION["key"] = NULL;
	$_SESSION["solde"] = NULL;
	$_SESSION["auth"] = NULL;
	$_SESSION["time"] = NULL;
	$_SESSION["lvl"] = NULL;
	
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>RUSH00</title>
    </head>
    
    <body>

        <div id="bloc_page">
            <header>                
                <nav>
                    <ul>
                        <div class="t1"><li><a href="index.php" style="padding-left:5px;top:10px;">Accueil</a></li></div>
                        <div class="t1"><li><a href="index.php?page=add">Produits</a></li></div>
						<?php include("stat.php") ?>
						<li><a href="index.php?page=cart"><img src="images/panier.png" style="width:40px;right:100px;" /></a></li>
                    </ul>
                </nav>
            </header>
            
            <div id="banniere_image">
          
            </div>
            
            <section>
                <article>
                 
	 <?php include("page.php") ?>
                </article>
            </section>
            
            <footer>
               
            </footer>
        </div>
    </body>
</html>
