# **Curso BackEnd - 225h - Técnico em Desenvolvimento de Sistemas - SENAI**

Profº Diogo TB

Escola SENAI Americana

2º Semestre 2026

## Objetivos do Curso

- Desenvolver Aplicações web Server Side, utilizando a linguagem PHP;
- Aplicar Sintaxe Nativa PHP (Vanilla);
- Manipulação HTTP;
- Persistência de Dados;
- Segurança contra SQL Injection/CSRF;
- Refatoração em POO (Programação Orientada ao Objeto);
- Arquitetura MVC (Model, View, Controller);
- Utilização do FrameWork Laravel;

OBS: FrameWork -> um conjunto de bibliotecas que oferecem uma solução completa para o desenvolvimento de alguma coisa.

## Cronograma do Semestre

Carga Horária: 105h 1º Semestre e 120h 2º Semestre

Duração: 20 Semanas 1º Semestre e 20 Semanas 2º Semestre

---

### Semana 1: Introdução ao BackEnd e Configuração do Ambiente PHP

#### O que é BackEnd?

O BackEnd é a parte de uma aplicação que o usuário não vê, mas que faz tudo funcionar por trás das telas.

O BackEnd é a parte de um sistema que funciona nos servidores, sendo responsável por executar a lógica da aplicação, processar informações e armazenar dados.

Além disso, o BackEnd é responsável por atender ás solicitações do Frontend.

Sobre o mercado atual: o cenário é bom, mas mais exigente do que era. Quem conhece só o básico enfrenta mais concorrência. Quem alia backend sólido com IA aplicada, cloud e inglês está num patamar completamente diferente — vagas internacionais remotas são uma realidade pra esse perfil.

O Backend é formado pelo servidor, banco de dados, lógica de programação com APIs e linguagens de programação/frameworks. Esses componentes trabalham juntos para processar dados, armazenar informações e garantir o funcionamento da aplicação.

### Para que serve

- Processar lógica de negócio: regras, cálculos, validações (ex: calcular frete, aplicar desconto, validar login)

- Gerenciar banco de dados: salvar, buscar, atualizar e deletar informações

- Autenticação e autorização: controlar quem pode acessar o quê (login, senhas, permissões)

- Fornecer APIs: criar "pontes" (endpoints) para o frontend ou outros sistemas consumirem dados

- Integração com serviços externos: pagamentos, e-mails, notificações, APIs de terceiros

- Segurança: proteger dados sensíveis, evitar ataques (SQL injection, XSS, etc.)

- Escalabilidade e performance: garantir que o sistema aguente muitos usuários ao mesmo tempo.

### Principais Tecnologias Linguagens de programação:

Ferramentas usadas para escrever o código do servidor, como Python, Node.js (JavaScript), Java e PHP.APIs: Os "caminhos" que permitem que o que você vê no celular converse com o servidor.

### Setores que mais contratam

- Fintechs e Bancos:
  Segurança, transações, alta escala

- E-commerce:
  Catálogo, pedidos, pagamentos

- Healthtechs:
  Prontuários, telemedicina

- SaaS / Startups:
  Backend é o coração do produto

- Logística:
  Rastreio, rotas, tempo real

- Educação:
  Plataformas, conteúdo, usuários

### O Ciclo de Vida da Requisição HTTP

##### O que é HTTP?

_HTTP_, Hypertext Transfer Protocol, é um protocolo de comunicação utilizado para transferência de informações na WWW (World Wide Web) e em outros sistemas de redes.

O HTTP é a base para que o cliente e um servidor web troquem informações. Ele permite a requisição e a resposta de recursos como, imagens, arquivos e textos.

```mermaid

graph TD

    A[Navegador]
    B[HTTP]
    C[Servidor]

    A --> |request| B
    B --> |request| C
    C --> |response| B
    B --> |response| A

```

#### Como Funciona na Prática o BackEnd

- **Ação do Usuário**: Envia uma solicitação pela UI(Interface do Usuário). Exemplo de UI: Tela do celular, navegador da internet, Alexa, IOT ...
- **Enviar uma requisição**: A UI transforma a ação do Usuário em uma requisição HTTP.
- **O processamento BackEnd**: O código BackEnd recebe o pedido, valida os dados e decide o que fazer. Ex: consultar uma informação no BD(Banco de dados).
- **Resposta**: O servidor devolve o resultado para a UI. Ex: Um login autorizado, confirmação de uma compra...

#### Tipos de requisição HTTP

Os tipos de requisição HTTP indicam a ação que o usuário deseja executar no servidor. As principais ações são:

- **GET**: Pede dados de um lugar especifico do servidor. "Não faz alterações no servidor"
- **DELETE**: Apaga um dado do servidor.
- **POST**: Envia dados novos para **criar** algo ou processar informações do servidor.
- **PUT/PATCH**: Modificar um dado já existente.

