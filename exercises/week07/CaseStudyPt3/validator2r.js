// validator2r.js
//   The last part of validator2. Registers the 
//   event handlers
//   Note: This script does not work with IE8

// Get the DOM addresses of the elements and register 
//  the event handlers

      var nameNode = document.getElementById("myName");
      var emailNode = document.getElementById("myEmail");
      var dateNode = document.getElementById("myDate");
      customerNode.addEventListener("change", test, false);
      emailNode.addEventListener("change", chkEmail, false);
      dateNode.addEventListener("change", chkDate, false);