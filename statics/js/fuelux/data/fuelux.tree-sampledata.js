var DataSourceTree = function(options) {
	this._data 	= options.data;
	this._delay = options.delay;
	// this.url = options.url;
}
// console.log(DataSourceTree)
// console.log(DataSourceTree.prototype.data)
// alert(this._delay)
DataSourceTree.prototype.data = function(options, callback) {
	var self = this;
	var $data = null;

	var param = null;

	// alert(options);
	// console.log(options);
	// console.log(options);
	if(!("name" in options) && !("type" in options)){
		$data = this._data;//the root tree
		callback({ data: $data });
		return;
		// param = 0;
	}
	else if("type" in options && options.type == "folder") {
			// console.log(options);
		if("additionalParameters" in options && "children" in options.additionalParameters){
			// param = options.additionalParameters["id"];
			$data = options.additionalParameters.children;
			$.each($data, function(index, value) {
					var $val = $(value);
					console.log($val[0]['name']);
					// alert($val[0]["tree-item-name"])
					if($val[0]["tree-item-name"] == true){
						console.log('div>.tree-item-name:contains("'+$val[0]['name']+'")');
						var item = $('#tree1').find('div>.tree-item-name:contains("'+$val[0]['name'].trim()+'")');
						var div = $(item).parent('div');
						var i = $(div).children('i');
						console.log(item );
						console.log(div );
						console.log( i );						
						$(div).addClass('tree-selected');
						$(i).removeClass('icon-remove').addClass('icon-ok');
						// alert('si')
						        // fila =$(this).parents('div');
            		// 			var objJson = $(fila).data('json');
							    // $(value).addClass('tree-selected');
							    // console.log($(value))
								// $this.find('i').removeClass('tree-dot').addClass('icon-ok');
					}
						console.log('hay vienen mas...' );
					// if($val[0] !== $el[0]) {
					// 	data.push( $(value).data() );
					// }
				});
			// $el.addClass ('tree-selected');
			// tree-item-name

			// tree-item-name	true	
			// name	"Trabajador"	
			// type	"item"
//    $('.icon-pencil').each(function(){
    //     var fila;
    //     $("#"+this.id).click(function(e){
    //         e.preventDefault();
    //         fila =$(this).parents('tr');
    //         var objJson = $(fila).data('json');
    //         console.log(this);
    //         console.log(fila);
    //         console.log(objJson);
    //         console.log("Debug : initEvtUpdJson Loaded...");
    //         // set_popupJSON(url+$(fila).data('codx'),title,alto,ancho,objJson,func_close);
    //         set_popup(url+$(fila).data('codx'),title,alto,ancho,'',func_close);
    //     })
    // });
			console.log($data);
		}
			else $data = {}//no data
	}
	else if(options.type == "item") {
		// if( "item-selected" in options){
			console.log('sdsd')
		 	// $data.addClass ('tree-selected');			
		// }
	}
	 if($data != null)//this setTimeout is only for mimicking some random delay
		setTimeout(function(){callback({ data: $data });} , parseInt(Math.random() * 500) + 200);

	//we have used static data here
	//but you can retrieve your data dynamically from a server using ajax call
	//checkout examples/treeview.html and examples/treeview.js for more info
};


var tree_data = Object();
$(function(){

$.ajax({
    url:'permisos/getpermisos',
    type:'post',
    dataType:'json',
    cache:false,
    data:{},
    success:function(datax){
    	// console.log( datax );
    	var treeDataSource = new DataSourceTree({data: datax});
    	$('#tree1').ace_tree({
    				// dataSource: new DataSourceTree({ url: '[PATH TO SERVICE]' }),
    				dataSource: treeDataSource ,
    				multiSelect:true,
    				loadingHTML:'<div class="tree-loading"><i class="icon-refresh icon-spin blue"></i></div>',
    				'open-icon' : 'icon-minus',
    				'close-icon' : 'icon-plus',
    				'selectable' : true,
    				// 'multiSelect' : true,
    				'selected-icon' : 'icon-ok',
    				'unselected-icon' : 'icon-remove'
    	});
    },
    error:function(er){
    	// console.log(er.statusText);
        alert("Houston, tenemos un problema... Creo que has roto algo...");
    }
});

})