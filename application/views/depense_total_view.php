<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selection Depense</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1400px;
            margin: auto;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .total {
            background-color: #28a745;
            height: 75px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .total p {
            margin: 0;
            font-size: 20px;
        }
        .text-right {
            text-align: right;
        }
        .new-depense-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .new-depense-container input[type="text"],
        .new-depense-container input[type="number"] {
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .new-depense-container button {
            padding: 8px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .new-depense-container button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <p>DEPENSE TOTAL</p>
    <form action="<?php echo base_url('home/insertNewDepense'); ?>" method="post">
        <table>
            <thead>
                <tr>
                    <th>Depense</th>
                    <th class="text-right">Prix Unitaire</th>
                    <th>Date Debut</th>
                    <th>Date Fin</th>
                    <th class="text-right">Quantite</th>
                    <th class="text-right">Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $overall_total = 0;
                foreach ($depense as $rg) { 
                    $overall_total += $rg['total'];
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($rg['type_mivoaka']); ?></td>
                    <td class="text-right"><?php echo number_format(htmlspecialchars($rg['prix_unitaire']), 0, '', ' '); ?></td>
                    <td><?php echo htmlspecialchars($rg['date_debut']);   ?></td>
                    <td><?php echo htmlspecialchars($rg['date_fin']); ?></td>
                    <td class="text-right"><?php echo number_format(htmlspecialchars($rg['quantite']), 0, '', ' '); ?></td>
                    <td class="text-right"><?php echo number_format(htmlspecialchars($rg['total']), 0, '', ' '); ?> Ar</td>
                    <td><a href="<?php echo base_url() . 'home/PageModifierTypeM/' . $rg['id_type_mivoaka'] . '/' . $days_in_month . '/' . $month . '/' . $years ; ?>">Modifier</a></td>
                    <td><a href="<?php echo base_url() . 'home/SupprimerMivoaka/' . $rg['id_vola_mivoaka'] . '/' . $days_in_month . '/' . $month . '/' . $years ; ?>">Supp</a></td>
                </tr>
                <?php } ?>
               
            </tbody>
        </table>
        <div class="total">
            <p>Total:</p>
            <p><?php echo number_format($overall_total, 0, '', ' '); ?> Ar</p>
        </div>
        <p> <a href="<?php echo base_url() . 'home/paiementDepense/' . $overall_total ?>">Paiement</a></p>
         <p> <a href="<?php echo base_url() . 'home/pageNewDepense/' . $days_in_month . '/' . $month  . '/' .  $years ?>">Ajout Nouvelle Depense</a></p>
    </form>

   
</body>
</html>
