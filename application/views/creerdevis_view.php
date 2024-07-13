<form method="post" action="">
<section class="service_section layout_padding">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>Choix Maison</span></h2>
      </div>
      <?php if (!empty($this->session->userdata('phone'))) { ?>
        <p> <?php echo $this->session->userdata('phone'); ?></p>
    <?php } else { ?>
        <p>Aucune caisse sélectionnée.</p>
    <?php } ?>
 

        


      <div class="row">
      <?php 
      foreach ($devis as $rg) {
        ?>

        <div class="col-sm-6 col-md-3">
          <div class="box ">
                <div class="img-box">
                  <img src="images/s1.png" alt="" />
                </div>
              <div class="detail-box">
                <h5>
                <?php echo $rg['type_service']; ?>
                </h5>
                <p>
                <?php echo $rg['description'];  ?><br>
                </p>
                <div class="btn-box">
          <a style="background-color:blue;" href="">
          Select
          </a>
         
              </div>
              </div>
          </div>
        </div>
      <?php
}
?>
          
        
   
        
          </div>
      
  </div>
</section>
          
  </form>