---

### Iniciando o PHP

**PHP** (HyperText PreProcessor) é uma linguagem de programação interpretada e open source, focada no desenvolvimento de sistemas para web, que pode ser usada junto com HTML para criação de páginas web dinâmicas.

O PHP de fato é uma das linguagens de programação mais populares da atualidade. Ela permite que você crie aplicações web robustas, de uma maneira muito simplificada e direta. A linguagem tem diversos recursos que facilitam e aceleram o processo de desenvolvimento de sites e sistemas para web. E além do mais, ela ainda tem um ótimo ecossistema, uma excelente comunidade e um grande mercado de trabalho.

#### Instalando o PHP

- Fazer o Download do PHP (php.net)
- ZIP - NTS(Non Thread Safe) 8.5
- Descompactar o arquivo do PHP na pasta C:\src\php (Para descompactar usar o 7zip = Melhor e mais rapido) => Nunca salvar arquivo ou programas na raiz do sistema(C:)
- Adicionar a pasta do PHP(C:\src\php) as variáveis de ambiente do sistema (PATH)
- Verificar a instalação rodando o comando
  > _php --version_

#### Criando minha primeira aplicação em PHP

1. Antes de começar a codar:

- Preparar meu VSCODE
  - Criar um Profile próprio para PHP.
  - Instalar extensões necessárias para transformar o VSCODE em uma IDE.
    - PHP Intelephense -> Permite a utilização de Snippets(Atalhos de código)
    - PHP Debug -> Ajuda a encontrar erros de código
    - PHP Cs fixer -> Formatação de códigos (Identação)
    - PHP Server -> Ajuda na criação de um servidor local para PHP
  - Desabilitamos o PHP Nativo do VSCODE (@builtin PHP)

2. Hello World (Muito importante)

### Semana 2 - Variáveis, constantes e operadores em PHP

##### Estudo de variáveis e constantes em PHP

Declarar variáveis é alocar um espaço na memória que permite a inclusão e manipulação de dados.

**Variáveis**

- Devem ser declaradas usando "$" antes do nome da variável
- São não tipadas (não precisa declarar o tipo dela na criação)
- Podem ser String, Numéricas (interger e float) e Booleanas e Nulas. Não permite declaração de Undefined
- Regra de ouro: Usar o "declare(strict_types=1);" na primeira linha do arquivo; => Blinda o sistema contra conflitos de tipos de variáveis

**Constantes**

- Não podem ser mudadas ou redeclaradas após a criação
- Pode ser criadas usando o "const" ou o "define"
- Não permite interpolação

##### Estudo de operadores

**Aritméticos**: São usados para realizar cálculos

| Operador | Nome          | Exemplo | Resultado                  |
| -------- | ------------- | ------- | -------------------------- |
| +        | Adição        | 10+5    | 15                         |
| -        | Subtração     | 10-5    | 5                          |
| \*       | Multiplicação | 10\*5   | 50                         |
| /        | Divisão       | 10/5    | 2                          |
| %        | Modulo(Resto) | 10%3    | 1 (10 div 3 da 3, sobra 1) |
| \*\*     | Expoente      | 2\*\*3  | 8 (2 elevado a 3)          |

obs: O operador & é o melhor amigo de um programador, permite ordenar listas e organizar fila e pilhas

**Relacionais**: Permite o relacionamento entre dois ou mais valores, o resultado de uma operação é sempre uma booleana (True or False).

| Operador | Significado            | Exemplo     | Resultado |
| -------- | ---------------------- | ----------- | --------- |
| >        | Maior que              | 18 > 18     | False     |
| >=       | Maior ou igual a       | 18 >= 18    | True      |
| <        | Menor que              | 10 < 20     | True      |
| <=       | Menor ou igual a       | 10 <= 5     | False     |
| ==       | Comparação de valor    | "10" == 10  | True      |
| ===      | Comparação estrita     | "10" === 10 | False     |
| !=       | Diferente              | "10" != 10  | False     |
| !==      | Estritamente diferente | "10" !== 10 | True      |

**Lógicos**: Permite a combinação entre sentenças.

- Operador AND (E) => && : para o resultado ser verdadeiro, todas as combinações precisam ser verdadeiras
  - True && True = True
  - True && True = False

- Operador OR (OU) => || : para o resultado ser verdadeiro, basta apenas uma condição ser verdadeira
  - False || True = True
  - False || False = False

- Operador NOT (NÃO) => ! : inverte a lógica da operação
  - !True = False
  - !False = True

---

### Semana 3 - Estrutura de controle de dados (Condicionais e repetição)

- **Conteúdo**: Estrutura `if`, `else`, `elseif`, operadores ternários, `match` => substituto do `switch/case`, loops `for`, `while`, `do-while` e `foreach`

