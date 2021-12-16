<?php
    include ('bd.php');
    include ('encabezados.php');
   
        $query='Select *
                from material';
        $result=bd_consulta($query);

    date_default_timezone_set("America/Mexico_City");
  
?>
       <script type="text/javascript" src="fecha.js"></script>

        <section id="seccion">


    <header id="header_form">______________________________________________________DATOS DEL CLIENTE Y EVENTO_____________________________________________________ </header>
    <form action="formulario_procesa.php" name="miformulario" id="miformulario" method="GET" >
        
        
         <div class="myField">
            <label for="nombre"> NOMBRE CLIENTE: </label>
            <input type="text" class="nombre" name="nombre" id="nombre"   
                value="" required  > 
        </div>
        <div class="myField">
            <label for="fechae"  > FECHA DEL EVENTO: </label>
            <input type="date" name="fechae" id="fechae" min="<?php echo date('Y-n-j'); ?>"
               value="<?php echo date('Y-n-j'); ?>"
               onclick="saludar()" required  > 
            <label size="100"> </label>
            <label for="telefono"> TELEFONO: </label>
            <input type="text" name="telefono" id="telefono" placeholder="Teléfono"
                value="" required  > 
        </div>  
      
      
        <div class="myField">
            <label for="fechaini"> FECHA DE ENTREGA: </label>
            <input type="date" name="fechaini" id="fechaini"  min="<?php echo date('Y-n-j'); ?>"
             onclick="saludar()"   required  > 
            <label size="100"> </label>
            <label for="horario1"> HORARIO </label>
            <input type="time" name="horario1" id="horario1"  
                value="" required  > 
        </div>   
      
       <div class="myField">
            <label for="lugar"> LUGAR DE ENTREGA: </label>
            <input type="text" class="lugar" name="lugar" id="lugar"   
                value="" required  > 
        </div>      
        <div class="myField">
            <label for="fechadev"> DEVOLUCION: </label>
            <input type="date" name="fechadev" id="fechadev"  
                value="" required  > 
            <label size="100"> </label>
            <label for="horario2"> HORARIO </label>
            <input type="time" name="horario2" id="horario2"  
                value="" required  >
        </div>
        <div class="pedido">
            <label > CANTIDAD </label>
            <label > ARTICULO </label>
            <label > </label>
            <label > CANTIDAD </label>
            <label > ARTICULO </label>

        </div>

        <?php
            for ($i=1;$row=mysqli_fetch_assoc($result);$i++){ 
            ?>



                <div class="material">
                    
                    <input type="text" name="cantidad<?php echo $i;?>" placeholder="<?php echo $row['nombre'];?>" >      
                    <label  title="<?php echo $row['cantidad'];?>" for="<?php echo $row['nombre'];?>"> 
                        <?php echo $row['nombre'];?>
                    </label>
                   

                  
           
                </div>






         
        <?php } ?>

       
        <div class="myField">  
            <label >  </label>  
            <input type="submit" class="formButton" value="Enviar" autofocus>
            <input type="reset" class="formButton" value="Cancelar" >
        </div>   
    </form>  
    
    
        
        
        </section>
        <section id="seccion_autenticar">       

        </section>  
  
        <footer id="pie">
            Derechos Reservados &copy; 2019 por la tarde
        </footer>
      

    </div>
  
    </body>
</html>
