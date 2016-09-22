// validator2.js
//   Note: This document does not work with IE8

// ********************************************************** //
// The event handler function for the name text box

function chkName(event) {

// Get the target node of the event
  var myName = event.currentTarget;

// Test the format of the input name 
  var pos = myName.value.search(/^[A-Z][a-z]+ ?[A-Z][a-z]+ ?[A-Z][a-z]$/);

  if (pos != 0) {
    alert("The name you entered (" + myName.value + 
          ") is invalid. \n" +
          "The name should only contain alphabet characters and character spaces.");
    myName.focus();
    myName.select();
	return false;
  } 
}

// ********************************************************** //
// The event handler function for the email text box

function chkEmail(event) {

// Get the target node of the event
  var myEmail = event.currentTarget;

// Test the format of the input email
  var pos = myEmail.value.search(/^[\w.-] +"@" [\w.]{2,4} +. \w{2,3} $/);
 
  if (pos != 0) {
    alert("The phone number you entered (" + myEmail.value +
          ") is not in the correct form. \n" +
          "The correct form is: ddd-ddd-dddd \n" +
          "Please go back and fix your phone number");
    myEmail.focus();
    myEmail.select();
	return false;
  } 
}

// ********************************************************** //
// The event handler function for the date input

function chkDate(event) {

// Get the target node of the event
  var myDate = event.currentTarget;

// Test the format of the input date
  var pos = today.toLocaleString();
 
  if (pos == myDate) {
    alert("The date you entered (" + myDate.value +
          ") cannot be today's date. \n" +
          "Please re-enter a valid date.");
    myDate.focus();
    myDate.select();

  else if (pos == myDate) {
    alert("The date you entered (" + myDate.value +
          ") has already passed. \n" +
          "Please re-enter a valid date.");
    myDate.focus();
    myDate.select();

  return false;
  } 
}

function test() {
  alert("hello");
}