#### Estruturas de controle de dados ajudam no processo de automatização em programas e sistemas

##### Condicionais (IF, ELSE, ELSEIF)

**Formas de uso**

- uso do `if` apenas:
  Exemplo: aplicar desconto de 10% em compras acima de R$ 100;

```mermaid

graph LR

    A[Comando] --> B{Condição} --> C[Ação]

```

```php
if($valorCompra > 100) {
    $valorFinal = $valorCompra * 0.9;
}
```

- Uso do `if` e do `else`
  Exemplo: Aplicar um desconto de 10% para compras acima de 100 reais e 5% para as demais compras

```mermaid

graph LR

    A[Comando] --> B{Condição}
    B --> |true| C[Ação 1]
    B --> |false| D[Ação 2]

```

```php

if($valorCompra > 100){
    $valorFinal = $valorCompra * 0.9;
} else {
    $valorFinal = $valorCompra * 0.95;
}

```

- Uso de `elseif` (if encadeado) → Estrutura usada para manipulação de dados em duas ou mais condicionais.
  Exemplo: Compras acima de 200 reais tem 15% de desconto, compras acima de 100 reais tem 10% de desconto e demais compras tem 5% desconto

```mermaid

graph LR

    A[Comando] --> B{Condição 1}
    B --> |True| C[Ação 1]
    B --> |False| D{Condição 2}
    D --> |True| E[Ação 2]
    D --> |False| F[Ação 3]

```

Exemplo:

```php
if($valorCompra > 200) {
    $valorFinal = $valorCompra * 0.85;
} elseif($valorCompra > 100) {
    $valorFinal = $valorCompra * 0.9;
} else {
    $valorFinal = $valorCompra * 0.95;
}

```

**Obs**: Sempre usar `elseif` para situações que precisam de mais de uma condição, ou seja, fazer encadeamento das condições.

- Uso **ERRADO** do if

```php
if($valorCompra > 200) {
    $valorFinal = $valorCompra * 0.85;
}
if($valorCompra > 100) {
    $valorFinal = $valorCompra * 0.9;
} else {
    $valorFinal = $valorCompra * 0.95;
}
```

##### Operadores Ternários

Um atalho para a estrutura condicional `if/else`, normalmente escrito em uma única linha de código.

`condição ? verdadeira : falsa `

Perfeito para decisões curtas de uma linha de comando

Exemplo: Verificar se a pessoa é maior de idade (18);

```php

$idade = 20;
//O formato é (Condição) ? Verdadeiro : Falso

$status = ($idade>=18) ? "Maior de idade" : "Menor de idade";
// Ou encadeamento (elseif):
$status2 = ($idade>=60) ? "idoso" : ($idade>=18) ? "Adulto" : "Criança";

echo $status //

```

##### Expressão Condicional `match` (PHP 8)

No mercado atual de PHP, não se usa mais uma `Switch/Case` para chegar valores fixos, usa-se o `match`. Ele compara um valor e retorna diretamente o resultado caso atenda a condição.

```mermaid

graph TD
    A[Valor] --> B{Condicional}
    B --> C[Ação 1]
    B --> D[Ação 2]
    B --> E[Ação 3]
    B --> F[Ação 4]
    B --> G[Ação ...]
    B --> H[Ação default]

```

Exemplo: Selecionar o dia da semana a partir de um Nº

```php
$diaSemanaNum = date("W"); //Pega o dia da semana em formato numérico

$nomeDiaSemana = match($diaSemanaNum) {
    "1" => "Domingo"
    "2" => "Segunda"
    "3" => "Terça"
    "4" => "Quarta"
    "5" => "Quinta"
    "6" => "Sexta"
    "7" => "Sábado"
    "default" => "Dia Inválido"
};

echo "Hoje é ? $nomeDiaSemana";
```

---

##### Laços de Repetição

Um laço de repetição faz com que um bloco de código rode várias vezes até que uma condição mande parar.

- O laço `while` (Enquanto)

Ele verifica se a condição é verdadeira ANTES de entrar no laço. Ideal quando você não sabe exatamente quantas vezes vai rodar o laço.

```mermaid

flowchart LR

    A[Início: contador = 0] --> B{Condição = Verdade}
    B -- Sim --> C[Repete]
    C --> D[Executa código]
    D --> B
    B -- Não --> E[Fim do laço]

```

Exemplo de Aplicação do While: Jogo de Advinhação de um Nº Secreto

```php

$numeroSecreto = rand(1,10);

$tentativas = 0;

$numeroEscolhido = 0;

while($numeroEscolhido != $numeroSecreto) {
    echo "Tente novamente"
    //Vou escolher outro Nº para advinhar
    $numeroEscolhido = rand(1,10);
    $tentativas++;
}

echo "Acertou Miseravi!!! o Nº secreto é $numeroEscolhido";
```

