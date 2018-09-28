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


	// $("#form").bind('submit', function(e){
	// 	e.preventDefault();
	// 	var txt = $(this).serialize();
		
	// 	$.ajax({

	// 		type: 'POST',
	// 		url: 'receberDados.php',
	// 		data: txt,
	// 		success:function(){
	// 			console.log(txt);
	// 		}, error:function(){
	// 			console.log("erro");
	// 		}
	// 	});
	// }); // mais pra frente vou tentar usar o ajax
});
// var carac = 0; 
// // console.log(carac);
// var keycode = 0;
// var quatCarac = 499;
// var contCarac = 0;
// function contarCarac(t){

// 	carac = document.getElementById('cursos').value;
// 	keycode = t.keyCode;
// 	if(keycode == 8){
// 		contCarac = carac.length--;
// 		console.log(--contCarac);
		
// 	}else {
// 		console.log(carac.length);
// 	}
	









// // 	carac = document.getElementById('cursos').value;
// // 	carac.length;
// // 	keycode = t.keyCode;
// // 	if(keycode == 8){
// // 		if(carac.length == 0){
// // 			//console.log('Caracteres digitados: '+contCarac);
// // 		}else {
// // 			if(carac.length == 0){
// // 				carac.length = 1;
// // 				contCarac = carac.length;
// // 				console.log('Caracteres digitados: '+contCarac);
// // 			}else {
// // 				contCarac = carac.length;
// // 				console.log('Caracteres digitados: '+contCarac);
// // 			}
			
// // 		}
		
		
// // 	}else {
// // 		if(contCarac == 500){
// // 			console.log("Ja digitou o maximo de caracteres"+contCarac);
// // 		}else {
// // 			contCarac = carac.length ;
// // 			console.log('Caracteres digitados: '+contCarac);
// // 		}
		
// // 	}
// // 	//console.log(t.keyCode);
	
// // 	//if()
// // }

// }