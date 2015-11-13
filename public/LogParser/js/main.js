$(function(){
  function parse(){
    var JSONString = $("#log").val();
    console.dir(JSONString);
    JSONString = JSONString.replace(/{/g,",{");
    JSONString = "[" + JSONString.substr(1) + "]";
    console.dir(JSONString);
    var message_types = [];
    try{
      var data = $.parseJSON(JSONString);
      console.dir(data);
      $(".dataTablediv").html("");
      var string = "<table>";
      string += "<th>Type</th><th>Date</th><th>Other data</th>"
      $(data).each(function(index){
        var item = this;
        console.dir(item);
        string += "<tr data-row=\" " + index + "\">";
        string += "<td>";
        string += item.type_message;
        string += "</td>";
        string += "<td>";
        string += item.date;
        string += "</td>";
        var first = true;
        Object.keys(item).forEach(function(key) {
          //Create object rows
          if(key != "type" && key != "type_message" && key != "date")
          {
            if(!first){
              string += "<tr data-row=\" " + index + "\"><td></td><td></td>"
            }
            string += "<td>";
            string += "<b>" + key + "</b> : " + item[key];
            string += "</td></tr>";
            first = false;
          }
          //Check if type_message already exists
          if(key == "type_message")
          {
            //if(NOT IN)
              message_types[message_types.length] = item[key];
          }
          //Check if key exists, add it to filter
        });
      });
      string += "</table>";
      console.dir(string);
      $(".dataTablediv").html(string);
    }
    catch(err){
      alert("The log entered does not follow the needed format!");
      console.dir(err);
      return false;
    }
    $("#filters").html("");
    var filters = "<select><option>--Type--</option>";
    for (var i = 0; i < message_types.length; i++){
      filters += "<option value=\"" + message_types[i] +"\" >" + message_types[i] + "</option>";
    }
    filters += "</select>";
    filters += "<button id=\"filterBtn\">Filter</button>";
    $("#filters").html(filters);
    bindFilters();
  }

  $("#parse").click(function(){parse()});

  function bindFilters(){
    $("#filterBtn").unbind("click");
    $("#filterBtn").bind("click",function(){
      alert("Hello!");
    });
  }
});
