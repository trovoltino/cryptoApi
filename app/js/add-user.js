// Adds user to database
$("#btn-signup").on("click", event => {
    event.preventDefault();
    const userName = $("#uName").val();
    const email = $("#email").val();
    const userPw = $("#password").val();
    const btnSignup = $("#btn-signup").val();

    $.post("php/main-object.php", {
        userName: userName,
        email: email,
        userPw: userPw,
        btnSignup: btnSignup

    //Checks if all fields are submited.
    }).done(data => {
        const result = JSON.parse(data);
        if (result.errorFields === true || result.errorEmail === true) {
            document.querySelectorAll('i').forEach(e => e.style.color = "red");
            $(".line").css("border-color","red");
        } else {
            $(".main").hide();
            showComplete();
            setTimeout(function reload(){
                location.reload();
            }, 2000);
        }
    });
});

// creates temporary page
function showComplete(){
    const mainDiv = $('<div>',{class: 'main'});
    const regDiv = $('<div>',{class: 'registration-done'});
    const chBox = $('<img>',{class:"birds", src:"img/real-bird.jpg", alt:"birds flying"})
    const skuP = $('<p>').text("Registration Complete");
    
    mainDiv.append(chBox,regDiv);
    mainDiv.appendTo("body"); 
    skuP.appendTo(regDiv);
}
