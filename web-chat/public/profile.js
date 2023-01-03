
const firebaseConfig = {
    apiKey: "AIzaSyCtjg8Ziqkzk5ixe1kDQ9VmKkJKO4FFAbE",
    authDomain: "chatting-95a95.firebaseapp.com",
    databaseURL: "https://chatting-95a95-default-rtdb.firebaseio.com",
    projectId: "chatting-95a95",
    storageBucket: "chatting-95a95.appspot.com",
    messagingSenderId: "733255644621",
    appId: "1:733255644621:web:1b764b3ffd7c39b858c084",
    measurementId: "G-1CLZVFZEX7"
  };

  firebase.initializeApp(firebaseConfig);
  database=firebase.database()

  user=document.getElementById("phone").value+"@"+document.getElementById("fname").value+" "+document.getElementById("lname").value+"@"+document.getElementById("fname").value+"_jpg"



form=document.querySelector("form")
form.addEventListener("submit",async(e)=>{
  e.preventDefault()

  database.ref(user).once("value", function(snapshot) {
    userafter=document.getElementById("phone").value+"@"+document.getElementById("fname").value+" "+document.getElementById("lname").value+"@"+document.getElementById("fname").value+"_jpg"

    if(user==userafter){

    }else{
        alert("Profile Updated Successfully..")
        database.ref(userafter).set(snapshot.val());
        snapshot.ref.remove();
    }

  form.submit()

        });

})


