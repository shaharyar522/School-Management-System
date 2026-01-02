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
        max-width: 700px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px;
        color: white;
    }

    .header h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .content {
        padding: 40px;
    }

    .detail-section {
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 1rem;
        font-weight: 600;
        color: #667eea;
        text-transform: uppercase;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #667eea;
    }

    .detail-item {
        margin-bottom: 20px;
        padding: 15px;
        background: #f8f9fa;
        border-left: 4px solid #667eea;
        border-radius: 5px;
    }

    .detail-label {
        font-size: 0.75rem;
        font-weight: 700;
        color: #667eea;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
    }

    .detail-value {
        font-size: 1rem;
        color: #333;
        font-weight: 500;
    }

    .badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
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

    .action-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 40px;
    }

    .action-buttons a,
    .action-buttons button {
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-edit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .btn-back {
        background: #e0e0e0;
        color: #333;
    }

    .btn-back:hover {
        background: #d0d0d0;
    }

    .info-box {
        background: #f0f4ff;
        border-left: 4px solid #667eea;
        padding: 15px;
        border-radius: 5px;
        margin-top: 30px;
        color: #333;
    }

    @media (max-width: 768px) {
        .action-buttons {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container">
    <div class="header">
        <h1>📚 Exam Subject Details</h1>
        <p>Assignment Information</p>
    </div>

    <div class="content">
        <div class="detail-section">
            <div class="section-title">Assignment Details</div>

            <div class="detail-item">
                <div class="detail-label">Exam</div>
                <div class="detail-value">
                    <span class="badge badge-primary">{{ $examSubject->exam->name }}</span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Class</div>
                <div class="detail-value">
                    <span class="badge badge-secondary">{{ $examSubject->class->name }}</span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Subject</div>
                <div class="detail-value">{{ $examSubject->subject->name }}</div>
            </div>

            @if($examSubject->total_marks)
            <div class="detail-item">
                <div class="detail-label">Total Marks</div>
                <div class="detail-value">{{ $examSubject->total_marks }}</div>
            </div>
            @endif

            <div class="detail-item">
                <div class="detail-label">Assigned Date</div>
                <div class="detail-value">{{ $examSubject->created_at->format('M d, Y') }}</div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('admin.exam_subjects.edit', $examSubject->id) }}" class="btn-edit">
                <i class="fas fa-edit"></i> Edit Assignment
            </a>
            <a href="{{ route('admin.exam_subjects.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>

        <div class="info-box">
            <i class="fas fa-lightbulb"></i> Use the Edit button to modify this assignment.
        </div>
    </div>
</div>
@endsection
