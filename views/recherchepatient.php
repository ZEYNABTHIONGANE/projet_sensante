<!-- Search -->
<article id="search_patient" class="panel">
	<?php
		require_once '../modele/database.php';
		require_once '../modele/databasePatient.php';

		// Information de Recherche Patient
		if (isset($_GET['found']) AND $_GET['found'] == 'false' ) {
		echo "<div class='alert_danger' style='animation: jello 1 2s;'>
				<strong>Numero Patient introuvable. </strong> 
				Veuillez verifier les informations puis réessayer !
			  </div>";
        }
    ?>
	<header>
		<h2>Recherche Patient</h2>
	</header>
	<form action="../Controller/ctrlerPatient.php" method="post">
		<div>
			<div class="row">
												
				<div class="col-12">
					<input type="number" placeholder="Identifiant a rechercher" name="snumeroDossierPatient" min="0" max="200000" required autocomplete="off" />
				</div>
				<div class="col-12">
					<input type="submit" value="Rechercher" name="recherchePatient"/>
				</div>
				
			</div>
		</div>
	</form>
</article>