# Lista de Exercícios de Fixação e Prática


### 1. Quais são os três principais riscos técnicos de manter regras financeiras críticas implementadas puramente através de arrays associativos e scripts procedurais?



**Resposta:** Os três principais riscos são a dificuldade de manutenção, porque o código fica espalhado em vários arquivos; a repetição das regras de negócio, que pode gerar inconsistências; e o risco de alterar dados financeiros de forma errada, já que qualquer parte do código pode modificar os valores sem um controle adequado.

---

### 2. O que ocorre na memória Heap do servidor quando a instrução `new ContaCorrente(...)` é executada? Qual é o papel do método `__construct()` nesse processo?



**Resposta:** Quando o comando `new ContaCorrente(...)` é executado, um novo objeto é criado na memória Heap. Depois da criação, o método `__construct()` é chamado automaticamente para inicializar esse objeto, preenchendo seus atributos com os valores recebidos, como titular, agência e saldo inicial.

---

### 3. Explique por que o comando `$this->saldo` é obrigatório para acessar um atributo dentro da classe, diferenciando-o de uma variável local `$saldo`.



**Resposta:** O `$this->saldo` é usado para acessar o atributo que pertence ao objeto atual. Já uma variável como `$saldo` existe apenas dentro do método onde foi criada. Sem usar `$this`, o PHP entende que é uma variável comum e não o atributo da classe.

---

### 4. Por que um desenvolvedor sênior de back-end nunca deve criar um método `public function setSaldo(float $novoSaldo)` para uma conta bancária?



**Resposta:** Porque isso permitiria mudar o saldo diretamente, sem passar pelas regras de negócio. Em um sistema bancário, o saldo deve ser alterado apenas por operações como depósito, saque ou transferência, garantindo que todas as validações sejam respeitadas.

---

### 5. Qual é a diferença prática entre os modificadores `private` e `protected` quando subclasses entram em cena através do `extends`?



**Resposta:** O `private` só pode ser acessado pela própria classe onde foi criado. Já o `protected` também pode ser acessado pelas classes filhas que herdam essa classe usando `extends`, facilitando o reaproveitamento do código sem deixar o atributo totalmente público.

---

### 6. Como o recurso de promoção de propriedades introduzido no PHP 8 reduz o *boilerplate* e melhora a legibilidade do código?



**Resposta:** Esse recurso permite declarar e inicializar os atributos diretamente nos parâmetros do construtor. Assim, não é preciso escrever a declaração da propriedade e depois fazer a atribuição manual, deixando o código menor e mais fácil de entender.

---

### 7. Explique o mecanismo de segurança proporcionado pela palavra-chave `readonly` em atributos de classes de valor como `Titular` ou `CPF`.



**Resposta:** A palavra-chave `readonly` faz com que um atributo só possa receber um valor durante a criação do objeto. Depois disso, ele não pode mais ser alterado, o que é importante para informações que não devem mudar, como um CPF.

---

### 8. Por que faz todo sentido no modelo bancário que a classe `ContaBancaria` seja declarada como `abstract`, enquanto `ContaCorrente` e `ContaPoupanca` são classes concretas?



**Resposta:** A `ContaBancaria` representa apenas um modelo geral de conta, então ela não precisa existir sozinha. Já a `ContaCorrente` e a `ContaPoupanca` possuem regras específicas e podem ser criadas normalmente, por isso são classes concretas.

---

### 9. Como o método `transferir(float $valor, ContaBancaria $destino)` consegue operar transferências entre quaisquer tipos de contas filhas sem precisar saber qual é a classe exata da conta de destino?



**Resposta:** Isso acontece por causa do polimorfismo. Como o parâmetro é do tipo `ContaBancaria`, qualquer classe que herde dela pode ser usada como destino da transferência. Assim, o método funciona tanto para `ContaCorrente` quanto para `ContaPoupanca`, sem precisar criar um código diferente para cada tipo.

---

### 10. Por que é uma péssima prática retornar `false` ou `null` quando uma operação de saque é rejeitada por falta de saldo?



**Resposta:** Retornar `false` ou `null` não explica exatamente o motivo da falha e pode fazer o erro passar despercebido. Usando uma exceção, o sistema informa claramente que o saque foi recusado por falta de saldo, permitindo que o problema seja tratado da forma correta.