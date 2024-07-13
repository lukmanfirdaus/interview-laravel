@extends('layouts.layout')

@section('content')
    
    <select id="machine_id">
        <option value="">Select Mesin ID</option>
        @foreach ($machines as $machine)
            <option value="{{ $machine->id }}">{{ $machine->name }}</option>
        @endforeach
    </select>

    <select id="site_id">
        <option value="">Select Site</option>
        @foreach ($sites as $site)
            <option value="{{ $site->id }}">{{ $site->name }}</option>
        @endforeach
    </select>

    <select id="month">
        <option value="">Select Month</option>
        @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>

    <select id="submitted_by">
        <option value="">Select Operator</option>
        @foreach ($submitted_by as $by)
            <option value="{{ $by->id }}">{{ $by->name }}</option>
        @endforeach
    </select>

    <select id="task_id">
        <option value="">Select Task</option>
        @foreach ($tasks as $task)
            <option value="{{ $task->id }}">{{ $task->name }}</option>
        @endforeach
    </select>

    <table id="example" class="display">
        <thead>
            <tr>
                <th>Submitted By</th>
                <th>Submitted When</th>
                <th>Site Code</th>
                <th>Activity</th>
                <th>UOM</th>
                <th>Block</th>
                <th>Task</th>
                <th>Start</th>
                <th>End</th>
                <th>Mesin ID</th>
                <th>Fuel</th>
                <th>Check By</th>
                <th>When Check</th>
                <th>Verified By</th>
                <th>Duty</th>
                <th>Reason</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be populated by AJAX -->
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            function fetch_data() {
                var table = $('#example').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route("work_transaction_fetch") }}',
                        data: function(d) {
                            d.machine_id = $('#machine_id').val();
                            d.site_id = $('#site_id').val();
                            d.month = $('#month').val();
                            d.submitted_by = $('#submitted_by').val();
                            d.task_id = $('#task_id').val();
                        }
                    },
                    columns: [
                        { data: 'submitted_by.name', name: 'submitted_by.name' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'site.name', name: 'site.name' },
                        { data: 'activity.name', name: 'activity.name' },
                        { data: 'uom.name', name: 'uom.name' },
                        { data: 'block.name', name: 'block.name' },
                        { data: 'task.name', name: 'task.name' },
                        { data: 'start_time', name: 'start_time' },
                        { data: 'end_time', name: 'end_time' },
                        { data: 'machine.name', name: 'machine.name' },
                        { data: 'fuel', name: 'fuel' },
                        { data: 'check_by.name', name: 'check_by.name' },
                        { data: 'when_check', name: 'when_check' },
                        { data: 'verified_by.name', name: 'verified_by.name' },
                        { data: 'status', name: 'status' },
                        { data: 'reason', name: 'reason' }
                    ]
                });
            }

            $('#machine_id, #site_id, #month, #submitted_by, #task_id').change(function() {
                $('#example').DataTable().destroy();
                fetch_data();
            });

            fetch_data(); // Initial fetch
        });
    </script>

@endsection