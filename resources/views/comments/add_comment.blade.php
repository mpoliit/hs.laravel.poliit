<form action="{{route('comments.add', $product)}}" method="POST"
      style="margin: 16px auto;border: 1px solid #333;padding: 16px;width: 50%">
    @csrf
    <h6>New Comment</h6>
    <input type="hidden" name="parent_id" id="parent_id">
    <hr>
    <textarea name="comment" id="comment" class="form-control" rows="10"></textarea>
    <button type="submit" class="btn btn-outline-primary form-control mt-3">Add Comment</button>

</form>
