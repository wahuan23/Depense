<!DOCTYPE html>
<html>
<head>
    <title>Ma page</title>
</head>
<body>
<form action="<?php echo base_url('Home/recu');?>" method="post">
    <h1>Ma page</h1>
    
    <?php if (!empty($this->session->userdata('nom_caisse'))) { ?>
        <p> <?php echo $this->session->userdata('nom_caisse'); ?></p>
    <?php } else { ?>
        <p>Aucune caisse sélectionnée.</p>
    <?php } ?>
    <p>Produit
            <select name="produit">
                <option value="Biscuit">Biscuit</option>
                <option value="Yaourt">Yaourt</option>
            </select>
        </p>
    <p>Quantite<input type="number" ></p>
    <p><input type="submit" value="valider"></p>
    </form>
</body>
</html>
