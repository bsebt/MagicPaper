<!DOCTYPE html>

<html>
  <head>
    <title>Example</title>
  </head>
  <body>
    <!-- Load the Facebook JavaScript SDK -->
    <div id="fb-root"></div>
    <script src="//connect.facebook.net/en_US/all.js"></script>

    <script type="text/javascript">

var email;
var name;
var id;

      // Initialize the Facebook JavaScript SDK
      FB.init({
        appId: '1833776856905353',
        xfbml: true,
        status: true,
        cookie: true,
      });

      // Check if the current user is logged in and has authorized the app
      FB.getLoginStatus(checkLoginStatus);

      // Login in the current user via Facebook and ask for email permission
      function authUser() {
        FB.login(checkLoginStatus, {scope:'email'});
      }

      // Check the result of the user status and display login button if necessary
      function checkLoginStatus(response) {
        if(response && response.status == 'connected') {
          // alert('User is authorized');

          // Hide the login button
          document.getElementById('loginButton').style.display = 'none';

          // Now Personalize the User Experience
          console.log('Access Token: ' + JSON.stringify(response));


        } else {
          // alert('User is not authorized');

          // Display the login button
          document.getElementById('loginButton').style.display = 'block';
        }
        FB.api('/me?fields=email,name', function(response) {
        // console.log(JSON.stringify(response));
        id = JSON.stringify(response.id);
        nameaddress = JSON.stringify(response.name);
        emailaddress = JSON.stringify(response.email);
        document.cookie = "username="+emailaddress;
        console.log(document.cookie);
        // window.destination.href = "profile.php?name=" + nameaddress;
        var sending = {email:emailaddress};
        $.ajax({
          url: "profile.php",
          type: "POST",
          contentType: 'application/json',
          data: JSON.stringify(sending)
        }).success(function (res) {
          alert('success');
          window.destination.replace("http://localhost:8888/ConUHack/profile.php");
        }).fail(function(){
          console.log('connection error')

        });

    });

      }

    </script>

    <input id="loginButton" type="button" value="Login!" onclick="authUser();" />
    <script src="vendor/jquery/jquery.js"></script>

  </body>
</html>
