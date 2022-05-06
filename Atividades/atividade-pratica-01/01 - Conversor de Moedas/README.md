# **CSI606-2021-01 - Remoto - Atividade Prática 01**
## *Aluno: Mateus Ferreira Martins - 17.2.8082

--------------
### Conversor de Moedas

  Para o terceiro exercício da atividade prática 01, foi implementado um conversor de moedas, utilizando Javascript, HTML e CSS.

### 1. Funcionamento

  Basicamente, a aplicação funciona da seguinte maneira:

  * Os dados acerca das Moedas envolvidas na conversão e as cotações das respectivas moedas são obtidos através da API PTAX do Banco
  Central.

  * Assim que a página é carregada, os 2 selects que contém todas as moedas (moeda de origem e moeda de destino) disponibilizadas pela API são
  carregadas, assim como a data atual, atualizando o input de data. Toda a operação de carregar os dados nos selects foi realizada com base na aula
  disponibilizada pelo professor, a qual utiliza o método fetch para tal executar tal tarefa. 

  * Uma vez que a pessoa tenha preenchido o valor a ser convertido, ela deve selecionar as moedas de origem e destino da conversão. O método "onchange"
  de cada select busca a respectiva cotação da moeda selecionada, tendo como base o value da option selecinada, que contém o código de 3 dígitos requisitado
  pela API. A data também é carregada através do value do input de data, e seu valor também é inserido na url de pesquisa. Como resultado, obtemos um vetor (em JSON)
  que contém todas as cotações disponíveis para a moeda em questão. O número de cotações pode variar entre 0 (nenhuma cotação disponível) até 5 (uma cotação 
  com a abertura do "pregão", 3 cotações intermediárias e uma de fechamento), sendo que somente a última cotação nos interessa, pois é a cotação mais atual.
  É importante salientar também que somente a cotação de compra será utilizada em nossos cálculos.

  * Uma vez obtido o valor das cotações da moeda de origem e da moeda de destino, basta o usuário clicar no botão "Resultado", e o resultado será apresentado.   

  * Alguns tratamentos de erros foram implementados, como no caso de a pessoa não informar os dados corretamente (um alerta aparecerá na tela, informando o procedimento correto).
  Para o caso de a pessoa informar uma data no futuro (que ainda não contém cotações disponíveis) ou uma data em que não houveram pregões da bolsa (também impossibilitando a correta
  obtenção das cotações), é executado um loop, onde a cada iteração, ua nova tentativa de obter a cotação é realizada, porém, subtraindo-se um dia da data informada, até que uma resposta
  satisfatória seja obtida da API.

### 2. Restrições

  Até o momento, não identificou-se nenhuma restrição ao projeto. 

### 3. Referências

  Como importar dados PTAX via API PTAX no Power BI?. https://www.youtube.com/watch?v=KUOJDUYTX8I&t=132s&ab_channel=PedroPauloFerreira. Acesso em 01/11/2021.

  JavaScript Date Objects. Disponível em https://www.w3schools.com/js/js_dates.asp. Acesso em 01/11/2021.

  Javascript relative time 24 hours ago etc as time. Disponível em https://stackoverflow.com/questions/11072467/javascript-relative-time-24-hours-ago-etc-as-time. Acesso em 02/11/2021.

  Flexbox. Disponível em https://developer.mozilla.org/en-US/docs/Learn/CSS/CSS_layout/Flexbox. Acesso em 03/11/2021.

  Material disponibilizado pelo professor (video aulas e links).
