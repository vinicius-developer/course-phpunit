# Trabalhando com teste

## Tipo de Teste

Quando nós vamos estruturas um teste unitário podemos trabalhar com diversas 
estruturas e uma delas é a 

*Arrange*: Você estrutura o canário

Aqui você pode declarar algum outros objetos que são depedências
para a classe que você esta tentando testar.

*ACT*: Processa os dados

Nessa parte você executa a lógica que você deseja testar

*Assert*: Compara o resultado final

Daqui você pega os dados executados na fase ACT e compara para 
saber se o teste falhou ou está correto

Esse padrão ArrangeActAssert também é chamado por alguns profissionais 
de GivenWhenThen

links para artigos sobre os métodos 

[Arrange Act Assert](http://wiki.c2.com/?ArrangeActAssert)

[Given When Then](https://martinfowler.com/bliki/GivenWhenThen.html)


## Produção de testes de qualidade 

No artigo a abaixo nós encontramos algumas dicas tecnicas de como produzier um software
com bons testes.

[Teoria de testes](http://testwarequality.blogspot.com/p/tenicas-de-teste.html)

## Utilidades do phpunit

### Data Providers

Data Providers é uma forma de você abstratir o arrage do seu método de 
teste, basicamente com ele nós podemos através de uma anotação
dizer qual método será passado como parâmetro para o nosso método 
de teste. A anotação que utilizamos para informar um método que 
será data provider é @dataProvider.

Interessante obeservar que o retorno de uma teste provider precisa 
ser uma matriz, ou seja um array dentro de um array. Cada linha do 
array pai irá causar um teste e cada linha do array filho será um parâmetro.

### fixtures

São método que vão rodar e momentos especificos durante os seu teste

setUpBeforeClass método que vai rodar antes de todos os teste e somente
uma vez. Esse método é estático pq ele funciona antes mesmos da criação
da intância.

setUp vai rodar sempre antes do seu teste então ele pode executar 
tarefas repetitivas como criar objetos e salva eles em atributos 
globais para serem utilizado pelos teste. Esse método é protected 
e retona um void.

tearDown é chamado após o teste, normalmente só será utilizado se 
você precisar fechar o buffer de um arquivo por exemplo.

tearDownAfterClass método que é chamado depois de todos os teste 
e também só uma vez. Esse método é estatico pq ele funciona sem 
a necessidade da intância.

### Configurations file

O phpunit dá a possibilidade a gente criar um arquivo de configuração
para o nosso projeto, por lá podemos configurar tudo em nosso projeto
desde grupos de teste até o loggin criado para a nossa aplicação. O nome 
precisa ser phpunitxml e ele fica na pasta raiza da aplicação.

[link da documentação do php unit](https://phpunit.readthedocs.io/pt_BR/latest/configuration.html)


## Referências para TDD 

[livro da casa dp código](https://www.casadocodigo.com.br/products/livro-tdd?_pos=3&_sid=9c30370c5&_ss=r)

[artigo caelum](https://tdd.caelum.com.br/)