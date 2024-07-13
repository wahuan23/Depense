<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="page/login.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css">
    <title>Login Page</title>
</head>

<body>
    <div id="page">
        <div id="content1">
            <h1 class="Poppins">Sign out</h1>
            <form action="<?php echo base_url('Home/insert');?>" method="post">
                <P><input type="text" name="nom_user" placeholder="nom" ></P>
                <p><input type="email" name="email" placeholder="email" ></p>
                <p><input type="password" name="password" placeholder="password"></p>
                <P><input type="submit" value="Sign out" class="btnInscr"></P>

            </form>
        </div>

        </div>
    </div>
</body>
</html>