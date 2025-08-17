<x-admin-layout>
  <h1 class="text-2xl font-bold mb-4">Create Post</h1>
  <form method="POST" action="{{ route('admin.posts.store') }}" class="space-y-4">
    @method('PUT')
    @csrf
    <input name="title" placeholder="Title" class="w-full border px-3 py-2" value="{{ old('title', $post->title ?? '') }}">
    <textarea name="excerpt" placeholder="Short excerpt (160 chars)" class="w-full border px-3 py-2">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    <textarea name="body" rows="10" placeholder="Markdown body" class="w-full border px-3 py-2" >{{ old('excerpt', $post->body ?? '') }}</textarea>
    <label class="flex items-center"><input type="checkbox" name="is_published" value="1"> Publish immediately</label>
    <input name="tags" value="{{ old('tags', $post->tag_list ?? '') }}" placeholder="Tags, comma separated">
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Save</button>
  </form>
</x-admin-layout>
