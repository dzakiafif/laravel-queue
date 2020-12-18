<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="payment_name" id="payment_name" class="form-control">
        </div>
        <div class="col-md-6">
            <input type="submit" class="btn btn-primary" id="btnsubmit" value="submit">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $('#btnsubmit').on('click',function() {
            var name = $('#payment_name').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(name !== '') {
                $.ajax({
                    url: '{{ route('post.data') }}',
                    method: 'POST',
                    data: {
                        name: name
                    },
                    success: function(result) {
                        if(result.status_code == 200) {
                            window.location.href = '{{ route('payment.list') }}'
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            }      
        })
    </script>
</body>
</html>