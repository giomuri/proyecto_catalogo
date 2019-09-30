<?php foreach ($res as $item): ?>
<h1 align="center" style="background-color: #006699; color: white;">Foto <?php echo $item->ruta;?></h1>
<div class="box box-primary">
  <div class="box-body">
	<div class="col-sm-7">
	  <div class="box box-primary">
	    <form method="post" action="<?php echo base_url(); ?>cimagen/actualizarImagen">
	      <table class="table table-bordered table-striped" style="width: 319px">
			<tr>  
		      <th>
				<td><img style="width: 535px; height: 400px; " src="<?=base_url()?>uploads/imagenes/thumbs/<?php echo $item->ruta;?>" /></td>
			  </th>
			</tr>
			  <?php endforeach; ?>
		  </table>
		</form>
	  </div>
	  <a class="btn btn-primary btn-lg btn-block btn btn-danger" href="<?php echo base_url('cimagen');?>">Atras</a>
	</div>
  </div>
</div>