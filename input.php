<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Input</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	
	<div class="container">

		<?php 
	
			if ($_POST) {
				

				$username = $_POST["username"];
				$email = $_POST["email"];
				$password = $_POST["password"];

				$sql = "insert into user values ('$username','$email','$password')";
				$res = mysqli_query($con,$sql);
				if ($res) {
					echo "<div class='alert alert-success' role='alert' style='margin-top: 20px;'>
							  Berhasil menyimpan data ke database.
							</div>";
				} else {
					echo "Gagal saat insert ke database";
				}

			}

		 ?>

		<form method="post" action="">
		  <div class="form-group">
		    <label >Username</label>
		    <input type="text" class="form-control" name="username">
		    <small class="form-text text-muted">Masukkan username anda.</small>
		  </div>
		  <div class="form-group">
		    <label >Email address</label>
		    <input type="email" class="form-control" name="email">
		    <small class="form-text text-muted">Masukkan email address yang valid.</small>
		  </div>
		  <div class="form-group">
		    <label>Password</label>
		    <input type="password" class="form-control" name="password">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<div class="container" style="margin-top: 20px;">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					$sqlSelect = "select * from user";
					$resSelect = mysqli_query($con,$sqlSelect);
					while ($data=mysqli_fetch_assoc($resSelect)) {
					    
				 ?>
				<tr>
					<th><?php echo $no; ?></th>
					<th><?php echo $data["username"] ?></th>
					<th><?php echo $data["email"] ?></th>
				</tr>
				<?php $no++; } ?>
			</tbody>
		</table>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

