@extends('admin.layouts.app')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .page-header {
        color: white;
        margin-bottom: 40px;
    }

    .page-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: -0.5px;
    }

    .page-header p {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    /* Statistics Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        border-left: 5px solid #667eea;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .stat-card.users {
        border-left-color: #2196f3;
    }

    .stat-card.students {
        border-left-color: #4caf50;
    }

    .stat-card.teachers {
        border-left-color: #ff9800;
    }

    .stat-card.classes {
        border-left-color: #e91e63;
    }

    .stat-card.subjects {
        border-left-color: #00bcd4;
    }

    .stat-card.exams {
        border-left-color: #9c27b0;
    }

    .stat-card.attendance {
        border-left-color: #8bc34a;
    }

    .stat-card.rate {
        border-left-color: #f44336;
    }

    .stat-content h3 {
        font-size: 0.9rem;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        line-height: 1;
    }

    .stat-icon {
        font-size: 3rem;
        opacity: 0.2;
    }

    .stat-card.users .stat-icon { color: #2196f3; }
    .stat-card.students .stat-icon { color: #4caf50; }
    .stat-card.teachers .stat-icon { color: #ff9800; }
    .stat-card.classes .stat-icon { color: #e91e63; }
    .stat-card.subjects .stat-icon { color: #00bcd4; }
    .stat-card.exams .stat-icon { color: #9c27b0; }
    .stat-card.attendance .stat-icon { color: #8bc34a; }
    .stat-card.rate .stat-icon { color: #f44336; }

    /* Quick Actions */
    .quick-actions {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        margin-bottom: 40px;
    }

    .quick-actions h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 25px;
        font-weight: 600;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .action-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 15px 20px;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        justify-content: center;
        text-align: center;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .action-btn.secondary {
        background: #f5f5f5;
        color: #333;
        border: 2px solid #e0e0e0;
    }

    .action-btn.secondary:hover {
        background: #e0e0e0;
    }

    /* Info Section */
    .info-section {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        margin-bottom: 40px;
    }

    .info-section h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .info-box {
        background: #f9f9f9;
        border-left: 4px solid #667eea;
        padding: 20px;
        margin-bottom: 15px;
        border-radius: 6px;
        line-height: 1.6;
        color: #555;
    }

    .info-box h4 {
        color: #333;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .info-box p {
        margin: 0;
        font-size: 0.95rem;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-number {
            font-size: 2rem;
        }

        .stat-icon {
            font-size: 2rem;
        }

        .actions-grid {
            grid-template-columns: 1fr;
        }

        .quick-actions,
        .info-section {
            padding: 20px;
        }

        .quick-actions h2,
        .info-section h2 {
            font-size: 1.3rem;
        }
    }

    @media (max-width: 480px) {
        .page-header h1 {
            font-size: 1.5rem;
        }

        .stat-card {
            flex-direction: column;
            text-align: center;
            padding: 15px;
        }

        .stat-content h3,
        .stat-icon {
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 1.8rem;
        }
    }
</style>

<div class="dashboard-container">
    <!-- Page Header -->
    <div class="page-header">
        <h1>📊 Dashboard</h1>
        <p>Welcome back! Here's an overview of your school management system.</p>
    </div>

    <!-- Statistics Grid -->
    <div class="stats-grid">
        <!-- Total Users -->
        <div class="stat-card users">
            <div class="stat-content">
                <h3>Total Users</h3>
                <div class="stat-number">{{ $stats['total_users'] }}</div>
            </div>
            <div class="stat-icon">👥</div>
        </div>

        <!-- Total Students -->
        <div class="stat-card students">
            <div class="stat-content">
                <h3>Total Students</h3>
                <div class="stat-number">{{ $stats['total_students'] }}</div>
            </div>
            <div class="stat-icon">🎓</div>
        </div>

        <!-- Total Teachers -->
        <div class="stat-card teachers">
            <div class="stat-content">
                <h3>Total Teachers</h3>
                <div class="stat-number">{{ $stats['total_teachers'] }}</div>
            </div>
            <div class="stat-icon">👨‍🏫</div>
        </div>

        <!-- Total Classes -->
        <div class="stat-card classes">
            <div class="stat-content">
                <h3>Total Classes</h3>
                <div class="stat-number">{{ $stats['total_classes'] }}</div>
            </div>
            <div class="stat-icon">🏫</div>
        </div>

        <!-- Total Subjects -->
        <div class="stat-card subjects">
            <div class="stat-content">
                <h3>Total Subjects</h3>
                <div class="stat-number">{{ $stats['total_subjects'] }}</div>
            </div>
            <div class="stat-icon">📚</div>
        </div>

        <!-- Total Exams -->
        <div class="stat-card exams">
            <div class="stat-content">
                <h3>Total Exams</h3>
                <div class="stat-number">{{ $stats['total_exams'] }}</div>
            </div>
            <div class="stat-icon">📝</div>
        </div>

        <!-- Today's Attendance -->
        <div class="stat-card attendance">
            <div class="stat-content">
                <h3>Today's Attendance</h3>
                <div class="stat-number">{{ $stats['today_attendance'] }}</div>
            </div>
            <div class="stat-icon">✅</div>
        </div>

        <!-- Attendance Rate -->
        <div class="stat-card rate">
            <div class="stat-content">
                <h3>Attendance Rate</h3>
                <div class="stat-number">{{ $stats['attendance_rate'] }}%</div>
            </div>
            <div class="stat-icon">📊</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h2>🚀 Quick Actions</h2>
        <div class="actions-grid">
            <a href="{{ route('admin.users.create') }}" class="action-btn">
                <span>➕</span> Add User
            </a>
            <a href="{{ route('admin.classes.create') }}" class="action-btn">
                <span>➕</span> Add Class
            </a>
            
            <a href="{{ route('admin.subjects.create') }}" class="action-btn">
                <span>➕</span> Add Subject
            </a>

            <a href="{{ route('admin.exams.create') }}" class="action-btn">
                <span>➕</span> Add Exam
            </a>

            <a href="{{ route('admin.attendance.index') }}" class="action-btn secondary">
                <span>📋</span> Mark Attendance
            </a>

            <a href="{{ route('admin.attendance.report') }}" class="action-btn secondary">
                <span>📊</span> View Report
            </a>

        </div>
    </div>

    <!-- Information Section -->
    <div class="info-section">
        <h2>ℹ️ System Information</h2>

        <div class="info-box">
            <h4>📈 User Statistics</h4>
            <p>Total: {{ $stats['total_users'] }} | Students: {{ $stats['total_students'] }} | Teachers: {{ $stats['total_teachers'] }}</p>
        </div>

        <div class="info-box">
            <h4>🎓 Academic Information</h4>
            <p>Classes: {{ $stats['total_classes'] }} | Subjects: {{ $stats['total_subjects'] }} | Exams: {{ $stats['total_exams'] }}</p>
        </div>

        <div class="info-box">
            <h4>✅ Attendance Summary</h4>
            <p>Total Records: {{ $stats['today_attendance'] }} | Average Rate: {{ $stats['attendance_rate'] }}%</p>
        </div>

        <div class="info-box">
            <h4>💡 Tips</h4>
            <p>Use the Quick Actions section to quickly navigate to the most common tasks. You can also use the sidebar menu for more options.</p>
        </div>
    </div>
</div>

@endsection
