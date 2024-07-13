<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
   
</head>
<form action="<?php echo base_url('home/ModifierTypeTravauxData/' ); ?>" method="post">
    <section class="contact_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Modifier Type de Travaux</h2>
            </div>
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="form_container">
                        <div class="form-row">
                            <div class="form-group col">
                            <p><label for="Travaux" name="Travaux">Travaux :</label></p>
                            <select  id="Travaux" style="background-color:#D3D3D3;margin-left: 70%;" name="Travaux">
                            <option value="TU2">Brique</option>
                            <option value="TU3">Beton</option>
                            <option value="TU4">Materiaux</option>
                            <option value="TU5">Main doeuvre</option>
                            <option value="TU6">Architete</option>
                            <option value="TU1">Bois</option>
                            </select> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="number" class="message-box form-control" placeholder="prix_unitaire" name="prix_unitaire" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" class="message-box form-control" placeholder="unite" name="unite" />
                            </div>
                        </div>
                    
                        <div class="btn_box">
                            <button>
                                Valider
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

            </form>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</html>