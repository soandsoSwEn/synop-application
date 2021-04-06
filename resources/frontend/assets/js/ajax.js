jQuery(document).ready(function($) {
    $('#submitDecoder').click(function(event) {
        event.preventDefault();
        $('#resultDecode').empty();

        $.ajax({
            type: "POST",
            url: decoderFormLink.url,
            data: {
                report : $('#reportData').val(),
                security : decoderFormLink.nonce,
                action : 'decoder_form'
            },
            success: function (response) {
                $('#resultDecode').append(response.html);
            },
            error: function (error) {
                alert("Error!");
            }
        });
    });
});