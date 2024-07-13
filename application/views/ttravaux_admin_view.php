
  <!-- Page Content -->
  <div class="container">

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">Liste de vos Devis</h1>
      
      <table>
  <thead>
    <tr>
      <th>Nom Utilitaire</th>
      <th>Prix Unitaire</th>
      <th>Unité</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($devis as $rg) { ?>
      <tr>
        <td><?php echo ($rg['nom_utilitaire']); ?></td>
        <td><?php echo ($rg['prix_unitaire']); ?></td>
        <td><?php echo ($rg['unite']); ?></td>
        <td><a href="<?php echo base_url() . 'home/PageModifierTypeTravaux'; ?>">Modifier</a><td>
      
      </tr>
    <?php } ?>
  </tbody>
</table>

    

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
