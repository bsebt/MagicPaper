<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
<script type="text/javascript" src="js/mine.js"></script>
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>



    <!-- Theme & custom CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/creative.css" rel="stylesheet">
    <link href="css/mine.css" rel="stylesheet">

    <!-- jQuery -->



</head>
<body>
  <script src="//connect.facebook.net/en_US/all.js"></script>
  <script type="text/javascript">
  // var nameaddress;
  // var emailaddress;
  // FB.init({
  //   appId: '1833776856905353',
  //   xfbml: true,
  //   status: true,
  //   cookie: true,
  // });
  // FB.api('/me?fields=email,name', function(response) {
  // console.log(JSON.stringify(response));
  // id = JSON.stringify(response.id);
  // nameaddress = JSON.stringify(response.name);
  // emailaddress = JSON.stringify(response.email);
  // window.destination.href = "profile.php?name=" + nameaddress;
// });
console.log(document.cookie.name);

</script>

    <header id="fav">
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">"Welcome to Skill exchange"</h1>
                <hr>
                <a type="Button page-scroll" class="btn btn-lg" href="#profilepage"> Search</a>
            </div>
        </div>
    </header>

    <section id="profilepage">
    <div class="row">
      <div class="container-fluid">
        <div class="col-md-10"></div>
        <div class="col-md-2">
          <div class="row>">
            <img style="boarder-radius: 50px;" src=""></img>
          </div>
          <div class="row text-center">
            <?php echo "" . $_COOKIE[$username];?>
          </div>
        </div>
      </div>
    </div>
  </section>
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Theme JavaScript -->
    <!-- <script src="js/creative.js"></script> -->
     <script src="js/mine3.js"></script>
</body>
</html>
