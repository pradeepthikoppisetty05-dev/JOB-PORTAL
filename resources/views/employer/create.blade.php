@include('templates.header');
<div>
    <h2>Create New Job Position</h2>
    <form action="{{ route('employer.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Job Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary (optional)</label>
            <input type="text" class="form-control" id="salary" name="salary">
        </div>
        <button type="submit" class="btn btn-primary">Create Position</button>
    </form>
</div>