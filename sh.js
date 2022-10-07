const firebaseConfig = {
    apiKey: "AIzaSyC89m3kaH-FckEJmYvAtUh0OYXfhfwj6HQ",
    authDomain: "hello-331d3.firebaseapp.com",
    databaseURL: "https://hello-331d3-default-rtdb.firebaseio.com",
    projectId: "hello-331d3",
    storageBucket: "hello-331d3.appspot.com",
    messagingSenderId: "624045624533",
    appId: "1:624045624533:web:a4a66eb21f0d9b7389265c"
  };



  
// initialize firebase
firebase.initializeApp(firebaseConfig);

// reference your database
var contactFormDB = firebase.database().ref("contactForm");

document.getElementById("contactForm").addEventListener("submit", submitForm);

function submitForm(e) {
  e.preventDefault();

  var name = getElementVal("name");
  var message = getElementVal("message");
  

  saveMessages(name, message);

  //   enable alert
  document.querySelector(".alert").style.display = "block";

  //   remove the alert
  setTimeout(() => {
    document.querySelector(".alert").style.display = "none";
  }, 3000);

  //   reset the form
  document.getElementById("contactForm").reset();
}

const saveMessages = (name, message) => {
  var newContactForm = contactFormDB.push();

  newContactForm.set({
    name: name,
    message: message,
  });
};

const getElementVal = (name) => {
  return document.getElementById(name).value;
};