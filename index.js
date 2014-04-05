var myUser;
var fburl = 'https://la-chats.firebaseio.com/';

function fbLogin() {

	var fbRef = new Firebase(fburl);
	var auth = new FirebaseSimpleLogin(chatRef, function(error, user) {
	  if (error) {
	    // an error occurred while attempting login
	    console.log(error);
	    }
	  } else if (user) {
	    // user authenticated with Firebase
	    console.log('User ID: ' + user.id + ', Provider: ' + user.provider);
	    myUser = user;
	    var userRef = chatRef.child('users').child(user.id);

	    userRef.child('name').set(user.displayName);
	    userRef.child('fbtoken').set(user.accessToken);

	  } else {
	    // user is logged out
	  }
	});

	auth.login('facebook');
}

function addClass(classes) {

	var fbRef = new Firebase(fburl);
	var classLen = classes.length;
	for (var i = 0; i < classLen; i++) {
		// classes[i] should be a dict containting the class data
		var userRef = fbRef.child('users').child(user.id).child(classes).child(classes[i]);
		userRef.child('classid').set(classes[i]);
		var classRef = chatRef.child(classes[i]).child(myUser.id);
		classRef.child('name').set(myUser.displayName);
	}
}