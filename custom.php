<script>
    $(document).ready(function() {
        $(document).on('click', '#loadmore', function() {
            var lastid = $(this).data('id');
            $('#loadmore').html('Loading...');
            $.ajax({
                url: "../load_data.php",
                method: "POST",
                data: {
                    lastid: lastid,
                },
                dataType: "text",
                success: function(data) {
                    if (data != '') {
                        $('#remove').remove();
                        $('#loadtable').append(data);
                    } else {
                        $('#loadmore').html('No more data to show');
                    }
                }
            });
        });
    });
</script>