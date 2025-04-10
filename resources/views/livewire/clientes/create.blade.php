<div>
    <div class="mt-5">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
            <h3 class="card-header d-flex justify-content-center">Cadastrar-se</h3>

            <div class="card-body">
                <form wire:submit.prevent="store">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Insira seu nome completo" wire:model.defer="nome">
                        @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" placeholder="Insira seu endereço" wire:model.defer="endereco">
                        @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" placeholder="Insira seu telefone" wire:model.defer="telefone">
                        @error('telefone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" placeholder="Insira seu CPF" wire:model.defer="cpf">
                        @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Insira seu email" wire:model.defer="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" placeholder="Insira sua senha" wire:model.defer="senha">
                        @error('senha') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark w-75 p-3">Cadastrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
