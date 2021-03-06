	<div class="table-responsive contenedor">
		
		<h2>Listado de cuentas</h2>
		 <?php if (!empty($accounts)): ?>

		<h5>Total de registros <span class="badge" style="color:#fff";><?php echo $accountsCount; ?></span></h5>

		<a href="<?php echo APP_URL."/accounts/add/";?>" class="btn btn-info" ><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>  Agregar cuenta</a><br><br>
		<table class="table table-bordered table-hover table-success" id="table">
			<tr class="table-inverse">
				<th class="table-inverse">ID</th>
				<th class="table-inverse">name User</th>
				<th class="table-inverse">name Account</th>
				<?php if ($_SESSION["type_name"]=="Administradores") {?>
				<th>Accion</th>
				<?php }else{}?>
			</tr>
			<?php foreach ($accounts as $account): ?>
			
			 <tr>
			 	<td><?php echo $account["accounts"]["id"]; ?> </td>
			 	<td><?php echo $account["users"]["username"]; ?> </td>
			 	<td><?php echo $account["accounts"]["name"]; ?> </td>
			 	<?php if ($_SESSION["type_name"]=="Administradores") {?>
			 		<td>
			 		<div class="btn-group">
			 			
			 	<?php echo $this->Html->link("Edit", array("controller"=>"accounts", "method"=>"edit", "arg"=>$account["accounts"]["id"]));?>	
			 	<?php echo $this->Html->linkDelete("Delete", array("controller"=>"accounts", "method"=>"delete", "arg"=>$account["accounts"]["id"]));?>
			 		
			 		</div>
			 	</td>
			 	<?php }else{ ?>
			 		
			 	<?php } ?>
			 </tr>
			<?php endforeach; ?>
			
		</table>
		<?php  endif; ?>
	</div>
