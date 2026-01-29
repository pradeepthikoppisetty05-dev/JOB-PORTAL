@include('templates.header');
<div>
    <h2>Edit Job Position</h2>
    <form action="{{ route('employer.update', $position->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="title" name="title" required
                    value="{{$position->title}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Job Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{$position->description}}
            </textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" required
                value="{{$position->location}}">
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary (optional)</label>
            <input type="text" class="form-control" id="salary" name="salary"
                value="{{$position->salary}}">
        </div>
        <div class="row">
        <div class="col-sm-6">
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ url()->previous() }}'">Cancel</button>
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary">Update Position</button>
        </div>
    </div>
    </form>
</div>