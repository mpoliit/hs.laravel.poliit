<a href="{{route('categories.show',$category->id)}}"
   class="text-muted btn btn-outline-dark" >
    {{__($category->title)}}

</a>
<p style="width: 50%;margin-left: 25px" > {{__($category->description)}}</p>



