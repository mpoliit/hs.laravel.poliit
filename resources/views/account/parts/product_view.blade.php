<tr>
    <td>
        <a href="{{route('products.show', $row->id)}}"><strong>{{$row->name}}</strong></a>
        <p>{{($row->options->has('size') ? $row->options->size : '')}}</p>
    </td>

    <td>{{$row->price}}$</td>

    <td>
        <form action="{{route('wishlist.delete', $row->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <input type="hidden" value="{{$row->rowId}}" name="rowId">
            <input type="submit" class="btn btn-outline-danger" value="{{__('Delete')}}">

        </form>
    </td>
</tr>
