# Perguntas Teoricas de Fixação

### 1. O que significa o acrônimo CRUD e qual é a correspondência direta de cada uma de suas letras com as instruções SQL no PostgreSQL?

**Resposta:**

CRUD significa **Create, Read, Update e Delete**. O Create corresponde ao `INSERT`, o Read ao `SELECT`, o Update ao `UPDATE` e o Delete ao `DELETE`. Essas são as principais operações usadas para criar, consultar, alterar e excluir dados em um banco de dados.

---

### 2. Explique com suas próprias palavras como um atacante consegue alterar a lógica de uma consulta quando o código utiliza concatenação de strings com `$_GET` ou `$_POST`.

**Resposta:**

Isso acontece quando o sistema coloca diretamente o que o usuário digitou dentro de uma consulta SQL. O atacante pode inserir comandos ou caracteres SQL junto com o dado enviado, fazendo o banco interpretar aquilo como parte da consulta e podendo alterar o seu funcionamento.

---

### 3. Por que o envio de uma consulta em duas etapas (prepare e depois execute) impede que um texto digitado pelo usuário seja executado como instrução SQL pelo banco?

**Resposta:**

Porque o `prepare()` separa a estrutura da consulta dos valores que serão enviados. Depois, o `execute()` envia os dados separadamente. Assim, mesmo que o usuário coloque um comando SQL, o banco entende aquilo como um valor e não como uma instrução para executar.

---

### 4. Qual é a vantagem de utilizar marcadores nomeados como `:sku` e `:preco` em vez de pontos de interrogação posicionais (`?`) em instruções SQL complexas?

**Resposta:**

Os marcadores nomeados deixam a consulta mais fácil de entender, porque conseguimos saber qual valor pertence a cada parâmetro. Em consultas com vários valores, usar nomes como `:sku` e `:preco` também ajuda a evitar confusão e facilita a manutenção do código.

---

### 5. Explique a diferença de comportamento entre os métodos `$stmt->bindValue()` e `$stmt->bindParam()`.

**Resposta:**

O `bindValue()` associa diretamente o valor informado ao parâmetro. Já o `bindParam()` fica ligado a uma variável e utiliza o valor que ela tiver quando o `execute()` for chamado. Então, a principal diferença é que o `bindParam()` trabalha com a variável, enquanto o `bindValue()` trabalha com o valor.

---

### 6. Qual é o risco de omitir o tipo de dado (ex: `PDO::PARAM_INT`) ao vincular uma variável que deveria ser estritamente numérica em uma cláusula `LIMIT`?

**Resposta:**

Se o valor deveria ser um número inteiro, é importante informar isso usando `PDO::PARAM_INT`. Caso o tipo não seja definido corretamente, o valor pode ser interpretado de uma forma diferente da esperada e causar problemas na consulta.

---

### 7. Qual é o benefício do padrão Data Access Object (DAO) em termos de manutenibilidade de software e do princípio de responsabilidade única (SOLID)?

**Resposta:**

O DAO separa as funções que trabalham com o banco de dados do restante do sistema. Isso deixa o código mais organizado e facilita encontrar e alterar os comandos SQL. Também segue o princípio de responsabilidade única, pois cada parte fica responsável por uma função específica.

---

### 8. Por que a ausência de uma cláusula WHERE em um comando UPDATE é considerada um incidente gravíssimo em ambientes de produção?

**Resposta:**

Porque o `WHERE` define quais registros serão alterados. Se ele não for colocado, o `UPDATE` pode alterar todos os registros da tabela. Por exemplo, ao tentar alterar o preço de um produto, podemos acabar alterando o preço de todos os produtos.

---

### 9. De acordo com a Lei Geral de Proteção de Dados (LGPD), quais são as penalidades e impactos que uma organização pode sofrer caso ocorra vazamento de dados de clientes por falha de SQL Injection?

**Resposta:**

A empresa pode sofrer penalidades previstas na LGPD, como advertências e multas. Além disso, um vazamento pode causar prejuízos financeiros, perda da confiança dos clientes e problemas para a imagem da empresa. A multa pode chegar a 2% do faturamento no Brasil, limitada a R$ 50 milhões por infração.
![alt text](image-1.png)