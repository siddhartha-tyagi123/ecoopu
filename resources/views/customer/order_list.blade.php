<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .order-list-table {
        margin-top: 20px;
    }

    .status-completed {
        color: green;
    }

    .status-pending {
        color: orange;
    }

    .status-cancelled {
        color: red;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="my-4">Order List</h1>

        <table class="table table-striped order-list-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Size</th>
                </tr>
            </thead>
            <tbody>
                @foreach($planOrderList as $orderList)
                @php
                // If orderlist is a comma-separated string
                $orderArray = explode(',', $orderList->orderlist);
                @endphp
                @if($orderCount >= count($orderArray))
                @php
                $counter = 1;
                @endphp

                @foreach($orderArray as $orderId)
                @php
                $order = \App\Models\OrderList::find($orderId);
                @endphp

                @if($order)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $order->title }}</td>
                    <td>{{ $order->size }}</td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm">View</a>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
            </tbody>
          




        </table>
    </div>
    <!-- @foreach($planOrderList as $orderList)
    @if($orderCount >= $orderList->orderlist)
        <p>test</p>
    @else
        <p>false</p>
    @endif
@endforeach -->




    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>