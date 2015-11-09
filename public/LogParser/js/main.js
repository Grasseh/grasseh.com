$(function(){
  function parse(){
    var JSONString = $("#log").val();
    console.dir(JSONString);
    JSONString = JSONString.replace(/{/g,",{");
    JSONString = "[" + JSONString.substr(1) + "]";
    console.dir(JSONString);
    try{
      var data = $.parseJSON(JSONString);
      console.dir(data);
      $(".dataTablediv").html("");
      var string = "<table>";
      string += "<th>Type</th><th>Date</th><th>Other data</th>"
      $(data).each(function(index){
        var item = this;
        console.dir(item);
        string += "<tr>";
        string += "<td>";
        string += item.type_message;
        string += "</td>";
        string += "<td>";
        string += item.date;
        string += "</td>";
        var first = true;
        Object.keys(item).forEach(function(key) {
          if(key != "type" && key != "type_message" && key != "date")
          {
            if(!first){
              string += "<tr><td></td><td></td>"
            }
            string += "<td>";
            string += "<b>" + key + "</b> : " + item[key];
            string += "</td></tr>";
            first = false;
          }
        });
      });
      string += "</table>";
      console.dir(string);
      $(".dataTablediv").html(string);
    }
    catch(err){
      alert("Le log entré est invalide!");

    }
  }

  $("#parse").click(function(){parse()});
});
