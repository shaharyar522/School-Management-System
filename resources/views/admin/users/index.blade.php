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

    .role-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .role-admin {
        background: #ff6b6b;
        color: white;
    }

    .role-teacher {
        background: #4ecdc4;
        color: white;
    }

    .role-student {
        background: #667eea;
        color: white;
    }

    .role-parent {
        background: #ffa502;
        color: white;
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
            <h1>👥 All Users</h1>
            <div class="header-info">Manage system users</div>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.export.users') }}" class="add-btn" style="background: rgba(76, 175, 80, 0.25); border-color: rgba(76, 175, 80, 1); color: white;">
                <span>📥</span> Export CSV
            </a>
            <a href="{{ route('admin.users.create') }}" class="add-btn">
                <span>➕</span> Add New User
            </a>
        </div>
    </div>

    <div class="page-content">
        <!-- Search Bar -->
        <div style="margin-bottom: 30px;">
            <form method="GET" action="{{ route('admin.users.index') }}" style="display: flex; gap: 10px;">
                <input
                    type="text"
                    name="search"
                    placeholder="🔍 Search by name or email..."
                    value="{{ $search ?? '' }}"
                    style="flex: 1; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 0.95rem; transition: all 0.3s ease;"
                    onfocus="this.style.borderColor='#667eea'; this.style.boxShadow='0 0 10px rgba(102,126,234,0.2)';"
                    onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';"
                >
                <button
                    type="submit"
                    style="padding: 12px 25px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 20px rgba(102,126,234,0.3)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';"
                >
                    Search
                </button>
                @if($search)
                    <a
                        href="{{ route('admin.users.index') }}"
                        style="padding: 12px 25px; background: #f5f5f5; color: #333; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; text-decoration: none; transition: all 0.3s ease;"
                        onmouseover="this.style.background='#e0e0e0';"
                        onmouseout="this.style.background='#f5f5f5';"
                    >
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <!-- Statistics -->
        @if($users->count() > 0)
            <div class="stats">
                <div class="stat-box">
                    <div class="stat-number">{{ $users->total() }}</div>
                    <div class="stat-label">Total Users</div>
                </div>
            </div>
        @endif

        <!-- Users Table -->
        @if($users->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><strong>{{ $user->name }}</strong></td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="role-badge role-{{ strtolower($user->role) }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="action-btn edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?')">
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

            <!-- Pagination -->
            <div style="display: flex; justify-content: center; margin-top: 30px; gap: 5px;">
                {{ $users->appends(request()->query())->links() }}
            </div>
        @else
            <p style="text-align: center; padding: 40px 20px; color: #999;">No users found.</p>
        @endif
    </div>
</div>
@endsection
