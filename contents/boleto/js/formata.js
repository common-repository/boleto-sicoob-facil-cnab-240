 /* Mscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mcep(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que no  dgito
    return v
}
function mdata(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que no  dgito
    v=v.replace(/(\d{2})(\d)/,"$1-$2");       
    v=v.replace(/(\d{2})(\d)/,"$1-$2");       
                                             
    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}
function mrg(v){
	v=v.replace(/\D/g,'');
	v=v.replace(/^(\d{2})(\d)/g,"$1.$2");
	v=v.replace(/(\d{3})(\d)/g,"$1.$2");
	v=v.replace(/(\d{3})(\d)/g,"$1-$2");
	return v;
}
function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que no  dgito
    v=v.replace(/(\d)(\d{8})$/,"$1$2");//coloca o ponto dos milhes
    v=v.replace(/(\d)(\d{5})$/,"$1$2");//coloca o ponto dos milhares
        
    v=v.replace(/(\d)(\d{2})$/,"$1.$2");//coloca a virgula antes dos 2 ltimos dgitos
    return v;
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

function mtime(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
	v=v.replace(/(\d)(\d{2})$/,"$1:$2");//coloca dois pontos antes dos 2 ltimos dgitos
    return v;
}

function mcpf(v){
    v=v.replace(/\D/g,"");//Remove tudo o que no  dgito
    return v;
}


function mnum(v){
    v=v.replace(/\D/g,"");//Remove tudo o que no  dgito
    return v;
}

function mnosn(v){
    v=v.replace(/\D/g,"");//Remove tudo o que no  dgito
	v=v.replace(/(\d)(\d{1})$/,"$1-$2");//coloca dois pontos antes dos 2 ltimos dgitos
    return v;
}

<!--
function CheckAll() { 
   for (var i=0;i<document.form1.elements.length;i++) {
     var x = document.form1.elements[i];
     if (x.name == 'txtidnn[]') { 
x.checked = document.form1.selall.checked;
} 
} 
} 
//-->