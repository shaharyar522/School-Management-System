@extends('admin.layouts.app')

@section('content')
<style>
    .dashboard-welcome {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
    }

    .dashboard-welcome h3 {
        font-size: 1.75rem;
        margin-bottom: 0.5rem;
    }

    .dashboard-welcome p {
        font-size: 1rem;
        opacity: 0.95;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        border-left: 5px solid #667eea;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        transform: translateY(-5px);
    }

    .stat-card.users {
        border-left-color: #667eea;
    }

    .stat-card.students {
        border-left-color: #48bb78;
    }

    .stat-card.teachers {
        border-left-color: #ed8936;
    }

    .stat-card.classes {
        border-left-color: #9f7aea;
    }

    .stat-card .icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .stat-card .label {
        font-size: 0.95rem;
        color: #718096;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .stat-card .value {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .stat-card .percentage {
        font-size: 0.85rem;
        color: #48bb78;
    }

    .quick-actions {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .quick-actions h4 {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        color: #2d3748;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .quick-actions h4 i {
        color: #667eea;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
    }

    .action-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .action-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .action-btn i {
        font-size: 1.75rem;
    }

    .system-info {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .system-info h4 {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        color: #2d3748;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .system-info h4 i {
        color: #667eea;
    }

    .info-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .info-item {
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 3px solid #667eea;
    }

    .info-item .label {
        font-size: 0.8rem;
        color: #718096;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .info-item .value {
        font-size: 1.25rem;
        color: #2d3748;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .actions-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .dashboard-welcome h3 {
            font-size: 1.25rem;
        }

        .stat-card .value {
            font-size: 2rem;
        }
    }
</style>

<!-- Welcome Section -->
<div class="dashboard-welcome">
    <h3><i class="fas fa-chart-line"></i> Dashboard Overview</h3>
    <p>Welcome to your School Management System Admin Panel. Monitor all school activities here.</p>
</div>

<!-- Statistics Cards -->
<div class="stats-grid">
    <div class="stat-card users">
        <div class="icon" style="color: #667eea;"><i class="fas fa-users"></i></div>
        <div class="label">Total Users</div>
        <div class="value">0</div>
        <div class="percentage"><i class="fas fa-arrow-up"></i> 0% from last month</div>
    </div>

    <div class="stat-card students">
        <div class="icon" style="color: #48bb78;"><i class="fas fa-user-graduate"></i></div>
        <div class="label">Total Students</div>
        <div class="value">0</div>
        <div class="percentage" style="color: #48bb78;"><i class="fas fa-arrow-up"></i> 0% from last month</div>
    </div>

    <div class="stat-card teachers">
        <div class="icon" style="color: #ed8936;"><i class="fas fa-chalkboard-user"></i></div>
        <div class="label">Total Teachers</div>
        <div class="value">0</div>
        <div class="percentage" style="color: #ed8936;"><i class="fas fa-arrow-up"></i> 0% from last month</div>
    </div>

    <div class="stat-card classes">
        <div class="icon" style="color: #9f7aea;"><i class="fas fa-school"></i></div>
        <div class="label">Total Classes</div>
        <div class="value">0</div>
        <div class="percentage" style="color: #9f7aea;"><i class="fas fa-arrow-up"></i> 0% from last month</div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <h4><i class="fas fa-lightning-bolt"></i> Quick Actions</h4>
    <div class="actions-grid">
        <a href="{{ route('admin.users.index') }}" class="action-btn">
            <i class="fas fa-user-plus"></i> Add User
        </a>
        <a href="{{ route('admin.classes.index') }}" class="action-btn" style="background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);">
            <i class="fas fa-plus"></i> Add Class
        </a>
        <a href="{{ route('admin.subjects.index') }}" class="action-btn" style="background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);">
            <i class="fas fa-book-plus"></i> Add Subject
        </a>
        <a href="{{ route('admin.exams.create') }}" class="action-btn" style="background: linear-gradient(135deg, #9f7aea 0%, #805ad5 100%);">
            <i class="fas fa-file-alt"></i> Create Exam
        </a>
    </div>
</div>

<!-- System Information -->
<div class="system-info">
    <h4><i class="fas fa-info-circle"></i> System Information</h4>
    <div class="info-list">
        <div class="info-item">
            <div class="label">System Status</div>
            <div class="value"><span style="color: #48bb78;">✓</span> Online</div>
        </div>
        <div class="info-item">
            <div class="label">Last Updated</div>
            <div class="value">Today</div>
        </div>
        <div class="info-item">
            <div class="label">School Year</div>
            <div class="value">2025-2026</div>
        </div>
        <div class="info-item">
            <div class="label">Database Status</div>
            <div class="value"><span style="color: #48bb78;">✓</span> Connected</div>
        </div>
    </div>
</div>
@endsection
