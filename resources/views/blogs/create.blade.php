<form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
    @csrf
   name <input name="name" type="text">
    <br>
    title <input name="title" type="text">
    <br>
  date  <input name="date" type="date">
    <br>
    description <input name="description" type="text">
    <br>
    select the category of your blog post <select name="category_id">
        @foreach($categories as $category)

            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach

    </select>
    <br>

    upload the blog image<input type="file" name="image">
    <br>
   {{-- select the tags of your blog post<select multiple name="tag[]"
    @foreach($tags as $tag)

        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
    @endforeach></select>
<br>--}}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
