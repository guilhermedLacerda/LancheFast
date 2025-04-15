<div class="container py-5 bg-light rounded shadow-sm" style="max-width: 900px;">
    <h2 class="mb-4 text-center text-primary fw-bold">Editar Pedido #{{ $pedido->id }}</h2>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form wire:submit.prevent="salvar" class="needs-validation" novalidate>
        <div class="mb-4">
            <label for="cliente" class="form-label fw-semibold">Cliente</label>
            <select id="cliente" class="form-select @error('cliente_id') is-invalid @enderror" wire:model="cliente_id" required>
                <option value="">Selecione um cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
            @error('cliente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Produtos</label>
            <div class="row g-4">
                @foreach($produtos as $produto)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 rounded-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title text-primary fw-bold mb-1">{{ $produto->nome }}</h5>
                                    <p class="card-text text-muted mb-0 fs-6">R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
                                </div>
                                <div>
                                    @if(isset($itens[$produto->id]))
                                        <input type="number" min="1" class="form-control form-control-sm" style="width: 70px;"
                                            wire:model.lazy="itens.{{ $produto->id }}.quantidade" aria-label="Quantidade do produto {{ $produto->nome }}">
                                        <button type="button" class="btn btn-sm btn-danger ms-2 rounded-circle" wire:click.prevent="removerProduto({{ $produto->id }})" aria-label="Remover produto {{ $produto->nome }}">×</button>
                                    @else
                                        <button type="button" class="btn btn-sm btn-primary rounded-pill px-3" wire:click.prevent="adicionarProduto({{ $produto->id }})" aria-label="Adicionar produto {{ $produto->nome }}">Adicionar</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @error('itens') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="forma_pagamento" class="form-label fw-semibold">Forma de Pagamento</label>
            <select id="forma_pagamento" class="form-select @error('forma_pagamento') is-invalid @enderror" wire:model="forma_pagamento" required>
                @foreach(\App\Models\Pedidos::FORMAS_PAGAMENTO as $forma)
                    <option value="{{ $forma }}">{{ $forma }}</option>
                @endforeach
            </select>
            @error('forma_pagamento') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="form-label fw-semibold">Status</label>
            <select id="status" class="form-select @error('status') is-invalid @enderror" wire:model="status" required>
                <option value="{{ \App\Models\Pedidos::STATUS_EM_ABERTO }}">{{ \App\Models\Pedidos::STATUS_EM_ABERTO }}</option>
                <option value="{{ \App\Models\Pedidos::STATUS_AGUARDANDO_PREPARO }}">{{ \App\Models\Pedidos::STATUS_AGUARDANDO_PREPARO }}</option>
                <option value="{{ \App\Models\Pedidos::STATUS_EM_PREPARO }}">{{ \App\Models\Pedidos::STATUS_EM_PREPARO }}</option>
                <option value="{{ \App\Models\Pedidos::STATUS_EM_ROTA_ENTREGA }}">{{ \App\Models\Pedidos::STATUS_EM_ROTA_ENTREGA }}</option>
                <option value="{{ \App\Models\Pedidos::STATUS_ENTREGUE }}">{{ \App\Models\Pedidos::STATUS_ENTREGUE }}</option>
            </select>
            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4 d-flex justify-content-between align-items-center border-top pt-3">
            <div>
                <label class="form-label fw-semibold mb-1">Valor Total:</label>
                <p class="fs-5 text-success fw-bold">R$ {{ number_format($valor_total, 2, ',', '.') }}</p>
            </div>
            <div>
                <label class="form-label fw-semibold mb-1">Valor com Desconto:</label>
                <p class="fs-5 text-danger fw-bold">R$ {{ number_format($valor_desconto, 2, ',', '.') }}</p>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-lg btn-primary rounded-pill px-4 shadow-sm">Atualizar Pedido</button>
            <a href="{{ route('pedidos.index') }}" class="btn btn-lg btn-outline-secondary rounded-pill px-4 shadow-sm">Cancelar</a>
        </div>
    </form>
</div>
