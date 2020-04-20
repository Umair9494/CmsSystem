<?php include 'includes/header.php'; ?>
    <div id="wrapper">
        <!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Welcome to Admin
                            <small>Umair</small>
                        </h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        <?php 
        if(isset($_GET['source'])){
          $source = $_GET['source']; 
        }
        else{
            $source = '';
        }
        switch($source){ 
        case 'add_post':
            include "includes/add_new_post.php";
        break;
        case 'edit_post':
            include "includes/edit_post.php";
        break;
        case '3':
            echo "nice 3";
        break;
        case '4':
            echo "nice 4";
        break;
        case '5':
            echo "nice 5";
        break;
        default:
        include "includes/view_all_comments.php";
        break;
        }
        ?>
    </div>
    
        <!-- /#page-wrapper -->
<?php include 'includes/footer.php'; ?>