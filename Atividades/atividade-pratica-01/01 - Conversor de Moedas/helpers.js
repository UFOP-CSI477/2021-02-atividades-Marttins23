function checaInputResultado(valor, cotacao_moeda_origem, cotacao_moeda_destino) {

    if(valor == "") {
        window.alert("Você precisa informar o valor que deseja converter!");
        return false;
    } else if(valor < 0) {
        window.alert("O valor precisa ser positivo!");
        return false;
    } else if(valor.includes(",")) {
        window.alert("Use ponto ( . ) em vez de vírgula para separar os decimais!");
        return false;
    } else if(isNaN(valor)) {
        window.alert("O valor precisa ser um número");
        return false;
    } else if(cotacao_moeda_origem == "") {
        window.alert("Você deve informar uma moeda de origem para a conversão!");
        return false;
    } else if(cotacao_moeda_destino == "") {
        window.alert("Você deve informar uma moeda de destino para a conversão!");
        return false;
    } 

    return true;

}

function checaMoedaCotacao(event, moeda_id, cotacao_moeda_origem, cotacao_moeda_destino) {

    if ( moeda_id == "" ) {
        if(event.target.id == "moeda-origem") {
            cotacao_moeda_origem = "";
        } else if(event.target.id == "moeda-destino") {
            cotacao_moeda_destino = "";
        }
        return false;
    }

    if ( moeda_id == "BRL") {
        if(event.target.id == "moeda-origem") {
            cotacao_moeda_origem = "BRL";
        } else if(event.target.id == "moeda-destino") {
            cotacao_moeda_destino = "BRL";
        }
        return false;
    }

    return true;

}