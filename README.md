# desafio-fullstack
Este teste consiste em criar um pequeno cadastro de clientes com vínculo de contatos e depois mostrar o cliente e seus contatos vinculados.

# Tecnologias necessárias
- SGBD
- Composer
- PHP 7.>
- Passo a passo de como instalar o php na máquina:
- https://www.php.net/manual/pt_BR/install.php

# Configuração do projeto
- Coloque-o no diretório root do seu servidor web
- Executar a query table.sql ou importar o arquivo no seu SGBD para criar as tabelas necessárias.
- No lib/database/Connection configurar seu banco de dados
```sh
new PDO('database: host=localhost; dbname=nomeDatabase', 'usuarioDoBancodeDados', 'senhaDoUsuario');
```
- Ao instalar o projeto na máquina rode o comando "composer install" dentro da pasta clonada
- Use o seu navegador para acessar o arquivo com a URL de seu servidor web, terminando com a referência ao arquivo /desafio-fullstack.php. Quando o desenvolvimento for local está URL será algo como http://localhost/ola.php ou http://127.0.0.1/ola.php mas isso depende da configuração do seu servidor web. Se tudo foi configurado corretamente, este arquivo será interpretado pelo PHP e o você conseguirá ver a página inicial.

# Detalhes sobre o programa
Foi utilizado a linguagem de programação PHP, juntamente com o padrão MVC
1. diretório "view" é onde fica todas as telas do sistema
2. diretório "controller" é onde fica fica as funcionalidades do sistema que interragem com o banco de dados
3. diretório "model" é onde fica os arquivos de conexão com o banco de dados 
4. O arquivo table.sql é o script em sql que cria o banco e a tabela.
5. O diretório core é onde decide a página ou que controller deve ser aberto
