<div class="col-sm-12" style="padding: 5px;border: 1px solid #d3d3d3; margin:10px 0;">
    <p>
        <strong>{{$comment->user->name}}</strong> - <small>{{$comment->created_at}}</small>
        &nbsp; | &nbsp;
        <a href="#" class="reply" data-parent_id="{{ $comment->id }}" >Reply</a>
    </p>
    <hr>
    <p>{{$comment->comment}}</p>
    @if(!is_null($comment->childes()))
        <div class="col-sm-12">
            @each('comments.single',$comment->childes(), 'comment')
        </div>
    @endif

</div>
