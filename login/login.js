//process the login and the register
// document
//   .querySelector('#regForm button')
//   .addEventListener('click', doReg);
(function () {
    document
      .querySelector('#loginForm #loginBtn')
      .addEventListener('click', doLogin);
  
    document
      .querySelector('#regForm #regBtn')
      .addEventListener('click', doReg);
  });
  // // Register
  // function doReg(ev) {
  //   ev.preventDefault();
  //   console.info('Send a Register request');
  //   let n = document.querySelector('#regForm .name').value;
  //   let em = document.querySelector('#regForm .email').value;
  //   let pass = document.querySelector('#regForm .pass').value;
  //   //TODO: Add form validation
  //   let user = {name: n , lastname: ln, email: em, password: pass };
  //   let endpoint = 'register';
  //   sendData(user, endpoint, registerSuccess);
    
  //   if(!fn && !ln && !em && !pass){
  //     window.location.replace("./login.html");
  //   }else{
  //     window.location.replace("../home/index.html");
  //   }
    
  //   isLoggedIn();
  //   autoRedirect();
  // }
  
  //Login
  // function doLogin(ev) {
  //   ev.preventDefault();
  //   console.info('Send a login request');
    
  //   let em = document.querySelector('#loginForm .email').value;
  //   let pass = document.querySelector('#loginForm .pass').value;
  //   //TODO: Add form validation
  //   let user = { email: em, password: pass };
  //   let endpoint = 'login';
  //   sendData(user, endpoint, loginSuccess);
    
  
  //   if(!em && !pass){
  //     window.location.replace("./login.html");
  //   }else{
  //     window.location.replace("../home/index.html");
  //   }
  
  //   isLoggedIn();
  //   autoRedirect();
    
  // }
  
  function sendData(user, endpoint, callback) {
    let url = `http://localhost:3001/${endpoint}`;
    let h = new Headers();
    h.append('Content-Type', 'application/json');
    let req = new Request(url, {
      method: 'POST',
      headers: h,
      body: JSON.stringify(user),
    });
    fetch(req)
      .then((res) => res.json())
      .then((content) => {
        //we have a response
        if ('error' in content) {
          //bad attempt
          failure(content.error);
        }
        if ('data' in content) {
          //it worked
          callback(content.data);
        }
      })
      .catch(failure);
  }
  
  function loginSuccess(data) {
    //we have a token so put it in localstorage
    console.info('token', data.token);
    sessionStorage.setItem('myapp-token', data.token);
    alert('You are logged in');
  }
  
  function registerSuccess(data) {
    //user has been registered
    console.info('new user created', data);
    alert('You have been registered');
  }
  
  function failure(err) {
    alert(err.message);
    console.warn(err.code, err.message);
  }
  
  function isLoggedIn () {
    
    const { token, user } = res.body
    localStorage.setItem('user', user)
  }
  
  async function autoRedirect () {
    const validLogin = await isLoggedIn()
    if (!validLogin && location.pathname !== '/login/') redirect('./login.html');
    if (validLogin && location.pathname === '/login/') redirect('../home/index.html');
  }
  
  function logout () {
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    window.location.replace('./login.html');
  }
  