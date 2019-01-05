$("#categorySearch").on("keyup", function() {
    let query = $(this).val();

    if (query) {
        $("#ajaxCategoryTable").show();
        $("#generalCategoryTable").hide();
    } else {
        $("#ajaxCategoryTable").hide();
        $("#generalCategoryTable").show();
    }

    $.ajax({
        url: "{{ route('categories.categorySearch') }}",
        method: "post",
        data: {
            search: query,
            _token: "{{ csrf_token() }}"
        },
        dataType: "html",
        success: function(response) {
            if (response) {
                $("#ajaxCategories").html(response);
            }
        }
    });
});
