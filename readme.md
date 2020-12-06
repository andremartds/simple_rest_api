## Api simples e pura em php

<p> .execute o compose docker </p>

``` docker-compose up ```

<p> .execute o composer </p>

``` composer dump-autoload ```


<p> Os dados de acesso para base de dados estão no arquivo PDOutil e no próprio docker-compose </p>

importe em seu Insomnia o arquivo ``` Insomnia_2020-12-06.json ``` para executar os endpoints

<p> Por padrão todo controller deve ser escrito NomeController, ex.: ProductController, UserController. </p>

<p> é bom implementar a interface controller em seu controller para definir os contratos.</p>

<p> Até o momento é permitido executar nos controllers as funções get, post, put e delete.</p>

### Arquivos importantes

``` index.php ``` é a porta de entrada para a API <br>

``` src/config/Route.php``` é o arquivo que gerencia a entrada da aplicação, em seu construtor passamos uma  instancia de ``` src/config/RouteUtil.php ``` onde preparamos o tipo de entrada (esse precisa de melhorias)

``` src/config/RouteInstanceObject ``` arquivo que gerencia a instancia de um controller, utilizamos reflection para isso ele tem a habilidade de delegar para qual controller a request será encaminhada.

<p> não é utilizado try/cath isso é intencional </p>

