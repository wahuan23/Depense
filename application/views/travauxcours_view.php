
  <!-- Page Content -->
  <div class="container">

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">Liste de vos Devis</h1>
      
      <table class="table">
        <thead>
          <tr>
            <th>nom_service</th>
            <th>Service</th>
            <th>Finition</th>
            <th>Service</th>
            <th>Materiaux</th>
            <th>Quantite</th>
            <th>Prix Unitaire</th>
            <th>Unite</th>
        
           
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach ($devis as $rg) {
          ?>
          <tr>
            <td><?php echo $rg['nom_service']; ?></td>
            <td><?php echo $rg['type_service']; ?></td>
            <td><?php echo $rg['finition']; ?></td>
            <td><?php echo $rg['type_service']; ?></td>
            <td><?php echo $rg['nom_utilitaire']; ?></td>
            <td><?php echo $rg['quantite']; ?></td>
            <td><?php echo $rg['prix_unitaire']; ?></td>
            <td><?php echo $rg['unite']; ?></td>
           
          
<?php
}
?>
    

      <div class="col-lg-9">

        <div class="row">

        <td><a href="<?php echo base_url() . 'home/ImportDonneMaison' ?> ">Import Donnee Maison</a><td>
        <p><a href="<?php echo base_url() . 'home/TypesTravaux' ?> ">Types Travaux</a><p>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>


</body>

</html>
