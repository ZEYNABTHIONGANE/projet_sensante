<article id="rvsaved" class="panel">
	
		<?php 
		    require_once '../modele/database.php';
		    require_once '../modele/databasePatient.php';
		    require_once '../modele/databaseRv.php';
            require_once '../modele/databaseTools.php';


        
                if ( isset($_GET['ajoutpatient']) == 'ajout' &&  $_GET['ajoutpatient'] == 'exist'  )   {       
                    echo "<div class='alert_neutral'>
                            <strong>Patient dèja enregistré </strong> 
                            Veuillez accéder aux informations de RendezVs !
                          </div>";
                }

                if (isset($_GET['updaterv']) && $_GET['updaterv'] == 'success') {
                    echo "<div class='alert_success'>
                            <strong>Mis à jour reussi. </strong> 
                            Rendez-Vs Patient ajouté avec succés
                          </div>";      
                }

                else if (isset($_GET['updaterv']) && $_GET['updaterv'] == 'failed') {
                    echo "<div class='alert_danger'>
                            <strong>Mis à jour non reussie. </strong> 
                            Veuillez contacter votre administrateur pour plus d'informations !
                          </div>";    
                } 

                if (isset($_GET['updatepatient']) && $_GET['updatepatient'] == 'success') {
                    echo "<div class='alert_success'>
                            <strong>Mis à jour reussie. </strong> 
                            Donnèes Patient ajoutées avec succés
                          </div>";      
                }


                if (isset($_GET['ajoutrv']) && $_GET['ajoutrv'] == 'success') {
                    echo "<div class='alert_success' style='animation: jackInTheBox 1 2s;'>
                            <strong>Rendez-Vs ajoutè avec succes. </strong> 
                          </div>";
                }

                else if (isset($_GET['ajoutrv']) && $_GET['ajoutrv'] == 'listfull') {
                    $service = getServicebyCod($_GET['serv']);
                    $s = $service->fetch();
                    echo "<div class='alert_warning' style='animation: jackInTheBox  1 2s;'>
                            <strong>Rendez-Vs non ajouté </strong> - 
                            <b>".dateEgToFr($_GET['dd'])."</b> - Liste deja pleine pour ce service : <b>".$s[1]."</b> 
                          </div>";
                }

                else if (isset($_GET['ajoutrv']) && $_GET['ajoutrv'] == 'failed') {
                    echo "<div class='alert_danger' style='animation: jackInTheBox  1 2s;'>
                            <strong>Rendez-Vs non ajouté. </strong>
                            Veuillez contacter votre administrateur pour plus d'informations !
                          </div>";
                }


		    if (isset($_SESSION['np'])){
				$tuplet=checkPatient($_SESSION['np']); 
				if ($tuplet->rowCount() > 0 ) {
					$data=$tuplet->fetch();
					$_SESSION['initiales']=$data['prenomPatient'].' '.$data['nomPatient'];
			        echo '<center><a href="home.php?np='.$_SESSION['np'].'#add_patient">Modifier Infos Patient</a></center>
				        	<table> 
				                <tr>
				                    <th class="entete">IDENTIFIANT</th> 
				                    <th class="entete">PRÉNOMS ET NOM</th>
				                    <th class="entete">TÉLÉPHONE</th> 
				                <tr/>
				                <tr class="entete">
				                    <td>'.$data['numeroDossierPatient'].'</td> 
				                    <td><span class="initiales">'.$_SESSION['initiales'].'</span></td> 
				                    <td>'.$data['telephonePatient'].'</td>
				                </tr>
				            </table>';
				}
			}

                echo "<h3>Liste des Rendez-Vs enregistrès </h3>";
		?>

		<form method="post" style="margin:20px;" enctype="multipart/form-data" action="../controller/CtrlerRv.php">
            <table>
                <tr>
                    <th>SERVICES DEMANDÉS</th>
                        <th>DATE DES RV DÉJA ENREGISTRÉS</th>
                    </tr>

                    <?php
                        if (isset($_SESSION['np'])) {
                            $traitement = showRv($_SESSION['np']) ;
                            $cpt=0 ; // Pour verifier l'existence de rendez-vs donné
                            $offer[]="deja offer";//Services dont le patient dispose deja de rendez-vs
                            $precis=false ; //Pour verifier la precision des rendez-vs a venir
                            $rvexist=0;

                            if (isset($traitement)) {
                                while ( $data=$traitement->fetch()){
                                    if ( $data['dateRvServ'] > date('Y-m-d') && $precis == false ) {
                                        echo "<tr>
                                             	<td colspan = '2' class='rvprecision'>Á VENIR</td>
                                              </tr>";
                                        $precis=true ;
                                    }
															
									echo "<tr>
                                            <td class='servdemande'>".$data['designService']."</td>
                                            <td class='daterv'><input type ='date' class='inputdaterv' name='days[]' value='".$data['dateRvServ']."' /></td>
                                          <tr/>";

                                    $offer[]=$data['codeService'];
                                    $cpt++;
                                    $rvexist=1;
                                                            
                            	}
                                echo "<input type='hidden' value='".$cpt."'/>" ; 
                            }
                        }

                        if ( isset($rvexist) && $rvexist ) 
                            echo "<tr>
                                    <td colspan='2'>
                                        <button type='submit' name='misajourrv'>Méttre à jour</button>
                                    </td>
                                 </tr>";
                        else
                            echo "<tr>
                                    <td colspan ='2'><span class='forneant'>Ce patient n'a pas encore de Rendez-Vs</span></td>
                                  </tr>";
                    ?>

            </table>
        </form>
        <?php 

            $list=listServices(); 
            $full=$list->rowCount(); //Nombre de services possible 
                if ( isset($cpt) && $cpt < $full){ //Verification des nombres de services offérts
                    echo "<center><a href='#add_rv'>Nouveau rendez Vs</a></center>"; 
                }
        ?>
</article>



