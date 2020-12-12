<?php
session_start();
$connect = mysqli_connect("localhost","root","","shop");

?>
<!DOCTYPE html>

<html>   
<head>
<title>Shopping Cart</title>
<link rel="stylesheet" href="style.css">
<script src="https//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"> </script>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
</head>
<body>
	
	<div class="side-menu" id="side-menu">
<ul>
    <a href="index.html"><li>Home</li></a>
    
<li>Magazin<i class="fa fa-angle-right"></i>
   <ul>
       <a href="femei.html"><li>Femei</li></a>
       <a href="barbati.html"><li>Bărbați</li></a>
    </ul>
</li>
    <a href="mission.html"><li>Despre proiect</li></a>
    <a href="vot.html"><li>Despre vot</li></a>
    <a href="contact.html"><li>Contact</li></a>
</ul>
</div>
	
<?php
$query = "SELECT *FROM products ORDER BY id ASC";
$result = mysqli_query($connect,$query);
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_array($result))
{
?>
	<div class="col-md-4">
	<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
		  <div style ="border:1px solid #333; background-color:#f1f1f1;">
			  <img src="<?php echo $row["picture"]; ?>" class="img-responsive" /><br/>
			  <h4 class="text-info"><?php echo $row["name"];?></h4>
			  <h4 class="text-danger">$ <?php echo $row["price"];?></h4>
			  <input type="text" name="Cantitate" class="form-control" value="1"/>
			  <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
			  <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success" value="Adauga in cos"/>
		</div>																	
	</form>
	
	</div>
<?php
																			
}
}
?>	
	
<!---------------------Footer------------------->
    <section class="footer">
    <div class="container tex-center">
        <div class="row">
        <div class="col-md-3">
        <h1>Link-uri utile</h1>
            <a href="politica.pdf"><p>Politica de confidențialitate</p></a>
            <a href="termeni.pdf"><p>Termeni și condiții</p></a>
            <a href="retur.pdf"><p>Politica de returnare</p></a>
            </div>
            
        <div class="col-md-3">
        <h1>Contact</h1>
        <p>Str. Baba Novac, Nr. 10, București, Sector 3</p>
        <p>0749090545</p>
        <p>homeawayconcept@gmail.com</p>
            </div>
            
        <div class="col-md-3">
        <h1>Urmărește-ne</h1>
            <a href="https://www.facebook.com/TotiVotam/"><p><i class="fa fa-facebook-official"></i> Facebook</p></a>
            <a href="https://www.instagram.com/?hl=ro"><p><i class="fa fa-instagram"></i> Instagram</p></a>
            </div>
        <div class="col-md-3 footer-image">
            <img src="logo.png">
        </div>
        </div>
        <hr>
        <p class="copyright">Conținutul acestui site este protejat de drepturile de autor</p>
        </div>
        
        </section>
    
             
             
    <script>
        function openmenu()
        {
            document.getElementById("side-menu").style.display="block";
            document.getElementById("menu-btn").style.display="none";
            document.getElementById("close-btn").style.display="block";
        }
        function closemenu()
        {
            document.getElementById("side-menu").style.display="none";
            document.getElementById("menu-btn").style.display="none";
            document.getElementById("close-btn").style.display="none";
        }
    </script>
	
    

    
    
    </body>