<!-- List Show -->
<article id="show_rv" class="panel">
	<header>
		<h2>Affichage Service - Rendez vous</h2>
	</header>
	<form action="listePrint.php" method="post" target="_blank" >
		<div>
			<div class="row">

				<div class="col-6 col-12-medium">
					<select name="service_view" id="service_view">		
						<option value="0">Veuiller Choisir un service</option>  
						   
						    <?php
                            	require_once '../modele/database.php';
                            	require_once '../modele/databaseRv.php';
							    $liste=listServices();
							    while($data=$liste->fetch()){
							        echo "<option value='".$data['codeService']."'> ".$data['designService']." </option>";
							    }
                            ?>
					</select>
				</div>
				<div class="col-6 col-12-medium">
					<input placeholder="Date á rechercher" type="date" name="date_view" required min="2020-12-15" />
				</div>
				<div class="col-12">
					<input type="submit" id="LISTER" value="Lister" />
				</div>

			</div>
		</div>
	</form>
</article>
