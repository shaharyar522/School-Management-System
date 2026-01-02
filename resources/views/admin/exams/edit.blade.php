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

    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px;
        color: white;
        text-align: center;
    }

    .form-header h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .form-header p {
        font-size: 0.95rem;
        opacity: 0.9;
    }

    .form-content {
        padding: 50px;
    }

    .form-section {
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #667eea;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
        font-size: 0.95rem;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        font-family: inherit;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .button-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 40px;
    }

    .button-group button,
    .button-group a {
        padding: 14px 25px;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .button-group button[type="submit"] {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .button-group button[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .button-group a {
        background: #e0e0e0;
        color: #333;
    }

    .button-group a:hover {
        background: #d0d0d0;
        transform: translateY(-2px);
    }

    .info-box {
        background: #e3f2fd;
        border-left: 4px solid #2196f3;
        padding: 15px;
        border-radius: 5px;
        margin-top: 30px;
        color: #1565c0;
        font-size: 0.9rem;
    }

    .error-message {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 5px;
    }

    @media (max-width: 768px) {
        .form-content {
            padding: 30px 20px;
        }

        .button-group {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .form-header {
            padding: 25px 15px;
        }

        .form-header h1 {
            font-size: 1.5rem;
        }

        .form-content {
            padding: 20px 15px;
        }
    }
</style>

<div class="container">
    <div class="form-header">
        <h1>✏️ Edit Exam</h1>
        <p>Update exam details</p>
    </div>

    <div class="form-content">
        <form action="{{ route('admin.exams.update', $exam->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-section">
                <div class="section-title">Exam Information</div>

                <div class="form-group">
                    <label for="name">Exam Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $exam->name) }}"
                        placeholder="e.g., Final Exam, Midterm, Unit Test"
                        required
                    >
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="button-group">
                <button type="submit">
                    <i class="fas fa-save"></i> Update Exam
                </button>
                <a href="{{ route('admin.exams.index') }}">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>

            <div class="info-box">
                <i class="fas fa-info-circle"></i> Make sure the exam name is unique and descriptive.
            </div>
        </form>
    </div>
</div>
@endsection
