// 百度地图API功能
var map = new BMap.Map("allmap");
var poi= new BMap.Point(119.994706,30.291065);
var point = new BMap.Point(119.994792,30.290165);  
map.centerAndZoom(poi, 18);
var marker = new BMap.Marker(point);  // 创建标注
map.enableScrollWheelZoom(true);
var navigationControl = new BMap.NavigationControl({
    // 靠左上角位置
    anchor: BMAP_ANCHOR_TOP_LEFT,
    // LARGE类型
    type: BMAP_NAVIGATION_CONTROL_LARGE,
    // 启用显示定位
    enableGeolocation: true
  });
map.addControl(navigationControl);

var content = '<div style="margin:0;line-height:20px;padding:2px;color:#666">' +'地址：浙江省杭州市余杭区绿汀路1号财通大厦9楼<br/>电话：(010)15394243344 <br/>简介：橡皮擦淘宝实景摄影基地，位于杭州城西余杭区文一西路仓前街道，占地1800平方，层高5米以上， 有300平方的屋顶采光带，白天基本能实现无闪光灯拍摄。 基地首期装修投资180万，打造出欧式、店主风、韩风、法式、地中海、现代、田园、街景、服装店、 LOFT、酒吧、咖啡吧、卧室、书店、杂货店、无影棚等数十个风格的场景提供出租。' +
              '</div>';
//创建检索信息窗口对象
var searchInfoWindow = null;
searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
		title  : "百度大厦",      //标题
		width  : 400,             //宽度
		height : 150,              //高度
		panel  : "panel",         //检索结果面板
		enableAutoPan : true,     //自动平移
		searchTypes   :[
			BMAPLIB_TAB_SEARCH,   //周边检索
			BMAPLIB_TAB_TO_HERE,  //到这里去
			BMAPLIB_TAB_FROM_HERE //从这里出发
		]
	});
var marker = new BMap.Marker(point); //创建marker对象
marker.enableDragging(); //marker可拖拽
searchInfoWindow.open(marker);
map.addOverlay(marker); //在地图中添加marker
