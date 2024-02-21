<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo</title>
</head>
<body>
    <h1>Factura</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>PRODUCTO</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total= 0;
            @endphp
            @foreach ($detalles as $item)

            <tr>
                <td>
                    <span>{{ str_pad($item->id, 4,0, STR_PAD_LEFT)  }}</span>
                </td>

                <td>
                    <span> {{ $item->producto->nombre }} </span>
                </td>

                <td>
                    <span>{{ $item->precio }}</span>
                </td>

                <td>
                    <span>{{ $item->cantidad }}</span>
                </td>

                <td>
                    <span>{{ $item->precio_total }}</span>
                </td>
            </tr>

            @php
            $total = $total + $item->precio_total;
            @endphp
            @endforeach
            <tr>
                <td colspan="4">
                    Total Factura
                </td>
                <td>
                    {{ $total }}
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>