<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Budget</title>
 
</head>
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
    </style>
<body>
<form action="<?php echo base_url('home/insertDepenseTotal/' . $total);?>" method="post">
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">Payer Budget</h1>
                <div class="total">
            <p>Total:</p>
            <p><?php echo number_format($total, 0, '', ' '); ?> Ar</p>
        </div>

                <p input type='number' name='montant' ><p>
                <p>Montant a payer en Ariary:<input type="number" name="montant" min='200000' placeholder="montant"></p>
                <button id="valider" class="btn btn-primary">Valider</button>
               
            </div>
           
        </div>
    </div>
    </form>
</body>
</html>
