@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Cobrança</div>
                    @if (session('payment'))
                        <div class="alert alert-success" role="alert">
                            {{ session('payment') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <p></p>
                        @if ($type == 'BOLETO')
                            <p>CLICK NO BOTAO PARA IR ATE O BOLETO</p>
                            <a href="{{ $data->bankSlipUrl }}">BOLETO</a>
                        @elseif ($type == 'PIX')
                            <p>CLICK NO BOTAO PARA IR ATE O PIX :   <button class="btn"><a href="{{ $data->invoiceUrl }}">PIX</a></button> </p>

                        @elseif ($type == 'CREDIT_CARD')
                        <div class="alert alert-info" style="text-align: center" role="alert">
                            O pagamento está em análise
                        </div>
                        <div class="col-md-12">
                            <p style="text-align:center">click no link abaixo para saber o status do pagamento</p>
                            <a class="btn btn-primary" style="display: flex;justify-content: center;" href="{{ $data->invoiceUrl }}" role="button" target="_blank">Link</a>
                        </div>
                        <div id="paymentStatus" class="mt-3"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
