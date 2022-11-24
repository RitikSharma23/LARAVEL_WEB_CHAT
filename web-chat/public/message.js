

firstuser=""
lastmessage=""
function messageyou(word,time){
    text0=document.createElement('div')
    text0.classList.add('message')
    text=document.createElement('div')
    text.classList.add('text-main')
    text2=document.createElement('div')
    text2.classList.add('text-group')
    text3=document.createElement('div')
    text3.classList.add('text')

    p=document.createElement('p')
    p.innerHTML=word

    s=document.createElement('span')
    s.innerHTML=time
    text0.appendChild(text)
    text.appendChild(text2)
    text.appendChild(s)
    text2.appendChild(text3)
    text3.appendChild(p)
    document.getElementById('mes').appendChild(text0)
}


function messageme(word,time){
    text0=document.createElement('div')
    text0.classList.add('message','me')
    text=document.createElement('div')
    text.classList.add('text-main')
    text2=document.createElement('div')
    text2.classList.add('text-group')
    text3=document.createElement('div')
    text3.classList.add('text','me')

    p=document.createElement('p')
    p.innerHTML=word

    s=document.createElement('span')
    s.innerHTML=time
    text0.appendChild(text)
    text.appendChild(text2)
    text.appendChild(s)
    text2.appendChild(text3)
    text3.appendChild(p)

    document.getElementById('mes').appendChild(text0);
}

function usercreate(name){
    var a=document.createElement('a')
    a.classList.add('filterDiscussions','all','unread','single')
    a.id="list-empty-list"

    var img=document.createElement('img')
    img.classList.add('avatar-md')
    img.src="dist/img/avatars/profile.png"
    img.title="Shanu"
    img.alt="avatar"

    var h=document.createElement('h5')
    h.innerHTML=name

    var div=document.createElement('div')
    div.classList.add('data')

    var dmain=document.createElement('div')
    dmain.classList.add('list-group','profile')
    dmain.id=name

    div.appendChild(h)

    a.appendChild(img)
    a.appendChild(div)
    dmain.appendChild(a)
    document.getElementById('dis').appendChild(dmain)
}

function timeconvert(timeEpoch, offset){
  var d = new Date(timeEpoch);
  var utc = d.getTime() + (d.getTimezoneOffset() * 60000);
  var nd = new Date(utc + (3600000*offset));
  if(nd.toLocaleString().slice(13,14)==":"){
  return nd.toLocaleString().slice(11,16);
  }else{
  return nd.toLocaleString().slice(11,17);
  }
}


me="vrutik"
// user="shanu"

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

  firebase.database().ref(me+'/').once('value',function(snapshot) {

    snapshot.forEach(function(childSnapshot){

      var childKey = childSnapshot.key;
      var childData = childSnapshot.val();


      usercreate(childKey)
    });

  })


  var delayInMilliseconds = 3000;


setTimeout(function() {


function dischat(me,user){

      firebase.database().ref(me+'/'+user+'/me/').on('value',function(snapshot) {
      document.getElementById("mes").innerHTML=""

        snapshot.forEach(function(childSnapshot){

          var childKey = childSnapshot.key;
          var childData = childSnapshot.val();



        tt=timeconvert(parseInt(childKey.slice(0,13)),+5.50)


          if(childKey[(childKey.length)-1]=="R"){
            tt=timeconvert(parseInt(childKey.slice(0,13)),+5.50)
            messageme(childData,tt)

          }

          if(childKey[(childKey.length)-1]=="L"){
            tt=timeconvert(parseInt(childKey.slice(0,13)),+5.50)
            messageyou(childData,tt)
          }


        });
      });
}



    var elements = document.getElementsByClassName("profile");
    firstuser=elements[0].getAttribute("id");
    dischat(me,firstuser)
    user=firstuser;



    var myFunction = function() {
        var attribute = this.getAttribute("id");
    //     // document.getElementById("mes").innerHTML=""
        dischat(me,attribute)
        user=attribute
    };

    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', myFunction, false);
    }

}, delayInMilliseconds);




document.getElementById("send2").addEventListener("click",abcd);
function abcd(){
    const d = new Date();
    var tim=d.getTime();

    var z=document.getElementById("text2").value;

    if(z==null){

    }else{

    firebase.database().ref(me+'/'+user+'/me/'+tim+"R").set(z);
    firebase.database().ref(user+'/'+me+'/me/'+tim+"L").set(z);

    document.getElementById("text2").value=null

    var objDiv = document.getElementById("content");
    objDiv.scrollTop = objDiv.scrollHeight;
    }

  }

  $("#text2").keypress(function(event) {
    if (event.keyCode === 13) {
        $("#send2").click();
    }
});

$("#send2").click(function() {
});
