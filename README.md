envisioning-form
================

Instalação
----------
+ Crie um banco de dados no MySQL
+ Importe para o banco de dados a estrutura presente no arquivo `envisioning-form.sql`
+ Coloque todos os arquivos em um servidor Apache com PHP 5+
+ Faça uma cópia do arquivo `config-sample.php` e renomeie-o para `config.php`
+ Edite o novo arquivo `config.php` de acordo com as instruções contidas nele

### Acessando
+ **Formulário:** seusite.com/envisioning-form
+ **Admin:** seusite.com/envisioning-form/admin


Trocando a senha do admin
-------------------------
No arquivo `config.php` edite as chaves `ADMIN_USER` e `ADMIN_PASS`


Configurando a integração com o MailChimp
-----------------------------------------
No arquivo `config.php` edite as seguintes chaves:
+ `MCHIMP_APIKEY` - Chave da API do seu cadastro no MailChimp. Esta pode ser criada/encontrada em _Account Settings/Extras/API Keys_.
+ `MCHIMP_LISTID` - Identificador da lista de contatos. Este ID pode ser localizado em _Lists/Nome da lista/Settings/List name & defaults/List ID_.
Se qualquer um dos campos estiver vazio, o cadastro é feito mas não é enviado para o MailChimp.


Adicionando novos campos
------------------------
**ATENÇÃO:** É importante que o nome do campo do banco de dados seja o mesmo dado para o campo no formulário, caso contrário o formulário não funcionará.

### Campo de texto curto (até 255 caracteres)
**1 -** Crie um novo campo na tabela `cadastros` no banco de dados do tipo `VARCHAR` com tamanho `255`.

**2 -** No arquivo `index.php` insira um novo bloco de campo:
```html
<div class="form-group">
	<label for="txtNOME_DO_CAMPO" class="control-label">TITULO DO CAMPO</label>
	<input type="text" class="form-control" id="txtNOME_DO_CAMPO" name="NOME_DO_CAMPO" />
</div>
```
Se o campo for de preenchimento obrigatório, adicione a classe `required` no _input_ e o sinalizador `<span class="label label-default">required</span>` ao lado do nome do campo.

**3 -** No arquivo `post.php` adicione na sessão _"Adiciona os campos que serão inseridos no banco de dados"_ a linha `adiciona("NOME_DO_CAMPO");`

**4 -** Em `admin/list-modules/modal-ver.php` adicione um novo bloco de campo:
```html
<div class="form-group">
	<label class="col-sm-3 control-label">TITULO DO CAMPO</label>
	<div class="col-sm-9">
		<p class="form-control-static" name="NOME_DO_CAMPO"></p>
	</div>
</div>
```

**5 -** Se você desejar fazer buscas através deste novo campo, adicione no bloco de código do inicio do arquivo `admin/list-modules/modal-procurar.php` a linha `adicionaCampoDeBusca("NOME_DO_CAMPO", "TITULO DO CAMPO");`

### Campo de texto longo
**1 -** Crie um novo campo na tabela `cadastros` no banco de dados do tipo `LONGTEXT`.

**2 -** No arquivo `index.php` insira um novo bloco de campo:
```html
<div class="form-group">
	<label for="txtNOME_DO_CAMPO" class="control-label">TITULO DO CAMPO</label>
	<textarea class="form-control" rows="3" id="txtNOME_DO_CAMPO" name="NOME_DO_CAMPO"></textarea>
</div>
```
Se o campo for de preenchimento obrigatório, adicione a classe `required` no _textarea_ e o sinalizador `<span class="label label-default">required</span>` ao lado do nome do campo.

**3 -** No arquivo `post.php` adicione na sessão _"Adiciona os campos que serão inseridos no banco de dados"_ a linha `adiciona("NOME_DO_CAMPO");`

**4 -** Em `admin/list-modules/modal-ver.php` adicione um novo bloco de campo:
```html
<div class="form-group">
	<label class="col-sm-3 control-label">TITULO DO CAMPO</label>
	<div class="col-sm-9">
		<p class="form-control-static" name="NOME_DO_CAMPO"></p>
	</div>
</div>
```

**5 -** Se você desejar fazer buscas através deste novo campo, adicione no bloco de código do inicio do arquivo `admin/list-modules/modal-procurar.php` a linha `adicionaCampoDeBusca("NOME_DO_CAMPO", "TITULO DO CAMPO");`

### Campo de tags
+ **Importante 1:** Para tags não é necessário criar um campo no banco de dados.
+ **Importante 2:** No admin qualquer novo campo de tag aparece automaticamente nos filtros por tags.

**1 -** No arquivo `index.php` insira um novo bloco de campo:
```html
<div class="form-group">
	<label for="txtNOME_DO_CAMPO" class="control-label">TITULO DO CAMPO</label>
	<input type="text" class="form-control campoDeTags" id="txtNOME_DO_CAMPO" name="NOME_DO_CAMPO" placeholder="Example: tag1, tag2, tag3" />
</div>
```
**Não se esqueça** de acrescentar a classe `campoDeTags` no _input_ para que ele funcione com tags.

**2 -** No arquivo `post.php` adicione na sessão _"Adiciona os campos que serão inseridos no banco de dados"_ a linha `adicionaTags("NOME_DO_CAMPO");`

**3 -** Em `admin/list-modules/modal-ver.php` adicione um novo bloco de campo:
```html
<div class="form-group">
	<label class="col-sm-3 control-label">TITULO DO CAMPO</label>
	<div class="col-sm-9">
		<p class="form-control-static" name="NOME_DO_CAMPO"></p>
	</div>
</div>
```
