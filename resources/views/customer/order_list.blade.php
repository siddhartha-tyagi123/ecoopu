@extends('customer.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Order List Section -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order List</h1>
                </div>
                <div class="col-sm-6">
                    <!-- Optionally, you can include search or filter form here if needed -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Orders</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-striped order-list-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Size</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $allOrders = [];
                                    @endphp

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
                                    @php
                                    $allOrders[] = [
                                        'counter' => $counter++,
                                        'title' => $order->title,
                                        'size' => $order->size
                                    ];
                                    @endphp
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach

                                    @php
                                    $topOrders = array_slice($allOrders, 0, 4);
                                    @endphp

                                    @foreach($topOrders as $order)
                                    <tr class="order-row">
                                        <td>{{ $order['counter'] }}</td>
                                        <td>{{ $order['title'] }}</td>
                                        <td>{{ $order['size'] }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">View</a>
                                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @foreach(array_slice($allOrders, 4) as $order)
                                    <tr class="order-row hidden">
                                        <td>{{ $order['counter'] }}</td>
                                        <td>{{ $order['title'] }}</td>
                                        <td>{{ $order['size'] }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">View</a>
                                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('toggleButton').addEventListener('click', function () {
        const hiddenRows = document.querySelectorAll('.order-row.hidden');
        const button = this;

        if (hiddenRows.length > 0) {
            hiddenRows.forEach(row => row.classList.remove('hidden'));
            button.textContent = 'Show All Orders';
        } else {
            document.querySelectorAll('.order-row').forEach((row, index) => {
                if (index >= 4) row.classList.add('hidden');
            });
            button.textContent = 'Show Top 4 Orders';
        }
    });
</script>
@endsection
