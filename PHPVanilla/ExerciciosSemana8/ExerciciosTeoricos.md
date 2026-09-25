# Exercícios Teóricos de Fixação

### 1. Abstração de Dados:

**O que é o PDO no PHP e por que ele é preferível em relação a extensões especializadas procedurais como o antigo pgsql em projetos corporativos?**

*Resposta:*

O PDO é uma ferramenta do PHP usada para fazer conexão com bancos de dados. Ele é melhor porque funciona com vários tipos de banco e também possui recursos de segurança, como os *Prepared Statements*, que ajudam a evitar SQL Injection.

---

### 2. Ciclo do DSN:

**Explique o que é a string DSN e detalhe a finalidade de cada um dos parâmetros configurados para o PostgreSQL (host, port, dbname).**

*Resposta:*

A DSN é uma string que informa ao PHP os dados necessários para se conectar ao banco.

* **host:** endereço do servidor do banco.
* **port:** porta usada pelo PostgreSQL.
* **dbname:** nome do banco que será acessado.

Exemplo:

```php
"pgsql:host=localhost;port=5432;dbname=manutencao"
```

---

### 3. Padrão de Portas:

**Qual é a porta padrão de escuta do SGBD PostgreSQL (5432) e como ela é referenciada dentro da string de conexão?**

*Resposta:*

A porta padrão do PostgreSQL é a **5432**. Ela é colocada na DSN usando `port=5432`.

Exemplo:

```php
"pgsql:host=localhost;port=5432;dbname=manutencao"
```

---

### 4. Flags de Integridade:

**O que acontece quando definimos o atributo PDO::ATTR_ERRMODE com o valor PDO::ERRMODE_EXCEPTION? Qual seria o comportamento padrão caso essa flag não fosse definida?**

*Resposta:*

Quando usamos `PDO::ERRMODE_EXCEPTION`, o PHP gera uma exceção quando acontece algum erro no banco. Isso ajuda a identificar e tratar o problema.

Se não configurarmos essa opção, o PDO usa o modo padrão `PDO::ERRMODE_SILENT`, que não gera uma exceção automaticamente.

---

### 5. Fetch Mode:

**Qual é a vantagem de utilizar PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC para o consumo de memória RAM do servidor?**

*Resposta:*

O `PDO::FETCH_ASSOC` retorna os dados usando somente o nome das colunas como índice. Assim, ele não cria também índices numéricos para os mesmos dados, ajudando a gastar menos memória.

---

### 6. Padrão Singleton:

**Por que abrir uma nova conexão com new PDO() a cada consulta executada no PostgreSQL pode esgotar o limite de max_connections do servidor?**

*Resposta:*

Porque cada `new PDO()` pode criar uma nova conexão com o banco. Se forem criadas muitas conexões ao mesmo tempo, o limite de `max_connections` pode ser atingido e novas conexões não poderão ser abertas. O Singleton ajuda usando uma única conexão.

---

### 7. Encapsulamento do Singleton:

**Por que o construtor da classe ConexaoBanco precisa ser declarado como private e quais métodos mágicos devem ser bloqueados para garantir a unicidade da instância?**

*Resposta:*

O construtor é `private` para impedir que outras partes do código criem a classe usando `new`.

Os métodos `__clone()` e `__wakeup()` também podem ser bloqueados para evitar que a conexão seja clonada ou criada novamente.

---

### 8. Segurança de Credenciais:

**Por que nunca devemos deixar o usuário e senha do banco de dados salvos de forma estática (hardcoded) dentro dos scripts PHP do projeto?**

*Resposta:*

Porque se essas informações ficarem no código, qualquer pessoa que tiver acesso ao projeto pode descobrir o usuário e a senha do banco. O ideal é deixar essas informações em um local protegido, como variáveis de ambiente.

---

### 9. Tratamento de Exceções & LGPD:

**Por que a exibição direta de $e->getMessage() de uma PDOException na tela do navegador é considerada uma falha grave de segurança (Information Disclosure)?**

*Resposta:*

Porque a mensagem do erro pode mostrar informações internas do sistema, como nome do banco, tabelas, comandos SQL ou outros dados. Isso pode ajudar alguém a encontrar falhas no sistema. Por isso, para o usuário é melhor mostrar uma mensagem simples e deixar os detalhes do erro apenas nos registros internos.
