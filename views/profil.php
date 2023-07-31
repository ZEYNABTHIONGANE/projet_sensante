<!-- Profil -->
<article id="profil" class="panel">
	<?php 
		$message_print = false ;
		require_once '../modele/databaseAgent.php';
		require_once '../modele/databaseTools.php';
		$show = false ;

		if ($message_print == false) {
			//Information de mis a jour Profil
			if (isset($_GET['update']) && $_GET['update'] == 'false') {
				echo "<div class='alert_danger' style='animation: jello 1 2s;'>
						<strong>Mis á jour non effectué. </strong> 
						Veuillez vérifier les informations puis réessayer !
					  </div>";
			}

	        else if (isset($_GET['update']) && $_GET['update'] == 'true') {
	            echo "<div class='alert_success' style='animation: tada 1 2s;'>
	                    <strong>Mis à jour reussi.</strong> 
	                    Modification enregistée avec succes !
	                  </div>";
	        }
		}
						        
		if ( isset($_SESSION['username'])) {
			$agent=checkAgent($_SESSION['username']) ; // Recuperation des donnees de l'utiisateur en cours
			$data=$agent->fetch();
		}
	?>

	<header>
		<h2>Informations Profil</h2>
	</header>
		<form action="../Controller/ctrlerlogin.php" method="post">
			<div>
				<div class="row">
					<div class="col-12">
						<input type="text" value="<?php if (isset($data['username'])) echo $_SESSION['username'] ; ?>" style="background-color: lightgray;" readonly name="username" required autocomplete="off" />
					</div>
					<div class="col-6 col-12-medium">
						<input type="text" value="<?php if (isset($data['prenom_agent'])) echo $data['prenom_agent']; ?>" name="prenom_agent" minlength="2" id="prenom_agent" maxlength="50" required autocomplete="on" />
					</div>
					<div class="col-6 col-12-medium">
						<input type="text" value="<?php if (isset($data['nom_agent'])) echo $data['nom_agent']; ?>" name="nom_agent" minlength="2" id="nom_agent" maxlength="20" required autocomplete="on" />
					</div>
					<div class="alert_rouge" id="alert_rouge">
						Attention ! Vous devez taper des mots de pass identiques........
						<span class="closebtn" onclick="this.parentElement.style.display='none';">  X  </span>
					</div>
					<div class="col-6 col-12-medium">
						<input type="password" name="password" id="password1" minlength="6" required  />
					</div>
					<div class="col-6 col-12-medium">
						<input type="password" name="password" id="password2" minlength="6" required  />
					</div>
					<div class="col-12">
						<input type="number" value="<?php if (isset($data['telephone_agent'])) echo $data['telephone_agent']; ?>" name="telephone_agent" required min="221700000000" max="221789999999" autocomplete="off" value="221" />	
					</div>
					<div class="col-12">
						<input type="submit" name="updateagent" id="UPDATEAGENT" value="Mèttre a jour" />
					</div>
				</div>
			</div>
		</form>
</article>
