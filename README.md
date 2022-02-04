# Trabalhando com teste

## Tipo de Teste

Quando n�s vamos estruturas um teste unit�rio podemos trabalhar com diversas 
estruturas e uma delas � a 

*Arrange*: Voc� estrutura o can�rio

Aqui voc� pode declarar algum outros objetos que s�o deped�ncias
para a classe que voc� esta tentando testar.

*ACT*: Processa os dados

Nessa parte voc� executa a l�gica que voc� deseja testar

*Assert*: Compara o resultado final

Daqui voc� pega os dados executados na fase ACT e compara para 
saber se o teste falhou ou est� correto

Esse padr�o ArrangeActAssert tamb�m � chamado por alguns profissionais 
de GivenWhenThen

links para artigos sobre os m�todos 

[Arrange Act Assert](http://wiki.c2.com/?ArrangeActAssert)

[Given When Then](https://martinfowler.com/bliki/GivenWhenThen.html)


## Produ��o de testes de qualidade 

No artigo a abaixo n�s encontramos algumas dicas tecnicas de como produzier um software
com bons testes.

[Teoria de testes](http://testwarequality.blogspot.com/p/tenicas-de-teste.html)

## Utilidades do phpunit

### Data Providers

Data Providers � uma forma de voc� abstratir o arrage do seu m�todo de 
teste, basicamente com ele n�s podemos atrav�s de uma anota��o
dizer qual m�todo ser� passado como par�metro para o nosso m�todo 
de teste. A anota��o que utilizamos para informar um m�todo que 
ser� data provider � @dataProvider.

Interessante obeservar que o retorno de uma teste provider precisa 
ser uma matriz, ou seja um array dentro de um array. Cada linha do 
array pai ir� causar um teste e cada linha do array filho ser� um par�metro.

### fixtures

S�o m�todo que v�o rodar e momentos especificos durante os seu teste

setUpBeforeClass m�todo que vai rodar antes de todos os teste e somente
uma vez. Esse m�todo � est�tico pq ele funciona antes mesmos da cria��o
da int�ncia.

setUp vai rodar sempre antes do seu teste ent�o ele pode executar 
tarefas repetitivas como criar objetos e salva eles em atributos 
globais para serem utilizado pelos teste. Esse m�todo � protected 
e retona um void.

tearDown � chamado ap�s o teste, normalmente s� ser� utilizado se 
voc� precisar fechar o buffer de um arquivo por exemplo.

tearDownAfterClass m�todo que � chamado depois de todos os teste 
e tamb�m s� uma vez. Esse m�todo � estatico pq ele funciona sem 
a necessidade da int�ncia.

### Configurations file

O phpunit d� a possibilidade a gente criar um arquivo de configura��o
para o nosso projeto, por l� podemos configurar tudo em nosso projeto
desde grupos de teste at� o loggin criado para a nossa aplica��o. O nome 
precisa ser phpunitxml e ele fica na pasta raiza da aplica��o.

[link da documenta��o do php unit](https://phpunit.readthedocs.io/pt_BR/latest/configuration.html)


## Refer�ncias para TDD 

[livro da casa dp c�digo](https://www.casadocodigo.com.br/products/livro-tdd?_pos=3&_sid=9c30370c5&_ss=r)

[artigo caelum](https://tdd.caelum.com.br/)