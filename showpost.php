<?php
    session_start();
    include("template/header.php");
    require_once("connect/connect.php");
    require_once("bin/post.php");
    require_once("bin/comment.php");
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
    $pid = null;
    if ( !empty($_GET['pid'])) {
        $pid = $_REQUEST['pid'];
    }
     
    if ( null==$pid ) {
        header("Location: index.php");
    } else {
        if(is_numeric($pid)){
            $postHandler = new Post();
            $query = $postHandler->getAPost($pid);
            $data = mysql_fetch_array($query);
            $commentHandler = new Comment();
            $comment_query = $commentHandler->getAllComment($data['pid']);
        }else{
            header("Location: index.php");
        }
    }
?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
            	<?php print '<h1 class="page-header">Post: '.$data['title'].'</h1>';?>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li><a href="posts.php">Posts</a></li>
                    <?php
                    	print '<li class="active">'.$data['title'].'</li>';
                    ?>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-lg-12" id="all-posts">
                <?php
                    print '<div class="row">';
                    print '<div class="row">';
                    print '<p><b>'.$data['date'].' | '.$data['username'].'</b></p></div>';
                    print '<div class="row">';
                    print '<p>'.$data['content'].'</p></div>';
                    print '</div><hr>';
                
                ?>
            </div>
        </div>
        <!-- /.row -->
        <div class="row" id="comments">
            <div class="col-md-12">
            	<h3>Komentar</h3>
                <div id="formKomentar">
                    <form method="post" action="bin/mcomment.php?id=1">
                        Nama <input type="text" name="nama"><br/>
                        Email <input type="text" name="email" ><br/>
                        Pesan<br/>
                            <textarea id="pPesan" name="konten" cols="84" rows="5"></textarea><br/>
                        <input type="hidden" name="pid" value="<?php echo $data['pid']; ?>">
                        <input type="submit" value="Post Komentar">
                    </form>
                </div>
                <hr/>
                <div id="Komentar">
                    <?php
                        while($comment_data = mysql_fetch_array($comment_query)){
                            echo '
                                <div id="unit-komentar" align="center">
                                    '.$comment_data['com_name'].'<br/>
                                    '.$comment_data['com_date'].'<br/>
                                    '.$comment_data['com_dis'].'</br>
                                    <hr/>
                                </div>
                            ';
                        }
                    ?>
                </div>

            </div>
        </div>

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