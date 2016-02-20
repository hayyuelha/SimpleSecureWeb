<?php
	session_start();
	require_once("connect/connect.php");
	require_once("bin/post.php");

	if($_SESSION['username'] == ""){
		header("location: login.php");
	}else{
		$username = $_SESSION['username'];
	}
    include("template/header.php");
?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard
                    <small>Hello, <?php echo $_SESSION['username']; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="dashboard.php" class="list-group-item">File List</a>
					<a href="upload.php" class="list-group-item">Upload</a>
					<a href="trash.php" class="list-group-item">Trash</a>
                    <a href="postlist.php" class="list-group-item">Post List</a>
                    <a href="post.php" class="list-group-item">Post</a>
                    <a href="account.php" class="list-group-item">Account Information</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9" id="content">
                <h2>Create Post</h2>
				<form method="post" action="bin/posting.php" enctype="multipart/form-data">
					<input type="hidden"  name="username" value="<?php echo $_SESSION['username']; ?>">
					<div class="row">
						<input type="text" id="title" name="title">
					</div>
					<div class="row">
						<textarea name="content" rows="20" cols="20" id="content"></textarea>
					</div>
					<div class="row">
						<input type="submit" name="submit" value="Post">
					</div>
				</form>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; filehosting.bangsatya.com 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>