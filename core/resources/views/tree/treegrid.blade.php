<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>DidikH - jquery treegrid</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/jquery.treegrid.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://github.com/maxazan/jquery-treegrid/blob/master/js/jquery.treegrid.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <table class="tree">        
      </table>
    </div>
    <script>
      $(document).ready(function(){
        function createTable(jsonData){
        var generated = '';
        for(var i=0; i<jsonData.length; i++){
          if(jsonData[i].menuParent == -1){
            // parent menu
            generated = generated + '<tr class="treegrid-'+jsonData[i].menuId+'"><td>'+jsonData[i].menuName+'</td></tr>';
            // TODO recursive here
            var recursiveResult = generateChildsRecursively(jsonData[i], generated);
            generated = recursiveResult;
          }
        }
        return generated;
      }

      function generateChildsRecursively(jsonData, generated){
        for(var i=0; i<jsonData.children.length; i++){
          generated = generated + '<tr class="treegrid-'+jsonData.children[i].menuId+' treegrid-parent-'+jsonData.menuId+'"><td>'+jsonData.children[i].menuName+'</td></tr>';
          generated = generateChildsRecursively(jsonData.children[i], generated);
        }
        return generated;
      }
      });
    </script>
  </body>
</html>