@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="padding: 30px">
                <div class="card" style="background-color: white;">
                    @if (session('customer'))
                        <div class="alert alert-success" role="alert">
                            {{ session('customer') }}
                        </div>
                    @endif
                    <div class="card-body"
                        style="display: flex;
                            flex-direction: row;
                            justify-content: center;">
                        <form method="post" action="{{ route('customer/new') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="cpfCnpj" class="form-label">CPF/CNPJ:</label>
                                <input type="text" class="form-control" name="cpfCnpj" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
