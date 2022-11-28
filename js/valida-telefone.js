function mascaraTelefone(){

    var telefone= document.getElementById('telefone').value;
    if(telefone.length==1){
        document.getElementById('telefone').value='(' + telefone;
    }
        else if (telefone.length==3){ 
            document.getElementById('telefone').value= telefone +')';
    }
        else if (telefone.length==8){
            document.getElementById('telefone').value= telefone +'-';
    }
}