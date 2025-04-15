<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Detalhes do Produto</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold">Nome:</label>
                <p>{{ $produto->nome }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Ingredientes:</label>
                <p>{{ $produto->ingredientes }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Valor:</label>
                <p>R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Imagem:</label>
                @if($produto->imagem)
                    <img src="{{ $produto->imagem }}" alt="{{ $produto->nome }}" class="img-fluid rounded" style="max-height: 300px;">
                @else
                    <p>Sem imagem disponível</p>
                @endif
            </div>
        </div>
    </div>
</div>
