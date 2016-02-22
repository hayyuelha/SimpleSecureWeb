<?php
	session_start();
	require_once("connect/connect.php");
	require_once("bin/post.php");

	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
	}else{
        header("location: login.php");
	}
    $pid = null;
    if ( !empty($_GET['pid'])) {
        $pid = $_REQUEST['pid'];
    }
     
    if ( null==$pid ) {
        header("Location: index.php");
    } else {
        $postHandler = new Post();
        $query = $postHandler->getAPost($pid);
        $data = mysql_fetch_array($query);
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
                <h2>Edit Post</h2>
				<form method="post" action="bin/edit.php" enctype="multipart/form-data">
					<input type="hidden"  name="username" value="<?php echo $_SESSION['username']; ?>">
					<input type="hidden"  name="pid" value="<?php echo $data['pid']; ?>">
                    <div class="col-md-9">
                        <label>Title: </label>
						<input type="text" id="title" name="title" value="<?php echo $data['title'];?>">
					</div>
					<div class="col-md-9">
                        <div class="row">
                            <label>Content: </label>
                        </div>
						<textarea name="content" rows="10" cols="20" id="content2"><?php echo $data['content'];?></textarea>
					</div>
					<div class="col-md-9">
						<input type="submit" name="submit" value="Save">
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