<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; }
        h2, h4 { text-align: center; margin: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>

<h2>Attendance Report</h2>

@if($attendances->count())
    <h4>
        Class: {{ $attendances->first()->class->name }}
        <br>
        Date: {{ $attendances->first()->date }}
    </h4>
@endif

<table>
    <tr>
        <th>Date</th>
        <th>Student</th>
        <th>Status</th>
    </tr>

    @foreach($attendances as $att)
    <tr>
        <td>{{ $att->date }}</td>
        <td>{{ $att->student->user->name }}</td>
        <td>{{ ucfirst($att->status) }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
