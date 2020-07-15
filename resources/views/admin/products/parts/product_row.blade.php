<tr>
    <th scope="row">{{$products->SKU}}</th>
    <th scope="row"><img src="{{ Storage::disk('public')->url($products->thumbnail) }}" width="50" height="50" alt=""></th>
    <td>{{$products->name}}</td>
    <td><a href="{{ route('admin.categories.edit', $products->category->id) }}">{{ $products->category->title }}</a></td>
    <td>{{$products->short_description}}</td>
    <td>
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
            <a href="{{ route('admin.products.edit', $products) }}" class="btn btn-warning" style="margin-right: 5px;">Edit</a>
            <form action="{{ route('admin.products.destroy', $products) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Remove</button>
            </form>
        </div>
    </td>
</tr>
