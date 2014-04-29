/*Grilla : Eventos, Acciones y Tooltips*/
function tooltip_placement(context, source) {
    var $source = $(source);
    var $parent = $source.closest('table')
    var off1 = $parent.offset();
    var w1 = $parent.width();
    var off2 = $source.offset();
    var w2 = $source.width();
    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
    return 'left';
}

function initEvtOpc(clase_icono,funcion){    
    $(".icon-"+clase_icono).unbind('click');
    $(".icon-"+clase_icono).each(function(){
        var fila;
        $("#"+this.id).click(function(e){
            e.preventDefault();
            fila =$(this).parents('tr');
            eval(funcion);
        })
    });    
}
//esta funcion podria reemplazar a initEvtOpc solo envia como parametro el 'id' de la fila
function initEvtSlider(clase_icono,url,objocultar,objmostrar,divmostrar,fnocultar,fnmostrar){
    $(".ui-icon-"+clase_icono).each(function(){
        $("#"+this.id).click(function(e){
            e.preventDefault();
            var fila =$(this).parents('tr');
            //$.post("bandejaPendientes/EditarDiversos",{//get
            $.post(url,{//get
                Codigo:$(fila).data('codx')
            }, function(data){                
                MostrarOcultarCapas(objocultar,objmostrar,'','');
                $("#"+divmostrar).html(data);
            });
        //; 
    })
    });
}
// hace lo mismo que initEvtOpcPopupId
function initEvtUpdJson(url,title,alto,ancho,func_close){
    $(".icon-pencil").unbind('click');
    $('.icon-pencil').each(function(){
        var fila;
        $("#"+this.id).click(function(e){
            e.preventDefault();
            fila =$(this).parents('tr');
            var objJson = $(fila).data('json');
            console.log(this);
            console.log(fila);
            console.log(objJson);
            console.log("Debug : initEvtUpdJson Loaded...");
            // set_popupJSON(url+$(fila).data('codx'),title,alto,ancho,objJson,func_close);
            set_popup(url+$(fila).data('codx'),title,alto,ancho,'',func_close);
        })
    });
}
//Inicializar Evento Con Opcion Popup Con Envio Id Como Parametro
function initEvtOpcPopupId(clase_icono,url,title,alto,ancho,func_close){
    $(".icon-"+clase_icono).unbind('click');
    $(".icon-"+clase_icono).each(function(){
        $("#"+this.id).click(function(e){
            e.preventDefault();
            var fila =$(this).parents('tr');
            set_popup(url+$(fila).data('codx'),title,alto,ancho,'',func_close); 
        })
    });    
}
// function initEvPermisosJson(){
//     $('.icon-user').each(function(){
//         var fila;
//         $("#"+this.id).click(function(e){
//             e.preventDefault();
//             fila =$(this).parents('tr');
//             var objJson = $(fila).data('json');
//             alert($(fila).data('codx'))
//         })
//     });
// }

// function initEvtUpd(url,title,alto,ancho,func_close){
//     $(".icon-pencil").unbind('click');
//     $('.icon-pencil').each(function(){
//         var fila;
//         $("#"+this.id).click(function(e){
//             e.preventDefault();
//             fila =$(this).parents('tr');
//             console.log(this);
//             console.log(fila);
//             console.log("Debug : initEvtUpd Loaded...");
//             set_popup(url+$(fila).data('codx'),title,alto,ancho,'',func_close);
//         })
//     });
// }

function initEvtDel(funcion){ 
    $(".icon-trash").unbind('click');
    $(".icon-trash").on("click",function(e){
        e.preventDefault();
        var fila,fn;
        fila = $(this).parents('tr');
    // console.log("fila");
    // console.log(fila);
        fn =""+funcion+"("+$(fila).data('codx')+")"; 
    // console.log("fn");
    // console.log(fn);
        confirmar("Confirmar","¿Seguro que desea retirar el registro seleccionado?",fn);
    });
}

$(function(){
    //override dialog's title function to allow for HTML titles
    $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
        _title: function(title) {
            var $title = this.options.title || '&nbsp;'
            if( ("title_html" in this.options) && this.options.title_html == true )
                title.html($title);
            else title.text($title);
        }
    }));
});
/*Funciones para manejo de botones*/
function msgLoadSaveMsg(obj,btn,msg){ //preload al costado del boton
    var host = window.location.host;
    $(btn).attr("disabled", "true");
    if (msg==undefined) {
        msg = "Procesando... por favor espere.";
    };
    msgLoading(obj,msg);
}
function msgLoadSaveRemove(btn){
    $("#msg_loading").remove()
    $(btn).removeAttr("disabled");
}
function DesabilitarBoton(btn){
    $("#"+btn).button('loading');
}
function HabilitarBoton(btn){
    $("#"+btn).button('reset')
}

function MostrarOcultarCapas(ObjOcultar,ObjMostrar,fnOcultar,fnMostrar){
    $("#"+ObjOcultar).hide('slide',100,function(){
        // $(".tooltip").removeClass("in");
        // $(".tooltip").addClass("out");        
        eval(fnOcultar);
    });
    $("#"+ObjMostrar).show('slide',1000,function(){
        // $(".tooltip").removeClass("in");
        // $(".tooltip").addClass("out");
        eval(fnMostrar);
    });        
}

