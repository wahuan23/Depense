
  <!-- Page Content -->
  <div class="container">

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">Votre Argent</h1>
      
      <table class="table">

          <?php 
          foreach ($tahiry as $rg) {
          ?>
          <tr>
            <td><?php echo number_format( $rg['montant'], 0, '', ' '); ?>Ar</td>

          
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
