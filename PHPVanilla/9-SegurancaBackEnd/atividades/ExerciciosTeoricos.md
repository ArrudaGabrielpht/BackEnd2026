Exercícios Teóricos de Fixação

1. Conceituação OWASP: O que significa a sigla XSS e por que ela é classificada como uma vulnerabilidade no lado do cliente (Client-Side) que deve ser prevenida pelo Back-End?

Resposta: XSS significa Cross-Site Scripting. É um tipo de ataque em que o invasor consegue colocar um código malicioso em uma página e fazer esse código ser executado no navegador de outra pessoa. Por isso, o Back-End precisa tratar os dados antes de mostrar eles na página.

2. Reflected vs Stored: Qual é a diferença entre um ataque XSS Refletido e um XSS Gravado (Stored)? Qual dos dois apresenta maior potencial de estrago para uma empresa e por quê?

Resposta: O XSS Refletido acontece quando o código malicioso é enviado e aparece na resposta da página. Já o XSS Gravado fica salvo no sistema, por exemplo, em um comentário. O Stored pode causar mais impacto porque o código pode ser executado para várias pessoas que acessarem aquele conteúdo.

3. Mecanismo de Escapamento: Explique detalhadamente a transformação que a função htmlspecialchars() realiza nos caracteres < e >. Por que o navegador não executa o código após essa transformação?

Resposta: O htmlspecialchars() transforma < em &lt; e > em &gt;. Assim, o navegador entende esses caracteres como texto e não como uma tag HTML. Então, se alguém colocar <script>, ele não será executado como código.

4. Flags de Proteção: Qual é a função da flag ENT_QUOTES na chamada de htmlspecialchars()? O que pode acontecer se essa flag for omitida em um campo <input value="...">?

Resposta: A ENT_QUOTES faz o htmlspecialchars() também proteger as aspas simples e duplas. Se ela não for usada, dependendo do caso, uma aspa pode fechar o atributo value e permitir que alguém coloque outro conteúdo dentro do HTML.

5. Anti-Alucinação PHP: Por que não devemos utilizar o filtro FILTER_SANITIZE_STRING em projetos modernos desenvolvidos em PHP 8.3?

Resposta: Porque o FILTER_SANITIZE_STRING foi descontinuado no PHP 8.1 e removido no PHP 8.3. Por isso, em versões atuais do PHP, devemos usar outras formas de validar e tratar os dados.

6. Validação de E-mail: Qual é a diferença prática entre verificar um e-mail com empty($email) e verificar com filter_var($email, FILTER_VALIDATE_EMAIL)?

Resposta: O empty() só verifica se o campo está vazio ou não. Já o filter_var() verifica se o que foi digitado realmente tem formato de e-mail. Por exemplo, gabriel não está vazio, mas não é um e-mail válido.

7. Roubo de Sessão: Como um atacante pode usar uma brecha XSS para capturar o cookie de sessão de um usuário logado?

Resposta: Se o invasor conseguir executar JavaScript através de um XSS, ele pode tentar acessar o cookie de sessão e enviar esse dado para outro lugar. Com esse cookie, o invasor pode tentar entrar na conta da vítima. Por isso, é importante proteger os cookies e evitar brechas XSS.

8. Segurança em Camadas: Por que sanitizar na entrada (ex: com strip_tags) não elimina a necessidade de codificar na saída com htmlspecialchars()?

Resposta: Porque o strip_tags() e o htmlspecialchars() fazem coisas diferentes. O strip_tags() remove algumas tags, mas não é uma proteção completa contra XSS. Já o htmlspecialchars() deixa os caracteres especiais seguros quando o conteúdo é mostrado no HTML. Por isso, não devemos depender de apenas uma proteção.