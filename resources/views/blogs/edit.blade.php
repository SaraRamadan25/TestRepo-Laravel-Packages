<form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    name <input name="name" type="text" value="{{ $blog->name }}">
    <br>
    title <input name="title" type="text" value="{{ $blog->title }}">
    <br>
    date  <input name="date" type="date" value="{{ $blog->date }}">
    <br>
    description <input name="description" type="text" value="{{ $blog->description }}">
    <br>
    select the category of your blog post
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <br>
    upload the blog image<input type="file" name="image">
    <br>

    <button type="submit" class="btn btn-primary">Submit</button>

    {{-- Delete Button --}}
    <form action="{{ route('blogs.destroy', $blog->id) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
    </form>
</form>
@endsection

