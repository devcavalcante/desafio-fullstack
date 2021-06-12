# desafio-fullstack
Este teste consiste em criar um pequeno cadastro de clientes com vínculo de contatos e depois mostrar o cliente e seus contatos vinculados.

# Tecnologias necessárias
- SGBD
- Composer
- PHP 7.>
- Passo a passo de como instalar o php na máquina:
- https://www.php.com.br/instalacao-php-linux
- https://www.php.net/manual/en/install.windows.php

# Configuração do projeto
- Salvar seu arquivo na pasta /var/www/html
- Executar a query table.sql ou importar o arquivo no seu SGBD para criar as tabelas necessárias.
- No lib/database/Connection configurar seu banco de dados
```sh
new PDO('database: host=localhost; dbname=nomeDatabase', 'usuarioDoBancodeDados', 'senhaDoUsuario');
```
- Ao instalar o projeto na máquina rode o comando "composer install" dentro da pasta clonada
- Acessar seu projeto no seu localhost/desafio-fullstack

# Detalhes sobre o programa
Foi utilizado a linguagem de programação PHP, juntamente com o padrão MVC
1. diretório "view" é onde fica todas as telas do sistema
2. diretório "controller" é onde fica fica as funcionalidades do sistema que interragem com o banco de dados
3. diretório "model" é onde fica os arquivos de conexão com o banco de dados 
4. O arquivo table.sql é o script em sql que cria o banco e a tabela.
