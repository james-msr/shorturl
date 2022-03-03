<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Url Shortener</title>
</head>
<body>
    <form id="form">
        @csrf
        <label for="real_url">Enter url</label>
        <input name="real_url" id="real_url">
        <button type="submit" id="shorten" data-url="{{ route('url.shorten') }}">Shorten url</button>
    </form>
    <div id="res">

    </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#form').on('submit', function (e) {
            e.preventDefault();

            var data = $('#form').serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});

            $.ajax({
                type: 'POST',
                url: $('#shorten').attr('data-url'),
                data: data,
                success: function (response) {
                    if (response['short_url']) {
                        $('#res').html(`<p>Short url: <a href="${response['short_url']}">${response['short_url']}</a></p>`);
                    } else {
                        $('#res').html(`<p>Error: ${response['error']}</p>`);
                    }

                },
                error: function (error) {
                    console.log(error);
                }
            })

        })
    });
</script>
</body>
</html>
