$('#rate').on('click', () => {

    $.ajax({
        method: 'POST',
        url: '/rate',
        data: {
            link: $('#this-link').text()
        }
    }).done((data) => {

        let text = '';
        if (data.lose) {
            text = 'Lose';
        } else {
            text = 'Win ' + data.win + '$ , Number:' + data.number;
        }

        $('#lucky-result').text(text);

    });

});

$('#btn-copy-link').on('click', () => {

    /* Get the text field */
    let $copyText = $("#copyLinkValue");

    /* Select the text field */
    $copyText.select();

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Copied the text: " + $copyText.val());
});


$('#new-link').on('click', () => {

    $.ajax({
        method: 'POST',
        url: '/regenerate-link',
        data: {
            link: $('#this-link').text()
        }
    }).done((data) => {

        if (data) {
            $('#this-link').text(data);
            $('#copyLinkValue').text(data);
        }

    });

});

$('#history').on('click', () => {

    $.ajax({
        method: 'POST',
        url: '/history',
        data: {
            link: $('#this-link').text()
        }
    }).done((data) => {

        $('#history-show').removeClass('d-none');


        let $historyItems = $('#history-items');

        $historyItems.empty();

        $.each(data, (index,value) => {
            console.log(value);
            $historyItems.append(`<div> Number: ${value.rand}  Win Amount: ${value.amount}</div>`);
        });


    });

});

$('#deactivate').on('click', () => {

    $.ajax({
        method: 'GET',
        url: '/deactivate/'+$('#this-link').text(),
    }).done(() => {

       location.reload();

    });

});