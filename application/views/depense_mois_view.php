<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin: 0 0 20px;
            font-size: 24px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #D3D3D3;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        #result {
            margin-top: 20px;
            font-size: 18px;
        }
        #result h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }
        #result ul {
            list-style-type: none;
            padding: 0;
        }
        #result li {
            margin-bottom: 10px;
        }
        #total {
            font-weight: bold;
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Depense du mois :</h1>
        <form id="depenseForm">
            <label for="mois">Mois :</label>
            <select id="mois" name="mois">
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
            <label for="annee">Année :</label>
            <input type="number" id="annee" name="annee" required>
            <input type="submit" value="Valider">
        </form>
        <div id="result"></div>
    </div>
    <script>
        $(document).ready(function() {
            $('#depenseForm').submit(function(event) {
                event.preventDefault();  // Empêcher la soumission traditionnelle du formulaire
                $.ajax({
                    url: '<?php echo base_url('home/voirDepenseMois'); ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(data) {
                        var result = '<h2>Résultats:</h2><ul>';
                        var total = 0;
                        $.each(data, function(index, item) {
                            var montant = parseFloat(item.montant);
                            total += montant;
                            result += '<li>' + item.motif + ': ' + montant.toLocaleString() + ' Ar</li>';
                        });
                        result += '</ul>';
                        result += '<div id="total">Total: ' + total.toLocaleString() + ' Ar</div>';
                        $('#result').html(result);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Erreur: ' + textStatus + ' - ' + errorThrown);
                        $('#result').html('<p>Une erreur s\'est produite. Veuillez réessayer.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
