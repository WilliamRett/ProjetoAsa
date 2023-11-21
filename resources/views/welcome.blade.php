@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="card" style="border: 0px !important;">
                <div class="card-body"
                    style="    display: flex;
                flex-direction: row;
                align-items: flex-start;">
                    <div class="col-lg-4" style="padding: 2rem">
                        <div class="card" style="width: 25rem; border: 0px !important;">
                            <img class="card-img-top"
                                src="https://media.licdn.com/dms/image/C4D03AQEKjcVpBYl1qA/profile-displayphoto-shrink_800_800/0/1660063052964?e=1704931200&v=beta&t=R8nrk-7SZ9sz2CDsc7Gs-eyvNEdh4QsMheYt9GEzcps"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">William Rett</h5>
                                <p>Endereço: Rua Fonseca Galvão, São Paulo, SP</p>
                                <p>Telefone: (11) 96737-0405</p>
                                <p>E-mail: william_rett@outlook.com</p>
                                <p><a href="https://www.linkedin.com/in/william-rett-b50625b6/" target="_blank">LinkedIn</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8" style="padding: 2rem">
                        <div class="card" style="border: 0px !important;">
                            <div class="card-body">
                                <h2 class="mb-4">Sobre a Minha Pessoa</h2>
                                <p style="font-size: 25px;text-align: justify">
                                    Programador Sênior com mais de 6 anos de experiência no desenvolvimento de aplicações utilizando PHP.</p>
                                <p style="font-size: 25px;text-align: justify">
                                    Tenho experiência também com Python e Node.js em alguns projetos. Possuo expertise em
                                    arquitetura de software, design de soluções robustas e colaboração em equipes
                                    multidisciplinares.</p>
                                <p style="font-size: 25px;text-align: justify">
                                    Meu foco está na entrega de código de alta qualidade, performance otimizada e
                                    proporcionar experiências excepcionais para os usuários.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
