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
            background-color: #f4f4f4;
        }
        form {
            background-color: #fff;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type='number'],
        input[type='text'] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type='submit'] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type='submit']:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<form method="post" action="<?php echo base_url('home/ajoutSortie');?>">
    <h1>Ajout Dépense</h1>
    <p>Montant <input type='number' name='montant' placeholder='montant'></p>
    <p>Motif <input type='text' name='motif' placeholder='motif'></p>
    <input type='submit' value='Ajouter Dépense'>
</form>
</body>
</html>
