<div class="col-md-12">
    <hr>
    <h4>Comments:</h4>
    <div class="col-sm-12">
        @each('comments.single', $comments,'comment')
    </div>
    <div class="col-sm-12">
        @auth
            @include('comments.add_comment',['product'=>$product])
        @endauth
    </div>
    @push('footer-scripts')
        <script>
            $(function () {
                $(document).on('click','.reply',function(e) {
                    e.preventDefault();
                    let userName =$(this).parent().find('.user_name').text();
                    $('#parent_id').val($(this).data('parent_id'));
                    $('#comment').val(`@${userName} `);
                    $('html, body').animate({
                        scrollTop: $("#comment").offset().top - 40
                    }, 2000);
                    $('#comment').focus();
                });
            });
        </script>
    @endpush

</div>
