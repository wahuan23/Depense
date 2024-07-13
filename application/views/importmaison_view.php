<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Import Excel Sheet data</title>
</head>
<body>

	
    <form method="post" action="<?php echo base_url('home/importmaisonvalider');?>" enctype="multipart/form-data">
  <div class="form-group">
    <input type="file" name="upload_file" class="form-control" placeholder="Maison" id="upload_file" required>
  </div>
  <div class="form-group">
    <input type="submit" name="submit" class="btn btn-primary">
  </div>
</form>
</body>
</html>