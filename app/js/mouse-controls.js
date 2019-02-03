    
$(document).ready(() => {

    const mainField = document.getElementsByClassName('main');

    // Resizes cursor on mouseclick
    mainField[0].addEventListener("click", () => {
        const cursor = document.getElementById('cursor');
        cursor.style.animationPlayState = 'running';
        const interval = setInterval(() => {
            cursor.style.animationPlayState = 'paused';
            clearInterval(interval);
        }, 150);
    });

    // Draws circle on mouse position.
    mainField[0].addEventListener("mousemove", function(e) {
        let xPos = e.pageX - this.offsetLeft;
        let yPos = e.pageY - this.offsetTop;
        const cursor = document.getElementById('cursor');
        cursor.style.left = xPos + "px";
        cursor.style.top = yPos + "px";
    });
});  
