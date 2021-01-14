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
				if ($_POST["tipe"]=="insert") {
					$username = $_POST["username"];
					$email = $_POST["email"];
					$password = $_POST["password"];

					$sql = "insert into user (`username`,`email`,`password`) values ('$username','$email','$password')";
					$res = mysqli_query($con,$sql);
					if ($res) {
						echo "<div class='alert alert-success' role='alert' style='margin-top: 20px;'>
								  Berhasil menyimpan data ke database.
								</div>";
					} else {
						echo "Gagal saat insert ke database";
					}
					
				} elseif ($_POST["tipe"]=="update") {
					$id = $_POST["id"];
					$username = $_POST["username"];
					$email = $_POST["email"];

					$sql = "update user set username='".$username."',email='".$email."' where  id='".$id."'";
					$res = mysqli_query($con,$sql);
					if ($res) {
						echo "<div class='alert alert-success' role='alert' style='margin-top: 20px;'>
								  Berhasil update data di database.
								</div>";
					} else {
						echo "Gagal saat update ke database";
					}

				}

			}

			if ($_GET) {
				if ($_GET["param"]=="update") {
					$id = $_GET["id"];
					$sql = "select * from user where id='".$id."'";
					$res = mysqli_query($con,$sql);
					$data = mysqli_fetch_assoc($res);	
				} 
			}

		 ?>

		<form method="post" action="input.php">
		  <input type="hidden" name="tipe" value="<?php if($_GET){ echo "update"; } else { echo "insert"; } ?>">
		  <input type="hidden" name="id" value="<?php if($_GET){ echo $data["id"]; } ?>">
		  <div class="form-group">
		    <label >Username</label>
		    <input type="text" class="form-control" name="username" value="<?php if($_GET){ echo $data["username"]; } ?>">
		    <small class="form-text text-muted">Masukkan username anda.</small>
		  </div>
		  <div class="form-group">
		    <label >Email address</label>
		    <input type="email" class="form-control" name="email" value="<?php if($_GET){ echo $data["email"]; } ?>">
		    <small class="form-text text-muted">Masukkan email address yang valid.</small>
		  </div>
		  <div class="form-group">
		    <label>Password</label>
		    <input type="password" class="form-control" name="password" value="<?php if($_GET){ echo $data["password"]; } ?>">
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
					<th>Aksi</th>
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
					<td><?php echo $no; ?></td>
					<td><?php echo $data["username"] ?></td>
					<td><?php echo $data["email"] ?></td>
					<td class="text-center">
						<a href="?id=<?php echo $data["id"] ?>&param=update" class="btn btn-info btn-xs">Edit</a>
						<a href="hapus.php?id=<?php echo $data["id"] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apa kamu yakin ingin hapus data ini?');">Delete</a>
					</td>
				</tr>
				<?php $no++; } ?>
			</tbody>
		</table>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

