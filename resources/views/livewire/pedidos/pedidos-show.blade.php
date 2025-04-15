<div class="container py-5 bg-light rounded shadow-sm" style="max-width: 700px;">
    <h2 class="mb-4 text-center text-primary fw-bold">Detalhes do Pedido #{{ $pedido->id }}</h2>

    <div class="mb-3">
        <strong>Data e Hora:</strong> {{ $pedido->data_hora_pedido->format('d/m/Y H:i') }}
    </div>

    <div class="mb-3">
        <strong>Cliente:</strong> {{ $pedido->cliente->nome }}
    </div>

    <div class="mb-3">
        <strong>Produtos:</strong>
        <ul class="list-group list-group-flush">
            @foreach($pedido->produtos as $produto)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $produto->nome }}</span>
                    <span>Quantidade: {{ $produto->pivot->quantidade }}</span>
                    <span>Valor Unitário: R$ {{ number_format($produto->pivot->valor_unitario, 2, ',', '.') }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mb-3 d-flex justify-content-between">
        <div>
            <strong>Valor Total:</strong>
            <p class="text-success fw-bold fs-5 mb-0">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</p>
        </div>
        <div>
            <strong>Valor com Desconto:</strong>
            <p class="text-danger fw-bold fs-5 mb-0">R$ {{ number_format($pedido->valor_desconto, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="mb-3">
        <strong>Forma de Pagamento:</strong> {{ $pedido->forma_pagamento }}
    </div>

    <div class="mb-3">
        <strong>Status:</strong> {{ $pedido->status }}
    </div>

    <div class="d-flex justify-content-center">
        <a href="{{ route('pedidos.index') }}" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">Voltar</a>
    </div>
</div>
