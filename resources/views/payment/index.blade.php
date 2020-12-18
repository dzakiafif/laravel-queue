<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('payment.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-bordered tablesdata">
                    <thead>
                        <tr>
                            <th>Payment Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
    <script>
        $('.tablesdata').DataTable({
            processing: true,
            serverside: true,
            ajax: {
                url: '{{ route('payment.data') }}'
            },
            columns: [
                {data: 'payment_name',name: 'payment_name'},
                {
                    data: 'delete_data',
                    name: 'delete_data'
                }
            ],
            columnDefs: [
                {orderable: false,targets:1}
            ],
            searching: false
        })
    </script>
</body>
</html>