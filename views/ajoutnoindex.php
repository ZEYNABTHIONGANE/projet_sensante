<!-- Add No Index-->
<article id="noIndex" class="panel">
	<?php
		require_once '../modele/database.php';
		require_once '../modele/databasePatient.php';
		require_once '../modele/databaseTools.php';
        require_once '../modele/databaseRv.php';

		// Information d'ajout Patient
		if (isset($_GET['add']) && $_GET['add'] == 'false') {
        	echo "<div class='alert_danger'>
                    <strong>Patient non ajouté. </strong> 
                    Veuiller contacter votre administrateur pour plus d'informations !
            	  </div>";           				
        }

        else if (isset($_GET['add']) && $_GET['add'] == 'listfull') {
                    $service = getServicebyCod($_GET['serv']);
                    $s = $service->fetch();
                    echo "<div class='alert_warning' style='animation: jackInTheBox  1 2s;'>
                            <strong>Rendez-Vs non ajouté </strong> - 
                            <b>".dateEgToFr($_GET['dd'])."</b> - Liste deja pleine pour ce service : <b>".$s[1]."</b> 
                          </div>";
        }

        else if (isset($_GET['add']) && $_GET['add'] == 'true') {
            echo "<div class='alert_success'>
                    <strong>Ajout reussi. </strong> 
                    Rendez-Vs Patient ajouté avec succés
                  </div>";           				
         }    
    ?>

    <a href="home.php#add_patient">Retour</a>
	<header>
		<h2>Ajout Rendez-Vs Patient</h2>
	</header>
	<form action="../Controller/ctrlerPatient.php" method="post">
		<div>
			<div class="row">
				<div class="col-6 col-12-medium">
					<input type="text" placeholder="Prénoms" id="prenomsPatientNoi" name="prenomsPatientNoi" minlength="2" maxlength="50" required autocomplete="on" />	
				</div>
				<div class="col-6 col-12-medium">
					<input type="text" placeholder="Nom" id="nomPatientNoi" name="nomPatientNoi" minlength="2" maxlength="20" required autocomplete="on" />
				</div>
				<div class="col-12">
					<input type="number" id="telephonePatientNoi" name="telephonePatientNoi" value="221" required min="221700000000" max="221789999999" autocomplete="off" />
				</div>
				<div class="col-6 col-12-medium">
					<select name='servDemande' id='servDemande'>
						<option value="0">Veuiller Choisir un service</option> 
								                           
							<?php

							    $liste=listServices();
							    while($data=$liste->fetch()){
							        echo "<option value='".$data['codeService']."'> ".$data['designService']." </option>";
							    }
                            ?>
								                           

	                </select>
				</div>
				<div class="col-6 col-12-medium">
					<input placeholder="Date disponible" type='date' name='dateDisponible' min="<?php echo date('Y-m-d'); ?>" required  />
				</div>
				<div class="col-12">
					<input type="submit" id="AJOUTERNOI" name="ajoutPatientNoIndex" value="Ajouter" />
				</div>
			</div>
		</div>
	</form>
</article>

