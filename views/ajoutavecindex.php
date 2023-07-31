<!-- Add with Index -->
<article id="add_patient" class="panel">
	<?php
		require_once '../modele/database.php';
		require_once '../modele/databasePatient.php';

		// Information d'ajout Patient
		if (isset($_GET['addpatient']) && $_GET['addpatient'] == 'false') {
            echo "<div class='alert_danger'>
                 	<strong>Patient non ajouté. </strong> 
                    Veuillez contacter votre administrateur pour plus d'informations !
                  </div>";           				
         }

        // Information de Mis a jour Patient
        if (isset($_GET['updatepatient']) && $_GET['updatepatient'] == 'false') {
			echo "<div class='alert_danger' style='animation: jackInTheBox 1 2s;'>
					<strong>Mis á jour non effectué. </strong> 
					Veuillez vèrifier les informations puis réessayer !
				  </div>";
        }

        // Récupération des donnees du Patient en cours - Modification
        if (isset($_GET['np']) && $_GET['np'] > 0){
			$patient=checkPatient($_GET['np']) ; 
			if ($patient->rowCount() > 0 ){ //Si le patient existe ?
				$data=$patient->fetch();
				$exist=true;
			}
		}
            

    ?>
            						
    <a class="innerLink" href="home.php#noIndex">Pas d'Index ? Clickez Ici </a>
	<header>
		<h2>Ajout / Mis à jour Patient</h2> 
	</header>
	<form action="../Controller/ctrlerPatient.php" method="post">
		<div>
			<div class="row">

				<div class="col-12">
					<input type="number" placeholder="Identifiant" id="numeroDossierPatient" name="numeroDossierPatient" value="<?php if ( isset($exist) && isset($data['numeroDossierPatient'])) echo $data['numeroDossierPatient']; ?>" <?php if ( isset($exist) && isset($data['numeroDossierPatient'])) echo 'readonly'; ?>  min="0"required autocomplete="off" />
				</div>
				<div class="col-6 col-12-medium">
					<input type="text" placeholder="Prénoms" id="prenomsPatient" name="prenomsPatient" value="<?php if ( isset($exist) && isset($data['prenomPatient'])) echo $data['prenomPatient'] ; ?>" minlength="2" maxlength="50" required autocomplete="on" />	
				</div>
				<div class="col-6 col-12-medium">
					<input type="text" placeholder="Nom" id="nomPatient" name="nomPatient" value="<?php if ( isset($exist) && isset($data['nomPatient'])) echo $data['nomPatient']; ?>" minlength="2" maxlength="20" required autocomplete="on" />
				</div>
				<div class="col-12">
					<input type="number" id="telephonePatient" name="telephonePatient" required  value="<?php if ( isset($exist) && isset($data['telephonePatient'])) echo $data['telephonePatient']; else echo("221"); ?>" min="221700000000" max="221789999999" autocomplete="off" />
				</div>
				<div class="col-12">
					<input type="submit" id="AJOUTER" <?php if (isset($exist)){ echo 'name="updatePatient"'; echo 'value="Méttre à Jour"'; } else { echo 'name="ajoutPatient"'; echo 'value="Ajouter"';} ?> />
				</div>
			</div>
		</div>
	</form>
</article>


