### 1. Quais são os três principais riscos técnicos de manter regras financeiras críticas implementadas puramente através de arrays associativos e scripts procedurais?

**Resposta:** Um dos problemas é que fica mais difícil organizar e dar manutenção no código, principalmente quando o sistema começa a crescer. Também pode acontecer de repetir regras em vários lugares e acabar tendo resultados diferentes. Além disso, fica mais fácil alterar o saldo de uma conta de forma errada, sem passar pelas validações necessárias.

---

### 2. O que ocorre na memória Heap do servidor quando a instrução `new ContaCorrente(...)` é executada? Qual é o papel do método `__construct()` nesse processo?

**Resposta:** Quando usamos `new ContaCorrente(...)`, o PHP cria um novo objeto na memória Heap. Logo depois, o método `__construct()` é executado automaticamente para inicializar esse objeto com os dados que foram passados, como o titular, a agência e o saldo inicial.

---

### 3. Explique por que o comando `$this->saldo` é obrigatório para acessar um atributo dentro da classe, diferenciando-o de uma variável local `$saldo`.

**Resposta:** O `$this->saldo` serve para acessar o saldo que pertence ao objeto. Já o `$saldo` sozinho é uma variável comum, que pode existir apenas dentro de um método. Então, usamos o `$this` para mostrar que estamos trabalhando com o atributo do próprio objeto, e não com uma variável separada.

---

### 4. Por que um desenvolvedor sênior de back-end nunca deve criar um método `public function setSaldo(float $novoSaldo)` para uma conta bancária?

**Resposta:** Porque qualquer parte do sistema poderia mudar o saldo diretamente, sem precisar fazer um depósito ou um saque. Isso seria perigoso em um banco, já que alguém poderia colocar qualquer valor na conta sem seguir as regras. O ideal é que o saldo seja alterado por métodos que façam as validações necessárias.

---

### 5. Qual é a diferença prática entre os modificadores `private` e `protected` quando subclasses entram em cena através do `extends`?

**Resposta:** A diferença é que o `private` só pode ser acessado dentro da própria classe onde foi declarado. Já o `protected` também pode ser acessado pelas classes filhas. Por exemplo, se `ContaCorrente` herda de `ContaBancaria`, ela consegue acessar um atributo `protected` da classe mãe, mas não um atributo `private` diretamente.

---

### 6. Como o recurso de promoção de propriedades introduzido no PHP 8 reduz o *boilerplate* e melhora a legibilidade do código?

**Resposta:** Esse recurso deixa o construtor mais simples, porque podemos declarar os atributos diretamente nos parâmetros dele. Assim, não precisamos declarar cada atributo separadamente e depois fazer várias atribuições usando `$this`. Isso diminui a quantidade de código e facilita a leitura.

---

### 7. Explique o mecanismo de segurança proporcionado pela palavra-chave `readonly` em atributos de classes de valor como `Titular` ou `CPF`.

**Resposta:** O `readonly` impede que o valor de um atributo seja alterado depois que ele recebe seu valor inicial. Isso ajuda a evitar mudanças acidentais em informações importantes, como o CPF de um titular. Dessa forma, o objeto fica mais protegido contra alterações que não deveriam acontecer.

---

### 8. Por que faz todo sentido no modelo bancário que a classe `ContaBancaria` seja declarada como `abstract`, enquanto `ContaCorrente` e `ContaPoupanca` são classes concretas?

**Resposta:** Porque a `ContaBancaria` funciona como uma base para os outros tipos de conta, reunindo características que elas têm em comum. Ela é abstrata porque não queremos criar uma conta bancária genérica, sem definir qual tipo ela é. Já a `ContaCorrente` e a `ContaPoupanca` podem ser instanciadas porque representam tipos específicos de conta, com suas próprias regras.

---

### 9. Como o método `transferir(float $valor, ContaBancaria $destino)` consegue operar transferências entre quaisquer tipos de contas filhas sem precisar saber qual é a classe exata da conta de destino?

**Resposta:** Isso é possível por causa do polimorfismo. Como o método recebe um objeto do tipo `ContaBancaria`, podemos passar uma `ContaCorrente` ou uma `ContaPoupanca`, já que as duas herdam dessa classe. Assim, não precisamos criar um método de transferência diferente para cada tipo de conta.

---

### 10. Por que é uma péssima prática retornar `false` ou `null` quando uma operação de saque é rejeitada por falta de saldo?

**Resposta:** Porque retornar apenas `false` ou `null` não deixa tão claro o motivo de o saque não ter sido realizado. Usando uma exceção, conseguimos indicar que ocorreu um problema, como a falta de saldo, e tratar essa situação de uma forma mais organizada. Isso também ajuda a evitar que o erro passe despercebido no restante do sistema.