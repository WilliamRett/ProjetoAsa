@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cobrança via Cartao de Credito</div>
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
                        <form method="POST" action="{{ route('payment/credit/new') }}"
                            style="display: flex;align-items: baseline;">
                            <div class="row">
                                <div class="col-md-4" style="margin-top: 15px;">
                                    @csrf
                                    <div class="card-header">Dados Do Cobrança</div>
                                    <input type="hidden" name="billingType" value="CREDIT_CARD">

                                    <div class="mb-12" style="margin-top: 15px;">
                                        <label for="customer" class="form-label">Clientes:</label>
                                        <select class="form-select" name="customer" id="customer" required>
                                            <option selected>Selecione um Cliente</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id_customer }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('customer')
                                        {{ $message }}
                                    @enderror
                                    <div class="mb-3" style="margin-top: 15px;">
                                        <label for="value" class="form-label">Valor:</label>
                                        <input type="number" class="form-control" name="value" required>
                                    </div>
                                    @error('value')
                                        {{ $message }}
                                    @enderror
                                    <div class="mb-3" style="margin-top: 15px;">
                                        <label for="dueDate" class="form-label">Data da Cobrança:</label>
                                        <input type="date" class="form-control" name="dueDate" required>
                                    </div>
                                    @error('dueDate')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <div class="card-header">Dados Do Cartao</div>
                                        <div class="form-group" style="margin-top: 15px;">
                                            <label for="holderName">Nome No Cartao de Credito:</label>
                                            <input type="text" name="creditCard[holderName]" id="holderName"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group" style="margin-top: 5px;">
                                            <label for="cardNumber">Numero do Cartao:</label>
                                            <input type="text" name="creditCard[number]" id="cardNumber"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-row"
                                            style="display: flex;justify-content: space-between;margin-top: 5px;">
                                            <div class="form-group col-md-4">
                                                <label for="expiryMonth">Mes</label>
                                                <input type="text" name="creditCard[expiryMonth]" id="expiryMonth"
                                                    class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="expiryYear">Ano</label>
                                                <input type="text" name="creditCard[expiryYear]" id="expiryYear"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="ccv">CCV:</label>
                                                <input type="text" name="creditCard[ccv]" id="ccv"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <p>
                                            *Vencimentos do Cartao
                                        </p>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="card-body">
                                        <div class="card-header">Dados Do Usuario Adicionais</div>

                                        <input type="hidden" name="creditCardHolderInfo[name]" id="creditCardHolderInfoName"
                                            value="teste">

                                        <div class="form-group" style="margin-top: 15px;">
                                            <label for="email">Email:</label>
                                            <input type="email" name="creditCardHolderInfo[email]" id="email"
                                                value="" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="cpfCnpj">CPF/CNPJ:</label>
                                            <input type="text" name="creditCardHolderInfo[cpfCnpj]" id="cpfCnpj"
                                                value="" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="postalCode">CEP:</label>
                                            <input type="text" name="creditCardHolderInfo[postalCode]" id="postalCode"
                                                value="" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="addressNumber">Numero da casa:</label>
                                            <input type="text" name="creditCardHolderInfo[addressNumber]"
                                                id="addressNumber" value="" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Celular:</label>
                                            <input type="text" name="creditCardHolderInfo[phone]" id="phone"
                                                value="" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="remoteIp" id="remoteIp" value="{{ $ipCliente }}">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Gerar Cobrança</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Adicione um ouvinte de evento ao elemento select
            var customerSelect = document.getElementById('customer');
            customerSelect.addEventListener('change', function () {
                // Obtenha o texto da opção selecionada e atualize o campo hidden
                var selectedCustomerSelectText = customerSelect.options[customerSelect.selectedIndex].text;
                document.getElementById('creditCardHolderInfoName').value = selectedCustomerSelectText;
            });
        });
    </script>
@endsection
