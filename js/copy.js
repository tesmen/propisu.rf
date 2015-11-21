var cutTextareaBtn = document.querySelector('.js-textareacutbtn');

cutTextareaBtn.addEventListener('click', function (event) {
    var cutTextarea = document.querySelector('.js-cuttextarea');
    cutTextarea.select();

    try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';
        console.log('Cutting text command was ' + msg);
    } catch (err) {
        console.log('Oops, unable to cut');
    }
});