- O Laço `do-while` (Faça - Enquanto)

A diferença é que ele executa o bloco pelo menos uma vez, mesmo que a condição seja false desde o início, pois ele só pergunta no final.

```mermaid

flowchart LR
    A([Início]) --> B[Ação]
    B --> C{Condição}
    C --true--> B
    C --false--> D([Fim])
```

Exemplo: Jogo de Adivinhação de um Nº

```php

$numeroSecreto = rand(1,10);

do{
    $numeroEscolhido = rand(1,10);

    if($numeroEscolhido == $numeroSecreto) {
        echo "Parabéns, Acertou!!!";
        break;
    }
    echo "Tente Novamente!";

} while($numeroEscolhido != $numeroSecreto);

```

##### O Freio de Emergência: `break` e `continue`

As vezes precisamos interferir no laço enquanto ele está rodando

- `break` → **Para Tudo!** Quebra o laço inteiro e vai embora
- `continue` → **Pula a rodada** Ele ignora o código daquela rodada específica e pula logo para a próxima repetição.

Exemplo de Aplicação de Código: Sistema de controle do elevador

```php

for($andar = 1; $andar<=10; $andar++;){
    if($andar == 4){
        echo "Andar $andar está em obras. Passando direto!";
        continue;
    }

    echo "Elevador parou no andar $andar";
}
```

---

##### Laço de Repetição `for`

Use o `for` quando você sabe quantas vezes precisa repetir uma ação ou quando precisa controlar um contador. Ele possui três partes:

- Inicialização,
- Condição,
- Incremento;

for(inicialização; condição; Incremento) {
Ação
}

```mermaid

flowchart LR
    A[Início: i=0;] --> B{i<10}
    B --true--> C[Ação]
    C --> D[i++/i--]
    D --> B
    B --false--> E[Fim]

```

Exemplo: Exibir todos os meses do Ano

```php
for($mes=1; $mes<=12; $mes++) {
    echo "Mês $mes";
}
```

Nesse exemplo, `$mes` começa em 1, o laço continua enquanto `$mes` for menor ou igual a 12 e, ao final de cada repetição, `$mes++` aumenta o contador em 1.

##### Laço de repetição `foreach`

Use o `foreach` quando preciasar percorrer cada item de um **array**. Ele acessa os elementos diretamente, sem que você precise controlar o contador.

Exemplo: Imprimir todos os itens de um vetor

```php

$frutas = ["Maçã", "Banana", "Uva", "Pera"];

foreach($frutas as $fruta) {
    echo "Fruta: $fruta";
}
```

Outro exemplo: Acessar a chave e o valor de cada item:

```php

$precos = [
    "Caderno" => 25.90,
    "Caneta" => 5.50,
    "Mochila" => 99.00
]; //vetor não ordenado chave → valor

foreach ($precos as $produto => $preco){
    echo "$produto: R$ number_format($preco,2)";
}
```

---

---

#### Desafio: Simulado de cobrança (FINANSENAI)

#### Desafio Final

---

---

### Semana 4 - Modularização com Funções

#### Principio do DRY (`Don´t Repeat Yourself`)

Se uma lógica foi escrita duas vezes ou mais dentro de um código, Essa Lógica deve virar uma função.

#### Funções nativas do PHP

O PHP tem milhares de funções prontas, essas funções são chamadas de nativas.

- **O que é uma função?**

Uma função é como uma máquina: você coloca uma matéria-prima(Parâmetro), ela processa e devolve um produto final(Retorno).

Exemplo de Função Nativa:

```php

$texto = "senai americana";

//str_replace(Ela busca um pedaço do texto e substitui por outro)
$textoNovo = str_replace("americana","São Paulo",$texto);

//strtoupper
echo strtoupper($textoNovo); // SENAI SÃO PAULO

```

##### Principais funções nativas(Mais utilizadas)

As funções abaixo já fazem parte do PHP e podem ser chamadas diretamente no código. Observe os parâmetros que cada uma recebe e o tipo de informação que ela retorna.

