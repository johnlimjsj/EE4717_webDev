// validator2.js
//   Note: This document does not work with IE8

// ********************************************************** //
// The event handler function for the name text box

function hello(){

}
function chkName(event) {

// Get the target node of the event
  var myNameTarget = event.currentTarget;

// Test the format of the input name 
  var patt = /^[a-zA-Z\s]+$/;
  // var pos = myName.value.search(/^[A-Z][a-z]+ ?[A-Z][a-z]+ ?[A-Z][a-z]$/);
  var pos = myNameTarget.value.search(patt);

  if (pos != 0) {
    alert("The name you entered (" + myNameTarget.value + 
          ") is invalid. \n" +
          "The name should only contain alphabet characters and character spaces.");
    returnFalse(myNameTarget);
  } 
}

function chkPassword(event) {
  var pwStrengthMsg = {
    length:"Password needs to be at least 8 characters long \n",
    uppercase:"Password needs at least two Upper Case \n",
    number:"Password needs at least 1 number \n",
    special:0,
  };

  var myPasswordTarget = event.currentTarget;
  var myPasswordVal = myPasswordTarget.value;
  var myPasswordLength = myPasswordVal.length;

  var anUpperCase = /[A-Z]{2,}/;
  var aLowerCase = /[a-z]/; 
  var aNumber = /[0-9]{1,}/;
  var aSpecial = /[!|@|#|$|%|^|&|*|(|)|-|_]{1,}/;

// Test the format of the input name 
  var patt = /^[a-zA-Z._-]+@[0-9]{2,3}$/;

// performing checks
  var isUppCase = anUpperCase.test(myPasswordVal);
  var isLong = (myPasswordLength>8);
  var isNum = aNumber.test(myPasswordVal)
  // to check password strength
  // if(isUppCase){pwStrength.uppercase+=1}
  // if(isLong){pwStrength.length+=1}
  // if(isNum){pwStrength.number+=1}
  if(!isUppCase || !isLong || !isNum){
    var outputMsg = "";
    if(!isUppCase){ outputMsg += pwStrengthMsg.uppercase}
    if(!isLong){ outputMsg += pwStrengthMsg.length}
    if(!isNum){ outputMsg += pwStrengthMsg.number}
    alert(outputMsg);

    returnFalse(myPasswordTarget);
  }


    
   
}

// ********************************************************** //
// The event handler function for the email text box

function chkEmail(event) {

// Get the target node of the event
  var myEmailTarget = event.currentTarget;

// Test the format of the input email
  var patt = /^[\w]+@[\w]+.[\w]{2,4}$/;
  var pos = myEmailTarget.value.search(patt);
  if (pos != 0) {
    alert("The email you entered (" + myEmailTarget.value +
          ") is not in the correct form. \n" +
          "The correct form is: xxxx@domainname.com \n" +
          "Please go back and fix your email");

    returnFalse(myEmailTarget);
  } 
}

// ********************************************************** //
// The event handler function for the date input

function chkDate(event) {
  // Get the target node of the event
  var myDateTarget = event.currentTarget;
  var myDate = myDateTarget.value.split('-');
  var today = new Date();

  // parse dates into integers
  today = parseTodayDate(today);
  myDate = parseInputDate(myDate);
  
  // check if input is todays date
  var isToday = checktoday(myDate, today);
  var isFuture = checkfuture(myDate, today);

  if(isToday || isFuture){
    if(isToday){
      alert("hey dont key in todays date you bugger");
    }

    else{
      alert("hey dont key in a date in the future you bugger");
    }

    returnFalse(myDateTarget);

  }

  function parseInputDate(date){
    var day=parseInt(date[2]);
    var month=parseInt(date[1]);
    var year=parseInt(date[0]);
    return [day, month, year]
  }

  function parseTodayDate(date){
    var day = date.getDate()
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    return [day, month, year]
  }
   function checktoday(input, today){
    if(input[2] == today[2]){
      if(input[1] == today[1])
        if(input[0] == today[0])
          return true;
    
      return false
    }
   }

   function checkfuture(input, today){
    if(input[2] >= today[2]){
      if(input[1] >= today[1])
        if(input[0] > today[0])
          return true;
    
      return false
    }
   }

   function checkpast(input, today){
    if(input[2] <= today[2]){
      if(input[1] <= today[1])
        if(input[0] < today[0])
          return true;
    
      return false
    }
   }
}

function returnFalse(obj) {
  obj.focus()
  obj.select();
  return false
}
