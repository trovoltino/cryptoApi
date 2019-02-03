// User login form check
$("#btn-login").on("click", event => {
    event.preventDefault();
    const email = $("#login-email").val();
    const userPw = $("#login-pw").val();
    const btnLogin = $("#btn-login").val();

    $.post("php/main-object.php", {
        email: email,
        userPw: userPw,
        btnLogin: btnLogin
    }).done(data => {
        const result = JSON.parse(data);
        // Checks if fields submited else colors input fields
        if (result.errorEmail === true || result.errorPw === true) {
            document.querySelectorAll('i').forEach(e => e.style.color = "red");
            $(".line").css("border-color","red");
        } else {
            window.location.replace("http://127.0.0.1/MageBitApp/app/registration-done.php");
        }
    });
});
