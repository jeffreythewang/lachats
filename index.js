function fbLogin() {
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
	    var userRef = chatRef.child('users/' + user.id);

	    userRef.child('name').set(user.displayName);

	  } else {
	    // user is logged out
	  }
	});

	auth.login('facebook');
}