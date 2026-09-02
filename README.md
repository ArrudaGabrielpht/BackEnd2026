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

*HTTP*, Hypertext Transfer Protocol, é um protocolo de comunicação utilizado para transferência de informações na WWW (World Wide Web) e em outros sistemas de redes.

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
> *php --version*

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

|Operador | Nome | Exemplo | Resultado |
| - | - | - | - |
| + | Adição | 10+5 | 15 |
| - | Subtração | 10-5 | 5 |
| * |Multiplicação | 10*5 | 50 |
| / | Divisão | 10/5 | 2 |
| % | Modulo(Resto) | 10%3 | 1 (10 div 3 da 3, sobra 1) |
| ** | Expoente | 2**3 | 8 (2 elevado a 3) |
 obs: O operador & é o melhor amigo de um programador, permite ordenar listas e organizar fila e pilhas

**Relacionais**:  Permite o relacionamento entre dois ou mais valores, o resultado de uma operação é sempre uma booleana (True or False).

| Operador | Significado | Exemplo | Resultado |
| - | - | - | - |
| > | Maior que | 18 > 18 | False |
| >= | Maior ou igual a | 18 >= 18 | True |
| < | Menor que | 10 < 20 | True |
| <= | Menor ou igual a | 10 <= 5 | False |
| == | Comparação de valor | "10" == 10 | True |
| === | Comparação estrita | "10" === 10 | False |
| != | Diferente | "10" != 10 | False |
| !== | Estritamente diferente | "10" !== 10 | True |


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
#### Desafio: Simulador de Cobrança (FINANSENAI:)

#### Desafio Final
---

### Semana 4 - Modularização com funções

#### Principio do DRY (Don't repeat yourself)

Se uma lógica foi escrita duas vezes ou mais dentro de um código, essa lógica deve virar uma função.

#### Funções nativas do PHP

O PHP tem milhares de funções pronta, essa são chamadas de nativas.

- **O que é uma função?**

Uma função é como uma máquina: você coloca uma matéria prima (parâmetro), ela processa e devolvde um produto final (return).

Exemplo de função nativa:

```php

$texto = "senai americana";

//str_replace (busca um pedaço do texto e substitui por outro)
$textoNovo = str_replace("americana","são paulo",$texto);

//strtoupper (substitui tudo para letra maíuscula)
echo strtoupper($textoNovo); // SENAI SÂO PAULO 
```
##### Principais Funções Nativas ( Mais Utilizadas )

As funções abaixo já fazem parte do PHP e podem ser chamadas diretamente no código. Observe os parâmetros que cada uma recebe e o tipo de informação que ela retorna.

| Função | Categoria | O que faz | Como usar |
|---|---|---|---|
| `strlen()` | Strings | Retorna a quantidade de caracteres de um texto. | `$tamanho = strlen($texto);` |
| `strtoupper()` | Strings | Converte o texto para letras maiúsculas. | `$resultado = strtoupper($texto);` |
| `strtolower()` | Strings | Converte o texto para letras minúsculas. | `$resultado = strtolower($texto);` |
| `ucfirst()` | Strings | Converte a primeira letra do texto para maiúscula. | `$resultado = ucfirst($texto);` |
| `trim()` | Strings | Remove espaços e quebras de linha no início e no fim do texto. | `$limpo = trim($texto);` |
| `str_replace()` | Strings | Substitui uma parte do texto por outra. | `$novo = str_replace("-", "", $cpf);` |
| `substr()` | Strings | Extrai uma parte do texto a partir de uma posição. | `$inicio = substr($texto, 0, 3);` |
| `explode()` | Strings | Divide um texto e cria um array usando um separador. | `$palavras = explode(" ", $nome);` |
| `implode()` | Arrays | Junta os itens de um array em um único texto. | `$lista = implode(", ", $nomes);` |
| `count()` | Arrays | Conta a quantidade de itens de um array. | `$total = count($produtos);` |
| `in_array()` | Arrays | Verifica se um valor existe dentro de um array. | `$existe = in_array("SP", $estados, true);` |
| `array_push()` | Arrays | Adiciona um ou mais itens ao final de um array. | `array_push($nomes, "Ana");` |
| `array_pop()` | Arrays | Remove e retorna o último item de um array. | `$ultimo = array_pop($nomes);` |
| `sort()` | Arrays | Ordena um array em ordem crescente e reorganiza suas chaves. | `sort($notas);` |
| `array_keys()` | Arrays | Retorna um array contendo as chaves de outro array. | `$chaves = array_keys($produtos);` |
| `number_format()` | Números | Formata um número com casas decimais e separadores definidos. | `$preco = number_format($valor, 2, ',', '.');` |
| `round()` | Números | Arredonda um número para a quantidade de casas informada. | `$media = round($nota, 2);` |
| `max()` | Números | Retorna o maior valor de uma lista ou array. | `$maior = max($notas);` |
| `min()` | Números | Retorna o menor valor de uma lista ou array. | `$menor = min($notas);` |
| `is_numeric()` | Validação | Verifica se o valor é um número ou uma string numérica. | `if (is_numeric($entrada)) { ... }` |
| `isset()` | Validação | Verifica se uma variável existe e não possui valor `null`. | `if (isset($usuario)) { ... }` |
| `empty()` | Validação | Verifica se uma variável está vazia. | `if (empty($pedido)) { ... }` |
| `date()` | Data e hora | Formata uma data ou hora conforme uma máscara. | `$hoje = date('d/m/Y');` |
| `file_exists()` | Arquivos | Verifica se um arquivo ou diretório existe. | `if (file_exists('dados.txt')) { ... }` |
| `file_get_contents()` | Arquivos | Lê todo o conteúdo de um arquivo ou endereço. | `$conteudo = file_get_contents('dados.txt');` |
| `file_put_contents()` | Arquivos | Grava conteúdo em um arquivo, criando-o se necessário. | `file_put_contents('log.txt', $mensagem);` |

