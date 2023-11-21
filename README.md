<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
<h1>Projeto Asa</h1>
    o projeto asa foi idelizado como um teste onde analisaria meu codigo fonte e meu concept de arquitetura validando todos os pontos de um profissonal Senior.
    <h2>Pré-requisitos</h2>
    <p>
        Antes de começar, certifique-se de ter os seguintes requisitos instalados:
    </p>
    <ul>
        <li>Conta no SandBox do Asaas e ter Registrado o Token no env</li>
        <li>Ter PHP8.2 na maquina</li>
    </ul>
    <h2>Configuração do Ambiente</h2>
    <ol>
        <li>
            Clone este repositório:
            <pre><code>git clone https://github.com/seu-usuario/ProjetoAsa.git</code></pre>
        </li>
        <li>
            Navegue até o diretório do projeto:
            <pre><code>cd ProjetoAsa</code></pre>
        </li>
        <li>
            Instale as dependências:
             <pre><code>sudo apt-get install -y nodejs</code></pre>
            <pre><code>composer install</code></pre>
            <pre><code>npm install</code></pre>
        </li>
         <li>
            Configuração do Env:
              <pre><code>  Copie o arquivo env.example e na copia preencha os dados do banco e do asaas e altere o nome para .env</code></pre>
        </li>
         <li>
            Configuração do Banco De Dados:
              <pre><code>  php artisan migrate</code></pre>
        </li>
    </ol>
    <h2>Configuração do Ambiente de Desenvolvimento</h2>
    <ol>
        <li>
            Execute o servidor de desenvolvimento:
            <pre><code>php artisan serve</code></pre>
            <pre><code>npm run dev</code></pre>
        </li>
        <li>
            Abra o navegador e acesse <code>http://localhost:8000</code> (ou outra porta, se configurada).
        </li>
    </ol>    




