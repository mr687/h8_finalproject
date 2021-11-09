<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
    <title>Orders Report</title>
</head>

<body>
    <h1 style="text-align: center">Orders Report</h1>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th scope="col">InvoiceID</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td class="font-weight-bold">{{ $invoice->customer->user->name}}</td>
                <td class="">{{$invoice->total}}</td>
                <td class="">{{ $invoice->status}}</td>
                <td class="">{{ $invoice->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
