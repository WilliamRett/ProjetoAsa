@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12" style="margin-bottom: 2rem">
                <div class="card" style="background-color: white">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2 style="text-align:  center">Bem vindo {{ Auth::user()->name }} ao sistema teste de
                            integração do Asaas</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="background-color: white;">
                    <div class="card-body" style="display: flex;
                    flex-direction: row;
                    justify-content: center;">
                        <div class="col-md-6">
                            <div class="card" style="background-color: white;border: 0px !important;">
                                <div class="card-body">
                                    <h5 class="card-title">Cobrança</h5>
                                    <p class="card-text">Para Criar Cobrança deve-se ter clientes cadastrados no sistema.
                                    </p>
                                    <a href="{{ route('payment/index') }}" class="btn btn-primary">Pix/Boleto</a>
                                    <a href="{{ route('payment/credit') }}" class="btn btn-primary">Cartão de crédito</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card" style="background-color: white;border: 0px !important;">
                                <div class="card-body">
                                    <h5 class="card-title">Cliente</h5>
                                    <p class="card-text">Cadastro de Clientes abaixo
                                    </p>
                                    <a href="{{ route('customer/index') }}" class="btn btn-primary">Cliente</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
