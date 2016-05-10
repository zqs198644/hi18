$(document).ready(function(){
  $("td.cs>a").bind('click',function(e){
    var loading = $("<div><img src='/agent/view/images/loading_16x16.gif' /> 测试中...</div>");
    $(this).replaceWith(loading);
    $.getJSON("/test/single/id/"+$(this).attr("name"),function(json){
      var str = (json.ret==0 ? json.data.all+'ms' : json.msg);
      loading.replaceWith("<span>"+str+"</span>");
    })
  })
  
  $(".alltest").bind('click',function(){
    $(this).replaceWith("速率");
    var hosts = [];
    $.each($("table.tb>tbody>tr"),function(key,tr){
      hosts.push($(tr).attr("data-id")+":"+$(tr).find("td:eq(1)").text()+":"+$(tr).find("td:eq(2)").text()+":"+$(tr).attr("data-type"));
      $(tr).find("td.cs").html("<div><img src='/agent/view/images/loading_16x16.gif' /> 测试中...</div>");
    })
    if(hosts.length==0) return false;
    $.ajax({type:'POST',dataType:'json',url:'http://pachong.org/test/multi',data:{hosts:hosts.join("|")},success:function(json){
	$.each(json.data, function(k,host){
	    var val = host.status==1 ? ( host.timelong > 10000 ? Math.ceil(host.timelong/1000)+"秒" : host.timelong+"ms" ) : "异常";
	    $("tr[data-id='"+host.id+"']").find("td.cs").html("<span>"+val+"</span>");
	})
    }})
  });

  $(".guesttest").bind('click',function(){
    var ips = $(".ips").val().replace(/：/g,":").split("\n");
    var hosts = [];
    for(var i=0;i<ips.length;i++){
      var ip = $.trim(ips[i].split(":")[0]);
      var port = $.trim(ips[i].split(":")[1]);
      if( ip != undefined && port != undefined && /^[a-zA-Z_\.0-9]{4,256}$/.test(ip) && /^[0-9]{1,5}$/.test(port)){
	hosts.push(ip+":"+port);
	if(hosts.length>=100) break;
      }
    }
    if(hosts.length==0)return false;
    $(".tb>tbody>tr:gt(0)").remove();
    $(".tb>tbody>tr:eq(0)").css({"display":"table-row"});
    $(".tb").show();
    $(this).text("检测中...");
    $(this).attr("disabled","disabled");
    (function(me){
    $.ajax({type:'post',dataType:'json','url':'/test',data:{'hosts':hosts.join("|")},success:function(json){
      $(".tb>tbody>tr:eq(0)").hide();
      $(me).text("检测");
      $(me).removeAttr("disabled");
      if ( json.ret == 0 ) {
	$.each(json.data.hosts, function(k,host){
	  var tr = "<tr><td>"+host.host+"</td><td>"+host.port+"</td><td>"+host.type+"</td><td>"+host.timelong+"</td>";
	  tr += "<td class='status'>"+(host.result=="0"?"<em class='ok'></em><span>ok</span>":"<em class='err'></em><span>"+host.result)+"</span></td></tr>";
	  $(".tb>tbody").append(tr);
	});
      }
    }})
    })(this);
  });
});
