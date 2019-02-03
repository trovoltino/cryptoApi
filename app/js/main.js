$(document).ready(() => {

    const slidingField = document.getElementById("sliding-field");
    const signupField = document.getElementById("signup");
    const loginField = document.getElementById("login");
    let pos = 0;
    const states = {wasSmall: false, lastTop: false, loginActive: true};

    // Resizes background image
    let transform = "scale3d(1.2,1.2,1) translate3d(20px, 0, 0)";
    document.getElementById("birds").style.transform = transform;

    // Manages slidingField location based on media size
    const deviceInUse = window.matchMedia("(min-width: 1000px)");
    window.addEventListener('resize', () => {
        manageStates(deviceInUse, slidingField);
    });

    // Displays Login field on login button press
    const loginBtn = document.getElementById('btn-login-move');
    loginBtn.addEventListener("click", () => {
        states.loginActive = true;
        document.getElementById("btn-signup-move").disabled = false; 
        document.getElementById("btn-login-move").disabled = true; 
        document.querySelectorAll('i').forEach(e => e.style.color = "grey");
        $(".line").css("border-color","");
        moveFieldRight(slidingField, signupField, loginField);
    });

    // Displays SignUp field on signup button press
    const signUpBtn = document.getElementById('btn-signup-move');
    signUpBtn.addEventListener("click", () => {
        states.loginActive = false;
        document.getElementById("btn-signup-move").disabled = true; 
        document.getElementById("btn-login-move").disabled = false;
        document.querySelectorAll('i').forEach(e => e.style.color = "grey");
        $(".line").css("border-color","");
        moveFieldLeft(slidingField, signupField, loginField);
    })

    // controls moving field location on Media Size change.
    function manageStates(deviceInUse, activeField) {
       
        deviceInUse.matches ? (states.wasSmall = true) : (states.wasSmall = false);

        if (states.wasSmall === true && states.lastTop === false) {
            activeField.style.top = 0;
            states.lastTop = true;
            if (!states.loginActive){activeField.style.right = 47 + '%';}
        } 
        if (states.wasSmall === false && states.lastTop === true) {
            activeField.style.right = 0;
            states.lastTop = false;
            if (!states.loginActive) {activeField.style.top = 47 + '%';}
        }
    }
    // moves field Right or Up
    function moveFieldRight(field, signupField, loginField) {
        let opacitySignup = 1;
        let opacityLogin = 0;
        const animate = setInterval(frame, 8);
        function frame() {
            if (pos <= 0) {
            clearInterval(animate);
            // in middle of animation switches divs inside
            } else {
                if (pos < 23) {
                    opacityLogin+=0.1;
                    signupField.style.display = "none";
                    loginField.style.display = "block";
                } else {
                    opacitySignup-=0.1;
                }
                pos-=1;
                if (deviceInUse.matches) {
                    field.style.right = pos + "%";
                  } else {
                    field.style.top = pos + "%";
                }
                signupField.style.opacity = opacitySignup;
                loginField.style.opacity = opacityLogin;
            }
        }
    }
    // moves field left or down
    function moveFieldLeft(field, signupField, loginField) {
        let opacityLogin = 1;
        let opacitySignup = 0;
        const animate = setInterval(frame, 8);
        function frame() {
          if (pos >= 47) {
            clearInterval(animate);
            // in middle of animation switches divs inside
            } else {
                if (pos >23) {
                    opacitySignup+=0.1;
                    signupField.style.display = "block";
                    loginField.style.display = "none";
                } else {
                    opacityLogin-=0.1;
                }
                pos+=1;
                if (deviceInUse.matches) {
                    field.style.right = pos + "%"; 
                  } else {
                    field.style.top = pos + "%";
                }
                loginField.style.opacity = opacityLogin;
                signupField.style.opacity = opacitySignup;
            }
        }
    }
});
