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
        $postHandler = new Post();
        $query = $postHandler->getAPost($pid);
        $data = mysql_fetch_array($query);
        $commentHandler = new Comment();
        $comment_query = $commentHandler->getAllComment($data['pid']);
        
    }
?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
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
            <div class="col-lg-12">
                <?php
                    
                    print '<div class="row">';
                    print '<div class="row">';
                    print '<h3>'.$data['title'].'</h3></div>';
                    print '<div class="row">';
                    print '<p>'.$data['date'].' | '.$data['username'].'</p></div>';
                    print '<div class="row">';
                    print '<p>'.$data['content'].'</p></div>';
                    print '</div>';
                
                ?>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">

                <div id="formKomentar">
                    <form method="post" action="#">
                        Nama <input type="text" id="pNama" name="nama"><br/>
                        Email <input type="text" id="pEmail" name="email" ><br/>
                        Pesan<br/>
                            <textarea id="pPesan" name="pesan" cols="84" rows="5"></textarea><br/>
                        <input type="hidden" id="pTanggal" name="tanggal" value="2016-02-22">
                        <input type="hidden" id="pId" name="id" value="24">
                        <input type="button" name="postKomentar" value="Post Komentar" onclick="return cekEmail();">
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