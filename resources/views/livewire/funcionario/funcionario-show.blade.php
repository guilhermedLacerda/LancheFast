<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Detalhes do Funcionário</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold">Nome:</label>
                <p>{{ $funcionario->nome }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">CPF:</label>
                <p>{{ $funcionario->cpf }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Email:</label>
                <p>{{ $funcionario->email }}</p>
            </div>
        </div>
    </div>
</div>
