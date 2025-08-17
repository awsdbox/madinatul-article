<x-admin-layout>
  <h1 class="text-2xl font-bold mb-4">Manage Posts</h1>
  <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-4">+ New Post</a>

  <table class="w-full border">
    <thead>
      <tr class="bg-gray-100"><th>Title</th><th>Status</th><th>Tags</th><th>Actions</th></tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr class="border-t">
          <td>{{ $post->title }}</td>
          <td>{{ $post->is_published ? 'Published' : 'Draft' }}</td>

          <td>
            @foreach($post->tags as $tag)
  <a href="{{ route('tags.show', $tag) }}"
     class="inline-block bg-slate-200 text-xs px-2 py-1 rounded mr-1">
     {{ $tag->name }}
  </a>
@endforeach
          </td>
          <td>
            <a href="{{ route('admin.posts.edit', $post) }}" class="text-indigo-600">Edit</a> |
            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</x-admin-layout>
