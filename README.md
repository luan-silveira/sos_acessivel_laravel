# SOS Acessível
Aplicação PHP do projeto SOS Acessível. Criado e desenvolvido por Luan Christian Nascimento da Silveira.

Projeto desenvolvido como Trabalho de Conclusão de Curso de graduação em Sistemas de Informação, pela Escola Superior de Criciúma/SC (Faculdades Esucri).

Consiste em um protótipo de aplicação para promover o acesso a pessoas com deficiência auditiva a serviços de chamadas de emergência, tais como Corpo de Bombeiros, Polícia Militar e Serviço de atendimento Móvel de Urgência. 

Esta é a versão Web do projeto, no qual seria implantado em todas as unidades de atendimento de emergência. 
Caracteriza-se como um portal de ocorrências, que recebe todas as chamadas efetuadas pelos usuários da aplicação móvel.

## Instalação e Configuração

Este é um projeto implementado em PHP no padrão MVC que utiliza o [Laravel Framework](https://laravel.com) e o gerenciador de dependências [Composer](https://getcomposer.org/). Antes de clonar o projeto, é preciso ter o Composer instalado.

O repositório pode ser clonado da seguinte forma:
```
git clone https://github.com/luan-silveira/sos_acessivel_laravel.git
```

Após a clonagem, acessar a pasta do projeto e instalar as dependências do projeto com o Composer:

```
composer install
```

Caso seja necessário, uma atualização das dependências pode ser feita:

```
composer update
```

### Configuração do ambiente (host, banco de dados)
O passo seguinte é a configuração do arquivo de ambiente (.env).

Copie os dados do arquivo `.env.example` e salve como `.env`. Neste arquivo serão inseridos os dados da configuração de ambiente, como a pasta do projeto, o nome da aplicação, o link do website e, principalmente, as configuraçãoes do banco de dados.

Para testar este projeto, crie um banco de dados e insira as credenciais neste arquivo. Exemplo: 

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sos_acessivel
DB_USERNAME=root
DB_PASSWORD=
```

### Migração do banco de dados
Com o banco de dados criado e suas credenciais inseridas no arquivo `.env`, execute o seguinte comando para efetuar a migração do banco de dados. O sistema irá criar automaticamente todas as tabelas.

```
php artisan migrate
```
Após as tabelas criadas, execute o comando para popular as tabelas com registros pré-definidos no sistema:
```
php artisan db:seed
```

## Observações
* Este projeto requer PHP >= 7.0
* Para a aplicação funcionar corretamente, é necessário criar um servidor virtual ou executar em servidor que possua um domínio definido. Se estiver utilizando o Apache (Wamp, XAMPP, etc.), crie um servidor virtual alterando o arquivo `{instalação wamp/xampp}\apache\conf\extra\httpd-vhosts.conf` da seguinte forma, utilizando o exemplo abaixo:
```
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/sos_acessivel_laravel/public"
    ServerName sosacessivel.com.br
	ServerAlias sosacessivel.com.br
</VirtualHost>
```
* Se estiver no Windows, altere também o arquivo `hosts` localizado em  `C:\Windows\System32\drivers\etc`, adicionando a linha abaixo:
```
127.0.0.1 sosacessivel.com.br
```
