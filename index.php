<!DOCTYPE html>
<?php
session_start();
include 'head.php';
?>
<body>
<div id="wrapper">
                <div class="navbar navbar-inverse">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Haramaya City Civil And Vital Regestration System 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php">Home</a>
                                </li>
                                <li><a href="about.php">About</a>
                                </li>
                                <li><a href="contact.php">Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </a>
                        
                                </li>

                                <li><a href="login_page.php" class="fa fa-user"> Login</a>
                                </li>
                                
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
    <!-- Navigation -->
   





    <!-- Page Content -->
    <div class="container">


        <!-- Page Heading/Breadcrumbs -->
    
        <!-- /.row -->

        <!-- Content Row -->
                        <div class="alert alert-success">

                                <img src="images/flag.gif"width="150" height="78"><img src="images/banner.png" width="805"alt="Baner"><img src="images/oro.gif" width="150" height="78">
                           
                        </div>

            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.php" class="list-group-item">Home</a>
                    <a href="about.php" class="list-group-item">About</a>
                    <a href="contact.php" class="list-group-item">Contact  </a>

                </div>
                <div class="well">
                    <h2>Recent  News</h2>
                <ul class="style3">
                    <li class="first"><img src="images/login.jpg" width="170" height="100" alt="">
                        <p>The Newly Developed Haramaya City Civil And Vital Registration System is UP AND RUNNING! </p>
                        <p class="posted">June 16, 2015 </p>
                    </li>
                    <li><img src="images/news.jpg" width="150" height="78" alt="">
                        <p>Request Vital Cirtificate online</p> 
                        <p class="posted">June 16, 2015 </p>
                    </li>
                </ul>
                <p><a href="#" class="link-style">Read More</a></p>
            
                        </div>
            </div>
            <!-- Content Column -->

<div class="col-md-9">
                 
    <div id="slider">
                    <div class="viewer">
                        <div class="reel">
                            <div id="gallery">
                                <div class="slide"> <a href="images/s1.jpg"><img src="images/s1.jpg" width="800" height="300" alt="" /></a> </div>
                                <div class="slide"> <a href="images/s2.jpg"><img src="images/s2.jpg" width="800" height="300" alt="" /></a> </div>
                                <div class="slide"> <a href="images/s3.jpg"><img src="images/s3.jpg" width="800" height="300" alt="" /></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jumbotron">
                    <h2>Do You know ...?</h2>
                <p><h4>Alemaya (also transliterated Alem Maya; Oromo: Haramaya) is a city in east-central Ethiopia
                     Located in the Misraq Hararghe Zone of the Oromia Region. Haramaya is bordered on the south by
                      Kurfa Chele, on the west by Kersa, on the north by Dire Dawa, on the east by Kombolcha, and ...
</p> <p><a href="homedetail.php" class="btn btn-primary btn-lg" role="button">Read more &raquo;</a>
                    </p></div>
                <script type="text/javascript">
                $('#slider').slidertron({
                    viewerSelector: '.viewer',
                    reelSelector: '.viewer .reel',
                    slidesSelector: '.viewer .reel .slide',
                    advanceDelay: 3000,
                    speed: 'slow'
                });
                </script>
                
                 <script type="text/javascript">
                $('#gallery').poptrox({
                    overlayColor: '#222222',
                    overlayOpacity: 0.75,
                    popupCloserBackgroundColor: '#560969',
                    popupBackgroundColor: '#FFFFFF',
                    popupTextColor: '#aaaaaa',
                    popupPadding: 20
                });


                    
               
            </div>
        </div>
        <!-- /.row -->
         <div class="row">
            

        <hr>

        <!-- Footer -->
        <footer>
            <div class="well">
                <div class="col-lg-12">
                    <p>Copyright &copy; Haramaya City Civil Registry</p>
                    
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</div>
</div>
</body>

</html>
