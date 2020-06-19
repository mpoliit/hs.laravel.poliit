<tr>
    <th scope="row">{{$category->id}}</th>
    <td>{{$category->title}}</td>
    <td>{{$category->shortDescription}}</td>
    <td>
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning" style="margin-right: 5px;">Edit</a>
            <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Remove</button>
            </form>
        </div>
    </td>
</tr>
