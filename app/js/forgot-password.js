// Forgot password form
$("#btn-forgot").on("click", event => {
    event.preventDefault();
    const forgotEmail = $("#forgot-email").val();
    const btnForgot = $("#btn-forgot").val();
    
    $.post("php/main-object.php", {
        forgotEmail: forgotEmail,
        btnForgot: btnForgot
    }).done(data => {
        const result = JSON.parse(data);
        if (result.errorEmail === true) {
           alert("No account found with this Email adress");
        } else {
            alert("Reset link has been sent to your Email");
        }
    });
});
