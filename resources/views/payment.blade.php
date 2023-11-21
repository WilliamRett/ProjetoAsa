@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Cobrança via Boleto e Pix</div>
                    @if (session()->has('payment'))
                        @php
                            $arrayDaSession = session('payment');
                            $json = json_encode($arrayDaSession);
                            $obj = json_decode($json, true);
                        @endphp
                        <ul>
                            @foreach ($obj as $valor)
                                @foreach ($valor as $result)
                                    <li>Codigo :{{ $result['code'] }} Erro: {{ $result['description'] }}</li>
                                @endforeach
                            @endforeach
                        </ul>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('payment/new') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="billingType" class="form-label">Meio De Pagamento:</label>
                                <select class="form-select" name="billingType" id="billingType" required>
                                    <option selected>Selecione um Metodo de Pagamento</option>
                                    <option value="BOLETO">BOLETO</option>
                                    <option value="PIX">PIX</option>
                                </select>
                            </div>
                            @error('billingType')
                                {{ $message }}
                            @enderror
                            <div class="mb-3">
                                <label for="customer" class="form-label">Clientes:</label>
                                <select class="form-select" name="customer" required>
                                    <option selected>Selecione um Cliente</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id_customer }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('customer')
                                {{ $message }}
                            @enderror
                            <div class="mb-3">
                                <label for="value" class="form-label">Valor:</label>
                                <input type="number" class="form-control" name="value" required>
                            </div>
                            @error('value')
                                {{ $message }}
                            @enderror
                            <div class="mb-3">
                                <label for="dueDate" class="form-label">Data da Cobrança:</label>
                                <input type="date" class="form-control" name="dueDate" required>
                            </div>
                            @error('dueDate')
                                {{ $message }}
                            @enderror

                            <button type="submit" class="btn btn-primary">Gerar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

