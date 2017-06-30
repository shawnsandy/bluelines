@if(!count($content))
    <p class="alert alert-info text-center">Not content found</p>
@else
    <table class="table">

        <thead>
        <tr>
            <th class="col-md-1">#</th>
            <th>Name</th>
            <th>Status</th>
            <th class="col-md-2">Created</th>
            <th class="col-md-1 text-center">Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($content as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->created_at }}</td>
                <td class="text-center">
                    <a href="{{ $edit_url or "/bluelines/posts/" }}{{ $post->id }}/edit" class="small">
                        <i class="fa fa-search"></i> View/Edit
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endif
{{ $content->links() }}
