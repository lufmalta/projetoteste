Criando um Curriculo-site com o uso de: PHP Orientado á Objetos, jQuery, Javascript, Bootstrap-4, HTML5, CSS3, Banco de dados MySql.
Nesse código possui 5 classes.

______________________________________________________________________________________

- Model(Classes):

- dadosPessoais.class.php(Onde recebe os dados pessoais pela pagina index.php e insere no objeto e depois no banco de dados). No caso estou fazendo a parte de inserção pelo usuario logado no sistema, mas ainda estou desenvolvendo.

- educacao.class.php(Onde recebe os dados de formacao pela pagina index.php e insere no objeto e depois no banco de dados). No caso estou fazendo a parte de inserção pelo usuario logado no sistema, mas ainda estou desenvolvendo.

- experiencia.class.php(Onde recebe os dados de experiencia pela pagina index.php e insere no objeto e depois no banco de dados). No caso estou fazendo a parte de inserção pelo usuario logado no sistema, mas ainda estou desenvolvendo.

- usuarios.class.php(Onde recebe os dados do login do usuario pela pagina index.php e insere no objeto e verifica no banco de dados se é valido). No caso estou fazendo a parte de cadastro de usuarios no sistema, mas ainda estou desenvolvendo.

- config.php(Aqui fica a classe que tem a conexao com o banco de dados, para acessar o banco de dados mysql).

______________________________________________________________________________________

- View:

Main do site, onde tudo começa:

- index.php(Aqui é onde recebe os dados para gerar o currículo, e no caso de a pessoa ter login no sistema, a pessoa insere os dados de login no formulario e envia para a areaRestrita, onde poderá alterar esses dados, inserir novos dados, e gerar o curriculo).

Aqui esta a área do usuario quando logado:

- areaRestrita.php(Aqui é onde o usuario logado entra, podendo visualizar o curriculo, ver os dados de dadosPessoais, experiencia e educacao na areaRestrita e poder altera-los, esta parte de alterar, ainda estou desenvolvendo o código).

Aqui esta a área onde tanto o usuario logado, como o cliente que inseriu os dados na pagina index, poderao acessar para visualizar o curriculo:

- curriculo.php(Aqui é onde recebe os dados, seja do index.php, ou da areaRestrita. Depois preenche o curriculo, para gerar um curriculo responsivo e que pode ser impresso para a pessoa).

- cadastrar.php

- editarEdu.php

- editarExp.php

- novaEdu.php

- novaExp.php

- novosDados.php


______________________________________________________________________________________

- Controller:

- validandoDados.php(Aqui serve para verificar na pagina do curriculo se os dados a preencher no curriculo, foram recebidos pelo usuario logado, ou pela pagina index por outro qualquer cliente que não tenha login no sistema, e depois que envia para o curriculo para preencher os dados).

- receberDados.php(Aqui recebe os dados do index.php, e insere no objeto das classes e após isto insere no banco de dados). Depois envia o cliente para o curriculo.php e la pega os dados no banco de dados e insere no curriculo.

Aqui é onde verifica se o usuario é o digitado:

- login.php(Aqui é onde pega os dados do formulario de login na pagina principal e verifica se são validos, para poder ter acesso a areaRestrita do site). Ainda vou fazer uma inserção de senhas mais segura que o md5, mais ainda estou analisando uma maneira melhor.

- deletarEdu.php

- deletarExp.php

- mudarDado.php

- validarEdu.php

- validarExp.php

- inserirExp.php

- inserirEdu.php

- sair.php(Aqui serve para deslogar o usuario pela sessao).




______________________________________________________________________________________

Estilos da pagina:

- style.css(Aqui esta a maior parte do css da pagina curriculo, fazendo também responsividade).

- template.css(Aqui esta os estilos da página index.php e da areaRestrita.php, fazendo responsividade).

Javascript(jQuery) da pagina:

- script.js(Aqui esta o jQuery da pagina curriculo.php).

- javascript.js(Aqui esta o jQuery da pagina index.php).

______________________________________________________________________________________

- Pages:

- footer.php(Aqui esta o rodape da pagina, que esta sendo inserido na maioria das paginas).