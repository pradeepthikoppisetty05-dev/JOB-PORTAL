@include('templates.header')

<div class="container mt-4">
    <h3>Saved Jobs</h3>

    @if($user->savedPositions->isEmpty())
        <p>You have not saved any jobs yet.</p>
    @else
        @foreach($user->savedPositions as $position)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $position->title }}</h5>
                    <p>{{ $position->location }}</p>

                    <a href="{{ route('applicant.positions.show', $position) }}"
                       class="btn btn-primary">
                        View Job
                    </a>

                    <form method="POST"
                          action="{{ route('jobs.unsave', $position) }}"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-warning">Unsave</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
