<?php
$ficheroTodos = file_get_contents("data-1.json");
$datosJSON = json_decode($ficheroTodos,true);
$resultados = array();
foreach($datosJSON as $obj){
    $resultados[$obj['Id']]=$obj; 
}
?>
    <div class="itemMostrado">
	<table width="100%" style="border: 1px solid #c8c8c8;" id="t01" cellspacing="0" cellpadding="0">            
        <thead>
              <tr>
                <th align="left" class="table_header">Dirección</th>
                <th align="left" class="table_header">Ciudad</th>
                <th align="left" class="table_header">Teléfono</th>
                <th align="left" class="table_header">Código postal</th>
                <th align="left" class="table_header">Tipo</th>
                <th align="right" class="table_header">Precio</th>
              </tr>                       
        </thead>
        <tbody id="tblBdy">                   
                <?php     
                foreach($resultados as $obj){
                ?> 
                     <tr>
                       <td><?php echo $obj['Direccion']; ?></td>
                       <td><?php echo $obj['Ciudad']; ?></td>
                       <td><?php echo $obj['Telefono']; ?></td>
                       <td><?php echo $obj['Codigo_Postal']; ?></td>
                       <td><?php echo $obj['Tipo']; ?></td>
                       <td align="right" ><?php echo $obj['Precio']; ?></td>
                     </tr>
                <?php
                }
                ?>
        </tbody>             
        </table>
    </div>    
    