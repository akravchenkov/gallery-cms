<?php include("includes/header.php"); ?>

<?php

    require_once("admin/includes/init.php");

    if(empty($_GET['id'])) {

        redirect("index.php");

    }

    $photo = Photo::find_by_id($_GET['id']);


    if(isset($_POST['submit'])) {

        $author = trim($_POST['author']);
        $body = trim($_POST['body']);

        $new_comment = Comment::create_comment($photo->id, $author, $body);

        if($new_comment && $new_comment->save()) {

            redirect("photo.php?id={$photo->id}");

        } else {

            $message = "There was some problems saving";

        }

    } else {

        $author = "";
        $body = "";

    }

    $comments = Comment::find_the_comments($photo->id);


?>



<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption; ?></p>
                <p><?php echo $photo->description; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="body"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>







                <hr>

                <!-- Posted Comments -->

                <?php foreach ($comments as $comment): ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        <?php echo $comment->body; ?>
                    </div>
                </div>

                <?php endforeach; ?>

                <!-- Comment -->
<!--                <div class="media">-->
<!--                    <a class="pull-left" href="#">-->
<!--                        <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--                    </a>-->
<!--                    <div class="media-body">-->
<!--                        <h4 class="media-heading">Start Bootstrap-->
<!--                            <small>August 25, 2014 at 9:30 PM</small>-->
<!--                        </h4>-->
<!--                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--                        <!-- Nested Comment -->
<!--                        <div class="media">-->
<!--                            <a class="pull-left" href="#">-->
<!--                                <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--                            </a>-->
<!--                            <div class="media-body">-->
<!--                                <h4 class="media-heading">Nested Start Bootstrap-->
<!--                                    <small>August 25, 2014 at 9:30 PM</small>-->
<!--                                </h4>-->
<!--                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <!-- End Nested Comment -->
<!--                    </div>-->
<!--                </div>-->

            </div>

    <!-- Blog Sidebar Widgets Column -->

<!--    <div class="col-md-4">-->

        <?php //include("includes/sidebar.php"); ?>

<!--    </div>-->

    <?php include("includes/footer.php"); ?>