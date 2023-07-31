<article id="add_rv" class="panel">
        
        <?php
         
            if ( isset($cpt) && isset($full) && $cpt < $full) {
        ?>

                <a href="#">Retour</a>
                <header>
                    <h2>Ajout nouveau Rendez-Vs</h2>
                    <?php echo "<center><span class='initiales'>".$_SESSION['initiales'].'</span></center>'; ?>
                </header>
        
                <form action="../Controller/ctrlerRv.php" method="post">

                <div>
                    <div class="row">

                        <div class="col-6 col-12-medium">
                            <label style="float:right;">SERVICE DEMANDÉ</label>        
                        </div>
                        <div class="col-6 col-12-medium">
                            <label style="float:left;">DATE DISPONIBLE</label>   
                        </div>
                    
                        <div class="col-6 col-12-medium">
                            <select name='servDemande' id='servDemande' style="text-align:right;">
                                <option  style='text-align:left;' value="0">Veuiller Choisir un service</option> 
                                                                   
                                    <?php
                                        require_once '../modele/database.php';
                                        require_once '../modele/databaseRv.php';
                                        while($data=$list->fetch()) {
                                            if (!in_array($data['codeService'], $offer) ) {
                                                echo "<option value='".$data['codeService']."'> ".$data['designService']."</option>";
                                            }                               
                                        }
                                    ?>
                            </select>
                        </div>
                        <div class="col-6 col-12-medium">
                            <input style='float:left';placeholder="Date disponible" type='date' name='dateDisponible' min="<?php echo date('Y-m-d'); ?>" required  />
                        </div>
                        <div class="col-12" style="margin-top: 30px;">
                            <input type="submit" name="ajoutrv" id="AJOUTERRV" Value="Ajouter un Rendez-Vs" />
                        </div>
                    </div>
                </div>
                </form>
        <?php
            }
            else {
                echo "<center><span>Tous les services ont ètè offért veuillez directement mèttre à jour les dates <a href='#'>ICI</a></span></center>";
            }
        ?>

</article>
                               

                               