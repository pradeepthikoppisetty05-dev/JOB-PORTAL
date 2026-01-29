@include('templates.header')
<h2>My Applications</h2>

@foreach($applications as $application)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px">

        <h3>{{ $application->position->title }}</h3>
        <p><strong>Location:</strong> {{ $application->position->location }}</p>

        <p style="padding:5px 10px; border-radius:5px; 
          display:inline-block;
          background: {{ $application->status === 'applied' ? '#fef3c7' : ($application->status === 'shortlisted' ? '#d1fae5' : ($application->status === 'rejected' ? '#fee2e2' : '#e0e0e0')) }};
          color:#000;">
           <strong>Status:</strong> {{ ucfirst($application->status) }}
        </p>

        <div class="row">
        <a href="{{ route('applicant.positions.show', $application->position) }}">
            View Job
        </a>
        <a href="{{ asset('storage/' . $application->resume) }}" target="_blank">
            My Resume
        </a>
        </div>
        
@endforeach
