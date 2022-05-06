let inputValor = document.querySelector("#valor");
let selectMoedas = document.querySelectorAll(".select-moeda");
let cotacao_moeda_origem = "";
let cotacao_moeda_destino = "";
const dataConversao = document.querySelector("#data-conversao");
const inputResultado = document.querySelector("#resultado");
let dataConversaoValida = new Date();


function limparSelect(campo) {
    while( campo.length > 1 ) {
        campo.remove(1);
    }
}

function preencherSelectMoeda(data) {
    
    selectMoedas.forEach(element => {

        limparSelect(element);

        let real = document.createElement("option");
        real.value = "BRL";
        real.innerHTML = `Real - BRL`;

        element.appendChild(real);

        for( let index in data ) {

            const { simbolo, nomeFormatado } = data[index];

            let option = document.createElement("option");
            option.value = simbolo;
            option.innerHTML = `${nomeFormatado} - ${simbolo}`;

            element.appendChild(option);

        }
        
    });

}

function carregaMoedas() {

    fetch("https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/Moedas?$top=100&$format=json")
        .then(response => response.json())
        .then(data => preencherSelectMoeda(data["value"]))
        .catch(error => console.error(error))

}

function carregaCotacao(event, data) {

    var mes = data.slice(5, 7);
    var dia = data.slice(8, 10);
    var ano = data.slice(0, 4);

    const moeda_index = event.target.selectedIndex;
    const moeda_id = event.target.options[ moeda_index ].value;

    if ( moeda_id == "" ) {
        if(event.target.id == "moeda-origem") {
            cotacao_moeda_origem = "";
        } else if(event.target.id == "moeda-destino") {
            cotacao_moeda_destino = "";
        }
        return;
    }

    if ( moeda_id == "BRL") {
        if(event.target.id == "moeda-origem") {
            cotacao_moeda_origem = "BRL";
        } else if(event.target.id == "moeda-destino") {
            cotacao_moeda_destino = "BRL";
        }
        return;
    }

    const url_moedas = `https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaDia(moeda=@moeda,dataCotacao=@dataCotacao)?@moeda='${moeda_id}'&@dataCotacao='${mes}-${dia}-${ano}'&$top=100&$format=json&$select=cotacaoCompra`;

    fetch(url_moedas)
        .then(response => response.json())
        .then(dados => {
            const array_cotacoes = dados["value"];
           
            while(array_cotacoes.length == 0) {
                return carregaCotacao(event, retornaDataMenosUmDia(ano, mes, dia));
            }

            atualizaDataConversaoValida(dia, mes, ano);
            atualizaInputData(dataConversaoValida);
            const cotacao_valida = array_cotacoes[array_cotacoes.length - 1];
            if(event.target.id == "moeda-origem") {
                cotacao_moeda_origem = cotacao_valida["cotacaoCompra"];
            } else {
                cotacao_moeda_destino = cotacao_valida["cotacaoCompra"];
            }

        })
        .catch(error => console.error(error));

}

function carregaResultado() {

    let valor = inputValor.value;

    if(!checaInputResultado(valor, cotacao_moeda_origem, cotacao_moeda_destino)) {
        return;
    }

    if(cotacao_moeda_origem == "BRL") {
        inputResultado.value = (valor / cotacao_moeda_destino).toFixed(4);
    } else if(cotacao_moeda_destino == "BRL") {
        inputResultado.value = (valor * cotacao_moeda_origem).toFixed(4);
    } else {
        inputResultado.value = ((valor * cotacao_moeda_origem) / cotacao_moeda_destino).toFixed(4);
    }

    atualizaInputData(dataConversaoValida);

}

function capturaData() {

    return dataConversao.value;

}

function retornaDataMenosUmDia(ano, mes, dia) {

    mes = mes - 1;

    data = new Date(ano, mes, dia);

    var dataMenosUm = new Date(data.getTime() - (24 * 60 * 60 * 1000));

    return `${dataMenosUm.getFullYear()}-${dataMenosUm.getMonth() + 1}-${dataMenosUm.getDate()}`;

}

function inicializaData() {

    data = new Date();

    atualizaInputData(data);

}

function atualizaInputData(data) {

    var strZero = "0";
    var diaData = data.getDate();
    var mesData = data.getMonth();

    if(data.getDate() < 10) {
        diaData = strZero.concat(data.getDate());
    }

    if(data.getDate() < 10) {
        mesData = strZero.concat(data.getMonth() + 1);
    }

    dataConversao.value = `${data.getFullYear()}-${mesData}-${diaData}`;

}

function atualizaDataConversaoValida(dia, mes, ano) {
  
    data = new Date(ano, mes - 1, dia);   

    dataConversaoValida = data;

}

