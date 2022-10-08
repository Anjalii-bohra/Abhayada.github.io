//setting up firebase with our website

const firebaseApp = firebase.initializeApp({

  apiKey: "AIzaSyAwQ9KKU-l9b98cWnBvnrUb78Ybjf2JGMM",
  authDomain: "auth-form-68acc.firebaseapp.com",
  projectId: "auth-form-68acc",
  storageBucket: "auth-form-68acc.appspot.com",
  messagingSenderId: "255857643583",
  appId: "1:255857643583:web:2ab6baaf094131ae55688a"
});
const db = firebaseApp.firestore();
const auth = firebaseApp.auth();

//sign up function
const signUp = () => {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  console.log(email, password)
  //firebase code
  firebase.auth().createUserWithEmailAndPassword(email, password)
    .then((result) => {
      // Signed in 
      // document.write("you are Signed up")
      window.location.href = './signin.html'
      console.log(result)
      // ...
    })
    .catch((error) => {
      console.log(error.code);
      console.log(error.message)
      // ..
    });
}

//Sign In Function

const signIn = () => {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  // firebase code
  firebase.auth().signInWithEmailAndPassword(email, password)
    .then((result) => {
      // Signed in
      //document.write("you are Signed In")
      console.log(result)
      window.location.href = './idashboard.html'

      // ...
    })
    .catch((error) => {
      console.log(error.code);
      console.log(error.message)

    });
}