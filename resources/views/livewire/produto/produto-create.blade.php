<div>
    <div class="mt-5">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
            <h3 class="card-header d-flex justify-content-center">Criar Produto</h3>
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="create">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" wire:model.defer="nome">
                        @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ingredientes" class="form-label">Ingredientes</label>
                        <input type="text" class="form-control" id="ingredientes" wire:model.defer="ingredientes">
                        @error('ingredientes') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" step="0.01" class="form-control" id="valor" wire:model.defer="valor">
                        @error('valor') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="imagem" class="form-label">Imagem (URL)</label>
                        <input type="text" class="form-control" id="imagem" wire:model.defer="imagem">
                        @error('imagem') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-75 p-3">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
