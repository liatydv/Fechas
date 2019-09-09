<?PHP
class grafica {
public function script(){

    $con = mysqli_connect("localhost","root","","fechas");




$a = mysqli_query($con, "SELECT (fefut - feact)+ 79 as op , (feact - fein)- 79 as opp,  (fefut - fein) as oppp
from calculo
where id = 1");
$mf=mysqli_fetch_array($a);
$vivos= $mf['op'];
$muertos= $mf['opp'];
$total= $mf['oppp'];

$con ->close();

 

  ?>
    <script src="code/highcharts.js"></script>
    <script src="code/modules/venn.js"></script>
    <script src="code/modules/exporting.js"></script>
    
    
    <div id="containerr"></div>
    
    
            <script type="text/javascript">
    Highcharts.chart('containerr', {
        series: [{
            type: 'venn',
            data: [{
                sets: ['A'],
                value: <?php echo $vivos?> ,
                name: 'Personas Vivas',
                description: 'De la fecha  de inicio ala fecha de futura existen ' +  <?php echo $vivos ?> +' vivas'
            }, {
                sets: ['B'],
                value: <?php echo $muertos?> ,
                name: 'Personas muertas',
                description: 'De la fecha  de inicio ala fecha de futura existen ' +  <?php echo $muertos ?> +' muertos'
     
            }, {
                sets: ['A', 'B'],
                value: <?php echo $total?> 

            }]
        }],
        tooltip: {
            headerFormat:
                '<span style="color:{point.color}">\u2022</span> ' +
                '<span style="font-size: 14px"> {point.point.name}</span><br/>',
            pointFormat: '{point.description}<br><span style="font-size: 10px"></span>'
        },
        title: {
            text: 'Grafica de personas muertas y vivas'
            
        }
    });
    
            </script>
<?php
echo "Siendo un total de $total personas";
}
}
?>

