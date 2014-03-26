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
		if("additionalParameters" in options && "children" in options.additionalParameters)
			// param = options.additionalParameters["id"];
			$data = options.additionalParameters.children;
			else $data = {}//no data
	}
	console.log($data);
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