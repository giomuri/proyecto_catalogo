
	<div class="box box-primary">
		<div class="box-body">
		<div class="col-sm-10">
	    	<!-- <div class="box box-primary"> -->
	    	<table id="tblPersonas" class="table table-bordered table-striped">
			    <thead>
				    <tr>
				      <th style="width: 5%;background-color: #006699; color: white;">#</th>
				      <th style="width: 10%;background-color: #006699; color: white;">Nombre</th>
				      <th style="width: 10%;background-color: #006699; color: white;">Descripcion</th>
				      <th style="width: 10%;background-color: #006699; color: white;">peso</th>
                      <th style="width: 10%;background-color: #006699; color: white;">USD</th>
                      <th style="width: 10%;background-color: #006699; color: white;">Categoria</th>
                      <th style="width: 10%;background-color: #006699; color: white;">Foto</th>
                      <th style="width: 10%;background-color: #006699; color: white;">Accion</th>
				    </tr>
			    </thead>
			    <tbody>
			    	<?php $i=0; ?>
			    	<?php foreach ($res as $item): ?>
			    		<?php 
			    			$id = $item->idProducto;
			    			$i++; 

			    		?>
			    	<tr>
			            <th><?php echo $i;?></th>
			            <th><?php echo $item->nombre;?></th>
                        <th><?php echo $item->descripcion;?></th>
                        <th><?php echo $item->peso;?></th>
                        <th><?php echo $item->precioUSD;?></th>
                        <th><?php echo $item->categoria;?></th>
			            <th><img src="<?=base_url()?>uploads/imagenes/thumbs/<?php echo $item->foto;?>" /></th>
			            <th>
			            	<!--<a class="btn btn-default" href="<?php echo base_url('cproducto/verProductoId/'.$id);?>"><i class="glyphicon glyphicon-eye-open"></i></a>-->
			            	<a class="btn btn-default" href="<?php echo base_url('cproducto/eliminarProducto/'.$id);?>"><i class="glyphicon glyphicon-trash"></i></a>

			            	<a class="btn btn-default" href="<?php echo base_url('cproducto/getProductoId/'.$id);?>"><i class="glyphicon glyphicon-pencil"></i></a>
			            </th>
			        </tr>
			         <?php endforeach; ?>
			    </tbody>
			  </table>

			<!-- </div> -->
		</div>
		<div class="col-sm-2"><span class='label label-warning' id="spSuma"></span></div>
		</div>
	</div>

	<a class="btn btn-success" href="<?php echo base_url('cproducto/addProducto');?>"><i class="glyphicon glyphicon-plus"></i> &nbsp;Agregar</a>

