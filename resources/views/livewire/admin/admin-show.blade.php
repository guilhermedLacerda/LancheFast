<div class="container py-5">
    <h2 class="text-primary fw-bold mb-4">Detalhes do Administrador</h2>

    <div class="card shadow-sm rounded p-4 mb-4">
        <p><strong>Nome:</strong> {{ $admin->nome }}</p>
        <p><strong>CPF:</strong> {{ $admin->cpf }}</p>
        <p><strong>E-mail:</strong> {{ $admin->email }}</p>
    </div>

    <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning me-2">Editar</a>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Voltar</a>
</div>
