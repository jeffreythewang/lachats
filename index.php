<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LAChats | Welcome!</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/styles.css">
      
    <script src="js/vendor/modernizr.js"></script>
    <script type='text/javascript' src='https://cdn.firebase.com/js/client/1.0.11/firebase.js'></script>
      
  </head>
  <body>
      <div id="wrapper">
    <div id="content">  
      <img src="img/LAChatsLogo.png">
        <h1></h1>
      <div id="content-login">
        <div id="fb-root">
          <h2>Form facebook groups with people in your classes!</h2>
          <br><br>
          <button id="login" class="medium secondary button" onclick="fbLogin();">Login with Facebook</button>
        </div> 
      </div>
    </div>
  </div>
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId: '1437620563148492',
      status: true,
      cookie: true,
      xfbml: true
    });
  };

  function fbLogin() {
    FB.getLoginStatus(function (response) {
        console.log('Attempting to login');
      if (response.status !== 'connected') {
        FB.login(function (response) {
          if (response.authResponse) {
            access_token = response.authResponse.accessToken;
            user_id = response.authResponse.userID;
            name = response.name;
            FB.api('/me', function (response) {
              name = response.name;
            });
            // createUser(user_id, name);
            $('[name=guid]').val(user_id);

            var fburl = 'https://la-chats.firebaseio.com/';
            var fbRef = new Firebase(fburl);
            var userRef = fbRef.child('users').child(user_id);

            userRef.child('name').set(name);
            userRef.child('fbtoken').set(access_token);
            //$('#content-login').fadeOut(function() {
            //  $('#content-none').fadeIn();
            //});  

            /*$('#content-login').fadeOut(function() {
              $('#content-none').fadeIn();
            });*/

          } else {
            console.log('cancelled login');
          }
        })
      } else {
        access_token = response.authResponse.accessToken;
        user_id = response.authResponse.userID;
        FB.api('/me', function (response) {
          name = response.first_name;
        });
        var fburl = 'https://la-chats.firebaseio.com/';
        var fbRef = new Firebase(fburl);
        var userRef = fbRef.child('users').child(user_id);

        userRef.child('name').set(name);
        userRef.child('fbtoken').set(access_token);
        //createUser(user_id, name);
        $('[name=guid]').val(user_id);
        /*$('#content-login').fadeOut(function() {
          $('#content-none').fadeIn();
        });*/
      }
    });
  }

  (function () {
    var e = document.createElement('script');
    e.src = 'http://connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
  }())
</script>
</html>
