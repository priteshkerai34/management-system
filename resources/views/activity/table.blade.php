<div class="table-responsive">
    <table class="table" id="items-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Subject</th>
                <th>Subject No.</th>
                <th>User No.</th>
                <th>Attributes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activity as $activity)
            <tr>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->subject_type }}</td>
                <td>{{ $activity->subject_id }}</td>
                <td>{{ $activity->causer_id }}</td>
                <td>{{ $activity->properties }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>