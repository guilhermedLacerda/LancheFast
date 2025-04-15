<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">Listagem de Administradores</h2>
        <input type="text" class="form-control w-25 shadow-sm rounded-pill" placeholder="Buscar por nome, CPF ou email..." wire:model.debounce.500ms="search" />
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-primary text-primary">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($admins as $admin)
                    <tr>
                        <td>{{ $admin->nome }}</td>
                        <td>{{ $admin->cpf }}</td>
                        <td>{{ $admin->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-sm btn-warning rounded px-3 me-1 shadow-sm" title="Editar">Editar</a>
                            <button wire:click="delete({{ $admin->id }})" class="btn btn-sm btn-danger rounded px-3 shadow-sm" title="Excluir" onclick="confirm('Tem certeza que deseja excluir este administrador?') || event.stopImmediatePropagation()">Excluir</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted fst-italic">Nenhum administrador encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $admins->links() }}
    </div>
</div>