| Função                | Categoria   | O que faz                                                      | Como usar                                      |
| --------------------- | ----------- | -------------------------------------------------------------- | ---------------------------------------------- |
| `strlen()`            | Strings     | Retorna a quantidade de caracteres de um texto.                | `$tamanho = strlen($texto);`                   |
| `strtoupper()`        | Strings     | Converte o texto para letras maiúsculas.                       | `$resultado = strtoupper($texto);`             |
| `strtolower()`        | Strings     | Converte o texto para letras minúsculas.                       | `$resultado = strtolower($texto);`             |
| `ucfirst()`           | Strings     | Converte a primeira letra do texto para maiúscula.             | `$resultado = ucfirst($texto);`                |
| `trim()`              | Strings     | Remove espaços e quebras de linha no início e no fim do texto. | `$limpo = trim($texto);`                       |
| `str_replace()`       | Strings     | Substitui uma parte do texto por outra.                        | `$novo = str_replace("-", "", $cpf);`          |
| `substr()`            | Strings     | Extrai uma parte do texto a partir de uma posição.             | `$inicio = substr($texto, 0, 3);`              |
| `explode()`           | Strings     | Divide um texto e cria um array usando um separador.           | `$palavras = explode(" ", $nome);`             |
| `implode()`           | Arrays      | Junta os itens de um array em um único texto.                  | `$lista = implode(", ", $nomes);`              |
| `count()`             | Arrays      | Conta a quantidade de itens de um array.                       | `$total = count($produtos);`                   |
| `in_array()`          | Arrays      | Verifica se um valor existe dentro de um array.                | `$existe = in_array("SP", $estados, true);`    |
| `array_push()`        | Arrays      | Adiciona um ou mais itens ao final de um array.                | `array_push($nomes, "Ana");`                   |
| `array_pop()`         | Arrays      | Remove e retorna o último item de um array.                    | `$ultimo = array_pop($nomes);`                 |
| `sort()`              | Arrays      | Ordena um array em ordem crescente e reorganiza suas chaves.   | `sort($notas);`                                |
| `array_keys()`        | Arrays      | Retorna um array contendo as chaves de outro array.            | `$chaves = array_keys($produtos);`             |
| `number_format()`     | Números     | Formata um número com casas decimais e separadores definidos.  | `$preco = number_format($valor, 2, ',', '.');` |
| `round()`             | Números     | Arredonda um número para a quantidade de casas informada.      | `$media = round($nota, 2);`                    |
| `max()`               | Números     | Retorna o maior valor de uma lista ou array.                   | `$maior = max($notas);`                        |
| `min()`               | Números     | Retorna o menor valor de uma lista ou array.                   | `$menor = min($notas);`                        |
| `is_numeric()`        | Validação   | Verifica se o valor é um número ou uma string numérica.        | `if (is_numeric($entrada)) { ... }`            |
| `isset()`             | Validação   | Verifica se uma variável existe e não possui valor `null`.     | `if (isset($usuario)) { ... }`                 |
| `empty()`             | Validação   | Verifica se uma variável está vazia.                           | `if (empty($pedido)) { ... }`                  |
| `date()`              | Data e hora | Formata uma data ou hora conforme uma máscara.                 | `$hoje = date('d/m/Y');`                       |
| `file_exists()`       | Arquivos    | Verifica se um arquivo ou diretório existe.                    | `if (file_exists('dados.txt')) { ... }`        |
| `file_get_contents()` | Arquivos    | Lê todo o conteúdo de um arquivo ou endereço.                  | `$conteudo = file_get_contents('dados.txt');`  |
| `file_put_contents()` | Arquivos    | Grava conteúdo em um arquivo, criando-o se necessário.         | `file_put_contents('log.txt', $mensagem);`     |

**Atenção:** algumas funções modificam o array original, como `sort()`, `array_push()` e `array_pop()`. Já outras retornam um novo valor, como `count()`, `explode()` e `str_replace()`. Em caso de dúvida, consulte a documentação oficial do PHP e verifique o retorno da função.

##### Documentação PHP

