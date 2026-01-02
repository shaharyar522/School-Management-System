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
        max-width: 1100px;
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
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .page-header h1 {
        font-size: 2.2rem;
        font-weight: 700;
        letter-spacing: -0.5px;
        margin: 0;
    }

    .page-header .header-info {
        font-size: 0.95rem;
        opacity: 0.9;
    }

    .add-btn {
        background: rgba(255, 255, 255, 0.25);
        color: white;
        padding: 12px 25px;
        border: 2px solid white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        font-size: 0.95rem;
    }

    .add-btn:hover {
        background: white;
        color: #667eea;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .page-content {
        padding: 40px;
    }

    .table-wrapper {
        overflow-x: auto;
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
        padding: 18px 20px;
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
        padding: 18px 20px;
        color: #333;
        font-size: 0.95rem;
    }

    table td:first-child {
        font-weight: 600;
        color: #667eea;
    }

    .action-btn {
        padding: 6px 12px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-right: 5px;
    }

    .action-btn.edit {
        background: #2196f3;
        color: white;
    }

    .action-btn.edit:hover {
        background: #1976d2;
    }

    .action-btn.delete {
        background: #e74c3c;
        color: white;
        border: none;
    }

    .action-btn.delete:hover {
        background: #c0392b;
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
        margin-bottom: 20px;
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

    .badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .badge-secondary {
        background: #e8eef7;
        color: #667eea;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header h1 {
            font-size: 1.8rem;
        }

        .page-content {
            padding: 25px 20px;
        }

        table th,
        table td {
            padding: 12px 15px;
            font-size: 0.85rem;
        }

        .page-header h1 {
            width: 100%;
        }

        .add-btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .page-header {
            padding: 25px 15px;
        }

        .page-content {
            padding: 20px 15px;
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
    }
</style>

<div class="container">
    <div class="page-header">
        <div>
            <h1>📚 Exam Subjects</h1>
            <div class="header-info">Manage exam-subject assignments</div>
        </div>
        <a href="{{ route('admin.exam_subjects.create') }}" class="add-btn">
            <span>➕</span> Assign Exam Subject
        </a>
    </div>

    <div class="page-content">
        <!-- Statistics -->
        @if(count($examSubjects) > 0)
            <div class="stats">
                <div class="stat-box">
                    <div class="stat-number">{{ count($examSubjects) }}</div>
                    <div class="stat-label">Total Assignments</div>
                </div>
            </div>
        @endif

        <!-- Exam Subjects Table -->
        @if(count($examSubjects) > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Exam</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Total Marks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($examSubjects as $examSubject)
                        <tr>
                            <td>#{{ $loop->iteration }}</td>
                            <td><span class="badge badge-primary">{{ $examSubject->exam->name }}</span></td>
                            <td><span class="badge badge-secondary">{{ $examSubject->class->name }}</span></td>
                            <td><strong>{{ $examSubject->subject->name }}</strong></td>
                            <td>{{ $examSubject->total_marks ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.exam_subjects.edit', $examSubject->id) }}" class="action-btn edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.exam_subjects.destroy', $examSubject->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                <h3>No Exam Subjects Found</h3>
                <p>There are currently no exam-subject assignments in the system.</p>
                <a href="{{ route('admin.exam_subjects.create') }}" class="add-btn" style="justify-content: center; margin: 0 auto;">
                    <span>➕</span> Create First Assignment
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
