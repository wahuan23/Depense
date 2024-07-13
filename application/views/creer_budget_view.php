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
            max-width: 800px;
            margin: auto;
            width: 400px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 130px;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
        .new-depense-container {
            margin-top: 20px;
        }
        .new-depense-container input[type="text"] {
            width: calc(100% - 110px);
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
<p>Selectionne une depense<p>
<form action="<?php echo base_url('home/insertDepense');?>" method="post">
    <input type="hidden" name="days_in_month" value="<?php echo htmlspecialchars($days_in_month);?>">
    <input type="hidden" name="years" value="<?php echo htmlspecialchars($years);?>">
    <input type="hidden" name="month" value="<?php echo htmlspecialchars($month);?>">
    
    <label>
        <input type="checkbox" name="depense[]" value="TMV1"> Laoka
    </label>
    <label>
        <input type="checkbox" name="depense[]" value="TMV2"> Frais et petit dej
    </label>
    <label>
        <input type="checkbox" name="depense[]" value="TMV3"> Vary
    </label>
    <label>
        <input type="checkbox" name="depense[]" value="TMV4"> Otra
    </label>
    <label>
        <input type="checkbox" name="depense[]" value="TMV5"> Provision
    </label>
    <label>
        <input type="checkbox" name="depense[]" value="TMV6"> Hofantrano
    </label>
    <label>
        <input type="checkbox" name="depense[]" value="TMV7"> Lamba
    </label>
    <label>
        <input type="checkbox" name="depense[]" value="TMV8"> Frais Moly
    </label>
    <label>
        <input type="checkbox" name="depense[]" value="TMV9"> Fredy
    </label>
    
   

    <input type="submit" value="Valider">
</form>

</body>
</html>
