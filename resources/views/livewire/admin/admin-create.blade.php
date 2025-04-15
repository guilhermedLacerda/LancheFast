<div class="container py-5">
    <h2 class="text-primary fw-bold mb-4">Criar Administrador</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="create">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" wire:model="nome" class="form-control @error('nome') is-invalid @enderror">
            @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" id="cpf" wire:model="cpf" class="form-control @error('cpf') is-invalid @enderror">
            @error('cpf') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" id="senha" wire:model="senha" class="form-control @error('senha') is-invalid @enderror">
            @error('senha') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>
