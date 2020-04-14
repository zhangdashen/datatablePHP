###### 结构分析
~~~
funcionTraeUsuarios.php 		后端处理数据页面
unuarios.php					前台页面
media/js/lenguajeusuario.js		datatable处理数据页面
~~~


##### datatable分析
"sAjaxSource": "funcionTraeUsuarios.php"	这个必须要填写，后面为路由

##### funcionTraeUsuarios 结果分析
~~~
// data参数名不可改变，否则会报 length undefined的错误 
'{"sEcho":'.$sEcho.',"iTotalRecords":'.$ss.',"iTotalDisplayRecords":'.$ss.',"data":['.$tabla.']}'  
~~~