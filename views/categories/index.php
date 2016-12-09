
	<div class="table-responsive contenedor">
		
		<h2>Listado de categorias</h2>
		 <?php if (!empty($categories)): ?>

		<h5>Total de registros <span class="badge" style="color:#fff";><?php echo $categoriesCount; ?></span></h5>

		<a href="<?php echo APP_URL."/categories/add/";?>" class="btn btn-info" ><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>  Agregar categoria</a><br><br>
		<table class="table table-bordered table-hover table-success" id="table">
			<tr class="table-inverse">
				<th class="table-inverse">ID</th>
				<th>Type Category</th>
				<?php if ($_SESSION["type_name"]=="Administradores") {?>
				<th>Accion</th>
				<?php }else{}?>
			</tr>
			<?php foreach ($categories as $category): ?>
			
			 <tr>
			 	<td><?php echo $category["categories"]["id"]; ?> </td>
			 	<td><?php echo $category["categories"]["name"]; ?> </td>
			 	<?php if ($_SESSION["type_name"]=="Administradores") {?>
			 		<td>
			 		<div class="btn-group">
			 			
			 	<?php echo $this->Html->link("Edit", array("controller"=>"categories", "method"=>"edit", "arg"=>$category["categories"]["id"]));?>	
			 	<?php echo $this->Html->linkDelete("Delete", array("controller"=>"categories", "method"=>"delete", "arg"=>$category["categories"]["id"]));?>
			 		
			 		</div>
			 	</td>
			 	<?php }else{ ?>
			 		
			 	<?php } ?>
			 </tr>
			<?php endforeach; ?>
			
		</table>
		<?php  endif; ?>
	</div>
