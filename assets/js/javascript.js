/*

/* Developed by Luiz Fernando Malta Martins

/* Aqui esta os código javascript e jQuery da pagina index.php

/* @author Luiz Fernando - lufmalta@gmail.com

*/


$(function(){
	$('#telefone').mask('+(00) (00) 0.0000-0000');
	$('.dataEnt').mask('00/00/0000');
	$('.dataSai').mask('00/00/0000');
	$('#anoConcl').mask('0000');
	$('.habilidades').attr('title','Exemplo de habilidade: HTML5, Liderança, Responsável, Pro-ativo, jQuery.');
	$('.objPro').attr('title', 'Insira aqui seu objetivo profissional- Exemplo: Assistente Administrativo, Área Tecnológica,'
		+' Vendas, também pode colocar o seu perfil profissional. Max-caracteres: 300');
	$('.cargos').attr('title', 'Aqui você coloca a sua função na empresa. Max-caracteres: 50');
	$('.empresas').attr('title', 'Aqui você coloca o nome da empresa. Max-caracteres: 40');
	$('.cidades').attr('title', 'Aqui você coloca o nome da cidade que fica a empresa. Max-caracteres: 30');
	$('.descCargos').attr('title', 'Insira aqui o que você fazia na empresa, ou seja suas funções - Exemplo:'+
		' Manutenção dos laboratórios, limpeza dos banheiros, estoque de produtos. Max-caracteres: 500');
	$('.formacao').attr('title', "Aqui você ira colocar a sua formação - Exemplo: Ciencias Contábeis,"+
		' Hístoria, Educação física, Ensino médio Completo. Max-caracteres: 40');
	$('.institu').attr('title', 'Aqui você ira colocar a instituição da sua formação. Max-caracteres: 40');
	$('.instituCidade').attr('title', 'Aqui você ira colocar a cidade da instituição. Max-caracteres: 30');
	$('.anoConcl').attr('title', 'Aqui coloca-se o ano de conclusao, Exemplo: 2018');
	$('.cursos').attr('title','Aqui você insere os cursos que ja fez e a especificação deles.'+
		' Exemplo: Curso de Manutenção em microcomputadores - SENAC - 20 horas');
	$('.dataEntrada').attr('title', 'Aqui você coloca a data de entrada na empresa em ano/mes/dia');
	$('.dataSaida').attr('title', 'Aqui você coloca a data de saida na empresa em ano/mes/dia');
	$('[data-toggle = "tooltip"]').tooltip();


	//Depois tento resolver isso
	// $('#form_login h2').hide(); // ja começa como escondido, só aparece quando entrar

	// $('#form_login').bind('submit' ,function(e){
	// 	//e.preventDefault();

	// 	var login = $('#usuario').val();
	// 	var senha = $('#senha').val();


	// 	$.ajax({
	// 		type: 'POST',
	// 		url: 'login.php',
	// 		data: login+'e'+senha,
	// 		success:function(result){
	// 			// if(result == 1){
	// 			// 	window.location.assign('curriculo.php');
	// 			// 	// $('#form_login h2').show();
	// 			// }else if(result == 0){
	// 			// 	window.location.href('index.php');
	// 			// 	// $('#form_login h2').hide()
	// 			// }
	// 			// // $('#usuario').val('');
	// 			// // $('#senha').val('');
	// 			// //$('#senha').html('');
	// 		}, error:function(result){
	// 			console.log("erro");
	// 		}

	// 	});

	// });


	
});








