### Exercícios Teóricos de Fixação

1. No método `GET`, os dados ficam anexados na URL, depois do `?`, formando a Query String. Já no método `POST`, os dados são enviados dentro do corpo da requisição HTTP e não ficam visíveis diretamente na URL.

2. Senhas não devem ser enviadas por `GET` porque ficam visíveis na URL. Elas podem ficar salvas no histórico do navegador e também nos logs do servidor.

3. O Warning acontece porque, quando a página é aberta pela primeira vez, o formulário ainda não foi enviado e a chave `nome` não existe no `$_POST`. O `??` resolve isso colocando um valor padrão caso a chave não exista, como em `$nome = $_POST['nome'] ?? "";`.

4. Uma requisição `GET` é idempotente quando pode ser feita várias vezes sem causar uma nova alteração no servidor. Usar `GET` para atualizar ou deletar dados é ruim porque uma ação importante poderia acontecer só ao acessar um link, até mesmo sem querer.

5. `required` e `type="email"` são validações feitas no FrontEnd e podem ser ignoradas ou desativadas. Por isso, os dados também precisam ser validados no BackEnd, usando PHP.

6. Exibir um `$_POST` diretamente pode permitir que um usuário envie código HTML ou JavaScript malicioso, causando um ataque XSS. O `htmlspecialchars()` ajuda a evitar isso convertendo caracteres especiais.

7. Sticky Forms é uma técnica que mantém os dados preenchidos no formulário depois que ele é enviado. Isso melhora a experiência do usuário porque, caso tenha algum erro, ele não precisa preencher tudo novamente.

8. Na aba **Network** do DevTools é possível verificar as requisições feitas pelo navegador. Depois de enviar o formulário, basta verificar o **Request Method** da requisição. Se estiver `POST`, significa que o formulário foi enviado pelo método POST.