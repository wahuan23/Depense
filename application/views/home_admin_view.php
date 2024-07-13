
  <!-- Page Content -->
  <div class="container">

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">Liste de vos Devis</h1>
      
      <table class="table">
        <thead>
          <tr>
            <th>Travaux</th>
            <th>Utilisateur</th>
            <th>Duree</th>
            <th>Service</th>
            <th>Debut</th>
            <th>Fin</th>
            <th>Total</th>
            <th>Paye</th>
            <th>Date_paiement</th>
            <th>%Paiement effectue</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach ($devis as $rg) {
          ?>
          <tr>
            <td><?php echo $rg['id_travaux']; ?></td>
            <td><?php echo $rg['phone']; ?></td>
            <td><?php echo $rg['duree']; ?>Jour</td>
            <td><?php echo $rg['type_service']; ?></td>
            <td><?php echo $rg['date_debut']; ?></td>
            <td><?php echo $rg['end_date']; ?></td>
            <td><?php echo $rg['total_sum']; ?></td>
            <td><?php echo $rg['paye']; ?></td>
            <td><?php echo $rg['date_paiement']; ?></td>
            <td><?php echo $rg['paiementeffectue']; ?></td>
            
            <td><a href="<?php echo base_url() . 'home/TravauxEnCours/' . $rg['id_travaux'] ?> ">Voir</a><td>
          
<?php
}
?>
    

      <div class="col-lg-9">

        <div class="row">

          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>


</body>

</html>
