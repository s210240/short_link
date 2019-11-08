function sendLink() {
    const input_link = $('#inputLink').val();
    const token = $('#token').val();

    $.ajax({
        url: 'save_link',
        type: 'POST',
        data: {
            '_token': token,
            'link': input_link
        },
        success: function (msg) {
            $('#inputShortLink').val(msg);
        },
        error: function (msg) {
            const jsonResponse = JSON.parse(msg.responseText);
            $('#inputShortLink').val(jsonResponse.errors.link[0]);
        }
    });
}