[Acesse a documentação oficial do PHP em português](https://www.php.net/manual/pt_BR)

Consulte também a [referência de funções do PHP](https://www.php.net/manual/pt_BR/funcref.php) para pesquisar a sintaxe, os parâmetros e os valores por cada função

#### Funções customizadas (Criando suas próprias máquinas)

Quando o PHP não tem a função que queremos, nós a criamos!

**A regra de Ouro:** Uma função deve focar em `return`(Retornar um valor), e não imprimir(`echo`).

Veja a diferença nesse exemplo:

```php

function calcularTotal($preco, $quantidade){
    //a função calcula e retorna o resultado, mas não imprime nada
    return $preco * $quantidade;
}

$total = calcularTotal(25.00, 3);

echo "Total da compra: R$ " . number_format($total, 2, ",", ".");
//Total da compra: R$ 75,00

```

A função `calcularTotal()` pode ser reutilizada em uma página, relatório ou teste. O `echo` aparece somente fora da função, no momento de apresentar o resultado ao usuário.

##### Padrão de uso corporativo(PHP 8 Strict Types)

No mercado de trabalho, exigimos que a função avise exatamente o **TIPO** de dado que ela espera receber e o **TIPO** que ela vai devolver.

Isso é chamado de **tipagem de funções**. Ao declarar os tipos, o código fica mais fácil de entender e o PHP consegue identificar alguns erros antes que eles causem problemas maiores no sistema.

Os tipos mais usados:

- `int`: Números inteiros, Ex: `10` ou `1024`.
- `float`: Números decimais ou Ponto flutuante, Ex: `10.50`.
- `string`: Texto, Ex: `"Maria"`
- `bool`: Valor lógico, `true` ou `false`.
- `void`: Identifica que a função não devolve nenhum valor.

O tipo deve ser escrito antes do nome de cada parâmetro e o tipo da função deve ser escrito após os parênteses, precedido por `:`, informando o que a função vai devolver.

Exemplo de uso de função e parâmetros típados:

```php
function apresentarProduto(string $nome, float $preco): string{
    return "$nome custa R$ $preco";
}

$mensagem = apresentaProduto("Caderno", 25.90);
echo $mensagem;
// Caderno custa R$ 25.90

```

> **Resumo**: os tipos dos parâmetros documentam as entradas da função, o tipo após `:` documentam a saída da função

##### O Tipo mágico: `void`

Se uma função faz um trabalho interno e **não retorna NADA**, dizemos que o retorno dela é "vazio" (`void`).

Exemplo de função sem retorno:

```php
function registroLog(string $mensagem): void{
    //apenas salvar em um arquivo de texto, não devolve nenhuma variável
    file_put_contents("erro.log", $mensagem);
}
```

#### Escopo e Referência (O segredo da memória)

##### O que é Escopo? (A regra de Las Vegas)

_O que acontece dentro da função, fica dentro da função_. Uma variável criada fora não existe lá dentro, e uma criada lá dentro morre quando a função acaba.

**Escopo** É o local do programa onde a variável pode ser armazenada/acessada. Em PHP, uma variável criada fora de uma função pertence ao **escopo global**. Uma variável criada dentro de uma função pertence ao **escopo local**.

Exemplo de Escopo de variável:

```php
$nomeSistema = "CRM Senai"; //Variável global

function criarMensagem():string{
    $mensagem = "Bem-Vindo!"; //Variável local
    return $mensagem;
}

echo $nomeSistema; //Correto: está no escopo global.
echo criarMensagem(); //Correto: a função devolve sua variável local.
echo $mensagem; //Incorreto: $mensagem só existe dentro da função, não é acessada fora.
```

- Como enviar dados para uma função?

A forma mais segura e organizada é enviar os dados por **parâmetros**. Assim, a função não precisa acessar diretamente variáveis globais:

```php
function saudar(string $nome):string{
    return "Olá, $nome!";
}

$nomeCliente = "João";
echo saudar($nomeCliente); //Olá, João!
```

Nesse caso, `$nomeCliente` continua no escopo global, mas seu valor é enviado para o parâmetro local `$nome`. A função recebe uma informação, processa e retorna o resultado.

Exemplo Incorreto:

```php

$nome = "João";
function saudar():string{
    return "Olá, $nome";
}
```

A função `saudar()` não conhece a variável global `$nome`

> **Resumo:** variáveis protegem os dados internos da função; parâmetros são o caminho recomendado para evitar erros e enviar informações, e o `return` é usado para devolver um resultado ao código que chamou a função.

---

### Semana 5 - Arrays e Manipulação Avançada de Dados

Um array(também conhecido como vetor) é uma estrutura de dados usadas para armazenar vários valores em uma única variável.

**Tipos de Arrays em PHP:**

- Indexados/Ordenado(Númerica): Usam Números inteiros como índices(chaves), que começam em zero por padrão;
- Associativos/NãoOrdenados(String): Usam chaves(String) para identificar valores;
- Multidimensionais: Contêm um ou mais arrays dentro de outro array.

**Exemplos de Arrays**

```php

//array indexado
$frutas = ["maça","banana","laranja"];

//array associativo
$capitais = [
    "SP" => "São Paulo",
    "RJ" => "Rio de Janeiro",
    "MG" => "Belo Horizonte",
    "ES" => "Vitória",
];

//acessando os dados dos Arrays

echo $frutas[1]; //Banana
echo $capitais["MG"]; //Belo Horizonte
```

>Obs: Em arrays associativos, nós trocamos os nº do índice por Nomes(Chaves/Keys). Na Declaração do Vetor usamos setinha(=>) que significa "recebe".

#### Arrays multidimensionais (Banco de dados na memória)

É aqui que o "BackEnd" começa de verdade. O array multidimensional é o formato como os bancos de dados e APIS respondem as solicitações feitas pelo BackEnd.

**Exemplo de array Multidimensional**

```php
$clientes = [
    ["id" => 1, "nome" => "Ana", "email" => "ana@email.com", "ativo" => true],
    ["id" => 2, "nome" => "Bruno", "email" => "bruno@gmail.com", "ativo" => false],
    ["id" => 3, "nome" => "Carlos", "email" => "carlos@hotmail.com", "ativo" => true],
];

//Como acessar o email do Carlos
echo $clientes[2]["email"]; // carlos@hotmail.com
```

#### O melhor amigo dos Array: `O foreach`

O laço de repetição especial para Arrays. O `foreach` percorre cada elemento de um array

**Exemplo de Aplicação:**

```php
foreach($clientes as $clienteAtual){
    echo $clienteAtual["nome"];
    echo $clienteAtual["email"];
}
// vai imprimir nome e email de todos os Clientes do Array
```

#### Transformação de Arrays e Arrow Function

Transformações de arrays são usadas para modificar ou filtrar informações de um array existente

- `array_filter`
Serve para buscar dados em um array e devolver apenas os dados que passarem pelo filtro

```php
$clientesAtivos = array_filter($clientes, fn($c) => $c["ativo"]===true);
//novo array, terá apenas os clientes que a chave ativa for igual a true
```

- `array_map`
Serve para alterar todos os dados de um array de uma única vez

```php
$produtos = [
    ["id"=>1, "preco"=10.00, "setor"=>"jardim"],
    ["id"=>2, "preco"=15.90, "setor"=>"ferramenta"],
    ["id"=>3, "preco"=23.50, "setor"=>"jardim"],
]
//ajustar o preço de todos os produtos de jardim em 10% de aumento

$produtosAjustados = array_map(fn($p) => $p["preco"] = $p["preco"] * 1.1, $produtos);
```

> Obs: para a função de filtragem, primeiro selecionamos a array e depois criamos o filtro. Para a função de mapeamento, primeiro criamos a função de transformação e depois aplicamos no array.

#### Debugando um Array (Kit de primeiro socorros)

- `print_r`
Função usada para exibir informações sobre um array de forma legível em linguagem natural

```php
echo print_r($frutas);
//array
(
    [0] => "maça",
    [1] => "banana",
    [2] => "laranja",
)
```

- `var_dump`
Exibe com mais detalhes as informações de um array ou variável em PHP

```php
echo var_dump($frutas);
//Mostrar tudo: tipo de dados, o tamanho e o valor
```

---

### Semana 6 - Processamento HTTP e Formulários Web

#### Anatomia de um Formulário HTML para Backend

Antes do PHP processar qualquer informação, precisamos coletar informações no FrontEnd através de um `<form>`

**Exemplo de `<form>` HTML**

```html
<form action="processar.php" method="POST">
    <label>Nome Completo</label>
    <input type:"text" id="campoNome" name="nomeUsuario" placeholder="Digite seu Nome">
    <button type="submit">Cadastrar</button>
</form>
```

**Os 3 Pilares de um formulário**
1. action="processa.php" → O Destino: Define qual script PHP no servidor receberá os dados
2. method="POST" → O Transporte: Define a via de protocolo HTTP que será usada (GET ou POST)
3. name="nomeUsuario" → A Etiqueta do Dado: É o nome da chave que o PHP usará no array associativo ($_POST["nomeUsuario"])

> OBS: Nunca confundir `id` com `name` no input, o PHP ignora o `id`.

#### O Protocolo HTTP

Quando o usuário clica no botão `type="submit"`, o navegador compila todas as informações dos campos preenchido e dispara um pacote de comunicação padronizado pelo **Protocolo HTTP(Hypertext Transfer Protocol)**.

**Os Formatos de Transferência**

* **Método GET**: solicitar informações públicas e realizar buscas, mas altamente arriscado para dados privados.
* **Método POST**: As informações viajam guardadas dentro do protocolo.


#### Testar o uso dos Protocolos HTTP

OK

#### GET vs POST

1. O Método GET(Consultas e Filtros)

O método `GET` é utilizado quando a intenção do cliente é **buscar ou filtrar dados** sem alterar o estado do servidor. Os dados enviados via `GET` são anexados diretamente ao final da URL na forma de uma **Query String**

2. O Método POST (Envio de cargas Úteis e Mutações)

O método `POST` é utilizado quando o formulário envia dados que devem ser processados para **criar ou modificar registros** no sistema (Ex: Cadastro de usuários, finalizações de compra, upload de arquivos)


#### As SuperGlobais

As variáveis SuperGlobais são arrays internos pré-definidos que estão sempre acessíveis em qualquer parte do script php, sem precisar declarar.

- **$_GET**: Armazena dados passados pela URL via parâmetros de consulta(query string);
- **$_POST**: Recolhe dados enviados por formulários usando o método HTTP POST.
- **$_SERVER**: Contém informações sobre o servidor, ambiente e caminhos de script.

**Porque usar `??` para obter dados da SuperGlobal**?

Usamos o Operador de Nulidade (Coalescência Nula) para verificar se o valor da variável não é `null`, se caso for `null` atribuimos um outro valor para evitar erros no script.

**Exemplo de Uso**:

Na primeira vez que uma pagina é aberta, o formulário ainda não foi enviado, portanto, a chave pode não existir no array.

```php
$nome =$_POST["nome"];
// escrevendo desta fomra, o código pode gerar um aviso de erro.

// a forma mais correta de escrita é:
$nome =$_POST["nome"] ?? "";
// se $_POST["nome"] não existir, use uma string vazia.

//outra forma de verificar nulidade é usando if else
if(isset($_POST["nome"])){
    $nome = $_POST["nome"];
} else {
    $nome = "";
}
```

>obs: use htmlspecialchars() ao exibir valor em HTML -> converte caracteres especiais em entidades  correspondentes em HTML, evitando que o código seja interpretado erradamente pelo navegador. É usado principalmente na segurança web para evitar ataques Cross-Site-Scripting(XSS).

#### Validação de Dados é obrigatória no BackEnd!

Muitos desenvolvedores iniciantes acreditam que colocar atributos `required`, `type=email` ou `min=0` na <tag> do HTML é o suficiente para proteger o sistema. **Isso é uma ilusão!**. Sempre fazer as validações de dados no código BackEnd.

##### Funções Nativas Essenciais para Limpeza e Validação de Dados

A validação no Back-End deve acontecer sempre antes do processamento de qualquer dado recebido pelo usuário. Abaixo está uma tabela resumida das funções nativas do PHP usadas com frequência para limpar, verificar e validar entradas de formulário.

| Função | Descrição | Quando usar | Exemplo simples |
| :--- | :--- | :--- | :--- |
| `trim($valor)` | Remove espaços no início e no fim da string | Limpar texto digitado pelo usuário | `$nome = trim($_POST['nome'] ?? '');` |
| `htmlspecialchars($valor, ENT_QUOTES, 'UTF-8')` | Converte caracteres especiais em entidades HTML seguras | Exibir dados na tela sem risco de XSS | `echo htmlspecialchars($_POST['nome'] ?? '', ENT_QUOTES, 'UTF-8');` |
| `filter_var($valor, FILTER_VALIDATE_EMAIL)` | Valida formato de e-mail | Campos de e-mail | `filter_var($email, FILTER_VALIDATE_EMAIL)` |
| `filter_var($valor, FILTER_VALIDATE_INT)` | Verifica se o valor é inteiro válido | Idade, código, quantidade | `filter_var($_POST['idade'] ?? '', FILTER_VALIDATE_INT)` |
| `filter_var($valor, FILTER_VALIDATE_FLOAT)` | Verifica se o valor é número decimal válido | Preço, peso, altura, salário | `filter_var($_POST['preco'] ?? '', FILTER_VALIDATE_FLOAT)` |
| `isset($variavel)` | Verifica se uma variável existe e não é `null` | Garantir que o campo foi enviado | `if (isset($_POST['nome'])) { ... }` |
| `empty($valor)` | Verifica se o valor está vazio | Campos obrigatórios | `if (empty($_POST['senha'])) { ... }` |
| `strlen($valor)` | Retorna o tamanho da string | Exigir mínimo ou máximo de caracteres | `if (strlen($senha) < 6) { ... }` |
| `in_array($valor, $lista, true)` | Verifica se o valor pertence a uma lista permitida | `select`, `radio`, opções válidas | `in_array($categoria, ['A','B','C'], true)` |
| `is_numeric($valor)` | Confirma se o valor é numérico | Validação de número | `if (is_numeric($_POST['quantidade'])) { ... }` |
| `preg_match($padrao, $valor)` | Valida por expressão regular | CPF, CEP, telefone, senha forte | `preg_match('/^\d{5}-\d{3}$/', $cep)` |
| `filter_input(INPUT_POST, 'campo', FILTER_SANITIZE_SPECIAL_CHARS)` | Captura e limpa dados da requisição | Ler entradas com segurança | `$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);` |
---

#### Preservação de Estado em Formulários (*Sticky Form*)

A técnica do **Sticky Form** consiste em imprimir e volta no atributo "value" do input os dados o usuário acaba de digitar caso ocorra um erro de validação de dados.

**Exemplo de Uso:**

```php
<div class="campo">
    <label for="nome">Nome Completo</label>
    <input type="text" id="nome" name="nome">
        value="<?= htmlspecialchars($dadosFormulario["nome"] ?? "")?>
        class="<?=isset(erro["nome]) ? "input erro" : "" ?>">
    <?php if (isset($erro["nome"])): ?>
        <span class="erro-texto"><?= $erro["nome"] ?></span>
    <?php endif; ?>
</div>
```
