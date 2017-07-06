<?php
switch ($class) {
	////////////////////////////////////////////////////////////////////////////////////////////////
	case 'blog_posts':
	try {
		 	$stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts ORDER BY postID DESC');
		  while($row = $stmt->fetch()){
			echo '<tr>
						<td style="text-align:center">'.$row['postTitle'].'</td>
						<td style="text-align:center">'.date('jS M Y', strtotime($row['postDate'])).'</td>
						<td style="text-align:center">
						<a href="admin_edit.php?class=blog_posts&id='.$row['postID'].'">Editar</a>
						</td>
						<td style="text-align:center">
						<input type="checkbox" class="minimal" check name="seleccion[]" value='.$row['postID'].'>
						</td>
						</tr>';
			}
	} catch(PDOException $e) {
			 echo $e->getMessage();
	}
		break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'blog_cats':
		try {
			$stmt = $db->query('SELECT catID, title, catSlug FROM blog_cats ORDER BY title DESC');
			while($row = $stmt->fetch()){
				echo '<tr>
							<td style="text-align:center">'.$row['title'].'</td>
							<td style="text-align:center">
								<a href="admin_list.php?class=blog_cats&id='.$row['catID'].'&status=editar">Editar</a>
							</td>
							<td style="text-align:center">
							<input type="checkbox" class="minimal" check name="seleccion[]" value='.$row['catID'].'>
							</td>
							</tr>
							</tr>';
			}
		} catch(PDOException $e) {
				echo $e->getMessage();
		}
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'recetas':
		try {
			$stmt = $db2->query('SELECT recipeID,title,recdate FROM recetas ORDER BY recdate DESC');
			while($row = $stmt->fetch()){
				echo '<tr>
							<td style="text-align:center">'.$row['title'].'</td>
							<td style="text-align:center">'.$row['recdate'].'</td>
							<td style="text-align:center">
								<a href="admin_edit.php?class=recetas&id='.$row['recipeID'].'">Editar</a>
							</td>
							<td style="text-align:center">
							<input type="checkbox" class="minimal" check name="seleccion[]" value='.$row['recipeID'].'>
							</td>
							</tr>
							</tr>';
			}
		} catch(PDOException $e) {
				echo $e->getMessage();
		}
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'galeria':
		try {
			$stmt = $db2->query('SELECT id,title,location,category FROM galeria ORDER BY title DESC');
			while($row = $stmt->fetch()){
				echo '<tr>
							<td style="text-align:center">'.$row['title'].'</td>
							<td style="text-align:center">
								<a href="'.$row['location'].'" data-title="" data-footer="" data-toggle="lightbox" data-type="image"><button type="button" class="btn btn-info">Vista</button></a>
							</td>
							<td style="text-align:center">'.$row['category'].'</td>
							<td style="text-align:center">
							<input type="checkbox" class="minimal" check name="seleccion[]" value="'.$row['id'].'">
							</td>
							</tr>
							</tr>';
			}
		} catch(PDOException $e) {
				echo $e->getMessage();
		}
			break;
	  ////////////////////////////////////////////////////////////////////////////////////////
		case 'categoria':
		try {
			$stmt = $db2->query('SELECT id,title,number FROM categoria ORDER BY title DESC');
			while($row = $stmt->fetch()){
				echo '<tr>
							<td style="text-align:center">'.$row['title'].'</td>
							<td style="text-align:center">'.$row['number'].'</td>
							<td style="text-align:center">
								<a href="admin_edit.php?class=categoria&id='.$row['id'].'&status=editar">Editar</a>
							</td>
							<td style="text-align:center">
							<input type="checkbox" class="minimal" check name="seleccion[]" value="'.$row['id'].'">
							</td>
							</tr>
							</tr>';
			}
		} catch(PDOException $e) {
				echo $e->getMessage();
		}
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'ingredientes':
		try {
			$stmt = $db2->query('SELECT ingID,title,type FROM ingredientes ORDER BY title DESC');
			while($row = $stmt->fetch()){
				echo '<tr>
							<td style="text-align:center">'.$row['title'].'</td>
							<td style="text-align:center">'.$row['type'].'</td>
							<td style="text-align:center">
								<a href="admin_edit.php?class=categoria&id='.$row['ingID'].'&status=editar">Editar</a>
							</td>
							<td style="text-align:center">
							<input type="checkbox" class="minimal" check name="seleccion[]" value="'.$row['ingID'].'">
							</td>
							</tr>
							</tr>';
			}
		} catch(PDOException $e) {
				echo $e->getMessage();
		}
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'usuarios':
		try {

$stmt = $db2->query('SELECT * FROM usuarios ORDER BY id DESC');
while($row = $stmt->fetch()){
	echo' <div class="col-md-4">
					<div class="box box-widget widget-user">
						<div class="widget-user-header bg-aqua-active">
							<h3 class="widget-user-username">'.$row['user'].'</h3>
							<h5 class="widget-user-desc">'.$row['email'].'</h5>
						</div>
						<div class="widget-user-image">
							<img class="img-circle" src="dist/img/user1-128x128.jpg" alt="User Avatar">
						</div>
						<div class="box-footer">
							<div class="row">
								<div class="col-sm-4 col-sm-offset-4 border-right">
									<div class="description-block" >
										<h5 class="description-header"><a href="profile.php?id='.$row['id'].'">Administrador</a></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>';
}

} catch(PDOException $e) {
	echo $e->getMessage();
}
			break;
		////////////////////////////////////////////////////////////////////////////////////////

	default:
		echo "Lo sentimos No existe el contenido solicitado";
		break;
}




 ?>
