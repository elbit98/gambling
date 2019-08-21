
let $registerButton = $('#register');

$registerButton.on('click', () => {
    let name = $('#name').val();
    let phone = $('#phone').val();

    let register = $.ajax({
        method: 'POST',
        url: 'register',
        data: {
            name: name,
            phone: phone
        }
    });

    register.done((data) => {
        $registerButton.hide();

        $('#link').text(data.link);
        $('#block-link').removeClass('d-none');
    });

});