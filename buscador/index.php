<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>  
</head>

<body>
 

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Buscador</h1>
    </div>
    <div class="colFiltros">
      <form id="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Realiza una búsqueda personalizada</h5>
          </div>
          <div class="filtroCiudad input-field" id="ciudad">
            <label for="selectCiudad">Ciudad:</label></br>
            <select name="ciudad" id="selectCiudad">
              <option value = "" selected></option>
            </select>
          </div>
          <div class="filtroTipo input-field" id="tipo">
            <label for="selecTipo">Tipo:</label><br>
            <select name="tipo" id="selectTipo">
              <option value="" selected></option>

            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="button"  class="btn white" value="Buscar" id="submitButton">
            <button type="button" class="btn green" name="limpiar" value="Cancelar" id="limpiarTodo">Cancelar</button>
          </div>
            
        </div>
      </form>
    </div>

    <div class="colContenido">
      <div class="tituloContenido card">
        <h5>Resultados de la búsqueda:</h5>
        <div class="itemMostrado">
            <div class="itemMostrado"  id="itemMostrado">
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
        </div>    
        <div class="divider"></div>
        <button type="button" name="todos" class="btn-flat waves-effect" id="mostrarTodos">Mostrar Todos</button>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery-3.0.0.js"></script>
  <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript">
                $(document).ready(function() {
                    $.ajax({
                            type: "POST",
                            url: "getCiudades.php",
                            success: function(response)
                            {
                                $('#selectCiudad').html(response).fadeIn();
                            }
                    });
                     $.ajax({
                            type: "POST",
                            url: "getTipos.php",
                            success: function(response)
                            {
                                $('#selectTipo').html(response).fadeIn();
                            }
                    });
                    
                    $("#mostrarTodos").click(function()
                    { 
                            $.ajax( 
                            { 
                                type: "POST", 
                                url: "getTodos.php", 
                                success: function(mensaje){ 
                                        $('#itemMostrado').html(mensaje).fadeIn();
                                }
                            }); 
                    });//Fin de función onClick   

                    $("#limpiarTodo").click(function()
                    { 
                            $.ajax( 
                            { 
                                type: "POST", 
                                url: "getLimpiar.php", 
                                success: function(mensaje){ 
                                        $('#itemMostrado').html(mensaje).fadeIn();
                                }
                            }); 
                    });//Fin de función onClick   

                    $("#submitButton").click(function()
                    { 
                        var ciudad,tipo,precio; 
                        ciudad = $("#selectCiudad").val(); 
                        tipo = $("#selectTipo").val(); 
                        precio = $("#rangoPrecio").val();
                        var parametros = {"ciudad" : ciudad , "tipo" : tipo , "precio" : precio};
                        $.ajax( 
                        { 
                           type: "POST", 
                           url: "buscador.php", 
                           data: parametros,
                           success: function(mensaje){ 
                                   $('#itemMostrado').html(mensaje).fadeIn();
                             }
                        }); 
                    });//Fin de función onClick de parámetros ciudad,tipo,precio
                    
                });
                
 </script>
</body>
</html>
