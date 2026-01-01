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
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: -0.5px;
    }

    .form-header p {
        font-size: 1rem;
        opacity: 0.95;
        font-weight: 300;
    }

    .form-content {
        padding: 50px 40px;
    }

    .form-section {
        margin-bottom: 35px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .section-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 3px solid #667eea;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title::before {
        content: '';
        width: 4px;
        height: 25px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 2px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 25px;
    }

    .form-group label {
        font-size: 0.95rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .required {
        color: #e74c3c;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 14px 16px;
        font-size: 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        background: #fafafa;
        color: #333;
        transition: all 0.3s ease;
        font-family: inherit;
        height: 50px;
    }

    .form-group input::placeholder,
    .form-group select::placeholder {
        color: #999;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #667eea;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        transform: translateY(-2px);
    }

    .form-group input:hover,
    .form-group select:hover {
        border-color: #667eea;
        background: #fff;
    }

    .form-group .help-text {
        font-size: 0.85rem;
        color: #7f8c8d;
        margin-top: 8px;
        font-style: italic;
    }

    .form-group .error-list {
        background: #fff5f5;
        border-left: 4px solid #e74c3c;
        padding: 15px;
        border-radius: 6px;
        margin-bottom: 25px;
    }

    .form-group .error-list ul {
        list-style: none;
        margin: 0;
    }

    .form-group .error-list li {
        color: #c0392b;
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-group .error-list li:last-child {
        margin-bottom: 0;
    }

    .form-group .error-list li::before {
        content: '⚠';
        font-size: 1rem;
    }

    .button-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 40px;
        padding-top: 30px;
        border-top: 2px solid #e0e0e0;
    }

    .button-group button,
    .button-group a {
        padding: 16px 30px;
        font-size: 1.05rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        height: 55px;
    }

    .button-group button[type="submit"] {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .button-group button[type="submit"]:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    }

    .button-group button[type="submit"]:active {
        transform: translateY(-1px);
    }

    .button-group a {
        background: #e0e0e0;
        color: #333;
    }

    .button-group a:hover {
        background: #d0d0d0;
        transform: translateY(-3px);
    }

    .info-box {
        background: #e3f2fd;
        border-left: 5px solid #2196f3;
        padding: 18px 20px;
        border-radius: 8px;
        margin-top: 25px;
        color: #0d47a1;
        font-size: 0.95rem;
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .info-box::before {
        content: 'ℹ';
        font-size: 1.5rem;
        font-weight: bold;
        flex-shrink: 0;
    }

    @media (max-width: 768px) {
        .form-content {
            padding: 30px 20px;
        }

        .form-header {
            padding: 30px 20px;
        }

        .form-header h1 {
            font-size: 1.8rem;
        }

        .button-group {
            grid-template-columns: 1fr;
        }

        .container {
            border-radius: 10px;
        }
    }

    @media (max-width: 480px) {
        .form-content {
            padding: 20px 15px;
        }

        .form-header {
            padding: 20px 15px;
        }

        .form-header h1 {
            font-size: 1.5rem;
        }

        .form-group input,
        .form-group select {
            padding: 12px 14px;
            font-size: 0.95rem;
        }

        .button-group button,
        .button-group a {
            padding: 14px 20px;
            font-size: 0.95rem;
            height: 50px;
        }
    }
</style>

<div class="container">
    <div class="form-header">
        <h1>📖 Create New Subject</h1>
        <p>Add a new subject to your school management system</p>
    </div>

    <div class="form-content">
        <!-- Error Messages -->
        @if ($errors->any())
            <div class="form-group">
                <div class="error-list">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.subjects.store') }}" method="POST">
            @csrf

            <!-- Subject Information Section -->
            <div class="form-section">
                <div class="section-title">Subject Details</div>

                <div class="form-group">
                    <label for="name">Subject Name <span class="required">*</span></label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="e.g., Mathematics, English, Science"
                        required>
                    <div class="help-text">Enter a unique name for the subject</div>
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="class_id">Class <span class="required">*</span></label>
                    <select id="class_id" name="class_id" required>
                        <option value="">-- Select Class --</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" @selected(old('class_id') === (string)$class->id)>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="help-text">Select the class this subject belongs to</div>
                    @error('class_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="button-group">
                <button type="submit">
                    <span>✓</span> Create Subject
                </button>
                <a href="{{ route('admin.subjects.index') }}">
                    <span>✕</span> Cancel
                </a>
            </div>

            <!-- Info Box -->
            <div class="info-box">
                Each subject must be assigned to a class. You can manage multiple subjects per class.
            </div>
        </form>
    </div>
</div>
@endsection
