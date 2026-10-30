# Lista de Exercícios de Fixação e Prática - MVC

1. **O Colapso do Código Espaguete:** 
Explique por que manter consultas SQL, regras de validação e marcação HTML no mesmo arquivo inviabiliza a manutenção e a escalabilidade de um sistema corporativo.

>Resposta: Porque deixar tudo no mesmo arquivo dificulta a organização e a manutenção do sistema. Qualquer alteração pode acabar afetando outras partes do código, tornando o projeto mais complicado de corrigir, atualizar e expandir.



2. **A Tríade MVC:** 
Qual é a função específica de cada um dos três componentes do padrão MVC (Model, View, Controller)? Qual deles deve conter as regras de negócio?

>Resposta: O Model cuida dos dados e das regras de negócio, a View é responsável pela parte visual do sistema e o Controller recebe as requisições e faz a comunicação entre os dois. As regras de negócio devem ficar no Model.



3. **O Papel do Composer:** 
Diferencie o papel do arquivo composer.json do arquivo composer.lock. Por que a pasta vendor/ nunca deve ser versionada no Git?

>Resposta: O composer.json define as dependências do projeto, enquanto o composer.lock registra as versões exatas que foram instaladas. A pasta vendor/ não deve ser enviada para o Git porque pode ser recriada pelo Composer, evitando deixar o repositório muito pesado.



4. **A Especificação PSR-4:** 
Como o Autoloader PSR-4 consegue localizar o arquivo src/Controllers/ProdutoController.php a partir do namespace App\Controllers\ProdutoController?

>Resposta: O PSR-4 utiliza o namespace para encontrar o arquivo correspondente. Nesse caso, ele relaciona o namespace App\Controllers com a pasta src/Controllers e consegue localizar o ProdutoController.php automaticamente.



5. **Front Controller:** 
Qual é a principal vantagem de segurança ao centralizar todas as requisições em public/index.php e isolar os arquivos-fonte do projeto fora da raiz pública da web?

>Resposta: A principal vantagem é a segurança, pois todas as requisições passam pelo public/index.php. Assim, os arquivos internos do projeto ficam protegidos e não podem ser acessados diretamente pelo navegador.



6. **Roteador HTTP:** 
Como o objeto Roteador diferencia uma requisição GET /produtos de uma requisição POST /produtos?

>Resposta: O Roteador verifica o método HTTP e a URL da requisição. Assim, consegue diferenciar um GET /produtos, que normalmente serve para listar produtos, de um POST /produtos, que pode ser utilizado para cadastrar um novo produto.



7. **Injeção de Dados na View:** 
Como a função nativa extract() atua no método renderizar() do Controller para disponibilizar variáveis para as Views?

>Resposta: A função extract() transforma as chaves de um array em variáveis. Dessa forma, os dados enviados pelo Controller ficam disponíveis diretamente na View, facilitando a exibição das informações.



8. **Segurança contra XSS nas Views:** 
Por que todas as saídas dinâmicas exibidas em tabelas e formulários devem ser envolvidas com htmlspecialchars()?

>Resposta: Porque o htmlspecialchars() transforma caracteres especiais em entidades HTML, evitando que códigos maliciosos sejam executados na página. Isso ajuda a proteger o sistema contra ataques XSS.



9. **Single Responsibility no Controller:** 
Por que um Controller nunca deve conter comandos SQL com strings concatenadas ou conexões diretas via new PDO()?

>Resposta: Porque o Controller deve ser responsável por controlar o fluxo das requisições, e não por acessar diretamente o banco de dados. As consultas SQL e conexões devem ficar em classes específicas, deixando o código mais organizado e fácil de manter.



10. **Transição para o Framework Laravel:** 
Identifique quais conceitos aprendidos neste MVC artesanal são exatamente os mesmos utilizados pelo Laravel 11.

>Resposta: Vários conceitos continuam sendo utilizados, como MVC, rotas, Controllers, Models, Views, autoload com PSR-4 e separação de responsabilidades. A diferença é que o Laravel já oferece ferramentas prontas para facilitar o desenvolvimento dessas funcionalidades.