window.fbAsyncInit = function() {
  FB.init({
    appId      : '274441639985073',
    cookie     : true,
    xfbml      : true,
    version    : 'v3.1'
  });


  FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
  });

};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "https://connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));

function statusChangeCallback(response){
  if(response.status === 'connected'){
    console.log("logged in and authenticated");
    setElements(true);
    testAPI();

  }
  else{
  console.log("not authenticated");
  setElements(false);
}
}



function checkLoginState() {
FB.getLoginStatus(function(response) {
  statusChangeCallback(response);
});
}
function testAPI(){
FB.api('/me?fields=name,email,birthday,location' , function(response){
  if(response && !response.error){
    //console.log(response);
    buildProfile(response);
  }
})
}
function buildProfile(user){
let profile = `
  <h3>${user.name}</h3>
  <ul class="list-group">
    <li class="list-group-item">User ID : ${user.id}</li>
    <li class="list-group-item">User Email : ${user.email}</li>
    <li class="list-group-item">User Birthday : ${user.birthday}</li>
    <li class="list-group-item">User Location : ${user.location.name}</li>
  </ul>

`;
  document.getElementById('profile').innerHTML = profile;
}

function setElements(isLoggedIn){
  if(isLoggedIn){
    document.getElementById('logout').style.display='block';
    document.getElementById('profile').style.display='block';
    document.getElementById('fb-btn').style.display='none';
    document.getElementById('heading').style.display='none';
  }
  else{
    document.getElementById('logout').style.display='none';
    document.getElementById('profile').style.display='none';
    document.getElementById('fb-btn').style.display='block';
    document.getElementById('heading').style.display='block';

  }
}

function logout(){
FB.logout(function(response){
  setElements(false);
})
}
