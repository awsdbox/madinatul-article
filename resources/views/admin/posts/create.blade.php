<x-admin-layout>
  <h1 class="text-2xl font-bold mb-4">Create Post</h1>
  <form method="POST" action="{{ route('admin.posts.store') }}" class="space-y-4">
    @csrf
    <input name="title" placeholder="Title" class="w-full border px-3 py-2">
    <textarea name="excerpt" placeholder="Short excerpt (160 chars)" class="w-full border px-3 py-2"></textarea>
    <textarea name="body" rows="10" placeholder="Markdown body" class="w-full border px-3 py-2"></textarea>
    <label class="flex items-center"><input type="checkbox" name="is_published" value="1"> Publish immediately</label>
    <input name="tags" value="{{ old('tags', $post->tag_list ?? '') }}" placeholder="Tags, comma separated">
    <button class="bg-indigo-600 text-black px-4 py-2 rounded">Save</button>
  </form>
</x-admin-layout>
