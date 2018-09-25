/*

/* Developed by Luiz Fernando Malta Martins

/* Aqui esta os código javascript e jQuery da pagina index.php

/* @author Luiz Fernando - lufmalta@gmail.com

*/


$(function(){
	$('#telefone').mask('+(00) (00) 0.0000-0000');
	$('.dataEnt').mask('00/00/0000');
	$('.dataSai').mask('00/00/0000');
	$('.habilidades').attr('title','Exemplo de habilidade: HTML5, Liderança, Responsável, Pro-ativo, jQuery.');
	$('.objPro').attr('title', 'Insira aqui seu objetivo profissional- Exemplo: Assistente Administrativo, Área Tecnológica,'
		+' Vendas, também pode colocar o seu perfil profissional. Max-caracteres: 300');
	$('.cargos').attr('title', 'Aqui você coloca a sua função na empresa. Max-caracteres: 50');
	$('.empresas').attr('title', 'Aqui você coloca o nome da empresa. Max-caracteres: 40');
	$('.cidades').attr('title', 'Aqui você coloca o nome da cidade que fica a empresa. Max-caracteres: 30');
	$('.descCargos').attr('title', 'Insira aqui o que você fazia na empresa, ou seja suas funções - Exemplo:'+
		' Manutenção dos laboratórios, limpeza dos banheiros, estoque de produtos. Max-caracteres: 500')
	$('[data-toggle = "tooltip"]').tooltip();
	
});

