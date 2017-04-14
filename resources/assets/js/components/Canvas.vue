<template>
  <div style="position: absolute; width: 100%; top: 0px; bottom: 0px;" id="canvas" ></div>

</template>

<script>
  const graph = new Q.Graph('canvas');
  $.ajax({
    method: 'GET',
    url: '/qunee',
    success: function (data) {
      translateToQuneeElements(JSON.parse(data), graph);
      graph.moveToCenter();
    },
    error: function (err) {
        console.info(err);
    }
  });


function translateToQuneeElements(json, graph){
    let map = {};
    if(json.nodes){
        Q.forEach(json.nodes, function(data){
            let node = graph.createNode(data.name, data.x || 0, data.y || 0);
            node.set("data", data);
            map[data.id] = node;
        });
    }
    if(json.edges){
        Q.forEach(json.edges, function(data){
            let from = map[data.from];
            let to = map[data.to];
            if(!from || !to){
                return;
            }
            let edge = graph.createEdge(data.name, from, to);
            edge.setStyle(Q.Styles.ARROW_TO, false);
            edge.set("data", data);
        }, graph);
    }
}

graph.ondblclick = function(evt){
    let node = graph.getElementByMouseEvent(evt);
    if(node){
        let newName = prompt("New Name:");
        if(newName){
            node.name = newName;
        }
    }
}

</script>