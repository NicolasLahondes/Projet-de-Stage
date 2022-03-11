(function () {
    $(".delete-artist-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "/api/deleteArtist",
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                var result = JSON.parse(data);
                if (result.success) {
                    location.reload();
                }
                else if (!result.success) {
                    alert(result.message);
                }
            }
        });
    });
})();