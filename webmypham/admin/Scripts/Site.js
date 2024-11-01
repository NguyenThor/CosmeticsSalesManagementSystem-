
$(document).ready(function () {
    $('#txtkeyboard').keyboard({
        autoAccept: true
    })
    .addTyping();
    $('#txtNumkeyboard').keyboard({
        layout: 'num',
        restrictInput: true,
        preventPaste: true,
        autoAccept: true
    })
    .addTyping();
});


        
