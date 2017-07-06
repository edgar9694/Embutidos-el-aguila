<?php
switch ($class) {
	////////////////////////////////////////////////////////////////////////////////////////////////
	case 'blog_posts':
	?>
					<div class="form-group">
						<label for="Title">t&iacute;tulo</label>
						<input type="text" name="postTitle" class="form-control" >
					</div>
					<div class="form-group">
						<label for="Description">Descripci&oacute;n</label>
						<textarea class="textarea" name="postDesc" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
					<div class="form-group">
						<label for="Description">Contenido</label>
						<textarea class="textarea" name="postCont" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>
					<div class="form-group">
						<label for="Categories">Categorias</label>
						<?php
							$checked = null;
							$stmt2 = $db->query('SELECT catID, title FROM blog_cats ORDER BY title');
							while($row2 = $stmt2->fetch()){
							if(isset($_POST['catID'])){
							if(in_array($row2['catID'], $_POST['catID'])){
													 $checked="checked='checked'";
												}else{
													 $checked = null;
												}
							}
		echo '<div>
						<input type="checkbox" class="minimal" name="catID[]" value="'.$row2['catID'].'"  $checked> '.$row2['title'].'
					</div>';
		}
		?>
					</div>
					<input type="hidden" name="class" value="blog_posts">';
		<?php
		break;
		////////////////////////////////////////////////////////////////////////////////////////
		/*
		case 'blog_cats':

			echo '<div class="form-group">
						<input type="text" name="title" class="form-control">
						</div>
						<input type="hidden" name="class" value="blog_cats">';
			break;
			*/
		////////////////////////////////////////////////////////////////////////////////////////
		case 'recetas':
		?>
					<div class="form-group col-sm-6" style="padding-left:0">
						<label>T&iacute;tulo</label>
						<input class="form-control" placeholder="Nombre de la Receta" type="text" name="titulo" required>
					</div>
					<div class="form-group col-sm-6" >
						<label for="CantComensales">Tiempo de preparaci&oacute;n</label>
						<div class="input-group">
								<input type="number" class="form-control" name="hr" placeholder="00" required>
                <span class="input-group-addon">Horas</span>
                <input type="number" class="form-control" name="mn" placeholder="00" required>
								<span class="input-group-addon">minutos</span>
              </div>
					</div>
					<div class="form-group">
						<label>Descripci&oacute;n de la receta</label>
						<textarea class="textarea" name="descripcion" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
					</div>
					<div class="form-group">
						<label>Preparaci&oacute;n e ingredientes</label>
						<textarea class="textarea" name="preparacion" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
					</div>
					<hr>
					<div class="kv-main">
						<div class="form-group">
								<label>Imagenes</label>
								<input id="file-3" type="file" name="img[]" multiple=true>
						</div>
					</div>
					<input type="hidden" name="class" value="recetas">
			<?php
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'galeria':
		?>
						<div class="form-group">
							<label>T&iacute;tulo</label>
							<input class="form-control" placeholder="" type="text" name="titulo" >
						</div>
						<div class=" kv-main">
							<div class="form-group">
									<label>Imagenes</label>
									<input id="file-3" type="file" name="img[]" multiple=true>
							</div>
						</div>
						<div class="form-group">
							<label>Categorias</label>
							<?php
								$checked = null;
								$stmt2 = $db2->query('SELECT id,title FROM categoria ORDER BY title');
								while($row2 = $stmt2->fetch()){
								if(isset($_POST['catID'])){
								if(in_array($row2['catID'], $_POST['catID'])){
														 $checked="checked='checked'";
													}else{
														 $checked = null;
													}
								}
									echo '<div>
													<input type="checkbox" name="catID[]" class="minimal" value="'.$row2['id'].'"  $checked> '.$row2['title'].'
												</div>';
								}
								?>
			 			</div>
			<?php
			break;
	  ////////////////////////////////////////////////////////////////////////////////////////
		/*
		case 'categoria':
			echo '<div class="form-group">
							<label for="Title">t&iacute;tulo</label>
							<input id="titulo" type="text" name="titulo" class="form-control">
							<p class="help-block" id="respuesta"></p>
						</div>
						<input type="hidden" id="class" name="class" value="categoria">';
			break;
			*/
		////////////////////////////////////////////////////////////////////////////////////////
		case 'usuarios':

			break;
		////////////////////////////////////////////////////////////////////////////////////////

	default:
		echo "Lo sentimos No existe el contenido solicitado";
		break;
}




 ?>
