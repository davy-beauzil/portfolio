<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre prise de contact : {{ $contact->sujet }}</title>
</head>
<body>
  <div class="box">
    <div>
      <h1 class="title">Bonjour {{ $contact->prenom }} !</h1>
    </div>
    <div>
      <p>Merci de m'avoir contacté.<br> 
      J'ai bien reçu votre message au sujet de "{{ $contact->sujet  }}".<br> 
      Je traiterai votre demande dans les plus brefs délais.<br><br>
      Cordialement,<br>
      Davy Beauzil | Développeur web Laravel / Vue.js</p><br>
      Ceci est un message automatique, veuillez ne pas y répondre.




    </div>
    
  </div>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&display=swap');
    *{
      font-family: 'Hind', sans-serif;
    }
    body{
      display: flex;
      justify-content: center;
    }
    .box{
      background-color: white;
      max-width: 1000px;
      width: calc(100% - 20px);
    }
    .title{
      font-weight: bold;
      border: 0;
      display: inline-block;
      color: #212121;
      z-index: -1;
    }
  </style>
</body>
</html>