<?php
$ciudad = $_POST["ciudad"];
$tipo = $_POST["tipo"];
$pos = strpos($_POST["precio"],';');
(float)$precio1 = substr($_POST["precio"],0,$pos-1);
(float)$precio2 = substr($_POST["precio"],$pos+1,strlen($_POST["precio"]));
$ficheroTodos = file_get_contents("data-1.json");
$datosJSON = json_decode($ficheroTodos,true);
$resultados = array();
if (strlen($ciudad)>0 || strlen($tipo)>0){
    foreach($datosJSON as $obj){
        if (strlen($ciudad)>0 && strlen($tipo)>0){
            if ($obj['Ciudad'] == $_POST["ciudad"] && $obj['Tipo'] == $_POST["tipo"]){
                if (($obj['Precio'] >= '$'.$precio1) && ($obj['Precio'] <= '$'.$precio2) ){
                    $resultados[$obj['Id']]=$obj; 
                }
            }
        }elseif (strlen($ciudad)>0 && strlen($tipo)==0){
            if ($obj['Ciudad'] == $_POST["ciudad"]){
                if (($obj['Precio'] >= '$'.$precio1) && ($obj['Precio'] <= '$'.$precio2) ){
                    $resultados[$obj['Id']]=$obj; 
                }
            }
        }elseif (strlen($ciudad)==0 && strlen($tipo)>0){
            if ($obj['Tipo'] == $_POST["tipo"]){
                if (($obj['Precio'] >= '$'.$precio1) && ($obj['Precio'] <= '$'.$precio2 )){
                    $resultados[$obj['Id']]=$obj; 
                }
            }
        }
    }
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