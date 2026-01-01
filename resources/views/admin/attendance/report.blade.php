@extends('admin.layouts.app')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 40px 20px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px;
        color: white;
    }

    .page-header h1 {
        font-size: 2.2rem;
        font-weight: 700;
        letter-spacing: -0.5px;
        margin: 0 0 5px 0;
    }

    .page-header .header-info {
        font-size: 0.95rem;
        opacity: 0.9;
    }

    .page-content {
        padding: 40px;
    }

    .filter-section {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 30px;
        border-radius: 10px;
        margin-bottom: 30px;
        border: 2px solid #e0e0e0;
    }

    .filter-section h3 {
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .filter-section h3::before {
        content: '🔍';
        font-size: 1.3rem;
    }

    .filter-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr auto;
        gap: 15px;
        align-items: flex-end;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 0;
    }

    .form-group label {
        font-size: 0.95rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .form-group input,
    .form-group select {
        padding: 12px 16px;
        font-size: 0.95rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        background: #ffffff;
        color: #333;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-group input::placeholder {
        color: #999;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .form-group input:hover,
    .form-group select:hover {
        border-color: #667eea;
    }

    .btn {
        padding: 11px 25px;
        font-size: 0.95rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:active {
        transform: translateY(-1px);
    }

    .export-section {
        display: flex;
        gap: 15px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .btn-export {
        padding: 11px 20px;
        font-size: 0.9rem;
        font-weight: 600;
        border: 2px solid #667eea;
        background: white;
        color: #667eea;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-export:hover {
        background: #667eea;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.2);
    }

    .export-badge {
        display: inline-block;
        background: #e8f4f8;
        border-left: 5px solid #2196f3;
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        color: #0d47a1;
        font-size: 0.9rem;
    }

    .export-badge::before {
        content: '📥 ';
        font-weight: bold;
    }

    .table-wrapper {
        overflow-x: auto;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    table thead {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-bottom: 3px solid #667eea;
    }

    table th {
        padding: 16px 20px;
        text-align: left;
        font-weight: 600;
        color: #333;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    table tbody tr {
        border-bottom: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }

    table tbody tr:hover {
        background: #f8f9ff;
        box-shadow: inset 0 0 10px rgba(102, 126, 234, 0.05);
    }

    table td {
        padding: 16px 20px;
        color: #333;
        font-size: 0.95rem;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-align: center;
    }

    .status-present {
        background: #d4edda;
        color: #155724;
        border: 1px solid #28a745;
    }

    .status-absent {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .empty-state {
        text-align: center;
        padding: 60px 40px;
        color: #999;
    }

    .empty-state svg {
        width: 80px;
        height: 80px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-state h3 {
        font-size: 1.3rem;
        margin-bottom: 10px;
        color: #666;
    }

    .empty-state p {
        font-size: 0.95rem;
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .stat-box {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 0.85rem;
        opacity: 0.9;
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 30px 20px;
        }

        .page-header h1 {
            font-size: 1.8rem;
        }

        .page-content {
            padding: 25px 20px;
        }

        .filter-row {
            grid-template-columns: 1fr 1fr;
        }

        .filter-row button {
            grid-column: 1 / -1;
        }

        table th,
        table td {
            padding: 12px 15px;
            font-size: 0.85rem;
        }

        .export-section {
            flex-direction: column;
        }

        .btn-export {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .page-header {
            padding: 20px 15px;
        }

        .page-header h1 {
            font-size: 1.5rem;
        }

        .page-content {
            padding: 20px 15px;
        }

        .filter-section {
            padding: 20px;
        }

        .filter-row {
            grid-template-columns: 1fr;
        }

        table {
            font-size: 0.8rem;
        }

        table th,
        table td {
            padding: 10px 8px;
        }

        .stats {
            grid-template-columns: 1fr;
        }

        .export-section {
            flex-direction: column;
        }

        .btn-export {
            width: 100%;
        }
    }
</style>

<div class="container">
    <div class="page-header">
        <h1>📊 Attendance Report</h1>
        <div class="header-info">View and manage attendance records for your classes</div>
    </div>

    <div class="page-content">
        <!-- Filter Section -->
        <div class="filter-section">
            <h3>Filter Attendance Records</h3>
            <form action="{{ route('admin.attendance.report') }}" method="GET">
                <div class="filter-row">
                    <div class="form-group">
                        <label for="class_id">Select Class</label>
                        <select name="class_id" id="class_id">
                            <option value="">-- All Classes --</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date">Select Date</label>
                        <input type="date" name="date" id="date" value="{{ request('date') }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <span>🔍</span> Filter Records
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Export Buttons -->
        @if(request('class_id') || request('date'))
            <div class="export-badge">
                Export attendance data in multiple formats below
            </div>
            <div class="export-section">
                <a href="{{ route('admin.attendance.export.pdf', request()->all()) }}" target="_blank" class="btn-export">
                    <span>📄</span> Export PDF
                </a>
                <a href="{{ route('admin.attendance.export.excel', request()->all()) }}" target="_blank" class="btn-export">
                    <span>📊</span> Export Excel
                </a>
            </div>
        @endif

        <!-- Statistics -->
        @if(count($attendances) > 0)
            <div class="stats">
                <div class="stat-box">
                    <div class="stat-number">{{ count($attendances) }}</div>
                    <div class="stat-label">Total Records</div>
                </div>
            </div>
        @endif

        <!-- Attendance Table -->
        @if(count($attendances) > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Class</th>
                            <th>Student</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $att)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($att->date)->format('d M Y') }}</td>
                            <td><strong>{{ $att->class->name }}</strong></td>
                            <td>{{ $att->student->user->name }}</td>
                            <td>
                                <span class="status-badge status-{{ $att->status }}">
                                    @if($att->status === 'present')
                                        ✓ Present
                                    @else
                                        ✗ Absent
                                    @endif
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 40px;">
                                <strong>No records found.</strong> Please adjust your filters and try again.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                <h3>No Attendance Records</h3>
                <p>Apply filters to view attendance records for specific classes and dates.</p>
            </div>
        @endif
    </div>
</div>
@endsection