/*Funciones Compartidas*/
function set_popupJSON(url,title,ancho,alto,fila,func_close){
    var a = 1;
    var b = 100;
    var randomnumber = (a+Math.floor(Math.random()*b));
    $("body").append("<div id='popupEdicion"+randomnumber+"' class='popedit' title='"+title+"' style='overflow: hidden'></div>");           
    $("#popupEdicion"+randomnumber).dialog({          
        autoOpen:false,      
        position: 0, //0=TOP        
        width:ancho,
        Height:'auto',
        minHeight:alto,
        resizable: false,
        modal:true ,
        open: function(event,ui){
            get_page(url,this.id,parametro);
        },
        close: function(){      
            eval(func_close);
            $(this).dialog('destroy').remove();                        

        }
    });
    $("#popupEdicion"+randomnumber).dialog('open');
}
function set_popup(url,title,ancho,alto,parametro,func_close){
    var a = 1;
    var b = 100;
    var randomnumber = (a+Math.floor(Math.random()*b));
    $("body").append("<div id='popupEdicion"+randomnumber+"' class='popedit' title='"+title+"' style='overflow: hidden'></div>");           
    $("#popupEdicion"+randomnumber).dialog({          
        autoOpen:false,      
        position: 0, //0=TOP        
        width:ancho,
        Height:'auto',
        minHeight:alto,
        resizable: false,
        modal:true ,
        open: function(event,ui){
            get_page(url,this.id,parametro);

        },
        close: function(){      
            eval(func_close);
            $(this).dialog('destroy').remove();                        

        }
    });
    $("#popupEdicion"+randomnumber).dialog('open');
}

function confirmar(title,msg,funcionsi,funcionno/*,params*/){
    var a = 1,b = 100,randomnumber;   
    randomnumber = (a+Math.floor(Math.random()*b));   
    $(".msgdlg" ).dialog( "destroy" );    
    $("body").append( "<div id='messageconfirma"+randomnumber+"' class='msgdlg' title='"+title+"'>"+msg+"</div>");
    if (funcionsi != undefined && funcionsi != '' ) {
        $("#messageconfirma"+randomnumber).dialog(
        {
            autoOpen: true,
            draggable: false,  
            height: 200,
            modal: true,
            position: 'center',
            resizable: false,            
            width: 300,
            buttons: {
                'Si': function() {
                    try{
                        //eval(funcion+"("+params+")");
                        eval(funcionsi);
                        $(this).dialog( 'close' );
                    }catch(er){
                    }
                },
                'No': function() {
                    try{
                        //eval(funcion+"("+params+")");
                        if (funcionno != undefined && funcionno != '')
                        {
                            eval(funcionno);
                            $(this).dialog( 'close' );
                        }else
                        {
                            $(this).dialog( 'close' );  
                        }
                    }catch(er){
                    //error
                    }
                }
            },
            close: function() {
                $(this).dialog('destroy').remove();
                $("#messageconfirma"+randomnumber).remove();
            }
        }
        );    
    }
}
function get_page(Url,div_name,parametro,tipo_mensaje){
    var Rdn=(Math.floor(Math.random()*11));  
    if(tipo_mensaje==undefined){
        msgLoading('#'+div_name,"Espere por favor!!!");
    }else if(tipo_mensaje=="msjCargando"){
        msjCargando();
        $("#mensajecarga").show();
    }
    $.post(Url, {
        Rdn:Rdn,        
        json:parametro    
    }, function(data){ 
        if(tipo_mensaje==undefined){
           
        }else if(tipo_mensaje=="msjCargando"){
            $("#mensajecarga").hide();
        }
        data = data.trim();  
        $('#'+div_name).html(data);       
    });
}
function msgLoading(obj,msg){
    if(msg == undefined){
        $(obj).html("<div id='msg_loading' style='color:#2D91D4;font-size:0.75em'><div class='gif_loading'></div>&nbsp;Cargando ... por favor espere.</div>");
    }else{
        $(obj).html("<div id='msg_loading' style='color:#2D91D4;font-size:0.75em'><div class='gif_loading'></div>&nbsp;"+" "+msg+"</div>");
    }
}

function msjCargandoCustom(objId){
    var host = window.location.host;
    $(objId).html('<center><div style="display: table-cell;vertical-align: middle;position: relative;"><center><br/><p><img src="http://'+host+'/mpn/statics/images/cargando.gif"/><h2 style="color:black;">Espere un Momento...</h2></p></center></div></center>');
    $(objId).css("opacity","0.6");  
    $(objId).css("background","white");  
    $(objId).css("visibility","visible");
}

function mensaje(msg,tip){
    if (tip=='e'){
        $.jGrowl(msg, {
            header:'¡EXITO!', 
            theme: 'mexito'
        });
    }
    else if (tip=='r') {
        $.jGrowl(msg, {
            header:'¡ERROR INESPERADO!', 
            theme: 'merror'
        });    
    } else if (tip=='a'){    
        $.jGrowl(msg, {
            header:'¡CUIDADO!', 
            theme: 'malerta2'
        });
    }    
}
/* LIMPIA UN FORMULARIO */
function limpiarForm(obj) {
    // enaviar asi: limpiarForm('#miForm');
    $(':input', $(obj)).each(function() {
        var type = this.type;
        var tag = this.tagName.toLowerCase();      
        if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'hidden' || type == 'file')
            this.value = '';       
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = 0; //-1
    });
}