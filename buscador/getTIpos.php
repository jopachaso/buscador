<?php
$ficheroTipos = file_get_contents("data-1.json");
$datosJSON = json_decode($ficheroTipos,true);
$resultados = array();
foreach($datosJSON as $obj){
    $resultados[$obj['Tipo']]=$obj; 
}
?>
    <div class="filtroTipo input-field" id="tipo">
    <select name="tipo" id="selectTipo">
        <option value="" selected></option>
    <?php              
         foreach($resultados as $obj){
    ?>  
          <option value="<?php echo $obj['Tipo'];?>"><?php echo $obj['Tipo'];?></option>
    <?php
         }
    ?>
    </select>                        
    </div>    
    