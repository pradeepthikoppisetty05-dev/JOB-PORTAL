@include('templates.header')
@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif
<div class="container">
  <div>
   
    <h4><strong>Job Role: </strong>{{$position->title}}</h4>
    <p>{{$position->description}}</p>
    <p><strong>Location: </strong>{{$position->location}}</p>
    <p><strong>Salary: </strong>${{$position->salary}}</p>

  </div>
</div>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form method="POST"
      action="{{ route('applicant.positions.apply', $position) }}"
      enctype="multipart/form-data">
    @csrf

    <input type="file" name="resume" required>
    <button>Apply</button>
</form>

    