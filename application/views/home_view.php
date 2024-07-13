<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Budget</title>
 
</head>
<body>
<form action="<?php echo base_url('home/get_days_in_month');?>" method="post">
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">Créer Budget</h1>
                <label for="mois">Sélectionne le mois:</label>
                <select name="mois" id="mois">
                    <option value="1">Janvier</option>
                    <option value="2">Février</option>
                    <option value="3">Mars</option>
                    <option value="4">Avril</option>
                    <option value="5">Mai</option>
                    <option value="6">Juin</option>
                    <option value="7">Juillet</option>
                    <option value="8">Août</option>
                    <option value="9">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Décembre</option>
                </select>

                <label for="annee">Sélectionne l'année:</label>
                <select name="annee" id="annee">
                    <?php for ($i = 2020; $i <= 2030; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>

                <p><button id="valider" class="btn btn-primary">Valider</button></p>
                <p id="resultat"></p>
            </div>
            <div class="col-lg-9">
                <div class="row"></div>
            </div>
        </div>
    </div>
    <!-- <script>
        $(document).ready(function(){
            $('#valider').click(function(){
                var mois = $('#mois').val();
                var annee = $('#annee').val();
                $.ajax({
                    url: '<?php echo base_url();?>home/get_days_in_month/' + mois + '/' + annee,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#resultat').text('Nombre de jours en ' + data.month + '/' + data.year + ': ' + data.days);
                    },
                    error: function() {
                        $('#resultat').text('Erreur lors de la récupération des données.');
                    }
                });
            });
        });
    </script> -->
</body>
</html>
