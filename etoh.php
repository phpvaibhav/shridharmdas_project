<html>
<head>
<title>How to Convert Hindi Text into English Using JavaScript?</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<link href="http://www.google.com/uds/modules/elements/transliteration/api.css"
type="text/css" rel="stylesheet"/>
</head>
<body>
<h1>How to Convert Hindi Text into English Using JavaScript?</h1><br>
<h2>Type in Hindi (Press Ctrl+g to toggle between English and Hindi)</h2>
<div id="Wrapper"> <h2> Textarea </h2>
<input type="text" id="transliterateTextarea" name="transliterateTextarea" >	
<br>
<textarea id="transliterateTextarea_1" style="width:650px;height:300px"></textarea>
<!-- <textarea id="transliterateTextarea" style="width:650px;height:300px"></textarea> -->
</div>
</body>
<script type="text/javascript">
// Load the Google Transliteration API
google.load("elements", "1", {
packages: "transliteration"
});
function onLoad() {
var options = {
sourceLanguage:
google.elements.transliteration.LanguageCode.ENGLISH,
destinationLanguage:
google.elements.transliteration.LanguageCode.HINDI,
shortcutKey: 'ctrl+g',
transliterationEnabled: true
};
var control =
new google.elements.transliteration.TransliterationControl(options);
control.makeTransliteratable(['transliterateTextarea','transliterateTextarea_1']);

//Add the following line to make it work over https
        control.c.qc.t13n.c[3].c.d.keyup[0].ia.F.p = 'https://www.google.com';   
}
google.setOnLoadCallback(onLoad);
</script>
</html>

<!-- <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi">
    </script>
    <script type="text/javascript">
      google.load("elements", "1", {
            packages: "transliteration"
          });
 
      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };
        var control =
            new google.elements.transliteration.TransliterationControl(options);
        control.makeTransliteratable(['english2hindi']);
      }
      google.setOnLoadCallback(onLoad);
    </script>
  </head>
  <body>
 
    <textarea id="english2hindi" style="width:600px;height:200px"></textarea>
 Press Ctrl+g to toggle between English and Hindi
  </body>
</html> -->