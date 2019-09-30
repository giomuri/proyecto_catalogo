<?php foreach ($res as $item): ?>
<h1>Actualizar Producto</h1>
<div class="box box-primary">
  <div class="box-body">
	<div class="col-sm-4">
	  <div class="box box-primary">
	    <form method="post" action="<?php echo base_url();?>cproducto/actualizarProducto" method="POST" enctype="multipart/form-data">
	      <table class="table table-bordered table-striped" style="width: 332	px">
			<thead>
              <tr>
		        <th style="width: 25px;background-color: #006699; color: white;">ID</th>
		        <th style="background-color: #006699; color: white;"><input type="text" name="txtId" readonly="readonly" value="<?php echo $item->idProducto;?>" style="width: 220px;background-color: white; color: black;" ></th>
			  </tr>
			  <tr>
		        <th style="width: 25px;background-color: #006699; color: white;">Nombre</th>
		        <th style="background-color: #006699; color: white;"><input type="text" name="txtNombre" value="<?php echo $item->nombre;?>" style="width: 220px;background-color: white; color: black;" ></th>
			  </tr>
              <tr>
		        <th style="width: 25px;background-color: #006699; color: white;">Descripcion</th>
		        <th style="background-color: #006699; color: white;"><input type="text" name="txtDesc" value="<?php echo $item->descripcion;?>" style="width: 220px;background-color: white; color: black;" ></th>
			  </tr>
              <tr>
		        <th style="width: 25px;background-color: #006699; color: white;">Peso (Kg)</th>
		        <th style="background-color: #006699; color: white;"><input type="text" name="txtPeso" value="<?php echo $item->peso;?>" style="width: 220px;background-color: white; color: black;" ></th>
			  </tr>
              <tr>
		        <th style="width: 25px;background-color: #006699; color: white;">USD</th>
		        <th style="background-color: #006699; color: white;"><input type="text" name="txtUSD" value="<?php echo $item->precioUSD;?>" style="width: 220px;background-color: white; color: black;" ></th>
			  </tr>
              <tr>
		        <th style="width: 25px;background-color: #006699; color: white;">Categoria</th>
		        <th style="background-color: #006699; color: white;"><input type="text" name="txtCatego" value="<?php echo $item->categoria;?>" style="width: 220px;background-color: white; color: black;" ></th>
			  </tr>
			  <tr>
			    <th style="width: 25px;background-color: #006699; color: white;">Cargar Imagen</th>
			    <th style="background-color: #006699; color: white;"><input type="file" name="fileImagen" value="" style="width: 220px;background-color: white; color: black;" ></th>
			  </tr>
			</thead>
		    <tbody>	
		    </tbody>
		  </table>
		  <input type="submit" value="Guardar" class="btn btn-primary btn-lg btn-block btn-success">
		</form>
	  </div>
	  <a class="btn btn-primary btn-lg btn-block btn btn-danger" href="<?php echo base_url('cproducto');?>">Cancelar</a>
	</div>
  </div>
</div>
<?php endforeach; ?>