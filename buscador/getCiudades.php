<?php
$ficheroCiudades = file_get_contents("data-1.json");
$datosJSON = json_decode($ficheroCiudades,true);
$resultados = array();
foreach($datosJSON as $obj){
    $resultados[$obj['Ciudad']]=$obj; 
}
?>
    <div class="filtroCiudad input-field" id="ciudad">
    <select name="ciudad" id="selectCiudad">
        <option value = "" selected></option>
    <?php              
         foreach($resultados as $obj){
    ?>  
          <option value="<?php echo $obj['Ciudad'];?>"><?php echo $obj['Ciudad'];?></option>
    <?php
         }
    ?>
    </select>                        
    </div>    
    