**Atenção:** algumas funções modificam o array original, como `sort()`, `array_push()` e `array_pop()`. Já outras retornam um novo valor, como `count()`, `explode()` e `str_replace()`. Em caso de dúvida, consulte a documentação oficial do PHP e verifique o retorno da função.


##### Documentação PHP

[Acesse a documentação oficial do PHP em pt-BR](https://www.php.net/manual/pt_BR/)

[Consulte também  referência de funções do PHP](https://www.php.net/manual/pt_BR/funcref.php)

#### Funções Customizadas (Criando suas próprias máquinas)

Quando o PHP não tem a função que queremos, nós a criamos!

**A Regra de Ouro:** Uma função deve focar em `return`, evitando o uso do `echo`.

Veja a diferença nesse exemplo:
```php

function calcularTotal($preco, $quantidade){
    return $preco * $quantidade;
}

$total = calcularTotal(25.00, 3);

echo "Total da compra: R$ " . number_format($total, 2, ",", ".");

```
A função `calcularTotal()` pode ser reutilizada em uma página ou teste. O `echo` aparece somente fora da função, no momento de apresentar o resultado final ao usuário.

##### Padrão de Uso Comporativo (PHP 8 Strict Types)

No mercado de trabalho exigimos que a função avise o *TIPO* de dado que ela espera receber e o *TIPO* que ela vai devolver.

Isso é chamado de **tipagem de funções**. Ao declarar os tipos, o código fica mais claro tanto para nós, qunato para o PHP identificar erros antes que eles causem erros maioires no sistema. 

Os tipos mais usados:

* `int`: número inteiro, `10` ou `1024`.
* `float`: número decimal ou ponto flutuante, `10.50`.
* `string`: texto, como `"Maria"`
* `bool`: valor lógico, `true` ou `false`.
* `void`: identifica que a função não devolve nenhum valor.

O tipo deve ser escrito antes do nome de cada parâmetro e o tipo da função deve ser escrito após os parênteses, precedito por `:`, informando o que a função vai devolver.

Exemplo de uso de função e parâmetros tipados:

```php
function apresentarProduto(string $nome, float $preco): string{
    return "$nome custa R$ $preco";
}

$mensagem = apresentaproduto("Caderno", 25.90);
echo $mensagem;

```

> **Resumo: os tipos dos parâmetros documentam as entradas da função, os tipos após `:` documentam a saída da função.

#### `VOID`

Se uma função faz um trabalho e **não retorna NADA**, dizemos que o retorno dela é "vazio" (`void`)

Exemplo de função sem `return`:

```php
function registroLog(string $mensagem): void{
    file_put_contents("erro.log",$mensagem);
}
```

#### Escopo e Referência (O segredo da memória)

##### O que é Escopo? (Regra de Las Vegas)

*O que acontece dentro da função, fica dentro da função.*

Uma váriavel criada fora da função não existe dentro dela, e uma criada dentro da mesma não existe fora dela.

**Escopo** é o local do programa onde a variável pode ser armazenada/acessada. Em PHP, uma variável criada fora de uma função pertende ao **Escopo global**. uma variável criada dentro de uma função pertence ao **Escopo local**.

Exemplo de Escopo de variável:

```php 
$nomeSistema = "CRM Senai"; 
function criarMensagem():string{
    $mensagem = "Bem-Vindo!"; 
    return $mensagem;
}

echo $nomeSistema; 
echo criarMensagem();  
```

* Como enviar dados para uma função?

A forma mais segura e organizada é enviar os dados por **parâmetros**. Assim, a função não precisa acessar diretamento variáveis globais:

```php
function saudar(string $nome):string{
    return "Olá, $nome!";
}

$nomeCliente = "João";
echo saudar($nomeCliente); // Olá, João!
```

Nesse caso, `$nomeCliente` continua no escopo global mas seu valor é enviado para o parâmetro local `$nome`. A função recebe uma informação, processa e retorna o resultado.

Exemplo Incorreto:

```php
$nome = "João";
function saudar():string{
    return "Olá, $nome";
}
```

A função `saudar()` não conhece a váriavel global.

> **Resumo:** variáveis protegem os dados internos da função; parâmetros são o caminho recomendado para evitar Erros e enviar Informações, e `return`é usado para devolver um resultado ao código que chamou a função.
---

### Semana 5 - Arrays e Manipulação Avançada de Dados

Um array(também conhecido como vetor) é uma estrutura de dados usada para armazenar vários valores em uma única várialvel.

**Tipos de Arrays em PHP:**

- Indexados/Ordenado(Numérica): Ultilizam números inteiros como indíces(chaves), que, por padrão comemeçam em zero.
- Associativos/NãoOrdenados(String): Ultilizam chaves do tipo string para identificar valores.
- Multidimensionais: Contêm um ou mais arrays dentro de outro array.

**Exemplos de ARRAYS:**

```php
//array indexado
$frutas = ["maça", "banana", "laranja"];

//array associativo
$capitais = [
    "SP" => "São Paulo",
    "RJ" => "Rio de Janeiro",
    "MG" => "Belo Horizonte",
    "ES" => "Vitória",
];

//acessando os dados dos Arrays

echo $frutas[1]; // banana
echo $capitais["MG"]; //Belo Horizonte
```

> Obs: Em arrays associativos, nós trocamos os nº do índice por Nomes(Chaves/Keys). Na Delaração do Vetor usamos setinha(=>) que significa "recebe".

#### Arrays Multidimensionais (Banco de Dados na Memória)

É aqui que o "BackEnd" começa de verdade. O Array Multidimensional é o fomato que os Banco de Dados e Apis respondem as solicitações feitas pelo BackEnd.

**Exemplo de Array Multidimensional:**

```php
$clientes = [
    ["id" => 1, "nome" => "Ana", "email" => "ana@email.com", "ativo" => true],
    ["id" => 2, "nome" => "Bruno", "email" => "bruno@gmail.com", "ativo" => false],
    ["id" => 3, "nome" => "Carlos", "email" => "calos@hotmail.com", "ativo" => true],
];

//Como Acessar o Email do Carlos
echo $clientes[2]["email"]; // carlos@hotmail.com
```

### O Melhor amigo dos Array: `O Foreach`

O laço de repetição especial para arrays. O `foreach` percorre cada elementos de um array

**Exemplo de Aplicação:**

```php
foreach($clientes as $clienteAtual){
    echo $clienteAtual["nome"];
    echo $clienteAtual["email"];
}
```

##### Transformação de Arrays e Arrow Function

Transformações de arrays são usadas para modificar ou filtrar informações de um array existente

- `array_filter`
Serve para buscar dados em um array e devolver apenas os dados que passarem pelo filtro

```php
$clientesAtivos = array_filter($clientes, fn($c) => $c["ativo"]===true);
//novo array , tera apenas os clientes que a chave ativo for igual a true
```

- `array_map`
Serve para alterar Todos os dados de um array de uma única vez

```php
$produtos = [
    ["id"=>1, "preco"=10.00, "setor"=>"jardim"],
    ["id"=>2, "preco"=15.90, "setor"=>"ferramenta"],
    ["id"=>3, "preco"=23.50, "setor"=>"jardim"],
]
//ajustar o preço de todos os produtos em 10% de aumento

$produtosAjustados = array_map(fn($p) => $p["preco"] = $p["preco"]*1.1, $produtos);
```

> Obs: para a função de filtragem, primeiro selecionamos a array e depois criamos a função de filtro. Para a função de mapeamento, primeiro criamos a função de transformação e depois aplicamos no array.
---
#### Debugando um Array (Kit de PRimeiros Socorros)

- `print_r`
função usada para exibir informações sobre um array de forma legível em liguagem natural

```php
echo print_r($frutas);
//array
(
    [0] => "maça",
    [1] => "banana",
    [2] => "laranja"
)
```

- `var_dump`
Exibi com mais detalhes as informações de um array ou variável em PHP

```php
echo var_dump($frutas);
// Mostrar Tudo: tipo de dados, o tamanho e o valor
```
abc