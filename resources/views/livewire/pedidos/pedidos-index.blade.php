<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold">Listagem de Pedidos</h2>
        <input type="text" class="form-control w-25 shadow-sm rounded-pill" placeholder="Buscar por cliente, produto ou status..." wire:model.debounce.500ms="search" />
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-primary text-primary">
                <tr>
                    <th>Data e Hora</th>
                    <th>Cliente</th>
                    <th>Produtos</th>
                    <th>Valor Total</th>
                    <th>Valor com Desconto</th>
                    <th>Forma de Pagamento</th>
                    <th>Status</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->data_hora_pedido->format('d/m/Y H:i') }}</td>
                        <td>{{ $pedido->cliente->nome }}</td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                @foreach($pedido->produtos as $produto)
                                    <li>{{ $produto->nome }} <span class="badge bg-secondary rounded-pill">x{{ $produto->pivot->quantidade }}</span></li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-success fw-bold">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                        <td class="text-danger fw-bold">R$ {{ number_format($pedido->valor_desconto, 2, ',', '.') }}</td>
                        <td>{{ $pedido->forma_pagamento }}</td>
                        <td>{{ $pedido->status }}</td>
                        <td class="text-center">
                            <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-sm btn-info rounded px-3 me-1 shadow-sm">Ver</a>
                            <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-sm btn-warning rounded px-3 me-1 shadow-sm">Editar</a>
                            <button wire:click.prevent="deletePedido({{ $pedido->id }})" onclick="confirm('Tem certeza que deseja deletar este pedido?') || event.stopImmediatePropagation()" class="btn btn-sm btn-danger rounded px-3 shadow-sm mt-2">Deletar</button>
                        </td>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted fst-italic">Nenhum pedido encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $pedidos->links() }}
    </div>
</div>
