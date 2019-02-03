// Adds attribute to user
$("#btn-attribute").on("click", event => {
    event.preventDefault();
    const btnAttribute = $("#btn-attribute").val();
    const attribute = $("#attribute");
    const attributeValue = $("#attribute-value");
    
    $.post("php/main-object.php", {
        attribute: attribute.val(),
        attributeValue: attributeValue.val(),
        btnAttribute: btnAttribute
    }).done(data => {
        const result = JSON.parse(data);
        if (result.errorFields === true) {
            alert("please fill out all fields");
        } else {
            attribute.val('');
            attributeValue.val('');
        }
    });
});