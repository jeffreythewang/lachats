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
    <script type='text/javascript' src='https://cdn.firebase.com/js/simple-login/1.3.2/firebase-simple-login.js'></script>
    <script>
        var fburl = 'https://la-chats.firebaseio.com/';
        var chatRef = new Firebase(fburl);
        var auth = new FirebaseSimpleLogin(chatRef, function(error, user) {
          if (error) {
            // an error occurred while attempting login
            switch(error.code) {
              case 'INVALID_EMAIL':
              case 'INVALID_PASSWORD':
              default:
            }
          } else if (user) {
            // user authenticated with Firebase
            console.log('User ID: ' + user.id + ', Provider: ' + user.provider);
          } else {
            // user is logged out
          }
        });    
    
    function fbLogin(){
        auth.login('facebook');
    }
    </script>
      
  </head>
  <body>
      <div id="wrapper">
    <div id="content">  
      <img src="img/LAChatsLogo.png">
        <h1></h1>
      <div id="content-login">
        <div id="fb-root">
          <h2>Form facebook groups with people in your classes!</h2><br><br>

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
</html>
