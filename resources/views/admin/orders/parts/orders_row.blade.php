<tr>
    <th scope="row">{{ $order->id }}</th>
    <td>{{ $order->user_name . ' ' . $order->user_surname }}</td>
    <td>{{ $order->user_email }}</td>
    <td>{{ $order->total }}</td>

    <td>
        <div style="display: flex; flex-direction: row;align-items: center;justify-content: center">
            <a href="{{route('admin.orders.edit', $order)}}"class="btn btn-warning"style="margin-right: 12px">Edit</a>
        </div>
    </td>
</tr>
