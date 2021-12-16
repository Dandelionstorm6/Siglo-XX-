<?php
    include ('bd.php');
    include ('encabezados.php');
    $id=$_GET['id'];
        $query='Select *
                from evento where id_Evento="'.$id.'"';
        $result=bd_consulta($query);
        while($row=mysqli_fetch_assoc($result)){
            $nombre=$row['cliente'];
            $fechae=$row['fecha_E'];
            $telefono=$row['telefono'];
            $fechaini=$row['fecha_En'];
            $horario=$row['horario_En'];
            $lugar=$row['lugar_En'];
            $fechadev=$row['fecha_Dev'];
            $horario2=$row['horario_Dev'];

        }
        echo $id;

        $query1='select *
                from material as a 
                left join (select id_Renta,id_Evento,id_Material,cantidad as cant from renta where id_Evento="'.$id.'") as b
                on a.id_Material=b.id_Material';
        $result1=bd_consulta($query1);

    date_default_timezone_set("America/Mexico_City");
  
?>
       <script type="text/javascript" src="fecha.js"></script>

        <section id="seccion">


    <header id="header_form">______________________________________________________DATOS DEL CLIENTE Y EVENTO_____________________________________________________ </header>
    <form action="evento_actualiza.php" name="miformulario" id="miformulario" method="GET" >
        
        
         <div class="myField">
            <label for="nombre"> NOMBRE CLIENTE: </label>
            <input type="text" class="nombre" name="nombre" id="nombre"   
                value="<?php echo $nombre; ?>" required  > 
            <input type="text" name="id" id="id" value="<?php echo $id;?>" hidden>
        </div>
        <div class="myField">
            <label for="fechae"  > FECHA DEL EVENTO: </label>
            <input type="date" name="fechae" id="fechae" 
               value="<?php echo $fechae; ?>"
               onclick="saludar()" required  > 
            <label size="100"> </label>
            <label for="telefono"> TELEFONO: </label>
            <input type="text" name="telefono" id="telefono" placeholder="Teléfono"
                value="<?php echo $telefono; ?>" required  > 
        </div>  
      
      
        <div class="myField">
            <label for="fechaini"> FECHA DE ENTREGA: </label>
            <input type="date" name="fechaini" id="fechaini" value="<?php echo $fechaini; ?>" 
             onclick="saludar()"   required  > 
            <label size="100"> </label>
            <label for="horario1"> HORARIO </label>
            <input type="time" name="horario1" id="horario1"  
                value="<?php echo $horario; ?>" required  > 
        </div>   
      
       <div class="myField">
            <label for="lugar"> LUGAR DE ENTREGA: </label>
            <input type="text" class="lugar" name="lugar" id="lugar"   
                value="<?php echo $lugar; ?>" required  > 
        </div>      
        <div class="myField">
            <label for="fechadev"> DEVOLUCION: </label>
            <input type="date" name="fechadev" id="fechadev"  
                value="<?php echo $fechadev; ?>" required  > 
            <label size="100"> </label>
            <label for="horario2"> HORARIO </label>
            <input type="time" name="horario2" id="horario2"  
                value="<?php echo $horario2; ?>" required  >
        </div>
        <div class="pedido">
            <label > CANTIDAD </label>
            <label > ARTICULO </label>
            <label > </label>
            <label > CANTIDAD </label>
            <label > ARTICULO </label>

        </div>

        <?php
            for ($i=1;$row2=mysqli_fetch_assoc($result1);$i++){ 
            ?>
                


                <div class="material">
                    
                    <input type="text" name="cantidad<?php echo $i;?>" value="<?php echo $row2['cant'];?>" >   
                    <input type="text" name="cantidad2<?php echo $i;?>"  value="<?php echo $row2['cant'];?>" hidden>
                    <label  title="<?php echo $row2['cantidad'];?>" for="<?php echo $row2['nombre'];?>"> 
                        <?php echo $row2['nombre'];?>
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