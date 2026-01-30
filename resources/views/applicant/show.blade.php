@include('templates.header')
<div class="container mt-4">
@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif
 <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm mb-4">
        <div class="card-body">
        <h4><strong>Job Role: </strong>{{$position->title}}</h4>
        <p>{{$position->description}}</p>
        <p><strong>Location: </strong>{{$position->location}}</p>
        <p><strong>Salary: </strong>${{$position->salary}}</p>
        </div>
      </div>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
  <div class="card shadow-sm">
    <div class="card-body">

      <div class="row align-items-center">
        <div class="col-md-8">
          <form method="POST"
          action="{{ route('applicant.positions.apply', $position) }}"
          enctype="multipart/form-data">
          @csrf
        <div class="mb-2">
          <label class="form-label fw-semibold">Upload Resume</label>

          <input type="file" name="resume" class="form-control" required>
        </div>
        <button class="btn btn-primary btn-sucess w-100">Apply</button>
        </form>
      </div>

@auth
 <div class="col-md-4 mt-3 mt-md-0 text-center">
  @if(Auth::user()->savedPositions->contains($position->id))

    <form method="POST" action="{{ route('jobs.unsave', $position) }}">
      @csrf
      @method('DELETE')
      <button class="btn btn-warning">Unsave</button>
    </form>
  @else
    <form method="POST" action="{{ route('jobs.save', $position) }}">
      @csrf
      <button class="btn btn-outline-primary">Save Job</button>
    </form>
  @endif
  @endauth
       </div>
      </div>
    </div>
  </div>
    </div>
 </div>
</div> 


