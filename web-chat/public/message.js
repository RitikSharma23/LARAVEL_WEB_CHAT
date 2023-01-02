
uimage=""
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
    var x=name.split('@')
    nam=x[1]
    phone=x[0]
    try{
        image=x[2].replace('_','.')
    }catch{}
    var a=document.createElement('a')
    a.classList.add('filterDiscussions','all','unread','single')
    a.id="list-empty-list"

    var img=document.createElement('img')
    img.classList.add('avatar-md')
    img.src="profile/"+image
    img.title=nam
    img.alt="avatar"




    var h=document.createElement('h5')
    h.innerHTML=nam

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


me=document.getElementById('udetail').innerHTML;
me=me.replace(".","_")
// user="8866892314@Ritik Sharma@profile_png"
// me="112231212@Vrutik Jagad@profile_png"
// me="ritik"
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









// firebase.database().ref(me+'/').set("")



  var delayInMilliseconds = 3000;


setTimeout(function() {


function dischat(me,user){
    var x=user.split('@')
    nam=x[1]
    phone=x[0]
    try{
        image=x[2].replace('_','.')
    }catch{}
    zx=0;

document.getElementById("imgch3").src="profile/"+image
uimage="profile/"+image

    document.getElementById('liveuser').innerHTML=nam

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
            zx++;

          }

          var objDiv = document.getElementById("content");
          objDiv.scrollTop = objDiv.scrollHeight;
        });

      });

      console.log(zx)
}




    var elements = document.getElementsByClassName("profile");
    firstuser=elements[0].getAttribute("id");
    if(firstuser==null){firstuser=user}else{dischat(me,firstuser);user=firstuser;}
    dischat(me,user)


    var myFunction = function() {
        var attribute = this.getAttribute("id");

        if(firstuser!=null){
            dischat(me,attribute)
            console.log(attribute)
            user=attribute
        }

    };

    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', myFunction, false);
        console.log(elements)

    }


}, delayInMilliseconds);


const d = new Date();
    var tim=d.getTime();

document.getElementById("send2").addEventListener("click",abcd);
function abcd(){

const d = new Date();
var tim=d.getTime();


    var z=document.getElementById("text2").value;

    if(z==""){
        console.log(document.getElementById("text2").rows)
    }else{
        console.log(z)
        console.log(document.getElementById("text2").rows)



    firebase.database().ref(me+'/'+user+'/me/'+tim+"R").set(z);
    firebase.database().ref(user+'/'+me+'/me/'+tim+"L").set(z);

    document.getElementById("text2").value=""

    var objDiv = document.getElementById("content");
    objDiv.scrollTop = objDiv.scrollHeight;
    }

  }

  $("#text2").keypress(function(event) {

    if (event.keyCode === 13) {
        $("#send2").click();
        var z=document.getElementById("text2").value;

        if(z==""){

        }else{

        firebase.database().ref(me+'/'+user+'/me/'+tim+"R").set(z);
        firebase.database().ref(user+'/'+me+'/me/'+tim+"L").set(z);

        document.getElementById("text2").value=null

        var objDiv = document.getElementById("content");
        objDiv.scrollTop = objDiv.scrollHeight;
        }
    }

});


m=0;
firebase.database().ref('/').once('value',function(snapshot) {
   snapshot.forEach(function(childSnapshot){
     var childKey = childSnapshot.key;
     var childData = childSnapshot.val();
     if(me==childKey){m=1}

   });
   if(m==1){}else{firebase.database().ref(me+'/').set("")}
 })


$("#send2").click(function() {
});


// add user
  document.getElementById('person').addEventListener("click",()=>{
        document.getElementById("addbox").style.zIndex="3"
        document.getElementById('mainclass').style.filter="blur(4px)";
  })
  document.getElementById('close').addEventListener("click",()=>{
        document.getElementById("addbox").style.zIndex="-3"
        document.getElementById('mainclass').style.filter="blur(0px)";
  })

  document.getElementById('feedbtn').addEventListener("click",()=>{
        document.getElementById("feedbox").style.zIndex="3"
        document.getElementById('mainclass').style.filter="blur(4px)";
  })
  document.getElementById('close2').addEventListener("click",()=>{
        document.getElementById("feedbox").style.zIndex="-3"
        document.getElementById('mainclass').style.filter="blur(0px)";
  })


function newuser(newuser,message){
    f=0;
    a="";b=""


    firebase.database().ref('/').once('value',function(snapshot) {
        snapshot.forEach(function(childSnapshot){
          var childKey = childSnapshot.key;
          var childData = childSnapshot.val();
          var x=childKey.split('@')
          phone=x[0]

          if(me==childKey){m=1}
          if(newuser==phone){f=1;a=childKey}

        });

        if(f==0){
        document.getElementById("error").innerHTML="Sorry! User Not Found"
        }else{
            firebase.database().ref(me+'/'+a+'/me/'+tim+"R").set(message);
            firebase.database().ref(a+'/'+me+'/me/'+tim+"L").set(message);
            document.getElementById("success").innerHTML="Message Sent Successfully..."
            setTimeout(function() { location.reload() },2000 );
        }
        if(m==1){}else{firebase.database().ref(me+'/').set("")}

      })
}


document.getElementById("find").addEventListener("click",()=>{
newuser(document.getElementById("usernum").value,document.getElementById("usermess").value)

})

document.getElementById("usernum").addEventListener("focus",()=>{
    document.getElementById("error").innerHTML=""
})


document.getElementById("findfeed").addEventListener("click",()=>{
console.log(document.getElementById('findfeedd').value)
})


document.getElementById("imgch").addEventListener("click",()=>{
 var x= document.getElementById("bb").style.zIndex="3"
 document.getElementById("mainclass").style.filter="blur(10px)"
})

document.getElementById("close3").addEventListener("click",()=>{
  var x= document.getElementById("bb").style.zIndex="-3"
  document.getElementById("mainclass").style.filter="blur(0px)"
})

document.getElementById("close4").addEventListener("click",()=>{
  var x= document.getElementById("db").style.zIndex="-3"
  document.getElementById("mainclass").style.filter="blur(0px)"
})








document.getElementById("clear").addEventListener("click",()=>{
    firebase.database().ref(me+'/'+user+'/me/').set("");
})


document.getElementById("imgch3").addEventListener("click",()=>{
  var x= document.getElementById("db").style.zIndex="3"
  document.getElementById("dp").src=uimage
  document.getElementById("mainclass").style.filter="blur(10px)"
})


document.getElementById("conversations").addEventListener("keyup",()=>{
    a=document.getElementById("conversations").value
    var elements = document.getElementsByClassName("list-group profile");

    for (var i = 0; i < elements.length; i++) {
        if(elements[i].getAttribute("id").indexOf(a)>=1){
        console.log(elements[i].getAttribute("id"))
        document.getElementById(elements[i].getAttribute("id")).style.display="block"
        }else{
        document.getElementById(elements[i].getAttribute("id")).style.display="none"

        if(a==""){document.getElementById(elements[i].getAttribute("id")).style.display="block"}
        }
    }

})


document.getElementById("conversations").addEventListener("focusout",()=>{
    var elements = document.getElementsByClassName("list-group profile");
    for (var i = 0; i < elements.length; i++) {
        document.getElementById(elements[i].getAttribute("id")).style.display="block"
        document.getElementById("conversations").value=""
    }
})

document.getElementById("logout").addEventListener("click",()=>{
    if (confirm("Do You Want To Logout") == true) {
        location.replace("http://127.0.0.1:8000")
      } else {
      }

})



