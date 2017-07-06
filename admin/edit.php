<?php
switch ($class) {
	////////////////////////////////////////////////////////////////////////////////////////////////
	case 'blog_posts':

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT postID, postTitle, postDesc, postCont FROM blog_posts_seo WHERE postID = :postID') ;
			$stmt->execute(array(':postID' => $_GET['id']));
			$row = $stmt->fetch();

		} catch(PDOException $e) {
				echo $e->getMessage();
		}

		echo '<div class="form-group">
						<input type="hidden" name="postID" value="'.$row['postID'].'">
						<label for="Title">t&iacute;tulo</label>
						<input type="text" name="postTitle" class="form-control" value="'.$row['postTitle'].'">
					</div>
					<div class="form-group">
						<label for="Description">Descripci&oacute;n</label>
						<textarea class="textarea" name="postDesc" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'.$row['postDesc'].'</textarea>
					</div>
					<div class="form-group">
						<label for="Description">Contenido</label>
						<textarea class="textarea" name="postCont" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'.$row['postCont'].'</textarea>
					</div>
					<div class="form-group">
						<label for="Categories">Categorias</label>';
						$stmt2 = $db->query('SELECT catID, title FROM blog_cats ORDER BY title');
							while($row2 = $stmt2->fetch()){

						$stmt3 = $db->prepare('SELECT catID FROM blog_post_cats WHERE catID = :catID AND postID = :postID') ;
						$stmt3->execute(array(':catID' => $row2['catID'], ':postID' => $row['postID']));
						$row3 = $stmt3->fetch();

						if($row3['catID'] == $row2['catID']){
							$checked = 'checked=checked';
						} else {
							$checked = null;
						}
		echo '<div>
						<input type="checkbox" class="minimal" name="catID[]" value="'.$row2['catID'].'"  '.$checked.'> '.$row2['title'].'
					</div>';
		}
		echo '</div><input type="hidden" name="class" value="blog_posts">';

		break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'blog_cats':

			echo '<div class="form-group">
						<input type="text" name="title" class="form-control">
						</div>
						<input type="hidden" name="class" value="blog_cats">';
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'recetas':
		require("conectDB.php");
		$query = mysqli_query($conn,"SELECT * FROM recetas where id='$id'" );
				if (!$query)
				{
				      echo("Error description: " . mysqli_error($conn));
				}
				while ($row = mysqli_fetch_row($query))
				{
							$id=$row[0];
							$title=$row[1];
							$desc=$row[2];
							$ing=$row[3];
				      $level=$row[4];
				      $locations=$row[5];
				      $diners=$row[6];
				      $prep=$row[7];
				      $url=$row[8];
				      $tags=$row[9];

						}
				    $imgs = explode(";",$locations);





		echo '<input type="hidden" name="id" value="<?php echo $id ?>">
						<div class="form-group">
              <label>T&iacute;tulo</label>
              <input class="form-control" value="'.$title.'" type="text" name="title" required>
            </div>
						<div class="form-group">
              <label>Descripci&oacute;n de la receta</label>
              <textarea class="textarea" name="descripcion" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
								'.$desc.'
							</textarea>
            </div>
						<div class="form-group">
							<label>Instrucciones para preparar la receta</label>
							<textarea class="textarea" name="preparacion" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>'.$ing.'</textarea>
						</div>
						<div class="form-group">
	            <label for="Level">Dificultad de la Receta</label>
	            <div>
	             	<select class="form-control" name="level" value="'.$level.'">
	                <option value="facil">Facil</option>
	                <option value="intermedio">Intermedio</option>
	                <option value="dificil">Dificil</option>
	              </select>
	            </div>
	        	</div>
						<div class="form-group" style="margin-top:30px">
					    <label for="CantComensales">Cantidad de Comensales</label>
					    <div>
					      <input type="number" class="form-control" name="comensales" value="'.$diners.'" required>
					    </div>
					  </div>
						<div class="form-group" style="margin-top:30px">
					    <label for="CantComensales">Tiempo de preparaci&oacute;n <p class="help-block">
									colocar tiempo en minutos
								</p></label>
					    <div >
					      <input type="number" class="form-control" name="tiempo" value="'.$prep.'" required>
					    </div>
					  </div>
						<div class="form-group">
							<label>Video de Preparaci&oacute;n</label>
							<input class="form-control" value="'.$url.'"  type="text" name="video" >
						</div>
						<div class="form-group">
							<hr>
							<label>Etiquetas</label>
							<input type="text" class="form-control" name="etiquetas" data-role="tagsinput"  value="'.$tags.'">
						</div>
						  <input type="hidden" name="locations" value="'.$locations.'">
						<div class=" kv-main">
							<div class="form-group">
									<label>Imagenes</label>
									<input id="file-3" type="file" name="img[]" accept="image/*" multiple=true>
							</div>
						</div>
					<input type="hidden" name="class" value="recetas">';
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'galeria':
			echo '<div class="form-group">
							<label>T&iacute;tulo</label>
							<input class="form-control" placeholder="" type="text" name="titulo" >
						</div>
						<div class="form-group">
							<label>Descripci&oacute;n </label>
							<textarea class="textarea" name="descripcion" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
						</div>
						<div class=" kv-main">
							<div class="form-group">
									<label>Imagenes</label>
									<input id="file-3" type="file" name="img[]" accept="image/*" multiple=true>
							</div>
						</div>
						<div class="form-group">
							<label>Categorias</label>';
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
													<input type="radio" name="catID[]" class="minimal" value="'.$row2['id'].'"  $checked> '.$row2['title'].'
												</div>';
								}
			echo '</div>
						<div class="form-group">
							<label>Etiquetas</label>
							<input type="text" class="form-control" name="etiquetas" data-role="tagsinput">
						</div>';

			break;
	  ////////////////////////////////////////////////////////////////////////////////////////
		case 'categoria':
			echo '<div class="form-group">
							<label for="Title">t&iacute;tulo</label>
							<input id="titulo" type="text" name="titulo" class="form-control">
							<p class="help-block" id="respuesta"></p>
						</div>
						<input type="hidden" id="class" name="class" value="categoria">';
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'usuarios':

			break;
		////////////////////////////////////////////////////////////////////////////////////////

	default:
		echo "Lo sentimos No existe el contenido solicitado";
		break;
}




 ?>
