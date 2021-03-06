
	<div class="table-responsive contenedor">
		
		<h2>Listado de los tipos de usuario</h2>
		 <?php if (!empty($types)): ?>

		<h5>Total de registros <span class="badge" style="color:#fff";><?php echo $usersCount; ?></span></h5>

		<a href="<?php echo APP_URL."/types/add/";?>" class="btn btn-info" ><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>  Agregar tipo usuario</a><br><br>
		<table class="table table-bordered table-hover table-success" id="table">
			<tr class="table-inverse">
				<th class="table-inverse">ID</th>
				<th>Type_name</th>
				<?php if ($_SESSION["type_name"]=="Administradores") {?>
				<th>Accion</th>
				<?php }else{}?>
			</tr>
			<?php foreach ($types as $type): ?>
			
			 <tr>
			 	<td><?php echo $type["types"]["id"]; ?> </td>
			 	<td><?php echo $type["types"]["name"]; ?> </td>
			 	<?php if ($_SESSION["type_name"]=="Administradores") {?>
			 		<td>
			 		<div class="btn-group">
			 			
			 	<?php echo $this->Html->link("Edit", array("controller"=>"types", "method"=>"edit", "arg"=>$type["types"]["id"]));?>	
			 	<?php echo $this->Html->linkDelete("Delete", array("controller"=>"types", "method"=>"delete", "arg"=>$type["types"]["id"]));?>
			 		
			 		</div>
			 	</td>
			 	<?php }else{ ?>
			 		
			 	<?php } ?>
			 </tr>
			<?php endforeach; ?>
			
		</table>
		<?php  endif; ?>
	</div>
