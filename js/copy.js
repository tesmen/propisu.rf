$('#clipboard_text1').on('click', function (event) {
    $('#clipboard_text1').select();

    try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';
        console.log('Cutting text command was ' + msg);
    } catch (err) {
        console.log('Oops, unable to cut');
    }
});
