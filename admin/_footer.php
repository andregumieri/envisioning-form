	</div>

	<script type="text/javascript" src="../assets/libs/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			
			/**
			 * CONTROLE DE BUSCA
			 */
			var searchCampoSelecionadoOriginal = $("#searchCampoSelecionado").text().trim();
			$("#searchForm .dropdown-menu a").click(function() {
				$("#searchCampoSelecionado").html($(this).html());
				$("#searchCampoSelecionado").data("item", $(this));
			});

			var fnSearchRemove = function(e) {
				$(this).data("item").show();
				var $ul = $(this).parents("ul");
				$(this).parents("li").remove();
				if($ul.children("li").length==0) {
					// $("#searchList").hide();
					// $("#searchBotaoProcurar").hide();
				}
			}

			var fnSearchAdd = function($a, query) {
				var campo = $a.attr("data-field");
				var $input = $("<input />").attr("type", "hidden").attr("name", "search[" + campo + "]").val(query);
				var $search = $("<li />").addClass("list-group-item").append($input);
				var $field = $("<span />")
					.addClass("label label-primary")
					.html($a.text().trim());
				var $close = $("<button />")
					.addClass("close")
					.data("item", $a)
					.html("&times;")
					.on("click", fnSearchRemove);

				$a.hide();
				$search.append($field).append(" ").append(query).append($close);
				$("#searchList").append($search);
			}
			
			var SearchDone = <?php echo json_encode($SEARCH); ?>;
			console.log(SearchDone);
			for(var key in SearchDone) {
				if(typeof SearchDone[key]=='object') {
					var $inputTag = $("<input />").attr({"type": "hidden", "name": "search[" + key + "]"}).val(SearchDone[key].join(","));
					$("#searchForm").append($inputTag);
				} else {
					fnSearchAdd($("#searchForm .dropdown-menu a[data-field=" + key + "]"), SearchDone[key]);	
				}
			}

			$("#searchBotaoAdd").click(function(e) {
				e.preventDefault();

				if(!$("#searchCampoSelecionado").data("item")) return false;
				if($("#searchString").val().trim() == "") return false;

				var $input = $("<input />").attr("type", "hidden").attr("name", "search[" + $("#searchCampoSelecionado").data("item").attr('data-field') + "]").val($("#searchString").val().trim());

				var $search = $("<li />").addClass("list-group-item").append($input);
				var $field = $("<span />")
					.addClass("label label-primary")
					.html($("#searchCampoSelecionado").data("item").text().trim());
				var $close = $("<button />")
					.addClass("close")
					.data("item", $("#searchCampoSelecionado").data("item"))
					.html("&times;")
					.on("click", fnSearchRemove);

				$("#searchCampoSelecionado").data("item").hide();

				$search.append($field).append(" ").append($("#searchString").val()).append($close);
				$("#searchList").append($search).show();
				//$("#searchBotaoProcurar").show();

				$("#searchString").val("");
				$("#searchCampoSelecionado").html(searchCampoSelecionadoOriginal).data("item", null);
			});



			/**
			 * MODAL DE VISUALIZACAO
			 */
			$("#tabelaCadastros tbody tr td .botaoEditar, #tabelaCadastros tbody tr td:not(.botoes)").on("click", function() {
				$botaoAcao = $(this);
				$modal = $("#modalVer");
				$tr = $botaoAcao.is("tr") ? $botaoAcao : $botaoAcao.parents("tr");

				$modal.find(".carregando").show();
				$modal.find(".template").hide();

				var id = $tr.attr("data-cadastro-id");
				var Cadastro = DataCadastros[id];
				var nome = Cadastro.lastname + ', ' + Cadastro.firstname;

				$('#modalVer h4').html(nome);
				$('#modalVer textarea').val(Math.random());
				$('#modalVer').modal();

				for(var campo in Cadastro) {
					var $campo = $modal.find("[name=" + campo + "]");
					if($campo.is("p")) {
						if(typeof Cadastro[campo]=='object') {
							var htmlTags = '';
							for(var i in Cadastro[campo]) {
								htmlTags += '<span class="label label-default">' + Cadastro[campo][i] + '</span> ';
							}
							$campo.html(htmlTags);
						} else {
							$campo.html(Cadastro[campo]);
						}
					} else if($campo.is("input") || $campo.is("textarea")) {
						if(typeof Cadastro[campo]=='object') {
							$campo.val(Cadastro[campo].join(", "));
						} else {
							$campo.val(Cadastro[campo]);
						}
					}
				}
				
				window.setTimeout(function() {
					$modal.find(".carregando").hide();
					$modal.find(".template").show();
					if($botaoAcao.is("button")) {
						$modal.find('textarea').focus();
					}
				}, 500);
			});



			/**
			 * TAGS
			 */
			var $containerTags = null;
			$("#tagsBotao").on("click", function() {
				if($containerTags!==null) {
					$(this).removeClass("active");
					$containerTags.remove();
					$containerTags = null;
					return false;
				}
				$(this).addClass("active");
				var $wrap = $("<div />").html($("#tagsBotaoTemplate").html());
				$containerTags = $("<div />").attr("id", "tagsContainer").append($wrap);
				$("body").prepend($containerTags);

			});


			/**
			 * Salvar Anotacoes
			 */
			$("#botaoModalVerAnotacoesSalvar").on("click", function() {
				var $botao = $(this);
				var $textarea = $botao.parents("form").find("textarea");
				var id = $botao.parents("div.modal-body").find("input[name=id]").val();
				var textoOriginal = $botao.text();

				$botao.addClass("disabled").attr("disabled", true).html("Salvando...");
				$.ajax({
					url: 'list-webservices/anotacoes.php',
					data: {id: id, anotacoes: $textarea.val()},
					type: 'POST',
					dataType: 'text',
					success: function(data) {
						if(data!='ok') {
							alert("Não foi possível salvar. Tente novamente.");
							$tr.css("opacity", 1);	
						} else if(data=='ok') {
							DataCadastros[id].anotacoes = $textarea.val();
						}
						$botao.removeClass("disabled").attr("disabled", false).html(textoOriginal);
					},
					error: function() {
						alert("Não foi possível salvar. Tente novamente.");
						$tr.css("opacity", 1);	
						$botao.removeClass("disabled").attr("disabled", false).html(textoOriginal);
					}
				});
			});



			/**
			 * Controle Delete
			 */
			$("#tabelaCadastros .botaoDeletar").on("click", function() {
				$botao = $(this);
				$tr = $botao.parents("tr");
				if(confirm("Tem certeza que deseja excluir este cadastro?")) {
					$tr.css("opacity", 0.3);
					$.ajax({
						url: 'list-webservices/delete.php',
						data: {id: $tr.attr("data-cadastro-id")},
						type: 'POST',
						dataType: 'text',
						success: function(data) {
							if(data!='ok') {
								alert("Não foi possível deletar. Tente novamente.");
								$tr.css("opacity", 1);	
							} else if(data=='ok') {
								$tr.remove();
							}
						},
						error: function() {
							alert("Não foi possível deletar. Tente novamente.");
							$tr.css("opacity", 1);	
						}
					});
				}
			});
		});
	</script>
</body>
</html>