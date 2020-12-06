# Aplicativo simples em PHP usando MVC com PDO

## Criar um aplicativo com a arquitetura MVC usando o mini3 
https://github.com/panique/mini3

## Faça o download
https://github.com/ribafs/mini-mvc

## Execute o composer

Acessar a pasta cadastro e executar:
```bash
composer dump-autoload
```

## Estrutura MVC

MVC é uma arquitetura de software, muito confundido com um padrão de projeto, cujo principal objetivo é separar o código de um aplicativo em 3 camadas: Model, View e Controller, assim deixando o código mais organizado e de fácil manutenção.

- Alguém clica no botão CLIENTES na view clientes/index, que chama o método com o mesmo nome, que é o index do controle cm o mesmo nome, Clientes
- Então o método index do ClientesController é chamado
- O método index do controller cria uma instância do model Cliente e através desta instância chama o  método getAllClientes do model Cliente
- O método getAllClientes do model faz uma consulta ao banco para que devolva todos os registros da tabela clientes, então retorna todos os clientes para o método index do ClientesController
- O método index então carrega a view clientes/index já com todos os registros de clientes

## Como adicionar um novo CRUD para outra tabela

- Adiciona a tabela no banco atual
- Adicione o model para esta tabela
- Adicione o controller
- Adicione a view para a tabela
- Adicione o link para a nova tabela em app/view/_templates/header.php

## Alguns recursos

- extremamente simples e fácil de entender
- estrutura simples e limpa
- Cria URLs limpas e "bonitas"
- Demo de actions de um CRUD: Create, Read, Update e Delete entradas de banco de dados facilmente
- demo de chamadas AJAX
- tenta seguir as diretrizes de codificação do PSR
- usa PDO para qualquer solicitação de banco de dados, vem com uma ferramenta de depuração PDO adicional para emular suas instruções SQL
- código comentado
- usa apenas código PHP nativo, portanto você não precisa aprender um framework para entender MVC
- usa o autoloader do PSR-4 com composer

## Segurança

O script usa o mod_rewrite e bloqueia todo o acesso de fora da pasta/public.
Sua pasta/arquivos.git, arquivos temporários do sistema operacional, a pasta do aplicativo e tudo o mais não está acessível (quando configurado corretamente). Para solicitações de banco de dados, o PDO é usado, portanto, não é necessário se preocupar com injeção de SQL.

## PSR-4

Como usa-se o PSR-4 então não precisamos ficar incluindo os arquivos com
include ou require pois as classes em application/Model são automaticamente incluidas e basta usar:

use Mini\Model\Cliente;

Por exemplo, como é feito em application/Controller/ClientesController.php, na linha 10, mas antes adicionando
namespace Mini\Controller;
Logo na primeira linha do arquivo, abaixo de <?php

## Roteamento - URL traduzem para controllers

http://localhost/cadastro   - abre o controller default, que é o Home
http://localhost/cadastro/clientes - abre o controller Clientes/index
http://backup/mini-mvc2/clientes/edit/2 - abre o cliente 2 para edição
http://backup/mini-mvc2/clientes/add - abre o clientes/index por que o form add está no clientes/index
http://backup/mini-mvc2/clientes/delete/2 - exclui o cliente cm id 2
http://localhost/cadastro/funcionarios - abre o controller Funcionarios
http://localhost/cadastro/produtos - abre o Produtos

## Licença

Este projeto está sob a licença MIT.
Isto significa que você pode usar e modificar ele livremente para projetos pessoais e comerciais, apenas preservando o crédito dos autores.

## Original

Detalhes no repositório original:
https://github.com/panique/mini3
