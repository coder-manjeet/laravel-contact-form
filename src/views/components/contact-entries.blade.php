<h2 class="text-center">{{ $title ?? 'Contact Form Entries' }}</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Recieved</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($entries as $entry)
            <tr>
                <td>{{ $entry->id }}</td>
                <td>{{ $entry->name }}</td>
                <td>{{ $entry->email }}</td>
                <td>{{ Str::limit($entry->message, 50) }}</td>
                <td>{{ $entry->created_at->diffForHumans() }}</td>
                <td>
                    <form action="{{ route('contact.destroy', $entry->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>