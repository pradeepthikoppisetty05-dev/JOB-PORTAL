@include('templates.header')

<div style="display:flex; justify-content:center;">
  <div style="
    
    padding:20px 30px;
    border-radius:8px;
    
    max-width:600px;
    width:100%;
    text-align:center;
  ">
    <h1>Find your Dream Job</h1>
    <h5>jobs for you to explore</h5>
  </div>
</div>
<div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:20px;">

  @foreach($positions as $position)
    <div class="card" style="border:1px solid #ddd; padding:15px;">
              @auth
        <div style="position:absolute; top:10px; right:10px;">
            @if(Auth::user()->savedPositions->contains($position->id))
                <form method="POST" action="{{ route('jobs.unsave', $position) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            style="border:none; background:none; font-size:20px; color:gold;"
                            title="Unsave Job">
                        ★
                    </button>
                </form>
            @else
                <form method="POST" action="{{ route('jobs.save', $position) }}">
                    @csrf
                    <button type="submit"
                            style="border:none; background:none; font-size:20px; color:#999;"
                            title="Save Job">
                        ☆
                    </button>
                </form>
            @endif
        </div>
        @endauth
      <div class="card-body">
        <h3 class="card-title">{{ $position->title }}</h3>
        <p class="card-text">{{ $position->description }}</p>
        <p class="card-text"><b>Location: </b>{{ $position->location }}</p>
        <p class="card-text"><b>Salary: </b>${{ $position->salary }}</p>
      </div>
      <a href="{{ route('applicant.positions.show', $position->id) }}">
            View Job
        </a>
    </div>
  @endforeach

</div>

