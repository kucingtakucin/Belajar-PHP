$(document).ready(function () {
    $('#submit').click(function (event) {
        const isi_komentar = $('#komentar').val();
        $.ajax({
            method: 'POST',
            url: 'komentar.php',
            data: { komentar: isi_komentar},
            success: function (data) {
                console.log(data);
            },
        });
        event.preventDefault();
    });
});