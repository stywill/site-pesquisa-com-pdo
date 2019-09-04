function valida(i) {
    var contPergunta = parseInt($("#conta_resposta" + i).val());
    var erro = false;
    var id_sua_escolha;
    var sua_escolha;
    var posts;
    if ($("#seu_email" + i).val() == '') {
        $("#seu_email" + i).focus();
        $("#seu_email" + i + "_erro").text("O E-mail é obrigatório");
        erro = true;
    }
    for (var j = 0; j < contPergunta; j++) {
        console.log($("input[name='sua_escolha" + i +"']:checked").length);
        if (!$("input[name='sua_escolha" + i +"']:checked").length) {
            $("#sua_escolha" + i + "_erro").text("Essa pergunta não foi respondida");
            erro = true;
        }else{
           sua_escolha = $("input[name='sua_escolha" + i +"']:checked").val(); 
           id_sua_escolha = $("#id_sua_escolha"+i+"_"+j).val()
        }
    }
    if (erro == false) {       
        posts = "?id_categoria="+$("#categoria_id"+i).val()+"&categoria="+$("#categoria"+i).val()+"&email="+$("#seu_email"+i).val()+"&id_historia="+id_sua_escolha+"&historia="+sua_escolha
        getAjContent("processa-voto.php"+posts, "div_ret"+i)
    } else {
        return false;
    }
}
function limpaErro(campo) {
    $("#"+campo + "_erro").text("");
}