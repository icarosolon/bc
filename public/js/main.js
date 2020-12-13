function searchArticle(){
    $search = document.getElementById("searchArticle").value;
    $result = document.getElementById("searchResult");
    //$result.innerHTML = $search;
    

    var req = new XMLHttpRequest();;
        //URL para uso local
        var url = "http://localhost/bc-api/public/api/articles/search/"+ $search;
       
        //URLs para uso em outros computadores
       /*  var url = "http://192.168.100.12/bc-api/public/api/articles/search/teste"+$search;
   */
        // Chamada do método open para processar a requisição
        req.open("GET", url);
        //Adiciona cabeçalhos
        req.setRequestHeader('Content-Type', 'application/json');
        req.setRequestHeader('Access-Control-Allow-Origin', '*');
      
        // Quando o objeto recebe o retorno, chamamos a seguinte função;
        req.onreadystatechange = function() {
      
          // Exibe a mensagem "BUSCANDO" enquanto carrega
          if(req.readyState == 1) {
            document.getElementById('searchArticle').innerHTML = '<div id="preloader"><span></span><span></span></div>';
          }
      
          // Verifica se o Ajax realizou todas as operações corretamente
          if(req.readyState == 4 && req.status == 200) {
      
            //resposta retornada com os artigos
            var artigos = JSON.parse(req.responseText);
  
            
              let lista = document.getElementById("searchResult");
             //limpando lista e evitando que permaneçam registros anteriores
           // if(artigos == null)
             lista.innerHTML="";
  
              artigos.forEach(artigo=> {
                let title = document.createElement('h2');
                let description = document.createElement('p');
                let link = document.createElement('a');
  
                title.innerHTML = artigo.title;
                description.innerHTML = artigo.description;
  
                  if(artigo.document){
                    link.innerHTML = "Veja mais..."; 
                    link.setAttribute('href', urlDownload + artigo.article_id); 
                    //link.setAttribute('href', artigo.document); 
                    link.setAttribute('target', '_blank');
                    link.setAttribute('type', 'submit');
                    link.setAttribute('id', 'mrs_submit');
                  }
                    
                  lista.appendChild(title);
                  lista.appendChild(description);
                  if(artigo.document)
                    lista.appendChild(link);
                  lista.append(document.createElement('br'));
                  lista.append(document.createElement('br'));
                  
              });  
          }
        }
        req.send(null);
}

function adicionaArtigo(paciente){
    var pacienteTr = montaTr(paciente);
    var tabela = document.querySelector('#tabela-pacientes');
    tabela.appendChild(pacienteTr);

}

function montaTr(paciente) {

    var pacienteTr = document.createElement('tr');
    pacienteTr.classList.add("paciente");

    pacienteTr.appendChild(montaTd(paciente.nome, 'info-nome'));
    pacienteTr.appendChild(montaTd(paciente.peso, 'info-peso'));
    pacienteTr.appendChild(montaTd(paciente.altura, 'info-altura'));
    pacienteTr.appendChild(montaTd(paciente.gordura, 'info-gordura'));
    pacienteTr.appendChild(montaTd(paciente.imc, 'info-imc'));
    return pacienteTr;
}

function montaTd(dado, classe){
    var td = document.createElement('td');
    td.textContent = dado;
    td.classList.add(classe);
    return td;
}