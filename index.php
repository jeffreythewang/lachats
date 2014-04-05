<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LAChats | Welcome!</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body style="background-image:url(http://i.imgur.com/bNYFWzr.jpg)">
      <div id="wrapper">
    <div id="content">  
      <img src="img/LAChatsLogo.png">
        <h1></h1>
      <div id="content-login">
        <div id="fb-root">
          <h2>Chat with people in your classes!</h2>
          <br><br>
        </div> 
        <button id="login" class="medium secondary button" onclick="fbLogin();">Login with Facebook</button>
      </div>
    </div>
  </div>
  </body>
<script src="js/vendor/modernizr.js"></script>
    <script type='text/javascript' src='https://cdn.firebase.com/js/client/1.0.11/firebase.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/index.js"></script>
    <script>
      $(document).foundation();
    </script>
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
            console.log('Connnected');
            access_token = response.authResponse.accessToken;
            user_id = response.authResponse.userID;
            FB.api('/me', function (response) {
              name = response.name;
              console.log(name);
              //var fburl = 'https://la-chats.firebaseio.com/';
              var fbRef = new Firebase('https://la-chats.firebaseio.com/users/' + user_id);
              //var userRef = fbRef.child('users').child(user_id);
              username = String(name);
              fbRef.child('name').set(username);
              console.log(name);
              myToken = String(access_token);
              fbRef.child('fbtoken').set(myToken);
              console.log(access_token);
            //redirects to our main.php page
            window.location = '/main.html' + '?id=' + user_id;
            });
            // createUser(user_id, name);
            $('[name=guid]').val(user_id);
            
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
        console.log('Already connnected');
        access_token = response.authResponse.accessToken;
        user_id = response.authResponse.userID;
        FB.api('/me', function (response) {
          name = response.name;
          console.log(name);
          //var fburl = 'https://la-chats.firebaseio.com/';
              var fbRef = new Firebase('https://la-chats.firebaseio.com/users/' + user_id);
              //var userRef = fbRef.child('users').child(user_id);

          username = String(name);
          fbRef.child('name').set(username);
          console.log(name);
          myToken = String(access_token);
          fbRef.child('fbtoken').set(myToken);
          console.log(access_token);
          //redirects to our main.php page
          window.location = '/main.html' + '?id=' + user_id;
        });
        
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
