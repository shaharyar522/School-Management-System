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

    .detail-item {
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e0e0e0;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: #667eea;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .detail-value {
        font-size: 1.1rem;
        color: #333;
        font-weight: 500;
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
        <h1>📝 {{ $exam->name }}</h1>
        <p>Exam Details</p>
    </div>

    <div class="content">
        <div class="detail-item">
            <div class="detail-label">Exam Name</div>
            <div class="detail-value">{{ $exam->name }}</div>
        </div>

        <div class="detail-item">
            <div class="detail-label">Created Date</div>
            <div class="detail-value">{{ $exam->created_at->format('M d, Y') }}</div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('admin.exams.edit', $exam->id) }}" class="btn-edit">
                <i class="fas fa-edit"></i> Edit Exam
            </a>
            <a href="{{ route('admin.exams.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>

        <div class="info-box">
            <i class="fas fa-lightbulb"></i> Use the Edit button to modify exam details.
        </div>
    </div>
</div>
@endsection
