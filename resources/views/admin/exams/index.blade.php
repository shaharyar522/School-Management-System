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
            <h1>📝 All Exams</h1>
            <div class="header-info">Manage all exams in your school</div>
        </div>
        <a href="{{ route('admin.exams.create') }}" class="add-btn">
            <span>➕</span> Add New Exam
        </a>
    </div>

    <div class="page-content">
        <!-- Statistics -->
        @if(count($exams) > 0)
            <div class="stats">
                <div class="stat-box">
                    <div class="stat-number">{{ count($exams) }}</div>
                    <div class="stat-label">Total Exams</div>
                </div>
            </div>
        @endif

        <!-- Exams Table -->
        @if(count($exams) > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Exam Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exams as $exam)
                        <tr>
                            <td>#{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $exam->name }}</strong>
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
                <h3>No Exams Found</h3>
                <p>There are currently no exams in the system.</p>
                <a href="{{ route('admin.exams.create') }}" class="add-btn" style="justify-content: center; margin: 0 auto;">
                    <span>➕</span> Create First Exam
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
