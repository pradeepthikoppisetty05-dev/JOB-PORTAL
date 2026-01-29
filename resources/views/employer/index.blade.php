@include('templates.header');
<h2>Applicants for: {{ $position->title }}</h2>

@foreach($applications as $application)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px">

        <p><strong>Name:</strong> {{ $application->applicant->name }}</p>
        <p><strong>Email:</strong> {{ $application->applicant->email }}</p>
        <p><strong>Status:</strong> {{ $application->status }}</p>

        <a href="{{ asset('storage/' . $application->resume) }}" target="_blank">
            Download Resume
        </a>

        <form method="POST"
              action="{{ route('employer.applications.update', $application) }}">
            @csrf
            @method('PATCH')

            <select name="status">
                <option value="applied" @selected($application->status === 'applied')>
                    Applied
                </option>
                <option value="shortlisted" @selected($application->status === 'shortlisted')>
                    Shortlisted
                </option>
                <option value="rejected" @selected($application->status === 'rejected')>
                    Rejected
                </option>
            </select>

            <button>Update</button>
        </form>
    </div>
@endforeach
