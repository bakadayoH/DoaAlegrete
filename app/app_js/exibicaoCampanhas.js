/*envia o numero da campanha via get para a pagina post*/
function x(valor)
{
    window.location = "post.html?minhaVariavel="+valor;
}
/*faz o tratamento da url, ou seja pega apenas o numero trazido pela url*/
function queryString(parameter) {  
              var loc = location.search.substring(1, location.search.length);   
              var param_value = false;   
              var params = loc.split("&");   
              for (i=0; i<params.length;i++) {   
                  param_name = params[i].substring(0,params[i].indexOf('='));   
                  if (param_name == parameter) {                                          
                      param_value = params[i].substring(params[i].indexOf('=')+1)   
                  }   
              }   
              if (param_value) {   
                  return param_value;   
              }   
              else {   
                  return false;   
              }   
        }
/*atribui a variavel (variavel) o resultado do tratamento realizado a cima*/
var variavel = queryString("minhaVariavel");

/*cria um array de campanhas vazio*/
var arrayCampanhas = [];

function campanha(titulo, breveDescricao, descricao, autor, dataCriacao) {
	this.titulo = titulo;
	this.breveDescricao= breveDescricao;
	this.descricao = descricao;
	this.autor = autor;
	this.dataCriacao = dataCriacao;
}
/*titulo, brevedescricao, autor , dataCriacao*/
var campanha0 = new campanha("Campanha do Agasalho 2016.","Com o objetivo de inspirar a sociedade gaúcha a doar com amor e praticar o desapego de peças que tenham valores sentimentais...", "O objetivo da campanha é auxiliar as pessoas que se encontram em situação de vulnerabilidade social a enfrentarem o rigoroso inverno gaúcho. Além disso, o propósito da iniciativa é fazer com que as doações que cheguem às pessoas que mais precisam, representem todo amor ofertado junto da peça, sensibilizando-as a enxergarem o valor que uma roupa tem para quem doa e para quem recebe.", "Prefeitura de Alegrete", "25 Agosto de 2016");
/*adiciona ao arrayCampanhas um array de campanhas*/
arrayCampanhas.push(campanha0); 
var campanha1 = new campanha("Campanha de doação de alimentos: ajudar e ser ajudado.","Participar de uma campanha de doação de alimentos na sua cidade ou região não é apenas alimentar o próximo que não tem recursos para...", "O Brasil tem 3,4 milhões de pessoas em situação de insegurança alimentar, o que corresponde a 1,7% da população nacional, de acordo com dados da FAO (braço das Nações Unidas para alimentação e agricultura). Apesar dessas estatísticas colocarem o Brasil na lista de nações que superaram o problema da fome, o país é considerado um dos dez que mais desperdiçam comida em todo o mundo, com cerca de 30% da produção praticamente jogados fora na fase pós-colheita. Nesse cenário, o Instituto Walmart também promove debates sobre o combate ao desperdício de alimentos. Em outubro de 2013, realizou em Salvador, em parceria com o Mesa Brasil Sesc, o 1º. Seminário Internacional de Segurança Alimentar e Nutricional.  Para compartilhar o conhecimento gerado, foi lançada uma publicação reunindo os principais temas debatidos no evento.", "Walmart Brasil", "11 Setembro de 2016");
arrayCampanhas.push(campanha1);
var campanha2 = new campanha("Hemocentro solicita doações de sangue.","Hemocentro de Alegrete - RS convida as pessoas maiores de 16 anos para que realizem doações de sangue ...", "Atualmente, o Hemocentro Regional de Alegrete atende a sete municípios da região, abrangendo São Francisco de Assis, São Gabriel, Rosário do Sul, Santana do Livramento, Itaqui, Quaraí e Alegrete. Desta forma, para atender a todas as demandas apresentadas pelos hospitais, há necessidade de se ter em estoque uma média de 200 bolsas liberadas. Infelizmente, devido ao baixo número de doadores, o Hemocentro não está conseguindo manter esta média. Hoje, o estoque do banco de sangue encontra-se com apenas 110 bolsas disponíveis para utilização. Sendo assim, muitas vezes, alguns procedimentos que não são de extrema urgência são cancelados.-Para que consigamos atingir esta meta precisamos da colaboração de todos, pois só assim conseguiremos manter nossos estoques em dia e atender a todos que vierem a necessitar de tais procedimentos., comenta a Assistente Social, do Hemocentro, Fernanda M. Soares.Para ser doador basta comparecer ao Hemocentro com  documento com foto, ter idade de 16 a 68 anos, ter dormido no mínimo 6 horas na noite anterior à doação, não ter ingerido bebida alcoólica nas últimas 12 horas e estar bem de saúde. É importante lembrar ainda que depois de uma semana após a doação, o doador recebe o resultado dos exames realizados, incluindo todas as doenças sexualmente trasmissíveis com a bolsa coletada. Todas as doenças sexualmente transmissíveis são realizados.", "Hemocentro Alegrete", "19 Setembro de 2016");
arrayCampanhas.push(campanha2);

/*enviar para a página post os objetos de uma campanha*/
document.getElementById("titulo").innerHTML = arrayCampanhas[variavel].titulo; 
document.getElementById("descricao").innerHTML = arrayCampanhas[variavel].descricao; 
document.getElementById("autor").innerHTML = arrayCampanhas[variavel].autor; 
document.getElementById("dataCriacao").innerHTML = arrayCampanhas[variavel].dataCriacao;               










