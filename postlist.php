<?php
	session_start();
	require_once("connect/connect.php");
	require_once("bin/post.php");

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }else{
        header("location: login.php");
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
                <h2>My Post</h2>
                <div class="col-md-6">
                <?php
					$postHandler = new Post();
					$query = $postHandler->getAllPost($username);

					while($data = mysql_fetch_array($query)){
						print '<div class="row">';
						print '<div class="row">';
						print '<h3>'.$data['title'].'</h3></div>';
						print '<div class="row">';
						print '<p>'.$data['date'].'</p></div>';
						print '<div class="row">';
						print '<p>'.$data['content'].'</p></div>';
						print '<p><a href="bin/mpost.php?delete='.$data['pid'].'">Delete</a></p>';
						print '</div>';
					}
				?>
				</div>
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