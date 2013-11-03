(function($) {
	$.fn.limitaPalavras = function(options) {
		// Settings
		var settings = $.extend({
			limite: 140,
			info: null,
			corPadrao: '#398439',
			corIntermediaria: '#ed9c28',
			corAlerta: '#ac2925'
		}, options);

		if($(settings.info).is("*")) {
			$(settings.info).html(settings.limite);
		}

		var fnCalcular = function(e) {
			var words = [];
			var wordCount = 0;
			if(this.value.length>0) {
				words = this.value.trim().split(" ");
				wordCount = words.length;
			}

			if(wordCount>=settings.limite) { // Se ultrapassou o limite
				var validWords = [];
				for(var i=0; i<settings.limite; i++) {
					validWords.push(words[i]);
				}
				this.value = validWords.join(" ");
			}

			if($(settings.info).is("*")) {
				if(settings.limite-wordCount<settings.limite) {
					var porcentagem = Math.round((wordCount*100)/settings.limite);
					var cor = settings.corPadrao;
					if(porcentagem>=70 && porcentagem<90) {
						cor = settings.corIntermediaria;
					} else if(porcentagem>=90) {
						cor = settings.corAlerta;
					}
					$(settings.info).html('<span style="color: ' + cor + ';">' + wordCount + '</span> of ' + settings.limite);
				} else {
					$(settings.info).html(settings.limite);
				}
			}
		};

		this.on("keyup", fnCalcular);
		this.on("keydown", fnCalcular);
		this.on("blur", fnCalcular);
	}
})(jQuery);