/* make the API call */
FB.api(
    "/1437620563148492/groups",
    "POST",
    {
        "object": {
            "name": "Test Group Name",
            "privacy": closed
        }
    },
    function (response) {
      if (response && !response.error) {
        /* handle the result */
        console.log("Your group has been created with group ID: " + response.id);
      }
    }
);
