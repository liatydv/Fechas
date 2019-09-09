<?php
include("grafica.php");
$consulta = new grafica();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Grafico</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <style type="text/css">
#containerr {
	min-width: 320px;
	max-width: 600px;
	height: 400px;
	margin: 0 auto;
}
		</style>
	</head>
    
	<body class="homepage is-preload">
        <br>
  <center>
<?php
$con = mysqli_connect("localhost","root","","fechas");

$feIni = $_POST['FeIni'];
 $ano = substr($feIni, -10, 4);
 $mes = substr($feIni, -5, 2);
 $dia = substr($feIni, -2, 2);

 $Feact = $_POST['FeAct'];
 $anoo = substr($Feact, -10, 4); 
 $mess = substr($Feact, -5, 2);
 $diaa = substr($Feact, -2, 2);

 $FeFut = $_POST['FeFut'];
 $anooo = substr($FeFut, -10, 4);
 $messs = substr($FeFut, -5, 2);
 $diaaa = substr($FeFut, -2, 2);

 $valida=$anoo-$ano;

if($valida<80){
    ?>
     <h2> Se deven tener minimo de 80 <br> años de diferencia entre  <br> las fechas de Inicio y  <br> actual </h2> 
     
     <input type="button" value="Regresar"  onclick="window.location.href='index.html'">	
    
     <?php
} else {
 $sql= "UPDATE calculo SET fein='$ano' ,feact='$anoo', fefut='$anooo'  WHERE id = 1 ";

if ($con->query($sql) === TRUE) {

    $consulta->script();?>
    <br><br>
    <input type="button" value="Regresar"  onclick="window.location.href='index.html'">	
   <?php
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con ->close();
}
 
?>
</div>
</center>			
    <div id="copyright" class="container">
                  
             &copy; Fernando Carlos Popoca
                                
                            </div>
                        </section>
        
                </div>
        
                <!-- Scripts -->
                    <script src="assets/js/jquery.min.js"></script>
                    <script src="assets/js/jquery.dropotron.min.js"></script>
                    <script src="assets/js/browser.min.js"></script>
                    <script src="assets/js/breakpoints.min.js"></script>
                    <script src="assets/js/util.js"></script>
                    <script src="assets/js/main.js"></script>
        
            </body>
        </html>