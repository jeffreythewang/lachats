<!doctype html>
<html>
<head>
    <script src="/js/vendor/modernizr.js"></script>
    <script src="/js/vendor/jquery.js"></script>
    <script type='text/javascript' src="/js/typeahead.bundle.js"></script>
    <script type='text/javascript' src="/js/search.js"></script>
</head>
<body>
    <div id="searching">
      <input class="typeahead" type="text" placeholder="Classes at UCLA">
    </div>
</body>

<script>  
 var subjects = ['PHP', 'MySQL', 'SQL', 'PostgreSQL', 'HTML', 'CSS', 'HTML5', 'CSS3', 'JSON'];   
$('#searching').typeahead({source: subjects})  
</script>  
</html>