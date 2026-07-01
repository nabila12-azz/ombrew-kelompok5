@extends('admin.layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Data User</h4>
    <a href="{{ route('admin.users.create') }}" class="btn btn-sm text-white" style="background:#1a3a2e">
        <i class="bi bi-plus-circle"></i> Tambah User
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr><th>Id</th><th>Nama</th><th>Email</th><th>Role</th><th>Status</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @foreach($users as $i => $user)
                <tr>
                    <td class="small text-muted">{{ $users->firstItem() + $i }}</td>
                    <td class="fw-semibold">{{ $user->name }}</td>
                    <td class="small text-muted">{{ $user->email }}</td>
                    <td><span class="badge bg-secondary">{{ ucfirst($user->role) }}</span></td>
                    <td>
                        <span class="badge bg-{{ $user->is_active ? 'success':'danger' }}">
                            {{ $user->is_active ? 'Aktif':'Non-Aktif' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-xs btn-outline-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus user {{ $user->name }}?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-xs btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $users->links() }}</div>
    </div>
</div>
@endsection