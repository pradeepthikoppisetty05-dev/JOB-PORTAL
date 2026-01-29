@include('templates.header');
<div>
    <h3>Welcome, {{ auth()->user()->name }}!</h3>
</div>

<div style="text-align:center">
    <a href="/employer/create" class="col-6 center btn btn-primary mb-3 justify-content-center">Create New Job Position</a>
</div>
<hr>
<div class="container">
    <h2>Your Job Positions</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>Salary</th>
                <th>   Actions    </th>

                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $position)
            <tr>
                <td>{{ $position->title }}</td>
                <td>{{ $position->description }}</td>
                <td>{{ $position->location }}</td>
                <td>{{ $position->salary ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('employer.edit', $position->id) }}" class="btn btn-sm btn-warning">Edit</a>
                
                    <form action="{{ route('employer.destroy', $position->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this position?');">Delete</button>
                    </form>
                </td>
                <td>
                <a href="{{ route('employer.positions.applications', $position) }}">
                View Applicants
                </a>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>